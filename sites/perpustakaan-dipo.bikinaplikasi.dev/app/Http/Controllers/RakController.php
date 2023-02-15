<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['rak'] = Rak::paginate(1000);

        $data['rak_count'] = count(Schema::getColumnListing('rak'));

        return view('rak.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('rak.create');
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
        $this->validate($request, [
			'nama' => 'required|max:15'
		]);
        $requestData = $request->all();

        

        Rak::create($requestData);

        return redirect()->route('rak.index')->with('success', 'Berhasil menambah Rak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $rak = Rak::findOrFail($id);

        return view('rak.show', compact('rak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $rak = Rak::findOrFail($id);

        return view('rak.edit', compact('rak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'nama' => 'required|max:15'
		]);

        $requestData = $request->all();

        $viewName = Rak::findOrFail($id);
        $rak = Rak::findOrFail($id);

        

        $rak->update($requestData);

        return redirect()->route('rak.index')->with('success', 'Berhasil mengubah Rak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Rak::destroy($id);

        return redirect()->route('rak.index')->with('success', 'Rak berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $raks = Rak::whereIn('id', json_decode($request->ids, true))->get();

        Rak::whereIn('id', $raks->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data rak');
    }

    public function laporan()
    {

        return view('rak.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Rak)->getTable();
        $object = (new Rak);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["raks"] = $object->orderBy($request->field, $request->order)->get();

        if(!$data["raks"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("rak.laporan.print", $data);
    }
}