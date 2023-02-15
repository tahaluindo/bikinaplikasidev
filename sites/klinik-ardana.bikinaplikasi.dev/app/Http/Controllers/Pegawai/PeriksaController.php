<?php

namespace App\Http\Controllers\Pegawai;

use App\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeriksaController extends Controller
{
    public function periksa()
    {
        $user = auth()->user()->user->toArray();
        $periksa = \App\Periksa::with('pasien', 'bidan')->get()->toArray();

        $data = [
            'user' => $user,
            'periksa' => $periksa,
        ];

        return view('pegawai.periksa.all', $data);
    }

    public function bayar($id)
    {
        \App\Periksa::findOrFail($id)->update(['status_pembayaran' => 1]);

        return redirect('pegawai/periksa/')->with(['type' => 'success', 'pesan' => 'Berhasil Mengubah Status Data!']);
    }

    public function cari(Request $request)
    {
        if (is_null($request->input('cari'))) {
            return redirect('pegawai/periksa');
        }

        $pasien_ids = Pasien::where('nama', 'Like', '%' . $request->input('cari') . '%')->pluck('id');

        $data = [
            'user' => auth()->user()->user->toArray(),
            'periksa' => \App\Periksa::whereIn('pasien_id', $pasien_ids)->with('pasien')->with('bidan')->get()->toArray(),
            'cari' => $request->input('cari'),
            'obj' => null,
            'judul' => 'Tambah Data',
            'action' => 'Pegawai\PegawaiController@simpan',
            'method' => 'POST',
        ];

        return view('pegawai.periksa.all', $data);
    }
}
