<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\PembayaranSantri;
use App\TransaksiLainnya;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['kelas_count']             = Kelas::all()->count();
        $data['user_count']              = User::all()->count();
        $data['pembayaran_santri_count'] = PembayaranSantri::all()->count();
        $data['transaksi_lainnya_count'] = TransaksiLainnya::all()->count();

        return view('home', $data);
    }
}
