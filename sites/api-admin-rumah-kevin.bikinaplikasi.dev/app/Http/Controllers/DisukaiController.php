<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DisukaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['disukai'] = Disukai::paginate(1000);

        $data['disukai_count'] = count(Schema::getColumnListing('disukai'));

        return view('disukai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('disukai.create');
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

        Disukai::create($requestData);

        return redirect()->route('disukai.index')->with('success', 'Berhasil menambah Disukai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Disukai $disukai)
    {
        $data["item"] = $disukai;
        $data["disukai"] = $disukai;

        return view('disukai.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Disukai $disukai)
    {
        $data["disukai"] = $disukai;
        $data[strtolower("Disukai")] = $disukai;

        return view('disukai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Disukai $disukai)
    {
        

        $requestData = $request->all();

        

        $disukai->update($requestData);

        return redirect()->route('disukai.index')->with('success', 'Berhasil mengubah Disukai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Disukai $disukai)
    {
        $disukai->delete();

        return redirect()->route('disukai.index')->with('success', 'Disukai berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $disukai = Disukai::whereIn('id', json_decode($request->ids, true))->get();

        Disukai::whereIn('id', $disukai->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data disukai');
    }

    public function laporan()
    {

        return view('disukai.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Disukai)->getTable();
        $object = (new Disukai);

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

        $data["disukai"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["disukai"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("disukai.laporan.print", $data);
    }
}