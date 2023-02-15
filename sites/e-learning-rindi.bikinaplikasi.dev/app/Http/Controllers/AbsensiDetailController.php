<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\Absensi;
use App\AbsensiDetail;
use App\MapelDetail;
use App\User;
use Illuminate\Http\Request;

class AbsensiDetailController extends Controller
{
    public function index(Absensi $absensi)
    {
        //
        $data['absensi_details'] = $absensi->absensi_details();

        return view('absensi-details.index', $data);
    }
    
    public function create()
    {
        //
        $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get();

        return view('absensi.create', $data);
    }

    public function store(Request $request)
    {

    }

    public function show(AbsensiDetail $absensi_detail)
    {

    }

    public function edit(AbsensiDetail $absensi_detail)
    {

    }

    public function update(Request $request, AbsensiDetail $absensi_detail)
    {

        return redirect()->route('absensi.index')->with("success", "Berhasil mengupdate AbsensiDetail");
    }

    public function destroy(AbsensiDetail $absensi_detail)
    {
        //
        $absensi_detail->delete();

        return redirect()->route('absensi.index')->with("success", "Berhasil menghapus AbsensiDetail");
    }

    public function hapus_semua(Request $request)
    {
        $absensi_details = AbsensiDetail::whereIn('id', json_decode($request->ids, true))->get();

        AbsensiDetail::whereIn('id', $absensi_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data absensi');
    }
}
