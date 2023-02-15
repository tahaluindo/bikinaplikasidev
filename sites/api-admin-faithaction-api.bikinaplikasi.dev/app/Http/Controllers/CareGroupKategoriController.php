<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CareGroupKategori;
use App\Models\CareGroupKategoriFasilitas;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CareGroupKategoriController extends Controller
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
        $careGroupKategori = CareGroupKategori::all();

        return view('care-group-kategori.index', [
            'careGroupKategori' => $careGroupKategori,
            'careGroupKategori_count' => $careGroupKategori->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('care-group-kategori.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();

        $this->validate($request, [
            'nama' => 'required|max:50',
            'deskripsi' => 'required',
        ]);

        CareGroupKategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect(route('care-group-kategori.index'))->with('success', 'Berhasil menambah care Group kategori');
    }


    public function show(CareGroupKategori $careGroupKategori)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $careGroupKategori
        ]);
    }


    public function edit(CareGroupKategori $careGroupKategori)
    {
        $this->checkUser();
        $data['careGroupKategori'] = $careGroupKategori;

        return view('care-group-kategori.edit', $data);
    }

    public function update(Request $request, CareGroupKategori $careGroupKategori)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:60',
            'deskripsi' => 'required',
        ]);

        $careGroupKategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect(route('care-group-kategori.index'))->with('success', 'Berhasil mengupdate care Group kategori');
    }

    public function destroy(CareGroupKategori $careGroupKategori)
    {
        $this->checkUser();
        $careGroupKategori->delete();

        return redirect(route('care-group-kategori.index'))->with('success', 'Berhasil menghapus care Group kategori');
    }
}