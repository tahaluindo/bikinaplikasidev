<?php

namespace App\Http\Controllers;

use App\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $data['sekolahs'] = Sekolah::paginate(1000);

        return view('sekolah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('sekolah.create');
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

        return redirect()->route('sekolah.index')->with("success", "Berhasil menambah sekolah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        //
        $data['sekolah'] = $sekolah;

        return view('sekolah.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
    {
        //
        $data['sekolah'] = $sekolah;

        return view('sekolah.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        //
        $this->validate($request, [
            'nama'      => 'required|min:3|max:50',
            'no_telp'   => 'required|digits_between:6,15',
            // 'email'     => 'required|email|min:5|max:30',
            'alamat'    => 'required|min:30|max:255',
            'deskripsi' => 'required',
            'visi'      => 'required',
            'misi'      => 'required',
        ]);

        $sekolah->update($request->all());

        return redirect()->route('sekolah.index')->with("success", "Berhasil mengupdate Sekolah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        //
        $sekolah->delete();

        return redirect()->route('sekolah.index')->with("success", "Berhasil menghapus Sekolah");
    }
}
