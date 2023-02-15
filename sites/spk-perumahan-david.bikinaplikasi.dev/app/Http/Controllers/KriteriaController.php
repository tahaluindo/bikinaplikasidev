<?php

namespace App\Http\Controllers;

use App\Aspek;
use App\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->aspek_id) {
            $data['kriterias'] = Kriteria::where('aspek_id', $request->aspek_id)->paginate(100);
        } else {
            $data['kriterias'] = Kriteria::paginate(100);
        }

        return view('kriteria.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['aspeks'] = Aspek::all();

        return view('kriteria.create', $data);
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
            'aspek_id' => 'required|exists:aspeks,id',
            'nama'     => 'required|min:3|max:30',
            'target'   => 'required|integer|min:1|max:5',
            'jenis'    => 'required|in:Core Factor,Secondary Factor',
            'gap'      => 'required|numeric|min:1|max:5',
        ]);

        Kriteria::create($request->all());

        return redirect()->route('kriteria.index')->with("success", "Berhasil menambah kriteria");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
        $data['kriteria'] = $kriteria;

        return view('kriteria.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        //
        $data['kriteria'] = $kriteria;
        $data['aspeks']   = Aspek::all();

        return view('kriteria.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        //
        $this->validate($request, [
            'aspek_id' => 'required|exists:aspeks,id',
            'nama'     => 'required|min:3|max:30',
            'target'   => 'required|integer|min:1|max:5',
            'jenis'    => 'required|in:Core Factor,Secondary Factor',
            'gap'      => 'required|numeric|min:1|max:5',
        ]);

        $kriteria->update($request->all());

        return redirect()->route('kriteria.index')->with("success", "Berhasil mengupdate Kriteria");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria)
    {
        //
        $kriteria->delete();

        return redirect()->route('kriteria.index')->with("success", "Berhasil menghapus Kriteria");
    }

    public function hapus_semua(Request $request)
    {
        $kriterias = Kriteria::whereIn('id', json_decode($request->ids, true))->get();

        Kriteria::whereIn('id', $kriterias->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kriteria');
    }
}
