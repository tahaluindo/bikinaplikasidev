<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelass = Kelas::orderBy('id', 'DESC')->paginate(100);

        if (request()->q) {
            $kelass = Kelas::where('nama', 'like', '%' . request()->q . '%')->orderBy('id', 'DESC')->paginate(100);
        }

        return view('kelas.index', compact('kelass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:10|min:1',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Berhasil menambah kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {

        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Berhasil mengupdate kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Berhasil menghapus kelas');
    }

    public function hapus_semua(Request $request)
    {
        $kelass = Kelas::whereIn('id', json_decode($request->ids, true))->get();

        Kelas::whereIn('id', $kelass->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kelas');
    }
}
