<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Http\Requests;

use App\Kriteria;
use App\Perhitungan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['kriteria'] = Kriteria::paginate(1000);
        $data['kriteria_count'] = count(Schema::getColumnListing('kriteria'));

        return view('kriteria.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('kriteria.create');
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
            'nama' => "required|max:40|unique:kriteria,nama",
            'nilai' => "required",
        ]);

        $requestData = $request->except([]);

        Kriteria::create($requestData);

        return redirect()->route('kriteria.index')->with('success', 'Berhasil menambah Kriteria');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Kriteria $kriteria)
    {
        return view('kriteria.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Kriteria $kriteria)
    {
        $data['kriteria'] = $kriteria;

        return view('kriteria.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $this->validate($request, [
            'nama' => "required|max:40|unique:kriteria,nama,$kriteria->nama,nama",
            'nilai' => "required",
        ]);

        $requestData = $request->except([]);

        $kriteria->update($requestData);

        return redirect()->route('kriteria.index')->with('success', 'Berhasil mengubah Kriteria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $kriterias = Kriteria::whereIn('id', json_decode($request->ids, true))->get();

        Kriteria::whereIn('id', $kriterias->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kriteria');
    }
}
