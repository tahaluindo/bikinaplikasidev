<?php

namespace App\Http\Controllers;

use App\Test;
use App\User;
use App\Kelas;
use App\Informasi;
use App\MapelDetail;
use App\Http\Controllers\Controller;

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
        $data = [];
        
        $data['siswas'] = User::all();

        $data['latihans'] = Test::where('jenis_soal', 'Latihan')->get();
        $data['ujians']   = Test::where('jenis_soal', 'Ujian')->get();

        // jika guru akan menampilkan informasi yang pernah dia buat
        // jika siswa akan menampilkan informasi dari kelas yang di ikuti
        $data['informasis'] = Informasi::all();
        $data['kelass']     = Kelas::all();

        if (auth()->user()->level == "guru") {
            $mapel_detail_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('kelas_id')->toArray();
            $data['kelass']   = Kelas::whereIn('id', $mapel_detail_ids)->get();

            $data['latihans'] = Test::where('jenis_soal', 'Latihan')->where('guru_id', auth()->user()->id)->get();
            $data['ujians']   = Test::where('jenis_soal', 'Ujian')->where('guru_id', auth()->user()->id)->get();

            $data['informasis'] = Informasi::whereIn('user_id', [auth()->user()->id, 1])->get();
            $data['siswas'] = User::all()->whereIn('kelas_id', $mapel_detail_ids);
        } elseif (auth()->user()->level == "siswa") {
            $mapel_detail_ids = MapelDetail::where('kelas_id', auth()->user()->kelas->id)->pluck('user_id')->toArray();

            $data['kelass'] = Kelas::where('id', auth()->user()->kelas->id)->get();

            $mapel_detail_kelas_ids = MapelDetail::where('kelas_id', auth()->user()->kelas->id)->pluck('user_id')->toArray();
            $data['latihans'] = Test::where('jenis_soal', 'Latihan')->whereIn('guru_id', $mapel_detail_kelas_ids)->get();
            $data['ujians']   = Test::where('jenis_soal', 'Ujian')->whereIn('guru_id', $mapel_detail_kelas_ids)->get();

            // informasi dari admin
            array_push($mapel_detail_kelas_ids, 1);
                
            $data['siswas'] = User::where('kelas_id', auth()->user()->kelas_id);

            $data['informasis'] = Informasi::whereIn('user_id', $mapel_detail_kelas_ids)->get();
        }

        return view('home', $data);
    }
}
