<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Giving;
use App\Models\GivingFasilitas;
use App\Models\GivingJenisPersembahan;
use App\Models\GivingKategori;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GivingController extends Controller
{
    public function index(Request $request)
    {        
        $giving = new Giving();

        if ($request->givingKategori) {
            $givingKategori = GivingKategori::where('nama', $request->givingKategori)->first();
            if ($request->givingKategori != "Semua") {
                $giving = $giving->where('giving_kategori_id', $givingKategori->id);
            }
        }

        if ($request->limit) {

            $giving = $giving->with(['giving_kategori'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $giving = DB::select("select * from giving where $request->where");
        } else {
            $giving = $giving->with(['giving_kategori'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $giving
        ]);
    }

    public function requestTransaksi(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        // check apakah ada transaksi yang dilakukan dalam 24 jam terakhir sebanyak 2x
        if (Giving::where(['user_id' => $request->user_id])->where('created_at', "like", '%' . now()->format("Y-m-d") . '%')->count() >= 2) {
            return response()->json([
                "success" => false,
                'message' => "Maksimum 2 transaksi per hari!"
            ]);
        }

        $givingJenisPersembahan = GivingJenisPersembahan::findOrFail($request->giving_jenis_persembahan_id);

        $apiKey = 'pyBWBLW8d1c0LpzGsRfEoXHhoWjD0blPtBSK8lXe';
        $privateKey = '7RLYk-UdDFe-rDRSG-fzDcE-ZoN9C';
        $merchantCode = 'T3010';
        $amount = $request->nominal;
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
                    'name' => "Giving untuk $givingJenisPersembahan->nama",
                    'quantity' => 1,
                    'price' => $amount
                ],
            ],
            'return_url' => !preg_match("/\.dev/", $_SERVER['HTTP_HOST']) ? "http://$_SERVER[HTTP_HOST]/api/giving/redirect" : "https://$_SERVER[HTTP_HOST]/api/giving/redirect",
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
        
        if(!isset($response->data)) {
            return response()->json([
                'success' => false,
                'message' => $response->message
            ]);
        }
        
        if (empty($error)) {
            
            DB::transaction(function () use($request, $response, $merchantRef) {
                $lastGiving = Giving::create([
                    'giving_jenis_persembahan_id' => $request->jenis_persembahan_id,
                    'user_id' => $request->user_id,
                    'merchant_ref' => $merchantRef,
                    'reference' => $response->data->reference,
                ]);
                
                Notification::create([
                    "user_id" => $request->user_id,
                    "forTable" => "giving",
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
    
    public function updateStatus(Request $request)
    {
        if ($request->status == "PAID") {
            Notification::where('forTableRowId', $request->forTableRowId)->first()->update([
                "user_id" => $request->user_id,
                "forTable" => "giving",
                "type" => "Success",
                "message" => "Payment Success: " . $request->forTableRowId,
            ]);
        }

        if ($request->status == "EXPIRED") {
            Notification::where('forTableRowId', $request->forTableRowId)->first()->update([
                "user_id" => $request->user_id,
                "forTable" => "giving",
                "type" => "Error",
                "message" => "Payment Expired: " . $request->forTableRowId,
            ]);
        }

        return response()->json([
            "success" => true,
        ]);
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

    public function redirect(Request $request)
    {

    }

    public function getGivingJenisPersembahan(Request $request)
    {
        return response()->json([
            "success" => true,
            'data' => GivingJenisPersembahan::all()
        ]);
    }
}