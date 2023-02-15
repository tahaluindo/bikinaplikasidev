<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Renungan;
use App\Models\RenunganKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RenunganController extends Controller
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
        $renungan = new Renungan();

        if ($request->limit) {

            $renungan = $renungan->with(['renungan_disukais', 'renungan_komentars', 'renungan_kategori'])->withCount(['renungan_disukais', 'renungan_komentars'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $renungan = DB::select("select * from renungan where $request->where");
        } else {
            $renungan = $renungan->with(['renungan_disukais', 'renungan_komentars', 'renungan_kategori'])->withCount(['renungan_disukais', 'renungan_komentars'])->get();
        }

        return view('renungan.index', [
            'renungan' => $renungan,
            'renungan_count' => $renungan->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('renungan.create', [
            'renungan_kategori' => RenunganKategori::pluck('nama', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'renungan_kategori_id' => 'required',
            'gambar' => 'required',
            'judul' => 'required|unique:renungan,judul',
            'isi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }


        $renunganCreate = Renungan::create($requestData);

        return redirect()->route('renungan.index')->with('success', 'Berhasil menambah renungan');
    }

    public function show($renungan)
    {
        $this->checkUser();
        $data["renungan"] = $renungan;
        $data[strtolower("Renungan")] = $renungan;
        $data['renungan_kategori'] = RenunganKategori::pluck('nama', 'id');

        return view('renungan.edit', $data);
    }

    public function edit(Renungan $renungan)
    {
        $this->checkUser();
        $data["renungan"] = $renungan;
        $data[strtolower("Renungan")] = $renungan;
        $data['renungan_kategori'] = RenunganKategori::pluck('nama', 'id');

        return view('renungan.edit', $data);
    }

    public function update(Request $request, Renungan $renungan)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'renungan_kategori_id' => 'required',
            'judul' => "required|unique:berita,judul,$request->judul,judul",
            'isi' => "required",
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));

            \File::delete($renungan->gambar);
        }

        $renunganCreate = $renungan->update($requestData);

        return redirect()->route('renungan.index')->with('success', 'Berhasil mengubah renungan');
    }

    public function destroy(Renungan $renungan)
    {
        $this->checkUser();
        $renungan->delete();

        return redirect()->route('renungan.index')->with('success', 'Berhasil mengubah renungan');
    }
}