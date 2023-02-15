<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Klasifikasi;
use App\Layanan;
use App\Surat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class KlasifikasiController extends Controller
{

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(["data" => Klasifikasi::limit($request->limit)
            ->get()
            ->values()
        ]);
    }

    public function store(Request $request)
    {file_put_contents("errors.json", json_encode($request->all()));
        Klasifikasi::create($request->except(['_method']));

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function update(Klasifikasi $klasifikasi, Request $request)
    {file_put_contents("errors.json", json_encode($request->all()));
        $klasifikasi->update($request->except(["_method"]));

        return response()->json([
            "status" => "Success",
        ], 200);
    }


    public function destroy(Klasifikasi $klasifikasi, Request $request)
    {
        file_put_contents("errors.json", "woiii");
        $klasifikasi->delete();

        return response()->json([
            "status" => "Success",
        ], 200);
    }
}