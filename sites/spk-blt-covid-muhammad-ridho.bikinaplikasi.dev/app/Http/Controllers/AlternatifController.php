<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Http\Requests;

use App\Alternatif;
use App\Perhitungan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['alternatif'] = Alternatif::paginate(1000);
        $data['alternatif_count'] = count(Schema::getColumnListing('alternatif'));

        return view('alternatif.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $data['perhitungans'] = Perhitungan::all();

        return view('alternatif.create', $data);
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
            'perhitungan_id' => 'required',
            'nama' => "required|max:40",
            'no_identitas' => 'required|unique:alternatif,no_identitas',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|unique:alternatif,no_hp',
        ]);

        $requestData = $request->except([]);

        Alternatif::create($requestData);

        return redirect()->route('alternatif.index')->with('success', 'Berhasil menambah Alternatif');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Alternatif $alternatif)
    {
        $data["item"] = $alternatif;
        $data["alternatif"] = $alternatif;
        $data["alternatif_detail"] = $alternatif->alternatif_details;

        return view('alternatif.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Alternatif $alternatif)
    {
        $data["alternatif"] = $alternatif;
        $data[strtolower("Anggotum")] = $alternatif;
        $data['perhitungans'] = Perhitungan::all();

        return view('alternatif.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $this->validate($request, [
            'perhitungan_id' => 'required',
            'nama' => "required|max:40",
            'no_identitas' => "required|unique:alternatif,no_identitas,$alternatif->no_identitas,no_identitas",
            'alamat' => 'required|max:255',
            'no_hp' => 'required|unique:alternatif,no_hp',
        ]);

        $requestData = $request->except([]);

        $alternatif->update($requestData);

        return redirect()->route('alternatif.index')->with('success', 'Berhasil mengubah Alternatif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $alternatifs = Alternatif::whereIn('id', json_decode($request->ids, true))->get();

        Alternatif::whereIn('id', $alternatifs->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data alternatif');
    }
}
