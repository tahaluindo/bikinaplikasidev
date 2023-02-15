<?php

namespace App\Http\Controllers\Api;

use App\AplikasiProgram;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AplikasiProgramController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AplikasiProgram::with(['aplikasi_program_list_pilihans', 'aplikasi_program_list_pilihans.aplikasi_program_list_checkboxs', 'aplikasi_program_list_checkboxs'])
            ->where('pertanyaan', "like", "%" . $request->pertanyaan . "%")
            ->where('have_list_pilihan', "like", "%" . $request->have_list_pilihan . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        AplikasiProgram::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AplikasiProgram $aplikasiProgram)
    {
        return response()->json([
            'status' => 'Success',
            'anggota_usaha' => AplikasiProgram::where('id', $aplikasiProgram->id)->first()
        ]);
    }

    public function update(Request $request, AplikasiProgram $aplikasiProgram)
    {
        $requestData = $request->all();

        $aplikasiProgram->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AplikasiProgram $aplikasiProgram)
    {
        $aplikasiProgram->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
