<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Keahlian;
use App\KeahlianDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeahlianDetailController extends Controller
{
    public function index(Request $request)
    {
        $keahlianDetail = KeahlianDetail::withCount(['keluarga_detail_keahlians'])
            ->where('nama', "like", "%" . $request->nama . "%");

        if($request->keahlian_id) {
            $keahlianDetail->where('keahlian_id', $request->keahlian_id);
        }

        return response()->json($keahlianDetail->limit($request->limit)->get());
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'keahlian_id' => 'required',
            'nama' => 'required|unique:keahlian_detail,nama'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "Error",
                "error" => $validator->errors()->toArray()
            ], 422);
        }

        if (KeahlianDetail::where('nama', $request->nama)->first()) {
            return response()->json([
                'status' => 'Error',
            ], 422);
        }

        KeahlianDetail::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(KeahlianDetail $keahlianDetail)
    {
        return response()->json([
            'status' => 'Success',
            'keahlian' => KeahlianDetail::where('id', $keahlianDetail->id)->first()
        ]);
    }

    public function update(Request $request, KeahlianDetail $keahlianDetail)
    {
        $validator = \Validator::make($request->all(), [
            'nama' => "required|unique:keahlian_detail,nama,$keahlianDetail->id"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "Error",
                "error" => $validator->errors()->toArray()
            ], 422);
        }

        $requestData = $request->all();

        $keahlianDetail->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(KeahlianDetail $keahlianDetail)
    {
        $keahlianDetail->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
