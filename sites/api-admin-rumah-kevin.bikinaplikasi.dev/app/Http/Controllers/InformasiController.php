<?php

namespace App\Http\Controllers;

use App\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['informasis'] = Informasi::paginate(1000);

        if(auth()->user()->level == "guru") {
            $data['informasis'] = Informasi::where('user_id', auth()->user()->id)->paginate(1000);
        }

        if(request()->q) {
            $data['informasis'] = new Informasi;

            foreach (Schema::getColumnListing('informasis') as $key => $item) {
                $data['informasis'] = $data['informasis']->orwhere($item, 'like', "%$request->q%");
            }

            $data['informasis'] = $data['informasis']->paginate(1000);
        }

        return view('informasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('informasi.create');
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
            'judul'     => 'required|min:3|max:50',
            'deskripsi' => 'required|min:25|max:255',
        ]);

        $data['input'] = $request->except(['foto']);
        $data['input']['user_id'] = auth()->user()->id;

        if ($request->foto) {
            $this->validate($request, [
                'foto.*' => 'required|mimes:png,jpg,jpeg,JPG,JPEG,PNG|max:10000',
            ]);

            $fotos = $request->file('foto');

            foreach ($fotos as $index => $foto) {
                $data['input']['foto'][] = 'foto/' . $foto->getClientOriginalName();

                $foto->move("foto", $data['input']['foto'][$index]);
            }

            $data['input']['foto'] = \json_encode($data['input']['foto']);
        }

        Informasi::create($data['input']);

        return redirect()->route('informasi.index')->with("success", "Berhasil menambah informasi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function show(Informasi $informasi)
    {
        //
        $data['informasi'] = $informasi;

        return view('informasi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $informasi)
    {
        //
        $data['informasi'] = $informasi;

        return view('informasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informasi $informasi)
    {
        //
        $this->validate($request, [
            'judul'     => 'required|min:3|max:50',
            'deskripsi' => 'required|min:25|max:255',
        ]);

        $data['input'] = $request->except(['foto']);
        $data['input']['user_id'] = auth()->user()->id;

        if ($request->foto) {
            $this->validate($request, [
                'foto.*' => 'mimes:png,jpg,jpeg,JPG,JPEG,PNG|max:10000',
            ]);

            // hapus semua foto sebelumnya
            $fotos = json_decode($informasi->foto);
            foreach($fotos ?? [] as $foto)
            {
                \File::delete(public_path($foto));
            }

            $fotos = $request->file('foto');

            foreach ($fotos ?? [] as $index => $foto) {
                $data['input']['foto'][] = 'foto/' . $foto->getClientOriginalName();

                $foto->move('foto', $data['input']['foto'][$index]);
            }

            $data['input']['foto'] = \json_encode($data['input']['foto']);

        }

        $informasi->update($data['input']);

        return redirect()->route('informasi.index')->with("success", "Berhasil mengupdate Informasi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi)
    {
        //
        $informasi->delete();

        return redirect()->route('informasi.index')->with("success", "Berhasil menghapus Informasi");
    }

    public function hapus_semua(Request $request)
    {
        $informasis = Informasi::whereIn('id', json_decode($request->ids, true))->get();

        Informasi::whereIn('id', $informasis->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data informasi');
    }
}
