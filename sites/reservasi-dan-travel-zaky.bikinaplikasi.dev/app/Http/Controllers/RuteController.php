<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Lokasi;
use App\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $data['rute'] = Rute::paginate(1000);

        $data['rute_count'] = count(Schema::getColumnListing('rute'));

        return view('rute.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['lokasis'] = Lokasi::all();

        return view('rute.create', $data);
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
            'dari' => 'required',
            'ke' => 'required',
            'biaya' => 'required',
        ]);
        $requestData = $request->all();

        if($request->dari == $request->ke) {
            return redirect()->back()->with('error', 'Lokasi dari dan lokasi ke tidak boleh sama');
        }

        if(Rute::where([
            'dari' => $request->dari,
            'ke' => $request->ke,

        ])->first()) {
            return redirect()->back()->with('error', 'Rute sudah ada');
        }

        Rute::create($requestData);

        return redirect()->route('rute.index')->with('success', 'Berhasil menambah Rute');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Rute $rute)
    {
        $data["item"] = $rute;
        $data["rute"] = $rute;

        return view('rute.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Rute $rute)
    {
        $data["rute"] = $rute;
        $data[strtolower("Rute")] = $rute;
        $data['lokasis'] = Lokasi::all();

        return view('rute.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Rute $rute)
    {
        $this->validate($request, [
            'dari' => 'required',
            'ke' => 'required',
            'biaya' => 'required',
        ]);
        $requestData = $request->all();

        if($request->dari == $request->ke) {
            return redirect()->back()->with('error', 'Lokasi dari dan lokasi ke tidak boleh sama');
        }

        if(Rute::where([
            'dari' => $request->dari,
            'ke' => $request->ke,

        ])->where('id', '!=', $rute->id)->first()) {
            return redirect()->back()->with('error', 'Rute sudah ada');
        }

        $rute->update($requestData);

        return redirect()->route('rute.index')->with('success', 'Berhasil mengubah Rute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Rute $rute)
    {
        $rute->delete();

        return redirect()->route('rute.index')->with('success', 'Rute berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $rutes = Rute::whereIn('id', json_decode($request->ids, true))->get();

        Rute::whereIn('id', $rutes->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data rute');
    }

    public function laporan()
    {

        return view('rute.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Rute)->getTable();
        $object = (new Rute);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["rutes"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["rutes"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("rute.laporan.print", $data);
    }

}
