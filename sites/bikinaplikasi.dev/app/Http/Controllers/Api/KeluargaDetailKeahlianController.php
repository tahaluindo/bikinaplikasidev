<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\KeluargaDetailKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeluargaDetailKeahlianController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(KeluargaDetailKeahlian::where('anggota_id', "like", "%" . $request->anggota_id . "%")
            ->where('keahlian_detail_id', "like", "%" . $request->keahlian_detail_id . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        KeluargaDetailKeahlian::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(KeluargaDetailKeahlian $keluargaDetailKeahlian)
    {
        return response()->json([
            'status' => 'Success',
            'keluarga_detail_keahlian' => KeluargaDetailKeahlian::where('id', $keluargaDetailKeahlian->id)->first()
        ]);
    }

    public function update(Request $request, KeluargaDetailKeahlian $keluargaDetailKeahlian)
    {
        $requestData = $request->all();

        $keluargaDetailKeahlian->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(KeluargaDetailKeahlian $keluargaDetailKeahlian)
    {
        $keluargaDetailKeahlian->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
