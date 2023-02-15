<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DokterController extends Controller
{
    public function index()
    {
        $user = auth()->user()->user->toArray();
        $periksa = \App\Periksa::where('dokter_id', $user['id'])->with('pasien')->whereDate('created_at', \Carbon\Carbon::today())->get()->toArray();

        $data = [
            'user' => $user,
            'periksa' => $periksa,
        ];

        return view('dokter.index', $data);
    }
}
