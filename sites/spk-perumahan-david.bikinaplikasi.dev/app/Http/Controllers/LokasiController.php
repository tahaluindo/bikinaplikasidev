<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->lokasi_id){
            $data['lokasis'] = Lokasi::where('id', $request->lokasi_id)->paginate(100);
        } else {
            $data['lokasis'] = Lokasi::paginate(100);
        }

        return view('lokasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('lokasi.create');
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
            'lokasi'   => 'required|min:3|max:15',
        ]);

        Lokasi::create($request->all());

        return redirect()->route('lokasi.index')->with("success", "Berhasil menambah lokasi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        //
        $data['lokasi'] = $lokasi;

        return view('lokasi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        //
        $data['lokasi'] = $lokasi;

        return view('lokasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        //
        $this->validate($request, [
            'lokasi'   => 'required|min:3|max:15',
        ]);

        $lokasi->update($request->all());

        return redirect()->route('lokasi.index')->with("success", "Berhasil mengupdate lokasi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        //
        $lokasi->delete();

        return redirect()->route('lokasi.index')->with("success", "Berhasil menghapus lokasi");
    }

    public function hapus_semua(Request $request)
    {
        $lokasis = Lokasi::whereIn('id', json_decode($request->ids, true))->get();

        Lokasi::whereIn('id', $lokasis->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data lokasi');
    }
}
