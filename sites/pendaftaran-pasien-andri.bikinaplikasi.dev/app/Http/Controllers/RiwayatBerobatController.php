<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\RiwayatBerobat;
use App\Models\Pasien;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RiwayatBerobatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['riwayat_berobat'] = RiwayatBerobat::paginate(1000);

        if(request()->pasien_id) {

            $data['riwayat_berobat'] = RiwayatBerobat::where('pasien_id', request()->pasien_id)->paginate(1000);
        }

        $data['riwayat_berobat_count'] = count(Schema::getColumnListing('riwayat_berobat'));

        return view('riwayat-berobat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['pasiens'] = Pasien::pluck('nama', 'id');
        $data['penyakits'] = Penyakit::pluck('nama', 'id');

        return view('riwayat-berobat.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();

        RiwayatBerobat::create($requestData);

        return redirect()->route('riwayat-berobat.index')->with('success', 'Berhasil menambah RiwayatBerobat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(RiwayatBerobat $riwayat_berobat)
    {
        $data["item"] = $riwayat_berobat;
        $data["riwayat_berobat"] = $riwayat_berobat;

        return view('riwayat-berobat.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(RiwayatBerobat $riwayat_berobat)
    {
        $data["riwayat_berobat"] = $riwayat_berobat;
        $data[strtolower("RiwayatBerobat")] = $riwayat_berobat;
        $data['pasiens'] = Pasien::pluck('nama', 'id');
        $data['penyakits'] = Penyakit::pluck('nama', 'id');

        return view('riwayat-berobat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, RiwayatBerobat $riwayat_berobat)
    {
        

        $requestData = $request->all();

        

        $riwayat_berobat->update($requestData);

        return redirect()->route('riwayat-berobat.index')->with('success', 'Berhasil mengubah RiwayatBerobat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(RiwayatBerobat $riwayat_berobat)
    {
        $riwayat_berobat->delete();

        return redirect()->route('riwayat-berobat.index')->with('success', 'RiwayatBerobat berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $riwayat_berobats = RiwayatBerobat::whereIn('id', json_decode($request->ids, true))->get();

        RiwayatBerobat::whereIn('id', $riwayat_berobats->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data riwayat-berobat');
    }

    public function laporan()
    {

        return view('riwayat-berobat.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new RiwayatBerobat)->getTable();
        $object = (new RiwayatBerobat);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["riwayat-berobats"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["riwayat-berobats"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("riwayat-berobat.laporan.print", $data);
    }
}