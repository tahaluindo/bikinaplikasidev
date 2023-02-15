<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Keahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeahlianController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Keahlian::withCount(['keahlian_details'])
            ->with(['keahlian_details'])
            ->where('kategori', "like", "%" . $request->kategori . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {

        if (Keahlian::where('kategori', $request->kategori)->first()) {
            return response()->json([
                'status' => 'Error',
            ], 422);
        }

        Keahlian::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(Keahlian $keahlian)
    {
        return response()->json([
            'status' => 'Success',
            'keahlian' => Keahlian::where('id', $keahlian->id)->first()
        ]);
    }

    public function update(Request $request, Keahlian $keahlian)
    {
        $requestData = $request->all();

        $keahlian->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(Keahlian $keahlian)
    {
        $keahlian->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
