<?php

namespace App\Http\Controllers\Api;

use App\Koja;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KojaController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Koja::withCount(['anggotas'])
            ->where('nama', "like", "%" . $request->nama . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {

        if (Koja::where('nama', $request->nama)->first()) {
            return response()->json([
                'status' => 'Error',
            ], 422);
        }

        Koja::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(Koja $koja)
    {
        return response()->json([
            'status' => 'Success',
            'anggota' => Koja::where('id', $koja->id)->first()
        ]);
    }

    public function update(Request $request, Koja $koja)
    {
        $requestData = $request->all();

        $koja->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(Koja $koja)
    {
        $koja->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
