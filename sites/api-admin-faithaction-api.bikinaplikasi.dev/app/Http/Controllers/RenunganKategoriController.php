<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Disukai;
use App\Models\RenunganKategori;
use App\Models\RenunganKategoriFasilitas;
use Illuminate\Http\Request;

class RenunganKategoriController extends Controller
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
        $renunganKategori = RenunganKategori::all();

        return view('renungan-kategori.index', [
            'renunganKategori' => $renunganKategori,
            'renunganKategori_count' => $renunganKategori->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('renungan-kategori.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:50'
        ]);

        RenunganKategori::create([
            'nama' => $request->nama
        ]);

        return redirect(route('renungan-kategori.index'))->with('success', 'Berhasil menambah renungan kategori');
    }


    public function show(RenunganKategori $renunganKategori)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $renunganKategori
        ]);
    }


    public function edit(RenunganKategori $renunganKategori)
    {
        $this->checkUser();
        $data['renunganKategori'] = $renunganKategori;

        return view('renungan-kategori.edit', $data);
    }

    public function update(Request $request, RenunganKategori $renunganKategori)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:60',
        ]);

        $renunganKategori->update([
            'nama' => $request->nama,
        ]);

        return redirect(route('renungan-kategori.index'))->with('success', 'Berhasil mengupdate renungan kategori');
    }

    public function destroy(RenunganKategori $renunganKategori)
    {
        $this->checkUser();
        $renunganKategori->delete();

        return redirect(route('renungan-kategori.index'))->with('success', 'Berhasil menghapus renungan kategori');
    }


}