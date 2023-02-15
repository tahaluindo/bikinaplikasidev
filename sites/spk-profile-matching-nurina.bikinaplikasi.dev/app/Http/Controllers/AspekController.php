<?php

namespace App\Http\Controllers;

use App\Aspek;
use Illuminate\Http\Request;

class AspekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->aspek_id){
            $data['aspeks'] = Aspek::where('id', $request->aspek_id)->paginate(100);
        } else {
            $data['aspeks'] = Aspek::paginate(100);
        }

        return view('aspek.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('aspek.create');
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
            'nama'   => 'required|min:3|max:30',
            'persen' => 'required|numeric|min:1|max:100',
        ]);

        Aspek::create($request->all());

        return redirect()->route('aspek.index')->with("success", "Berhasil menambah aspek");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aspek  $aspek
     * @return \Illuminate\Http\Response
     */
    public function show(Aspek $aspek)
    {
        //
        $data['aspek'] = $aspek;

        return view('aspek.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aspek  $aspek
     * @return \Illuminate\Http\Response
     */
    public function edit(Aspek $aspek)
    {
        //
        $data['aspek'] = $aspek;

        return view('aspek.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aspek  $aspek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspek $aspek)
    {
        //
        $this->validate($request, [
            'nama'   => 'required|min:3|max:30',
            'persen' => 'required|integer|min:1|max:100',
        ]);

        $aspek->update($request->all());

        return redirect()->route('aspek.index')->with("success", "Berhasil mengupdate Aspek");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aspek  $aspek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aspek $aspek)
    {
        //
        $aspek->delete();

        return redirect()->route('aspek.index')->with("success", "Berhasil menghapus Aspek");
    }

    public function hapus_semua(Request $request)
    {
        $aspeks = Aspek::whereIn('id', json_decode($request->ids, true))->get();

        Aspek::whereIn('id', $aspeks->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data aspek');
    }
}
