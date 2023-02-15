<?php

namespace App\Http\Controllers\Api;

use App\AplikasiProgram;
use App\AplikasiProgramListCheckbox;
use App\AplikasiProgramListPilihan;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AplikasiProgramController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AplikasiProgram::with(['aplikasi_program_list_pilihans', 'aplikasi_program_list_pilihans.aplikasi_program_list_checkboxs', 'aplikasi_program_list_checkboxs'])
            ->where('pertanyaan', "like", "%" . $request->pertanyaan . "%")
            ->where('have_list_pilihan', "like", "%" . $request->have_list_pilihan . "%")
            ->limit($request->limit)
            ->get()->map(function($item) {

                return $item;
            }));
    }

    public function store(Request $request)
    {
        if (strpos($request->list_pertanyaan, ":") != false) {
            DB::transaction(function () use ($request) {

                $aplikasiProgram = AplikasiProgram::create([
                    'pertanyaan' => $request->pertanyaan,
                    'have_list_pilihan' => 1
                ]);

                foreach (explode("#", $request->list_pertanyaan) as $item) {
                    $list_pilihan = explode(":", $item);

                    $aplikasiProgramListPilihan = AplikasiProgramListPilihan::create([
                        'aplikasi_program_id' => $aplikasiProgram->id,
                        'have_list_checkbox' => 1,
                        'pilihan' => trim($list_pilihan[0]),
                    ]);

                    foreach (explode(",", $list_pilihan[1]) as $itemListPilihan) {

                        AplikasiProgramListCheckbox::create([
                            'aplikasi_program_id' => $aplikasiProgram->id,
                            'aplikasi_program_list_pilihan_id' => $aplikasiProgramListPilihan->id,
                            "pertanyaan" => $itemListPilihan
                        ]);
                    }
                }
            });
        } else {
            DB::transaction(function () use ($request) {

                $aplikasiProgram = AplikasiProgram::create([
                    'pertanyaan' => $request->pertanyaan,
                    'have_list_pilihan' => 0
                ]);

                foreach (explode(",", $request->list_pertanyaan) as $itemListPilihan) {

                    AplikasiProgramListCheckbox::create([
                        'aplikasi_program_id' => $aplikasiProgram->id,
                        'aplikasi_program_list_pilihan_id' => NULL,
                        "pertanyaan" => $itemListPilihan
                    ]);
                }
            });
        }

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
        if (strpos($request->list_pertanyaan, ":") != false) {
            DB::transaction(function () use ($request, $aplikasiProgram) {

                AplikasiProgram::where('id', $aplikasiProgram->id)->update([
                    'pertanyaan' => $request->pertanyaan,
                    'have_list_pilihan' => 1
                ]);

                AplikasiProgramListPilihan::where('aplikasi_program_id', $aplikasiProgram->id)->delete();
                foreach (explode("#", $request->list_pertanyaan) as $item) {
                    $list_pilihan = explode(":", $item);

                    $aplikasiProgramListPilihan = AplikasiProgramListPilihan::create([
                        'aplikasi_program_id' => $aplikasiProgram->id,
                        'have_list_checkbox' => 1,
                        'pilihan' => trim($list_pilihan[0]),
                    ]);

                    foreach (explode(",", $list_pilihan[1]) as $itemListPilihan) {

                        AplikasiProgramListCheckbox::create([
                            'aplikasi_program_id' => $aplikasiProgram->id,
                            'aplikasi_program_list_pilihan_id' => $aplikasiProgramListPilihan->id,
                            "pertanyaan" => $itemListPilihan
                        ]);
                    }
                }
            });
        } else {
            DB::transaction(function () use ($request, $aplikasiProgram) {
                AplikasiProgram::where('id', $aplikasiProgram->id)->update([
                    'pertanyaan' => $request->pertanyaan,
                    'have_list_pilihan' => 0
                ]);

                AplikasiProgramListCheckbox::where('aplikasi_program_id', $aplikasiProgram->id)->delete();
                foreach (explode(",", $request->list_pertanyaan) as $itemListPilihan) {

                    AplikasiProgramListCheckbox::create([
                        'aplikasi_program_id' => $aplikasiProgram->id,
                        'aplikasi_program_list_pilihan_id' => NULL,
                        "pertanyaan" => $itemListPilihan
                    ]);
                }
            });
        }

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
