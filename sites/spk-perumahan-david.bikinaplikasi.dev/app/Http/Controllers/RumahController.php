<?php

namespace App\Http\Controllers;

use App\Rumah;
use App\Type;
use App\Lokasi;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->rumah_id){
            $data['rumahs'] = Rumah::where('id', $request->rumah_id)->paginate(100);
        } else {
            $data['rumahs'] = Rumah::paginate(100);
        }

        return view('rumah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['types'] = Type::all();
        $data['lokasis'] = Lokasi::all();

        return view('rumah.create', $data);
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
            'type_id'   => 'required',
            'lokasi_id'   => 'required',
            'alamat'   => 'required',
            'keterangan'   => 'required',
            'status'   => 'required',
            'harga'   => 'required',
        ]);

        Rumah::create($request->all());

        return redirect()->route('rumah.index')->with("success", "Berhasil menambah rumah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function show(Rumah $rumah)
    {
        //
        $data['rumah'] = $rumah;

        return view('rumah.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function edit(Rumah $rumah)
    {
        //
        $data['rumah'] = $rumah;
        $data['types'] = Type::all();
        $data['lokasis'] = Lokasi::all();

        return view('rumah.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rumah $rumah)
    {
        //
        $this->validate($request, [
            'type_id'   => 'required',
            'lokasi_id'   => 'required',
            'alamat'   => 'required',
            'keterangan'   => 'required',
            'status'   => 'required',
            'harga'   => 'required',
        ]);

        $rumah->update($request->all());

        return redirect()->route('rumah.index')->with("success", "Berhasil mengupdate rumah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rumah $rumah)
    {
        //
        $rumah->delete();

        return redirect()->route('rumah.index')->with("success", "Berhasil menghapus rumah");
    }

    public function hapus_semua(Request $request)
    {
        $rumahs = Rumah::whereIn('id', json_decode($request->ids, true))->get();

        Rumah::whereIn('id', $rumahs->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data rumah');
    }
}
