<?php

namespace App\Http\Controllers\Admin;

use App\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeriksaController extends Controller
{
    public function index()
    {
        $periksa = \App\Periksa::with('pasien', 'dokter')->latest()->get()->toArray();
        $user = auth()->user()->user->toArray();

        $data = [
            'periksa' => $periksa,
            'user' => $user,
        ];

        return view('admin.periksa.index', $data);
    }

    public function detail($id)
    {
        $periksa = \App\Periksa::where('id', $id);

        $data = [
            'id' => $id,
            'user' => auth()->user()->user->toArray(),
            'periksa' => $periksa->with('pasien')->first()->toArray(),
        ];

        return view('admin.periksa.detail', $data);
    }

    public function print($id)
    {

        $periksa = \App\Periksa::where('id', $id)->with('pasien', 'dokter')->first()->toArray();

        $data = [
            'periksa' => $periksa,
        ];

        return view('admin/periksa/print', $data);
    }


    public function cari(Request $request)
    {
        if (is_null($request->input('cari'))) {
            return redirect('admin/periksa');
        }

        $pasien_ids = Pasien::where('nama', 'Like', '%' . $request->input('cari') . '%')->pluck('id');

        $data = [
            'user' => auth()->user()->user->toArray(),
            'periksa' => \App\Periksa::whereIn('pasien_id', $pasien_ids)->with('pasien')->with('dokter')->get()->toArray(),
            'cari' => $request->input('cari'),
            'obj' => null,
            'judul' => 'Tambah Data',
            'action' => 'Admin\PegawaiController@simpan',
            'method' => 'POST',
        ];

        return view('admin.periksa.index', $data);
    }
}
