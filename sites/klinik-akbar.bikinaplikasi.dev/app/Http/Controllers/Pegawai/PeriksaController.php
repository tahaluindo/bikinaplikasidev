<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeriksaController extends Controller
{
    public function periksa()
    {
        $user = auth()->user()->user->toArray();
        $periksa = \App\Periksa::with('pasien', 'dokter')->get()->toArray();

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
}
