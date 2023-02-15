<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\AnggotaIndikatorUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndikatorUsahaController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AnggotaIndikatorUsaha::where('usaha_id', "like", "%" . $request->usaha_id . "%")
            ->where('tahun', "like", "%" . $request->tahun . "%")
            ->where('modal_sendiri', "like", "%" . $request->modal_sendiri . "%")
            ->where('asset', "like", "%" . $request->asset . "%")
            ->where('volume_usaha', "like", "%" . $request->volume_usaha . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        if (AnggotaIndikatorUsaha::where('nama', $request->nama)->first()) {
            return response()->json([
                'status' => 'Error',
            ], 422);
        }

        AnggotaIndikatorUsaha::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AnggotaIndikatorUsaha $indikatorUsaha)
    {
        return response()->json([
            'status' => 'Success',
            'indikator_usaha' => AnggotaIndikatorUsaha::where('id', $indikatorUsaha->id)->first()
        ]);
    }

    public function update(Request $request, AnggotaIndikatorUsaha $indikatorUsaha)
    {
        $requestData = $request->all();

        $indikatorUsaha->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AnggotaIndikatorUsaha $indikatorUsaha)
    {
        $indikatorUsaha->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
