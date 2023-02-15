<?php

namespace App\Http\Controllers;

use App\Kamar;
use App\Type;
use Illuminate\Http\Request;

class KamarController extends Controller
{

    public function ubahLokasi(Request $request)
    {
        Kamar::where('lokasi', '=', $request->inputLokasiLama)->update([
            'lokasi' => $request->inputLokasiBaru
        ]);

        return response()->json(['message' => 'Berhasil merubah semua lokasi kamar yang berkaitan']);
    }

    // public function showFromLokasi($lokasi_id)
    // {
    //     $data['datas'] = Kamar::where('lokasi_id', '=', $lokasi_id)->orderBy('id', 'desc')->limit(50)->get();
    //     $data['lokasi'] = Lokasi::findOrFail($lokasi_id);

    //     return view('kamar.show_from_lokasi', $data);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $data['datas'] = Kamar::orderBy('id', 'desc')->limit(50)->get();

        return view('kamar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datas['types'] = Type::all();
        $datas['kamar_lokasi_existeds'] = Kamar::select('lokasi')->distinct()->get();
        $datas['kamar'] = Kamar::all();
        $datas['nomorTelahDipakai'] = implode(',', Kamar::pluck('nomor')->toArray());

        return view('kamar.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // custom validation
        $this->validate($request, [
            'lokasi' => ['required', 'max:200'],
            'type_id' => ['required', 'exists:types,id'],
            'nomor' => 'required|digits_between:1,3|unique:kamars,nomor',
            'status' => 'required|in:Terisi,Kosong,Ditinggal,Rusak',
            // 'jumlah_penghuni' => 'required|digits_between:1,3',
            'lokasi' => 'required',
            'keterangan' => 'max:500'
        ]);

        Kamar::create($request->except(['_token', 'jumlah_penghuni']))->save();

        return back()->with('success', 'Berhasil menambah kamar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
        $data['data'] = $kamar;

        return view('kamar.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        //
        $datas['types'] = Type::all();
        
        $datas['data'] = $kamar;
        $datas['kamar'] = Kamar::all();
        $datas['kamar_lokasi_existeds'] = Kamar::select('lokasi')->distinct()->get();
        $datas['nomorTelahDipakai'] = implode(',', Kamar::pluck('nomor')->toArray());

        return view('kamar.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        //
        $this->validate($request, [
            'lokasi' => ['required', 'max:200'],
            'type_id' => ['required', 'exists:types,id'],
            'nomor' => 'required|digits_between:1,3',
            'status' => 'required|in:Terisi,Kosong,Ditinggal,Rusak',
            // 'jumlah_penghuni' => 'required|digits_between:1,3',
            'lokasi' => 'required',
            'keterangan' => 'max:500'
        ]);

        Kamar::findOrFail($kamar->id)->update($request->except(['_token', 'jumlah_penghuni']));

        return back()->with('success', 'Berhasil mengupdate kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        //
        Kamar::findOrFail($kamar->id)->delete();

        return back()->with('success', "Berhasil menghapus kamar nomor $kamar->nomor");
    }
}
