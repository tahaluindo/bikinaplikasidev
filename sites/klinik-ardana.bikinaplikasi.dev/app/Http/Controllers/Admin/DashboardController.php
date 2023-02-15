<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user()->user->toArray();
        $bidan_count = \App\Bidan::all()->count();
        $pegawai_count = \App\Pegawai::all()->count();
        $pasien_count = \App\Pasien::all()->count();
        $periksa_count = \App\Periksa::all()->count();

        $data = [
            'user' => $user,
            'bidan_count' => $bidan_count,
            'pegawai_count' => $pegawai_count,
            'pasien_count' => $pasien_count,
            'periksa_count' => $periksa_count,
        ];

        return view('admin.index', $data);
    }
}
