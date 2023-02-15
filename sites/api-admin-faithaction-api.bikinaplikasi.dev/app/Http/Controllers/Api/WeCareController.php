<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Notification;
use App\Models\User;
use App\Models\WeCare;
use App\Models\WeCareUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WeCareController extends Controller
{
    public function index(Request $request)
    {
        $weCare = new WeCare();
        $weCare = $weCare->orderBy("id", "DESC");

        $weCare = $weCare->where('status', 'Diterima');

        if ($request->we_care_kategori_id) {

            $weCare = $weCare->where('we_care_kategori_id', $request->we_care_kategori_id);
        }

        if ($request->limit) {

            $weCare = $weCare->with(['user', 'we_care_users', 'we_care_kategori'])->withSum('we_care_users', 'jumlah')->withCount(['we_care_users'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $weCare = DB::select("select * from we_care where $request->where");
        } else {
            $weCare = $weCare->with(['user', 'we_care_users', 'we_care_kategori'])->withSum('we_care_users', 'jumlah')->withCount(['we_care_users'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $weCare
        ]);
    }

    public function kategori(Request $request)
    {
        $weCare = new WeCare();

        if ($request->limit) {

            $weCare = $weCare->withCount(['we_care_users'])->with(['user', 'we_care_users'])->withSum('we_care_users', 'jumlah')->distinct('kategori')->limit($request->limit)->get();
        } elseif ($request->where) {

            $weCare = DB::select("select * from care_group where $request->where");
        } else {
            $weCare = $weCare->withCount(['we_care_users'])->with(['user', 'we_care_users'])->withSum('we_care_users', 'jumlah')->distinct('kategori')->get();
        }

        return response()->json([
            "success" => true,
            'data' => $weCare
        ]);
    }

    public function requestTransaksi(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $weCare = WeCare::findOrFail($request->we_care_id);

        // check apakah ada transaksi yang dilakukan dalam 24 jam terakhir sebanyak 2x
        if (WeCareUser::where(['user_id' => $request->user_id, 'we_care_id' => $request->we_care_id])->where('created_at', "like", '%' . now()->format("Y-m-d") . '%')->count() >= 2) {
            return response()->json([
                "success" => false,
                'message' => "Maksimum 2x per donasi!"
            ]);
        }

        $apiKey = 'pyBWBLW8d1c0LpzGsRfEoXHhoWjD0blPtBSK8lXe';
        $privateKey = '7RLYk-UdDFe-rDRSG-fzDcE-ZoN9C';
        $merchantCode = 'T3010';
        $amount = $request->jumlah;
        $merchantRef = 'INV-' . time();

        $data = [
            'method' => $request->metode_pembayaran,
            'merchant_ref' => $merchantRef,
            'amount' => $amount,
            'customer_name' => $user->fullName,
            'customer_email' => $user->email,
            'customer_phone' => $user->noHp,
            'order_items' => [
                [
                    'name' => "Donasi untuk: " . $weCare->judul,
                    'quantity' => 1,
                    'price' => $amount
                ],
            ],
            'return_url' => !preg_match("/\.dev/", $_SERVER['HTTP_HOST']) ? "http://$_SERVER[HTTP_HOST]/api/we-care/redirect" : "https://$_SERVER[HTTP_HOST]/api/we-care/redirect",
            'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
            'signature' => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => 'https://tripay.co.id/api/transaction/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
        ]);

        $response = json_decode(curl_exec($curl));
        $error = curl_error($curl);

        curl_close($curl);

        if (!isset($response->data)) {
            return response()->json([
                'success' => false,
                'message' => $response->message
            ]);
        }

        if (empty($error)) {

            DB::transaction(function () use ($request, $response, $merchantRef) {
                $weCareCreate = WeCareUser::create([
                    'we_care_id' => $request->we_care_id,
                    'user_id' => $request->user_id,
                    'merchant_ref' => $merchantRef,
                    'reference' => $response->data->reference,
                    'jumlah' => $request->jumlah,
                    'pesan' => $request->pesan,
                ]);

                Notification::create([
                    "user_id" => $request->user_id,
                    "forTable" => "we_care",
                    "forTableRowId" => $response->data->reference,
                    "type" => "Info",
                    "read" => "No",
                    "message" => "U have payment request: " . $response->data->reference,
                ]);
            });

            return response()->json($response);
        }

        die($error);

    }

    public function detailTransaksi(Request $request)
    {
        $apiKey = 'pyBWBLW8d1c0LpzGsRfEoXHhoWjD0blPtBSK8lXe';

        $payload = ['reference' => $request->reference];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => 'https://tripay.co.id/api/transaction/detail?' . http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR => false,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if (empty($error)) {

            return response()->json(json_decode($response));
        }

        die($error);
    }


    public function updateStatus(Request $request)
    {
        if ($request->status == "PAID") {
            Notification::where('forTableRowId', $request->forTableRowId)->first()->update([
                "user_id" => $request->user_id,
                "forTable" => "we_care",
                "type" => "Success",
                "message" => "Payment Success: " . $request->forTableRowId,
            ]);
        }

        if ($request->status == "EXPIRED") {
            Notification::where('forTableRowId', $request->forTableRowId)->first()->update([
                "user_id" => $request->user_id,
                "forTable" => "we_care",
                "type" => "Error",
                "message" => "Payment Expired: " . $request->forTableRowId,
            ]);
        }

        return response()->json([
            "success" => true,
        ]);
    }

    public function createCampaign(Request $request)
    {
        $validator = Validator::make(json_decode($request->all()['data'], true), [
            'we_care_kategori_id' => 'required',
            'judul' => 'required',
            'namaLengkap' => 'required',
            'sebagai' => 'required',
            'nomorRekening' => 'required',
            'noHp' => 'required',
            'targetDana' => 'required',
            'targetTanggal' => 'required|date',
            'negara' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'kodePos' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->toArray()
            ]);
        }


        $requestData = json_decode($request->all()['data'], true);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        DB::transaction(function () use ($requestData, $request) {
        
            WeCare::create($requestData);
        });

        return response()->json([
            "success" => true,
        ]);
    }

}