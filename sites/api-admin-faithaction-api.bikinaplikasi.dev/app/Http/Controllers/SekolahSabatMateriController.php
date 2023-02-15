<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\SekolahSabatMateri;
use App\Models\SekolahSabatMateriFasilitas;
use App\Models\SekolahSabatMateriKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SekolahSabatMateriController extends Controller
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
        $sekolahSabatMateri = SekolahSabatMateri::where('sekolah_sabat_id', $request->sekolah_sabat_id)->paginate(1000);

        return view('sekolah-sabat-materi.index', [
            'sekolahSabatMateri' => $sekolahSabatMateri,
            'sekolahSabatMateri_count' => $sekolahSabatMateri->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('sekolah-sabat-materi.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'judul' => 'required',
            'tanggal' => 'required',
        ]);

        $sekolahSabatMateriCreate = SekolahSabatMateri::create($requestData);

        return redirect(route('sekolah-sabat-materi.index') . "?sekolah_sabat_id=" . $request->sekolah_sabat_id)->with('success', 'Berhasil menambah sekolah sabat materi');
    }

    public function show(SekolahSabatMateri $sekolahSabatMateri)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $sekolahSabatMateri
        ]);
    }

    public function edit(SekolahSabatMateri $sekolahSabatMateri)
    {
        $this->checkUser();
        $data["sekolahSabatMateri"] = $sekolahSabatMateri;
        $data[strtolower("SekolahSabatMateri")] = $sekolahSabatMateri;

        return view('sekolah-sabat-materi.edit', $data);
    }

    public function update(Request $request, SekolahSabatMateri $sekolahSabatMateri)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'judul' => 'required',
            'tanggal' => 'required',
        ]);

        $sekolahSabatMateri->update($requestData);

        return redirect(route('sekolah-sabat-materi.index') . "?sekolah_sabat_id=" . $request->sekolah_sabat_id)->with('success', 'Berhasil mengubah sekolah sabat');
    }

    public function destroy(Request $request, SekolahSabatMateri $sekolahSabatMateri)
    {
        $this->checkUser();
        $sekolahSabatMateri->delete();

        return redirect(route('sekolah-sabat-materi.index') . "?sekolah_sabat_id=" . $request->sekolah_sabat_id)->with('success', 'Berhasil mengubah sekolah sabat');
    }
}