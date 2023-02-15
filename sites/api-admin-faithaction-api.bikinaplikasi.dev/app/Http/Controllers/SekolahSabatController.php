<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\SekolahSabat;
use App\Models\SekolahSabatFasilitas;
use App\Models\SekolahSabatKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SekolahSabatController extends Controller
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
        $sekolahSabat = SekolahSabat::paginate(1000);

        return view('sekolah-sabat.index', [
            'sekolahSabat' => $sekolahSabat,
            'sekolahSabat_count' => $sekolahSabat->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('sekolah-sabat.create', [

        ]);
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'judul' => 'required',
            'gambar' => 'required',
            'bulan' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        $sekolahSabatCreate = SekolahSabat::create($requestData);

        return redirect()->route('sekolah-sabat.index')->with('success', 'Berhasil menambah sekolah sabat');
    }

    public function show(SekolahSabat $sekolahSabat)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $sekolahSabat
        ]);
    }

    public function edit(SekolahSabat $sekolahSabat)
    {
        $this->checkUser();
        $data["sekolahSabat"] = $sekolahSabat;
        $data[strtolower("SekolahSabat")] = $sekolahSabat;

        return view('sekolah-sabat.edit', $data);
    }

    public function update(Request $request, SekolahSabat $sekolahSabat)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'judul' => 'required',
            'bulan' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));

            \File::delete($sekolahSabat->gambar);
        }

        $sekolahSabat->update($requestData);

        return redirect()->route('sekolah-sabat.index')->with('success', 'Berhasil mengubah sekolah sabat');
    }

    public function destroy(SekolahSabat $sekolahSabat)
    {
        $this->checkUser();
        $sekolahSabat->delete();

        return redirect()->route('sekolah-sabat.index')->with('success', 'Berhasil mengubah sekolah sabat');
    }
}