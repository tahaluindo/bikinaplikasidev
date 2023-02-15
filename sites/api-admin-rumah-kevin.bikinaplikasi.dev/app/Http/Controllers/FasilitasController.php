<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Fasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $data['fasilitass'] = Fasilitas::paginate(1000)->sortByDesc('id');

        $data['fasilitas_count'] = count(Schema::getColumnListing('fasilitas'));

        return view('fasilitas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('fasilitas.create');
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
            'nama' => 'required|max:30',
            'keterangan' => 'required',
        ]);

        $requestData = $request->all();

        Fasilitas::create($requestData);

        return redirect()->route('fasilitas.index')->with('success', 'Berhasil menambah Fasilitas');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function show(Fasilitas $fasilitas)
    {
        $data["item"] = $fasilitas;
        $data["fasilitas"] = $fasilitas;

        return view('fasilitas.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(Fasilitas $fasilitas)
    {
        $data["fasilitas"] = $fasilitas;
        $data[strtolower("fasilitas")] = $fasilitas;

        return view('fasilitas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        $this->validate($request, [
            'nama' => 'required|max:30',
            'keterangan' => 'required',
        ]);

        $requestData = $request->all();
        
        $fasilitas->update($requestData);

        return redirect()->route('fasilitas.index')->with('success', 'Berhasil mengubah Fasilitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Fasilitas $fasilitas)
    {
        $fasilitas->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $fasilitass = Fasilitas::whereIn('id', json_decode($request->ids, true))->get();

        Fasilitas::whereIn('id', $fasilitass->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data fasilitas');
    }

    public function laporan()
    {

        return view('fasilitas.laporan.index');
    }
}