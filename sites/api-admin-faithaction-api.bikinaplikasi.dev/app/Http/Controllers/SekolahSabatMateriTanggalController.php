<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\SekolahSabatMateriTanggal;
use App\Models\SekolahSabatMateriTanggalFasilitas;
use App\Models\SekolahSabatMateriTanggalKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SekolahSabatMateriTanggalController extends Controller
{
    public function checkUser()
    {
        if (in_array(auth()->user()->level, ['Admin'])) {

        } else {
            die('Tidak ada hak akses!');
        }
    }

    public function index(Request $request)
    {
        $this->checkUser();
        $sekolahSabatMateriTanggal = SekolahSabatMateriTanggal::paginate(1000);

        return view('sekolah-sabat-materi-tanggal.index', [
            'sekolahSabatMateriTanggal' => $sekolahSabatMateriTanggal,
            'sekolahSabatMateriTanggal_count' => $sekolahSabatMateriTanggal->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('sekolah-sabat-materi-tanggal.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);

        $sekolahSabatMateriTanggalCreate = SekolahSabatMateriTanggal::create($requestData);

        return redirect(route('sekolah-sabat-materi-tanggal.index') . "?sekolah_sabat_materi_id=" . $request->sekolah_sabat_materi_id)->with('success', 'Berhasil menambah sekolah sabat');
    }

    public function show(SekolahSabatMateriTanggal $sekolahSabatMateriTanggal)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $sekolahSabatMateriTanggal
        ]);
    }

    public function edit(SekolahSabatMateriTanggal $sekolahSabatMateriTanggal)
    {
        $this->checkUser();
        $data["sekolahSabatMateriTanggal"] = $sekolahSabatMateriTanggal;
        $data[strtolower("SekolahSabatMateriTanggal")] = $sekolahSabatMateriTanggal;

        return view('sekolah-sabat-materi-tanggal.edit', $data);
    }

    public function update(Request $request, SekolahSabatMateriTanggal $sekolahSabatMateriTanggal)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);

        $sekolahSabatMateriTanggal->update($requestData);

        return redirect(route('sekolah-sabat-materi-tanggal.index') . "?sekolah_sabat_materi_id=" . $request->sekolah_sabat_materi_id)->with('success', 'Berhasil mengubah sekolah sabat');
    }

    public function destroy(Request $request, SekolahSabatMateriTanggal $sekolahSabatMateriTanggal)
    {
        $this->checkUser();
        $sekolahSabatMateriTanggal->delete();

        return redirect(route('sekolah-sabat-materi-tanggal.index') . "?sekolah_sabat_materi_id=" . $request->sekolah_sabat_materi_id)->with('success', 'Berhasil mengubah sekolah sabat');
    }
}