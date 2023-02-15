<?php

namespace App\Http\Controllers\Api;

use App\AnggotaAplikasiProgramListCheckbox;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnggotaAplikasiProgramListCheckboxController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AnggotaAplikasiProgramListCheckbox::with(['anggota', 'aplikasi_program_list_checkbox'])
            ->where('anggota_id', "like", "%" . $request->anggota_id . "%")
            ->where('aplikasi_program_list_checkbox_id ', "like", "%" . $request->aplikasi_program_list_checkbox_id  . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        AnggotaAplikasiProgramListCheckbox::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AnggotaAplikasiProgramListCheckbox $anggotaAplikasiProgramListCheckbox)
    {
        return response()->json([
            'status' => 'Success',
            'anggota_aplikasi_program_list_checkbox' => AnggotaAplikasiProgramListCheckbox::where('id', $anggotaAplikasiProgramListCheckbox->id)->first()
        ]);
    }

    public function update(Request $request, AnggotaAplikasiProgramListCheckbox $anggotaAplikasiProgramListCheckbox)
    {
        $requestData = $request->all();

        $anggotaAplikasiProgramListCheckbox->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AnggotaAplikasiProgramListCheckbox $anggotaAplikasiProgramListCheckbox)
    {
        $anggotaAplikasiProgramListCheckbox->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
