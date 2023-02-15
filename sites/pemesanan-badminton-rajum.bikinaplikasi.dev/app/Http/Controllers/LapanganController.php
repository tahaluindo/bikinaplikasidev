<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['lapangan'] = Lapangan::paginate(1000);

        $data['lapangan_count'] = count(Schema::getColumnListing('lapangan'));

        return view('lapangan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('lapangan.create');
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
            'nama' => 'required|max:100',
        ]);
        $requestData = $request->all();



        Lapangan::create($requestData);

        return redirect()->route('lapangan.index')->with('success', 'Berhasil menambah Lapangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Lapangan $lapangan)
    {
        $data["item"] = $lapangan;
        $data["lapangan"] = $lapangan;

        return view('lapangan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Lapangan $lapangan)
    {

        $data[strtolower("Lapangan")] = $lapangan;

        return view('lapangan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Lapangan $lapangan)
    {
        $this->validate($request, [
            'nama' => 'required|max:100',
        ]);

        $requestData = $request->all();




        $lapangan->update($requestData);

        return redirect()->route('lapangan.index')->with('success', 'Berhasil mengubah Lapangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Lapangan $lapangan)
    {
        $lapangan->delete();

        return redirect()->route('lapangan.index')->with('success', 'Lapangan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $lapangans = Lapangan::whereIn('id', json_decode($request->ids, true))->get();

        Lapangan::whereIn('id', $lapangans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data lapangan');
    }

    public function laporan()
    {

        return view('lapangan.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Lapangan)->getTable();
        $object = (new Lapangan);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["lapangans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["lapangans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("lapangan.laporan.print", $data);
    }
}