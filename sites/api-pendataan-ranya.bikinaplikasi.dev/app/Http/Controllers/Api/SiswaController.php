<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Layanan;
use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class siswaController extends Controller
{

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(["data" => siswa::limit($request->limit)
            ->get()
            ->sortByDesc('tglmulai_siswa')
            ->values()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $requestData = $request->all();
            if ($request->hasFile('file_siswa')) {
                $requestData['file_siswa'] = str_replace("\\", "/", $request->file('file_siswa')
                    ->move('uploads', time() . "." . $request->file('file_siswa')->getClientOriginalExtension()));

                $requestData['file_siswa'] = str_replace("uploads\\", "", $requestData['file_siswa']);
                $requestData['file_siswa'] = str_replace("uploads/", "", $requestData['file_siswa']);
            }

            $requestData['tglmulai_siswa'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tglmulai_siswa))->format("Y-m-d");
            $requestData['tglakhir_siswa'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tglakhir_siswa))->format("Y-m-d");

            siswa::create($requestData);

            return response()->json(["status" => "Success"]);
        } catch (\Throwable $t) {
            file_put_contents("file_siswa.json", $t->getMessage());
        }
    }

    public function update(siswa $siswa, Request $request)
    {
        try {

            $requestData = $request->except(['id_siswa', '_method']);
            if ($request->hasFile('file_siswa')) {
                $requestData['file_siswa'] = str_replace("\\", "/", $request->file('file_siswa')
                    ->move('uploads', time() . "." . $request->file('file_siswa')->getClientOriginalExtension()));

                $requestData['file_siswa'] = str_replace("uploads\\", "", $requestData['file_siswa']);
                $requestData['file_siswa'] = str_replace("uploads/", "", $requestData['file_siswa']);
            }

            $requestData['tglmulai_siswa'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tglmulai_siswa))->format("Y-m-d");
            $requestData['tglakhir_siswa'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tglakhir_siswa))->format("Y-m-d");

            $siswa->update($requestData);

            return response()->json(["status" => "Success"]);
        } catch (\Throwable $t) {
            file_put_contents("file_siswa_update.json", $t->getMessage());
        }
    }

    public function destroy(siswa $siswa, Request $request)
    {
        file_put_contents("errors.json", "woiii");
        $siswa->delete();

        return response()->json([
            "status" => "Success",
        ], 200);
    }
}