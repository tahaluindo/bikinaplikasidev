<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Http\Requests;

use App\Comunale;
use App\Perhitungan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ComunaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['comunale'] = Comunale::paginate(1000);
        $data['comunale_count'] = count(Schema::getColumnListing('comunale'));

        return view('comunale.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $data['perhitungans'] = Perhitungan::all();

        return view('comunale.create', $data);
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
            'nama' => "required|max:40|unique:comunale,nama",
        ]);

        $requestData = $request->except([]);

        Comunale::create($requestData);

        return redirect()->route('comunale.index')->with('success', 'Berhasil menambah Comunale');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Comunale $comunale)
    {
        $data["item"] = $comunale;
        $data["comunale"] = $comunale;
        $data["comunale_detail"] = $comunale->comunale_details;

        return view('comunale.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Comunale $comunale)
    {
        $data["comunale"] = $comunale;
        $data[strtolower("Anggotum")] = $comunale;
        $data['perhitungans'] = Perhitungan::all();

        return view('comunale.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Comunale $comunale)
    {
        $this->validate($request, [
            'nama' => "required|max:40|unique:comunale,nama,$comunale->nama,nama",
        ]);

        $requestData = $request->except([]);

        $comunale->update($requestData);

        return redirect()->route('comunale.index')->with('success', 'Berhasil mengubah Comunale');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Comunale $comunale)
    {
        $comunale->delete();

        return redirect()->route('comunale.index')->with('success', 'Comunale berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $comunales = Comunale::whereIn('id', json_decode($request->ids, true))->get();

        Comunale::whereIn('id', $comunales->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data comunale');
    }
}
