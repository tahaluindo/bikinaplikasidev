<?php

namespace App\Http\Controllers\Api;

use App\Ranting;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RantingController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Ranting::withCount(['anggotas'])
            ->where('nama', "like", "%" . $request->nama . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {

        if (Ranting::where('nama', $request->nama)->first()) {
            return response()->json([
                'status' => 'Error',
            ], 422);
        }

        Ranting::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(Ranting $ranting)
    {
        return response()->json([
            'status' => 'Success',
            'anggota' => Ranting::where('id', $ranting->id)->first()
        ]);
    }

    public function update(Request $request, Ranting $ranting)
    {
        $requestData = $request->all();

        $ranting->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(Ranting $ranting)
    {
        $ranting->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
