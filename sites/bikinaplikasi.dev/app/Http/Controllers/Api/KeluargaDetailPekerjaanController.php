<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\KeluargaDetailPekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeluargaDetailPekerjaanController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(KeluargaDetailPekerjaan::where('pekerjaan_id', "like", "%" . $request->pekerjaan_id . "%")
            ->where('keluarga_detail_id', "like", "%" . $request->keluarga_detail_id . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        KeluargaDetailPekerjaan::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(KeluargaDetailPekerjaan $keluargaDetailKeahlianPekerjaan)
    {
        return response()->json([
            'status' => 'Success',
            'keluarga_detail_keahlian_pekerjaan' => KeluargaDetailPekerjaan::where('id', $keluargaDetailKeahlianPekerjaan->id)->first()
        ]);
    }

    public function update(Request $request, KeluargaDetailPekerjaan $keluargaDetailKeahlianPekerjaan)
    {
        $requestData = $request->all();

        $keluargaDetailKeahlianPekerjaan->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(KeluargaDetailPekerjaan $keluargaDetailKeahlianPekerjaan)
    {
        $keluargaDetailKeahlianPekerjaan->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
