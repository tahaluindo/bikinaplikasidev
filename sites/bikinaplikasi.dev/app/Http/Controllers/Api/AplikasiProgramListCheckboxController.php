<?php

namespace App\Http\Controllers\Api;

use App\AplikasiProgramListCheckbox;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AplikasiProgramListCheckboxController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AplikasiProgramListCheckbox::with(['anggota'])
            ->where('pertanyaan', "like", "%" . $request->pertanyaan . "%")
            ->where('have_list_pilihan', "like", "%" . $request->have_list_pilihan . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        AplikasiProgramListCheckbox::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AplikasiProgramListCheckbox $aplikasiProgramListCheckbox)
    {
        return response()->json([
            'status' => 'Success',
            'anggota_usaha' => AplikasiProgramListCheckbox::where('id', $aplikasiProgramListCheckbox->id)->first()
        ]);
    }

    public function update(Request $request, AplikasiProgramListCheckbox $aplikasiProgramListCheckbox)
    {
        $requestData = $request->all();

        $aplikasiProgramListCheckbox->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AplikasiProgramListCheckbox $aplikasiProgramListCheckbox)
    {
        $aplikasiProgramListCheckbox->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
