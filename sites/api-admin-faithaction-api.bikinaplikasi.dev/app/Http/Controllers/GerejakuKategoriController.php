<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\GerejakuKategori;
use App\Models\GerejakuKategoriFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GerejakuKategoriController extends Controller
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
        $gerejakuKategori = GerejakuKategori::all();

        return view('gerejaku-kategori.index', [
            'gerejakuKategori' => $gerejakuKategori,
            'gerejakuKategori_count' => $gerejakuKategori->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('gerejaku-kategori.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:50'
        ]);

        GerejakuKategori::create([
            'nama' => $request->nama
        ]);

        return redirect(route('gerejaku-kategori.index'))->with('success', 'Berhasil menambah gerejaku kategori');
    }


    public function show(GerejakuKategori $gerejakuKategori)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $gerejakuKategori
        ]);
    }


    public function edit(GerejakuKategori $gerejakuKategori)
    {
        $this->checkUser();
        $data['gerejakuKategori'] = $gerejakuKategori;

        return view('gerejaku-kategori.edit', $data);
    }

    public function update(Request $request, GerejakuKategori $gerejakuKategori)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:60',
        ]);

        $gerejakuKategori->update([
            'nama' => $request->nama
        ]);

        return redirect(route('gerejaku-kategori.index'))->with('success', 'Berhasil mengupdate gerejaku kategori');
    }

    public function destroy(GerejakuKategori $gerejakuKategori)
    {
        $this->checkUser();
        $gerejakuKategori->delete();

        return redirect(route('gerejaku-kategori.index'))->with('success', 'Berhasil menghapus gerejaku kategori');
    }


}