<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\KeluargaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeluargaDetailController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(KeluargaDetail::where('keluarga_id', "like", "%" . $request->keluarga_id . "%")
            ->where('nik', "like", "%" . $request->nik . "%")
            ->where('nama', "like", "%" . $request->nama . "%")
            ->where('jenis_kelamin', "like", "%" . $request->jenis_kelamin . "%")
            ->where('tempat_lahir', "like", "%" . $request->tempat_lahir . "%")
            ->where('tgl_lahir', "like", "%" . $request->tgl_lahir . "%")
            ->where('status_perkawinan', "like", "%" . $request->status_perkawinan . "%")
            ->where('status_dalam_keluarga', "like", "%" . $request->status_dalam_keluarga . "%")
            ->where('berkah_belum', "like", "%" . $request->berkah_belum . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        KeluargaDetail::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(KeluargaDetail $keluargaDetail)
    {
        return response()->json([
            'status' => 'Success',
            'keluarga' => KeluargaDetail::where('id', $keluargaDetail->id)->first()
        ]);
    }

    public function update(Request $request, KeluargaDetail $keluargaDetail)
    {
        $requestData = $request->all();

        $keluargaDetail->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(KeluargaDetail $keluargaDetail)
    {
        $keluargaDetail->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
