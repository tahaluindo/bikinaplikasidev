<?php

namespace App\Http\Controllers;

use App\MapelDetail;
use App\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['materis'] = Materi::paginate(1000);

        if(auth()->user()->level == 'guru') {
            $mapel_details = MapelDetail::where('user_id', auth()->user()->id)->get();
            $mapel_detail_ids = $mapel_details->pluck('id')->toArray();

            $model = new Materi();
            $table = $model->getTable();
            $query = $model->query();
            foreach($mapel_detail_ids as $mapel_detail_id) {

                $query->orWhere('mapel_detail_ids', 'like', "%$mapel_detail_id%");
            }

            $data['materis'] = $query->paginate(1000);
        }

        if(auth()->user()->level == "siswa"){
            $mapel_details = MapelDetail::where('kelas_id', auth()->user()->kelas_id)->get();
            $mapel_detail_ids = $mapel_details->pluck('id')->toArray();

            $model = new Materi();
            $table = $model->getTable();
            $query = $model->query();
            foreach($mapel_detail_ids as $mapel_detail_id) {

                $query->orWhere('mapel_detail_ids', 'like', "%$mapel_detail_id%");
            }

            $data['materis'] = $query->paginate(1000);
        }

        return view('materi.index', $data);
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

        if(!$data['mapel_details']->count()) {
            return back()->with('error', 'Tidak ada mata pelajaran dan kelas!');
        }

        return view('materi.create', $data);
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
            'mapel_detail_ids.*' => 'required|exists:mapel_details,id|integer',
            'judul' => 'required|min:3|max:50',
            'files.*' => 'required|max:100000'
        ]);

        // todo: untuk menginput file
        $data['input'] = $request->all();
        $data['input']['files'] = [];
        foreach ($request->file('files') ?? [] as $file)
        {
            $dataInputFileDestinantion = "file/" . $file->getClientOriginalName();
            $file->move("file", $dataInputFileDestinantion);

            $data['input']['files'][] = $dataInputFileDestinantion;
        }

        $data['input']['files'] = json_encode($data['input']['files']);
        $data['input']['mapel_detail_ids'] = json_encode($data['input']['mapel_detail_ids']);

        Materi::create($data['input']);

        return redirect()->route('materi.index')->with("success", "Berhasil menambah materi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
        $data['materi'] = $materi;

        return view('materi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        //
        //
        $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get();
        $data['materi'] = $materi;

        return view('materi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        //
        $this->validate($request, [
            'mapel_detail_ids.*' => 'required|exists:mapel_details,id|integer',
            'judul' => 'required|min:3|max:50',
            'files.*' => 'max:100000'
        ]);

        // todo: untuk menginput file
        $data['input'] = $request->except(['files']);
        
        if(count($request->files)) {
            $data['input']['files'] = [];
            foreach ($request->file('files') ?? [] as $file)
            {
                $dataInputFileDestinantion = "file/" . $file->getClientOriginalName();
                $file->move("file", $dataInputFileDestinantion);

                $data['input']['files'][] = $dataInputFileDestinantion;
            }

            $data['input']['files'] = json_encode($data['input']['files']);
        }

        $data['input']['mapel_detail_ids'] = json_encode($data['input']['mapel_detail_ids']);

        $materi->update($data['input']);

        return redirect()->route('materi.index')->with("success", "Berhasil mengupdate Materi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        //
        $materi->delete();

        return redirect()->route('materi.index')->with("success", "Berhasil menghapus Materi");
    }

    public function hapus_file(Materi $materi, $file)
    {
        $materiFiles = collect($materi->files)->toArray();
        File::delete($materiFiles[$file]);
        unset($materiFiles[$file]);

        $materi->update([
            'files' => json_encode($materiFiles)
        ]);

        return back()->with('success', 'Berhasil menghapus file yang dipilih');
    }

    public function hapus_semua(Request $request)
    {
        $materis = Materi::whereIn('id', json_decode($request->ids, true))->get();

        Materi::whereIn('id', $materis->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data materi');
    }
}
