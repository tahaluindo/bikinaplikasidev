<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Pertanian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PertanianController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Pertanian::where('luas_lahan', "like", "%" . $request->luas_lahan . "%")
            ->where('kegiatan_panti', "like", "%" . $request->kegiatan_panti . "%")
            ->where('jenis_tanah', "like", "%" . $request->jenis_tanah . "%")
            ->where('jenis_tanaman', "like", "%" . $request->jenis_tanaman . "%")
            ->where('menggunakan_ptsa', "like", "%" . $request->menggunakan_ptsa . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {

        if (Pertanian::where('nik', $request->nik)->first()) {
            return response()->json([
                'status' => 'Error',
            ], 422);
        }

        Pertanian::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(Pertanian $pertanian)
    {
        return response()->json([
            'status' => 'Success',
            'anggota' => Pertanian::where('id', $pertanian->id)->first()
        ]);
    }

    public function update(Request $request, Pertanian $pertanian)
    {
        $requestData = $request->all();

        $pertanian->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(Pertanian $pertanian)
    {
        $pertanian->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
