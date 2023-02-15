<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user()->user->toArray();
        $dokter_count = \App\Dokter::all()->count();
        $pegawai_count = \App\Pegawai::all()->count();
        $pasien_count = \App\Pasien::all()->count();
        $periksa_count = \App\Periksa::all()->count();
        $periksa = \App\Periksa::all();

        $data = [
            'user' => $user,
            'dokter_count' => $dokter_count,
            'pegawai_count' => $pegawai_count,
            'pasien_count' => $pasien_count,
            'periksa_count' => $periksa_count,
            'periksa' => $periksa,
        ];

        return view('admin.index', $data);
    }
}
