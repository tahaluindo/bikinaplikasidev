<?php

namespace App\Http\Controllers\Api;

use App\AnggotaGeografis;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnggotaGeografisController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AnggotaGeografis::with(['anggota', 'geografis'])
            ->where('anggota_id', "like", "%" . $request->anggota_id . "%")
            ->where('geografis_id', "like", "%" . $request->geografis_id . "%")
            ->where('jawaban', "like", "%" . $request->jawaban . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        AnggotaGeografis::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AnggotaGeografis $anggotaGeografis)
    {
        return response()->json([
            'status' => 'Success',
            'anggota_geografis' => AnggotaGeografis::where('id', $anggotaGeografis->id)->first()
        ]);
    }

    public function update(Request $request, AnggotaGeografis $anggotaGeografis)
    {
        $requestData = $request->all();

        $anggotaGeografis->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AnggotaGeografis $anggotaGeografis)
    {
        $anggotaGeografis->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
