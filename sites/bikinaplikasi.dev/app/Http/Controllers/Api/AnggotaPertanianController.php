<?php

namespace App\Http\Controllers\Api;

use App\AnggotaPertanian;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnggotaPertanianController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AnggotaPertanian::with(['anggota', 'geografis'])
            ->where('anggota_id', "like", "%" . $request->anggota_id . "%")
            ->where('luas_lahan', "like", "%" . $request->luas_lahan . "%")
            ->where('kegiatan_panti', "like", "%" . $request->kegiatan_panti . "%")
            ->where('jenis_tanah', "like", "%" . $request->jenis_tanah . "%")
            ->where('jenis_tanaman', "like", "%" . $request->jenis_tanaman . "%")
            ->where('menggunakan_ptsa', "like", "%" . $request->menggunakan_ptsa . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        AnggotaPertanian::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AnggotaPertanian $anggotaPertanian)
    {
        return response()->json([
            'status' => 'Success',
            'anggota_pertanian' => AnggotaPertanian::where('id', $anggotaPertanian->id)->first()
        ]);
    }

    public function update(Request $request, AnggotaPertanian $anggotaPertanian)
    {
        $requestData = $request->all();

        $anggotaPertanian->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AnggotaPertanian $anggotaPertanian)
    {
        $anggotaPertanian->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
