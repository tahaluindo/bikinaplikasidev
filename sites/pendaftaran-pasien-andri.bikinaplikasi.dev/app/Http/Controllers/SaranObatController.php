<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SaranObat;
use App\Models\Obat;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SaranObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->penyakit_id) {

            $data['saranobat'] = SaranObat::where('penyakit_id', $request->penyakit_id)->paginate(1000);
        }

        $data['saranobat_count'] = count(Schema::getColumnListing('saranobat'));

        return view('saran-obat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['obats'] = Obat::pluck('nama', 'id');
        $data['penyakits'] = Penyakit::pluck('nama', 'id');
        return view('saran-obat.create', $data);
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

        

        SaranObat::create($requestData);

        return redirect("saran_obat?penyakit_id=" . $request->penyakit_id)->with('success', 'Berhasil menambah SaranObat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(SaranObat $saran_obat)
    {
        $data["item"] = $saran_obat;
        $data["saran-obat"] = $saran_obat;

        return view('saran-obat.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(SaranObat $saran_obat)
    {
        $data["saran_obat"] = $saran_obat;
        $data[strtolower("SaranObat")] = $saran_obat;
        $data['obats'] = Obat::pluck('nama', 'id');
        $data['penyakits'] = Penyakit::pluck('nama', 'id');

        return view('saran-obat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, SaranObat $saran_obat)
    {
        

        $requestData = $request->all();

        

        $saran_obat->update($requestData);

        return redirect("saran_obat?penyakit_id=" . $request->penyakit_id)->with('success', 'Berhasil mengubah SaranObat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(SaranObat $saran_obat)
    {
        $saran_obat->delete();

        return redirect("saran_obat?penyakit_id=" . $saran_obat->id)->with('success', 'SaranObat berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $saran_obats = SaranObat::whereIn('id', json_decode($request->ids, true))->get();

        SaranObat::whereIn('id', $saran_obats->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data saran-obat');
    }

    public function laporan()
    {

        return view('saran-obat.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new SaranObat)->getTable();
        $object = (new SaranObat);

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

        $data["saran-obats"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["saran-obats"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("saran-obat.laporan.print", $data);
    }
}