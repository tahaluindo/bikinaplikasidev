<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\MapelDetail;
use App\SoalEssay;
use App\SoalPilgan;
use App\Test;
use App\TestDetail;
use App\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kelass'] = Kelas::all();
        $data['statuss'] = ['aktif', 'tidak aktif'];

        return view('laporan.index', $data);
    }

    public function siswa(Request $request)
    {
        $data['siswas'] = User::where('level', 'siswa')
            ->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->where('kelas_id', 'like', "%$request->kelas_id%")
            ->where('status', 'like', "%$request->status%")->get();

        if (!$data['siswas']->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view('laporan.siswa', $data);
    }

    public function guru(Request $request)
    {

        $data['gurus'] = User::whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->where('level', 'guru')
            ->where('status', 'like', "%$request->status%")->get();

        if (!$data['gurus']->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view('laporan.guru', $data);
    }

    public function kelas(Request $request)
    {

        $data['kelass'] = Kelas::get();

        if (!$data['kelass']->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view('laporan.kelas', $data);
    }
}
