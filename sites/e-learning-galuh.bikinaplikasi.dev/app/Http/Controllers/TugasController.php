<?php

namespace App\Http\Controllers;

use App\Tugas;
use App\MapelDetail;
use App\TugasDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(auth()->user()->level == "guru") {
            $mapel_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('mapel_id')->toArray();

        } elseif(auth()->user()->level == "siswa") {
            $mapel_ids = MapelDetail::where('kelas_id', auth()->user()->kelas->id)->pluck('mapel_id')->toArray();
        }

        $data['tugass'] = Tugas::whereIn('mapel_id', $mapel_ids)->paginate(1000);

        return view('tugas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get();

        return view('tugas.create', $data);
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
            'mapel_id' => 'required|exists:mapels,id',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        Tugas::create($request->all());

        return redirect()->route('tugas.index')->with("success", "Berhasil menambah tugas");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(Tugas $tugas)
    {
        //
        $data['tugas'] = $tugas;

        return view('tugas.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tugas)
    {
        //
        $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get();
        $data['tugas'] = $tugas;

        return view('tugas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tugas $tugas)
    {
        //
        $this->validate($request, [
            'mapel_id' => 'required|exists:mapels,id',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $tugas->update($request->all());

        return redirect()->route('tugas.index')->with("success", "Berhasil mengupdate Tugas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tugas)
    {
        //
        $tugas->delete();

        return redirect()->route('tugas.index')->with("success", "Berhasil menghapus Tugas");
    }

    public function kumpul(Tugas $tugas)
    {

        return view('tugas.kumpul', compact('tugas'));
    }

    public function kumpulStore(Request $request, Tugas $tugas)
    {
        $this->validate($request, [
            'file' => 'file|mimes:pdf,doc,docx,xlx,xls,xlsx,zip,rar,png,jpg,jpeg'
        ]);


        // harus ada antara link dan materi
        if((!$request->hasFile('file')) && (!$request->link)) {

            return back()->with("error", "Harus ada link / file yg inputkan");
        }

         if ($request->file) {
             
            $file = "file/" . $request->file->getClientOriginalName();
            $request->file->move("file", $file);
         }

        TugasDetail::create([
            'tugas_id' => $tugas->id,
            'user_id' => auth()->user()->id,
            'file' => $file
        ]);

        return redirect()->route('tugas.index')->with('success', 'Berhasil mengumpulkan tugas');
    }

    public function hapus_semua(Request $request)
    {
        $tugass = Tugas::whereIn('id', json_decode($request->ids, true))->get();

        Tugas::whereIn('id', $tugass->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data tugas');
    }
}
