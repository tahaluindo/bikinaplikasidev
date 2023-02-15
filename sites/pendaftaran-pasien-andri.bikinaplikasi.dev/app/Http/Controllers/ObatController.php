<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['obat'] = Obat::paginate(1000);

        $data['obat_count'] = count(Schema::getColumnListing('obat'));

        return view('obat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('obat.create');
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

        

        Obat::create($requestData);

        return redirect()->route('obat.index')->with('success', 'Berhasil menambah Obat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Obat $obat)
    {
        $data["item"] = $obat;
        $data["obat"] = $obat;

        return view('obat.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Obat $obat)
    {
        $data["obat"] = $obat;
        $data[strtolower("Obat")] = $obat;

        return view('obat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Obat $obat)
    {
        

        $requestData = $request->all();

        

        $obat->update($requestData);

        return redirect()->route('obat.index')->with('success', 'Berhasil mengubah Obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $obats = Obat::whereIn('id', json_decode($request->ids, true))->get();

        Obat::whereIn('id', $obats->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data obat');
    }

    public function laporan()
    {

        return view('obat.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Obat)->getTable();
        $object = (new Obat);

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

        $data["obats"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["obats"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("obat.laporan.print", $data);
    }
}