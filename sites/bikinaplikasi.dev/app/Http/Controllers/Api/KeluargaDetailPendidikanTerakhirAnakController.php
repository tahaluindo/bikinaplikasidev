<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\KeluargaDetailPendidikanTerakhirAnak;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeluargaDetailPendidikanTerakhirAnakController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(KeluargaDetailPendidikanTerakhirAnak::where('keluarga_detail_id', "like", "%" . $request->keluarga_detail_id . "%")
            ->where('nama_sekolah_atau_kampus', "like", "%" . $request->nama_sekolah_atau_kampus . "%")
            ->where('tingkat', "like", "%" . $request->tingkat . "%")
            ->where('nisn', "like", "%" . $request->nisn . "%")
            ->where('tahun_masuk', "like", "%" . $request->tahun_masuk . "%")
            ->where('tahun_lulus', "like", "%" . $request->tahun_lulus . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        KeluargaDetailPendidikanTerakhirAnak::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(KeluargaDetailPendidikanTerakhirAnak $keluargaDetailPendidikanTerakhirAnak)
    {
        return response()->json([
            'status' => 'Success',
            'keluarga_detail_keahlian_pekerjaan' => KeluargaDetailPendidikanTerakhirAnak::where('id', $keluargaDetailPendidikanTerakhirAnak->id)->first()
        ]);
    }

    public function update(Request $request, KeluargaDetailPendidikanTerakhirAnak $keluargaDetailPendidikanTerakhirAnak)
    {
        $requestData = $request->all();

        $keluargaDetailPendidikanTerakhirAnak->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(KeluargaDetailPendidikanTerakhirAnak $keluargaDetailPendidikanTerakhirAnak)
    {
        $keluargaDetailPendidikanTerakhirAnak->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
