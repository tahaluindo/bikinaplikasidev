<?php

namespace App\Http\Controllers;

use App\Test;
use App\User;
use App\Kelas;
use App\Mapel;
use App\Jadwal;
use App\Sekolah;
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

        $data['mapels']   = Mapel::all();
        $data['jadwals']  = Jadwal::all();

        // jika guru akan menampilkan informasi yang pernah dia buat
        // jika siswa akan menampilkan informasi dari kelas yang di ikuti
        $data['informasis'] = Informasi::limit(4)->get()->reverse();
        $data['kelass']     = Kelas::all();

        if (auth()->user()->level == "guru") {
            $mapel_detail_kelas_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('kelas_id')->toArray();
            $mapel_detail_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('id')->toArray();
            $mapel_detail_mapel_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('mapel_id')->toArray();
            $data['kelass']   = Kelas::whereIn('id', $mapel_detail_kelas_ids)->get();

            $data['jadwals']  = Jadwal::whereIn('mapel_detail_id', $mapel_detail_ids)->get();

            $data['informasis'] = Informasi::whereIn('user_id', [auth()->user()->id, 1])->get();
        } elseif (auth()->user()->level == "siswa") {
            $mapel_detail_ids = MapelDetail::where('kelas_id', auth()->user()->kelas->id)->pluck('id')->toArray();

            $data['kelass'] = Kelas::where('id', auth()->user()->kelas->id)->get();

            $mapel_detail_user_ids = MapelDetail::where('kelas_id', auth()->user()->kelas->id)->pluck('user_id')->toArray();

            array_push($mapel_detail_user_ids, 1);

            $data['informasis'] = Informasi::whereIn('user_id', $mapel_detail_user_ids)->where('user_id', 1)->get();
        }
// dd($data['informasis']->count());

        $data['sekolah'] = Sekolah::first();
        $data['user'] = auth()->user();
        
        return view('home', $data);
    }
}
