<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Layanan;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class MahasiswaController extends Controller
{

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(["data" => Mahasiswa::limit($request->limit)
            ->get()
            ->sortByDesc('tglmulai_mahasiswa')
            ->values()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $requestData = $request->all();
            file_put_contents("file_mahasiswa.json", json_encode($requestData));
            if ($request->hasFile('file_mahasiswa')) {
                $requestData['file_mahasiswa'] = str_replace("\\", "/", $request->file('file_mahasiswa')
                    ->move('uploads', time() . "." . $request->file('file_mahasiswa')->getClientOriginalExtension()));

                $requestData['file_mahasiswa'] = str_replace("uploads\\", "", $requestData['file_mahasiswa']);
                $requestData['file_mahasiswa'] = str_replace("uploads/", "", $requestData['file_mahasiswa']);
            }

            $requestData['tglmulai_mahasiswa'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tglmulai_mahasiswa))->format("Y-m-d");
            $requestData['tglakhir_mahasiswa'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tglakhir_mahasiswa))->format("Y-m-d");

            Mahasiswa::create($requestData);

            return response()->json(["status" => "Success"]);
        } catch (\Throwable $t) {
            file_put_contents("file_mahasiswa.json", $t->getMessage());
        }
    }

    public function update(Mahasiswa $mahasiswa, Request $request)
    {
        try {

            $requestData = $request->except(['id_mahasiswa', '_method']);file_put_contents("file_mahasiswa.json", json_encode($requestData));
            if ($request->hasFile('file_mahasiswa')) {
                $requestData['file_mahasiswa'] = str_replace("\\", "/", $request->file('file_mahasiswa')
                    ->move('uploads', time() . "." . $request->file('file_mahasiswa')->getClientOriginalExtension()));

                $requestData['file_mahasiswa'] = str_replace("uploads\\", "", $requestData['file_mahasiswa']);
                $requestData['file_mahasiswa'] = str_replace("uploads/", "", $requestData['file_mahasiswa']);
            }

            $requestData['tglmulai_mahasiswa'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tglmulai_mahasiswa))->format("Y-m-d");
            $requestData['tglakhir_mahasiswa'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tglakhir_mahasiswa))->format("Y-m-d");

            $mahasiswa->update($requestData);

            return response()->json(["status" => "Success"]);
        } catch (\Throwable $t) {
            file_put_contents("file_mahasiswa_update.json", $t->getMessage());
        }
    }

    public function destroy(Mahasiswa $mahasiswa, Request $request)
    {
        file_put_contents("errors.json", "woiii");
        $mahasiswa->delete();

        return response()->json([
            "status" => "Success",
        ], 200);
    }
}