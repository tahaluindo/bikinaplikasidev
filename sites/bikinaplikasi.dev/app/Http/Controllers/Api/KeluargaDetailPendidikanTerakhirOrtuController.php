<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\KeluargaDetailPendidikanTerakhirOrtu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeluargaDetailPendidikanTerakhirOrtuController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(KeluargaDetailPendidikanTerakhirOrtu::where('keluarga_detail_id', "like", "%" . $request->keluarga_detail_id . "%")
            ->where('nama_sekolah_atau_kampus', "like", "%" . $request->nama_sekolah_atau_kampus . "%")
            ->where('tingkat', "like", "%" . $request->tingkat . "%")
            ->where('jurusan', "like", "%" . $request->jurusan . "%")
            ->where('tahun_lulus', "like", "%" . $request->tahun_lulus . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        KeluargaDetailPendidikanTerakhirOrtu::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(KeluargaDetailPendidikanTerakhirOrtu $keluargaDetailPendidikanTerakhirOrtu)
    {
        return response()->json([
            'status' => 'Success',
            'keluarga_detail_keahlian_pekerjaan' => KeluargaDetailPendidikanTerakhirOrtu::where('id', $keluargaDetailPendidikanTerakhirOrtu->id)->first()
        ]);
    }

    public function update(Request $request, KeluargaDetailPendidikanTerakhirOrtu $keluargaDetailPendidikanTerakhirOrtu)
    {
        $requestData = $request->all();

        $keluargaDetailPendidikanTerakhirOrtu->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(KeluargaDetailPendidikanTerakhirOrtu $keluargaDetailPendidikanTerakhirOrtu)
    {
        $keluargaDetailPendidikanTerakhirOrtu->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
