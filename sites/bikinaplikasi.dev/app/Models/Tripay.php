<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\Util\Str;

class Tripay extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tripay';
    protected $guarded = [];
    protected static $apiKey = 'pyBWBLW8d1c0LpzGsRfEoXHhoWjD0blPtBSK8lXe';
    protected static $privateKey = '7RLYk-UdDFe-rDRSG-fzDcE-ZoN9C';
    protected static $merchantCode = 'T3010';

    public function angsuran()
    {

        return $this->belongsTo(Angsuran::class);
    }

    public static function closedTransaction(Angsuran $angsuran, string $method, $expired_time = null)
    {

        $signature = hash_hmac('sha256', self::$merchantCode . $angsuran->no . $angsuran->jumlah, self::$privateKey);

        $data = [
            'method' => $method,
            'merchant_ref' => $angsuran->no,
            'amount' => $angsuran->jumlah,
            'customer_name' => $angsuran->admin_user->name,
            'customer_email' => $angsuran->admin_user->email,
            'customer_phone' => $angsuran->admin_user->no_hp,
            'order_items' => [
                [
                    'sku' => 'Program',
                    'name' => $angsuran->pesanan->pesanan_detail->produk->nama,
                    'price' => $angsuran->jumlah,
                    'quantity' => 1
                ]
            ],
            'callback_url' => route('admin.tripay.callback'),
            'return_url' => route('admin.pesanan.index'),
            'expired_time' => $expired_time ?? (time() + (24 * 60 * 60)), // 24 jam
            'signature' => $signature
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => "https://tripay.co.id/api/transaction/create",
//            CURLOPT_URL => "https://payment.tripay.co.id/api/transaction/create",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . Self::$apiKey
            ),
            CURLOPT_FAILONERROR => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data)
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if (!empty($err)) {

            die($err);
        }

        if (!json_decode($response)->success) {

            admin_toastr('Error. ' . json_decode($response)->message, 'error');

            return redirect(route('admin.pesanan.index'));
        }

        $tripayCreate = (new Tripay)->create([
            'angsuran_id' => $angsuran->id,
            'jenis' => 'closed',
            'payment_request_response' => $response
        ]);

        admin_toastr('Berhasil menambah data pesanan, mohon lakukan angsuran.');

        return redirect(route('admin.pesanan.index'));
    }

    public static function detail_transaction(Angsuran $angsuran, string $reference)
    {
        $payload = [
            'reference' => $reference
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => "https://tripay.co.id/api/transaction/detail?" . http_build_query($payload),
//            CURLOPT_URL => "https://payment.tripay.co.id/api/transaction/detail?" . http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . Self::$apiKey
            ),

            CURLOPT_FAILONERROR => false,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return !empty($err) ? $err : json_decode($response);
    }

    public static function escape($value)
    {
        $search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
        $replace = array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z");

        return str_replace($search, $replace, $value);
    }

    public static function callback()
    {
        $json = file_get_contents("php://input");
        $callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE']) ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] : '';
        $signature = hash_hmac('sha256', $json, self::$privateKey);

        if ($callbackSignature !== $signature) {
            exit("Invalid Signature"); // signature tidak valid, hentikan proses
        }

        $data = json_decode($json);
        $event = $_SERVER['HTTP_X_CALLBACK_EVENT'];

        if ($event == 'payment_status') {
            if ($data->status == 'PAID') {

                $servername = preg_match("/localhost/", $_SERVER['HTTP_HOST']) ? env('DB_HOST') : env('DB_HOST_ONLINE');
                $username = preg_match("/localhost/", $_SERVER['HTTP_HOST']) ? env('DB_USERNAME') : env('DB_USERNAME_ONLINE');
                $password = preg_match("/localhost/", $_SERVER['HTTP_HOST']) ? env('DB_PASSWORD') : env('DB_PASSWORD_ONLINE');
                $database = preg_match("/localhost/", $_SERVER['HTTP_HOST']) ? env('DB_DATABASE') : env('DB_DATABASE_ONLINE');

                try {
                    $db = new \PDO("mysql:host=$servername;dbname=$database", $username, $password);
                    // set the PDO error mode to exception
                    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                } catch (\PDOException $e) {
                    die("Connection failed: " . $e->getMessage());
                }

                $merchantRef = self::escape($data->merchant_ref);

                // pembayaran sukses, lanjutkan proses sesuai sistem Anda, contoh:
                $sql = "SELECT * FROM angsuran WHERE `no` = '{$merchantRef}' AND status = 'Belum Dibayar' LIMIT 1";
                if (($getInvoice = $db->query($sql))) {
                    while ($invoice = $getInvoice->fetchObject()) {
                        $angsuran = Angsuran::where('no', $invoice->no)->orderBy("id", "asc")->get();

                        $update = "UPDATE angsuran SET status = 'Dibayar' WHERE `no` = '{$invoice->no}'";
                        $db->query($update) or die($db->error);

                        // langsung lunaskan jika itu adalah pesanan terakhirnya
                        if ($angsuran->first()->angsuran_ke == 2) {
                            // cek jika user adlah refferal dari orang maka tambahkan ke saldo orang tersebut, ini hanya untuk 1 pembelian saja
                            if ($rujukan = Rujukan::where('user_admin_id_r', $angsuran->first()->pesanan->user_id)->first()) {
                                $pesanan = Pesanan::find($angsuran->first()->pesanan_id);
                                $pesanan_detail = $pesanan->pesanan_detail;
                                $produk = $pesanan_detail->produk;
                                User::where('user_admin_id', $rujukan->user_admin_id)->increment('saldo', $produk->bonus_rujukan ?? 0);
                            }
                            
                            Pesanan::find($angsuran->first()->pesanan_id)->update([
                                'status' => 'Selesai'
                            ]);
                        }

                        // input detail callbacknya ke table tripay
                        Tripay::where('angsuran_id', $angsuran->first()->id)->update([
                            'callback_response' => $json
                        ]);

                        echo json_encode(['success' => true]); // berikan respon yang sesuai
                        exit;
                    }
                }
            }
        }

        die("No action was taken");
    }

    public function getPaymentRequestResponseAttribute($key)
    {

        return json_decode($key);
    }
}
