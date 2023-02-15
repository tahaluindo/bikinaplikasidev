<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Berita;
use App\Models\BeritaFasilitas;
use App\Models\BeritaKategori;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BeritaController extends Controller
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

        $berita = new Berita();

        if ($request->limit) {

            $berita = $berita->with(['berita_disukais', 'berita_komentars', 'berita_kategori'])->withCount(['berita_disukais', 'berita_komentars'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $berita = DB::select("select * from berita where $request->where");
        } else {
            $berita = $berita->with(['berita_disukais', 'berita_komentars', 'berita_kategori'])->withCount(['berita_disukais', 'berita_komentars'])->get();
        }

        return view('berita.index', [
            'berita' => $berita,
            'berita_count' => $berita->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        
        return view('berita.create', [
            'berita_kategori' => BeritaKategori::pluck('nama', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $this->checkUser();
        
        $requestData = $request->all();

        $this->validate($request, [
            'berita_kategori_id' => 'required',
            'tanggal' => 'required',
            'judul' => 'required|unique:berita,judul',
            'isi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        $beritaCreate = Berita::create($requestData);

        return redirect()->route('berita.index')->with('success', 'Berhasil menambah berita');
    }

    public function show(Berita $berita)
    {
        $this->checkUser();
        
        return response()->json([
            "success" => true,
            'data' => $berita
        ]);
    }

    public function edit(Berita $berita)
    {
        $this->checkUser();
        
        $data["berita"] = $berita;
        $data[strtolower("Berita")] = $berita;
        $data['berita_kategori'] = BeritaKategori::pluck('nama', 'id');

        return view('berita.edit', $data);
    }

    public function update(Request $request, Berita $berita)
    {
        $this->checkUser();
        
        $requestData = $request->all();

        $this->validate($request, [
            'berita_kategori_id' => 'required',
            'tanggal' => 'required',
            'judul' => "required|unique:berita,judul,$request->judul,judul",
            'isi' => "required",
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));

            \File::delete($berita->gambar);
        }

        $beritaCreate = $berita->update($requestData);

        return redirect()->route('berita.index')->with('success', 'Berhasil mengubah berita');
    }

    public function destroy(Berita $berita)
    {
        $this->checkUser();
        
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berhasil mengubah berita');
    }
}