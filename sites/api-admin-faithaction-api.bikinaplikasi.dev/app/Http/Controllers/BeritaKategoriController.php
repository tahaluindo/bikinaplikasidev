<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\BeritaKategori;
use App\Models\BeritaKategoriFasilitas;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BeritaKategoriController extends Controller
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
        $beritaKategori = BeritaKategori::all();

        return view('berita-kategori.index', [
            'beritaKategori' => $beritaKategori,
            'beritaKategori_count' => $beritaKategori->count()
        ]);
    }

    public function create()
    {$this->checkUser();
        return view('berita-kategori.create');
    }

    public function store(Request $request)
    {$this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:50'
        ]);

        BeritaKategori::create([
            'nama' => $request->nama
        ]);

        return redirect(route('berita-kategori.index'))->with('success', 'Berhasil menambah berita kategori');
    }


    public function show(BeritaKategori $beritaKategori)
    {$this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $beritaKategori
        ]);
    }


    public function edit(BeritaKategori $beritaKategori)
    {$this->checkUser();
        $data['beritaKategori'] = $beritaKategori;

        return view('berita-kategori.edit', $data);
    }

    public function update(Request $request, berita_kategori $beritaKategori)
    {$this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:60',
        ]);

        $beritaKategori->update([
            'nama' => $request->nama
        ]);

        return redirect(route('berita-kategori.index'))->with('success', 'Berhasil mengupdate berita kategori');
    }

    public function destroy(BeritaKategori $beritaKategori)
    {$this->checkUser();
        $beritaKategori->delete();

        return redirect(route('berita-kategori.index'))->with('success', 'Berhasil menghapus berita kategori');
    }


}