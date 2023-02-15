<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Jadwal;
use App\MapelDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    public $haris   = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu', 'Minggu'];
    public $statuss = ['Incoming', 'On Schedule', 'Cancell'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['jadwals'] = Jadwal::all();
        $data['haris']   = $this->haris;
        $data['statuss'] = $this->statuss;

        if (!$request->hari) {
            if (auth()->user()->level == 'guru') {

                $mapel_detail_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('id')->toArray();
                $data['jadwals']  = Jadwal::whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(100);
            } elseif (auth()->user()->level == 'siswa') {
                $mapel_detail_mapel_ids = MapelDetail::where('kelas_id', auth()->user()->kelas_id)->pluck('mapel_id')->toArray();
                $data['mapels']         = Mapel::whereIn('id', $mapel_detail_mapel_ids)->paginate(1000);
            }

        } else {
            if ($request->hari == "semua_hari") {
                if (auth()->user()->level == 'guru') {

                    $mapel_detail_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('id')->toArray();
                    $data['jadwals']  = Jadwal::whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(100);
                } elseif (auth()->user()->level == 'siswa') {
                    $mapel_detail_ids = MapelDetail::where('kelas_id', auth()->user()->kelas_id)->pluck('id')->toArray();
                    $data['jadwals']  = Jadwal::whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(100);
                }
            } else {
                if(auth()->user()->level == 'siswa') {
                    $mapel_detail_ids = MapelDetail::where('kelas_id', auth()->user()->kelas_id)->pluck('id')->toArray();
                    $data['jadwals']  = Jadwal::where('hari', $request->hari)->whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(100);
                } else {
                    $mapel_detail_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('id')->toArray();
                    $data['jadwals']  = Jadwal::where('hari', $request->hari)->whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(100);
                }
            }
        }

        return view('jadwal.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['haris']         = $this->haris;
        $data['statuss']       = $this->statuss;
        $data['mapel_details'] = MapelDetail::get();

        return view('jadwal.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'mapel_detail_id' => 'required|exists:mapel_details,id',
            'hari'            => 'required|in:' . implode(",", $this->haris),
            'dari_jam'        => 'required|between:1,24',
            'sampai_jam'      => 'required|between:1,24|gt:dari_jam',
            'status'          => 'required|in:' . implode(",", $this->statuss),
        ]);

        // pengecekan jadwal
        if (
            Jadwal::where(['mapel_detail_id' => $request->mapel_detail_id, 'hari' => $request->hari, 'dari_jam' => $request->dari_jam, 'sampai_jam' => $request->sampai_jam])->first()
        ) {
            return redirect()->back()->with('error', "Jadwal sudah ada");
        }

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with("success", "Berhasil menambah jadwal");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $data['haris']         = $this->haris;
        $data['statuss']       = $this->statuss;
        $data['jadwal']        = $jadwal;
        $data['mapel_details'] = MapelDetail::get();

        return view('jadwal.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $this->validate($request, [
            'mapel_detail_id' => 'required|exists:mapel_details,id',
            'hari'            => 'required|in:' . implode(",", $this->haris),
            'dari_jam'        => 'required|between:1,24',
            'sampai_jam'      => 'required|between:1,24|gt:dari_jam',
            'status'          => 'required|in:' . implode(",", $this->statuss),
        ]);

        // pengecekan jadwal
        $jadwal_ids = Jadwal::where(['mapel_detail_id' => $request->mapel_detail_id, 'hari' => $request->hari, 'dari_jam' => $request->dari_jam, 'sampai_jam' => $request->sampai_jam, 'status' => $request->status])->pluck('id')->toArray();

        if (in_array($jadwal->id, $jadwal_ids)) {

            return redirect()->back()->with('error', "Jadwal sudah ada");
        }

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with("success", "Berhasil mengupdate jadwal");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        //
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with("success", "Berhasil menghapus Jadwal");
    }

    public function hapus_semua(Request $request)
    {
        $jadwals = Jadwal::whereIn('id', json_decode($request->ids, true))->get();

        Jadwal::whereIn('id', $jadwals->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data jadwal');
    }
}
