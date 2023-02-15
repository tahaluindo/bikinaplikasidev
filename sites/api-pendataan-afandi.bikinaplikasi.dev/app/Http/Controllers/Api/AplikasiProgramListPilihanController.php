<?php

namespace App\Http\Controllers\Api;

use App\AplikasiProgramListPilihan;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AplikasiProgramListPilihanController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AplikasiProgramListPilihan::with(['aplikasi_program'])
            ->where('aplikasi_program_id', "like", "%" . $request->aplikasi_program_id . "%")
            ->where('have_list_checkbox', "like", "%" . $request->have_list_checkbox . "%")
            ->where('pilihan', "like", "%" . $request->pilihan . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        AplikasiProgramListPilihan::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AplikasiProgramListPilihan $aplikasiProgramListCheckbox)
    {
        return response()->json([
            'status' => 'Success',
            'anggota_usaha' => AplikasiProgramListPilihan::where('id', $aplikasiProgramListCheckbox->id)->first()
        ]);
    }

    public function update(Request $request, AplikasiProgramListPilihan $aplikasiProgramListCheckbox)
    {
        $requestData = $request->all();

        $aplikasiProgramListCheckbox->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AplikasiProgramListPilihan $aplikasiProgramListCheckbox)
    {
        $aplikasiProgramListCheckbox->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
