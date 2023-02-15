<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\Absensi;
use App\AbsensiDetail;
use App\MapelDetail;
use App\User;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mapel_detail_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('user_id')->toArray();
        $data['absensis'] = Absensi::whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(1000);

        return view('absensi.index', $data);
    }

    public function create()
    {
        $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get();

        return view('absensi.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'mapel_detail_id' => 'required|exists:mapel_details,id',
        ]);
        
        if(Absensi::where('tanggal', $request->tanggal)->where('mapel_detail_id', $request->mapel_detail_id)->count()) {
            
            return redirect()->back()->with('error', 'Absensi sudah ada!');
        }

        \DB::transaction(function () use ($request) {

            $siswa = User::where('level', 'siswa')->where('kelas_id', MapelDetail::find($request->mapel_detail_id)->kelas_id)->get();

            if ($siswa->count()) {
                $absensi = Absensi::create($request->all());

                $siswa->each(function ($item) use($absensi) {
                    AbsensiDetail::create([
                        'absensi_id' => $absensi->id,
                        'user_id' => $item->id
                    ]);
                });
            }
        });

        return redirect()->route('absensi.index')->with("success", "Berhasil menambah absensi");
    }

    public function show(Absensi $absensi)
    {
        //
        $data['absensi'] = $absensi;
        
        return view('absensi.show', $data);
    }

    public function edit(Absensi $absensi)
    {
        //
        $data['absensi'] = $absensi;
        $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get();

        return view('absensi.edit', $data);
    }

    public function update(Request $request, Absensi $absensi)
    {
        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with("success", "Berhasil mengupdate Absensi");
    }

    public function destroy(Absensi $absensi)
    {
        //
        $absensi->delete();

        return redirect()->route('absensi.index')->with("success", "Berhasil melakukan Absensi");
    }
    
    public function hadir(AbsensiDetail $absensi_detail, User $user)
    {
        //
        $absensi_detail->update([
            'status' => 'Hadir'
        ]);

        return redirect()->back()->with("success", "Berhasil melakukan Absensi");
    }
    
    public function tidakHadir(AbsensiDetail $absensi_detail, User $user)
    {
        //
        $absensi_detail->update([
            'status' => 'Tidak Hadir'
        ]);

        return redirect()->back()->with("success", "Berhasil melakukan Absensi");
    }
    
    public function izin(AbsensiDetail $absensi_detail, User $user)
    {
        //
        $absensi_detail->update([
            'status' => 'Izin'
        ]);

        return redirect()->back()->with("success", "Berhasil menghapus Absensi");
    }

    public function hapus_semua(Request $request)
    {
        $absensis = Absensi::whereIn('id', json_decode($request->ids, true))->get();

        Absensi::whereIn('id', $absensis->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data absensi');
    }
}
