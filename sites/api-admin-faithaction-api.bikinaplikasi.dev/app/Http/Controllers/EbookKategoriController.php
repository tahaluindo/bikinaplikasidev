<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\EbookKategori;
use App\Models\EbookKategoriFasilitas;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class EbookKategoriController extends Controller
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
        $ebookKategori = EbookKategori::all();

        return view('ebook-kategori.index', [
            'ebookKategori' => $ebookKategori,
            'ebookKategori_count' => $ebookKategori->count()
        ]);
    }

    public function create()
    {$this->checkUser();
        return view('ebook-kategori.create');
    }

    public function store(Request $request)
    {$this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:50'
        ]);

        EbookKategori::create([
            'nama' => $request->nama
        ]);

        return redirect(route('ebook-kategori.index'))->with('success', 'Berhasil menambah ebook kategori');
    }


    public function show(EbookKategori $ebookKategori)
    {$this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $ebookKategori
        ]);
    }


    public function edit(EbookKategori $ebookKategori)
    {$this->checkUser();
        $data['ebookKategori'] = $ebookKategori;

        return view('ebook-kategori.edit', $data);
    }

    public function update(Request $request, EbookKategori $ebookKategori)
    {$this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:60',
        ]);

        $ebookKategori->update([
            'nama' => $request->nama
        ]);

        return redirect(route('ebook-kategori.index'))->with('success', 'Berhasil mengupdate ebook kategori');
    }

    public function destroy(EbookKategori $ebookKategori)
    {$this->checkUser();
        $ebookKategori->delete();

        return redirect(route('ebook-kategori.index'))->with('success', 'Berhasil menghapus ebook kategori');
    }


}