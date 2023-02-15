<?php

namespace App\Http\Controllers\Bidan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BidanController extends Controller
{
    public function index()
    {
        $user = auth()->user()->user->toArray();
        $periksa = \App\Periksa::where('bidan_id', $user['id'])->with('pasien')->whereDate('created_at', \Carbon\Carbon::today())->get()->toArray();

        $data = [
            'user' => $user,
            'periksa' => $periksa,
        ];

        return view('bidan.index', $data);
    }
}
