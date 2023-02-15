<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PekerjaanController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Pekerjaan::with(['keluarga_detail_pekerjaans'])
            ->withCount(['keluarga_detail_pekerjaans'])
            ->where('id', "like", "%" . $request->id . "%")
            ->where('nama', "like", "%" . $request->nama . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        if (Pekerjaan::where('nama', $request->nama)->first()) {
            return response()->json([
                'status' => 'Error',
            ], 422);
        }

        Pekerjaan::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(Pekerjaan $anggota)
    {
        return response()->json([
            'status' => 'Success',
            'anggota' => Pekerjaan::where('id', $anggota->id)->first()
        ]);
    }

    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $requestData = $request->all();

        $pekerjaan->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(Pekerjaan $pekerjaan)
    {
        $pekerjaan->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
