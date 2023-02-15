<?php

namespace App\Http\Controllers\Api;

use App\Cabang;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CabangController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Cabang::withCount(['anggotas'])
            ->where('nama', "like", "%" . $request->nama . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {

        if (Cabang::where('nama', $request->nama)->first()) {
            return response()->json([
                'status' => 'Error',
            ], 422);
        }

        Cabang::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(Cabang $cabang)
    {
        return response()->json([
            'status' => 'Success',
            'anggota' => Cabang::where('id', $cabang->id)->first()
        ]);
    }

    public function update(Request $request, Cabang $cabang)
    {
        $requestData = $request->all();

        $cabang->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(Cabang $cabang)
    {
        $cabang->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
