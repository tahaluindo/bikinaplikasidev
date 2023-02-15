<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = [
            'user' => auth()->user()->user->toArray(),
        ];

        return view('pegawai.index', $data);
    }
}
