<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Disposisi;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DisposisiController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(["data" => Disposisi::limit($request->limit)
            ->orderBy('id_disposisi', 'DESC')
            ->get()
            ->values()
        ]);
    }

    public function update(Request $request, Disposisi $disposisi): \Illuminate\Http\JsonResponse
    {
        $dataInput = $request->except(['_method']);
        $dataInput['tgl_disposisi'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tgl_disposisi))->format("Y-m-d");
        $disposisi->update($dataInput);

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function store(Request $request)
    {
        file_put_contents("errors.json", "woiii");
        $validator = \Validator::make($request->all(), [
            'tujuan' => 'required',
            'tgl_disposisi' => 'required',
            'isi_disposisi' => 'required',
            'sifat' => 'required',
            'catatan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "Error",
                'message' => $validator->errors()
            ], 200);
        }
        $dataInput = $request->except(['_method']);
        $dataInput['tgl_disposisi'] = \Carbon\Carbon::parse(str_replace("/", "-", $request->tgl_disposisi))->format("Y-m-d");

        Disposisi::create($dataInput);

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function destroy(Disposisi $disposisi, Request $request)
    {
        file_put_contents("errors.json", "woiii");
        $disposisi->delete();

        return response()->json([
            "status" => "Success",
        ], 200);
    }
}
