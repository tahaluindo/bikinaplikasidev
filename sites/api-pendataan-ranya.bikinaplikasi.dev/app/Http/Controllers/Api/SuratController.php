<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Layanan;
use App\Surat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class SuratController extends Controller
{

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
//        $validator = Validator::make($request->all(), [
//           'aaaaa' => 'required|min:199',
//           'aaaab' => 'required|min:199',
//           'aaaac' => 'required|min:199',
//        ]);
//
//        if($validator->fails()) {
//
//            die($validator->errors());
//        }

        return response()->json(["data" => Surat::limit($request->limit)
            ->get()
            ->sortByDesc('tgl_surat')
            ->values()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $requestData = $request->all();
            if ($request->hasFile('file_suratmasuk')) {
                $requestData['file_suratmasuk'] = str_replace("\\", "/", $request->file('file_suratmasuk')
                    ->move('uploads', time() . "." . $request->file('file_suratmasuk')->getClientOriginalExtension()));

                $requestData['file_suratmasuk'] = str_replace("uploads\\", "", $requestData['file_suratmasuk']);
                $requestData['file_suratmasuk'] = str_replace("uploads/", "", $requestData['file_suratmasuk']);
            }

            $requestData['tgl_surat'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tgl_surat))->format("Y-m-d");
            $requestData['tgl_diterima'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tgl_diterima))->format("Y-m-d");

            Surat::create($requestData);

            return response()->json(["status" => "Success"]);
        } catch (\Throwable $t) {
            file_put_contents("file_suratmasuk.json", $t->getMessage());
        }
    }

    public function update(Surat $surat, Request $request)
    {
        try {

            $requestData = $request->except(['id']);
            if ($request->hasFile('file_suratmasuk')) {
                $requestData['file_suratmasuk'] = str_replace("\\", "/", $request->file('file_suratmasuk')
                    ->move('uploads', time() . "." . $request->file('file_suratmasuk')->getClientOriginalExtension()));

                $requestData['file_suratmasuk'] = str_replace("uploads\\", "", $requestData['file_suratmasuk']);
                $requestData['file_suratmasuk'] = str_replace("uploads/", "", $requestData['file_suratmasuk']);
            }

            $requestData['tgl_surat'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tgl_surat))->format("Y-m-d");
            $requestData['tgl_diterima'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tgl_diterima))->format("Y-m-d");

            $surat->update($requestData);

            return response()->json(["status" => "Success"]);
        } catch (\Throwable $t) {
            file_put_contents("file_suratmasuk_update.json", $t->getMessage());
        }
    }

    public function destroy(Surat $surat, Request $request)
    {
        file_put_contents("errors.json", "woiii");
        $surat->delete();

        return response()->json([
            "status" => "Success",
        ], 200);
    }
}