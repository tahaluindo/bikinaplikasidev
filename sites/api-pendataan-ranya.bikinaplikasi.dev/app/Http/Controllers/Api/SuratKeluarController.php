<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Layanan;
use App\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class SuratKeluarController extends Controller
{

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(["data" => SuratKeluar::limit($request->limit)
            ->get()
            ->sortByDesc('tgl_surat')
            ->values()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $requestData = $request->all();
            if ($request->hasFile('file_suratkeluar')) {
                $requestData['file_suratkeluar'] = str_replace("\\", "/", $request->file('file_suratkeluar')
                    ->move('uploads', time() . "." . $request->file('file_suratkeluar')->getClientOriginalExtension()));

                $requestData['file_suratkeluar'] = str_replace("uploads\\", "", $requestData['file_suratkeluar']);
                $requestData['file_suratkeluar'] = str_replace("uploads/", "", $requestData['file_suratkeluar']);
            }

            $requestData['tgl_surat'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tgl_surat))->format("Y-m-d");
            $requestData['tgl_keluar'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tgl_keluar))->format("Y-m-d");

            SuratKeluar::create($requestData);

            return response()->json(["status" => "Success"]);
        } catch (\Throwable $t) {
            file_put_contents("file_suratkeluar.json", $t->getMessage());
        }
    }

    public function update(SuratKeluar $surat_keluar, Request $request)
    {
        try {

            $requestData = $request->except(['id']);
            if ($request->hasFile('file_suratkeluar')) {
                $requestData['file_suratkeluar'] = str_replace("\\", "/", $request->file('file_suratkeluar')
                    ->move('uploads', time() . "." . $request->file('file_suratkeluar')->getClientOriginalExtension()));

                $requestData['file_suratkeluar'] = str_replace("uploads\\", "", $requestData['file_suratkeluar']);
                $requestData['file_suratkeluar'] = str_replace("uploads/", "", $requestData['file_suratkeluar']);
            }

            $requestData['tgl_surat'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tgl_surat))->format("Y-m-d");
            $requestData['tgl_keluar'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tgl_keluar))->format("Y-m-d");

            $surat_keluar->update($requestData);

            return response()->json(["status" => "Success"]);
        } catch (\Throwable $t) {
            file_put_contents("file_suratkeluar_update.json", $t->getMessage());
        }
    }

    public function destroy(SuratKeluar $surat_keluar, Request $request)
    {
        file_put_contents("errors.json", "woiii");
        $surat_keluar->delete();

        return response()->json([
            "status" => "Success",
        ], 200);
    }
}