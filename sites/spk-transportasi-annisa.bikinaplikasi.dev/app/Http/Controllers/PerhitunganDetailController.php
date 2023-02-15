<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kelas;
use App\Http\Requests;

use App\Kriteria;
use App\KriteriaDetail;
use App\Perhitungan;
use App\PerhitunganDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PerhitunganDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['perhitungan_detail'] = PerhitunganDetail::paginate(1000);
        $data['perhitungan_detail_count'] = count(Schema::getColumnListing('perhitungan_detail'));

        return view('perhitungan-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['alternatifs'] = Alternatif::all();
        $data['kriterias'] = Kriteria::all();
        $data['kriteria_details'] = KriteriaDetail::all();
        $data['perhitungans'] = Perhitungan::all();

        return view('perhitungan-detail.create', $data);
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
            'alternatif_id' => "required",
            'kriteria_id' => "required",
            'nilai' => "required",
        ]);

        $requestData = $request->except([]);

        PerhitunganDetail::create($requestData);

        return redirect()->route('perhitungan-detail.index')->with('success', 'Berhasil menambah perhitungan detail');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(PerhitunganDetail $perhitungan_detail)
    {
        $data['perhitungan_detail'] = $perhitungan_detail;

        return view('perhitungan-detail.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(PerhitunganDetail $perhitunganDetail)
    {
        $data['perhitungan'] = Perhitungan::all();
        $data['alternatifs'] = Alternatif::all();
        $data['kriterias'] = Kriteria::all();
        $data['kriteria_details'] = KriteriaDetail::all();
        $data['perhitungans'] = Perhitungan::all();

        return view('perhitungan-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PerhitunganDetail $perhitunganDetail)
    {
        $this->validate($request, [
            'alternatif_id' => "required",
            'kriteria_id' => "required",
            'nilai' => "required",
        ]);

        $requestData = $request->except([]);

        $perhitunganDetail->update($requestData);

        return redirect()->route('perhitungan-detail.index')->with('success', 'Berhasil mengubah perhitungan detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(PerhitunganDetail $perhitunganDetail)
    {
        $perhitunganDetail->delete();

        return redirect()->route('perhitungan-detail.index')->with('success', 'Perhitungan detail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $perhitunganDetails = PerhitunganDetail::whereIn('id', json_decode($request->ids, true))->get();

        PerhitunganDetail::whereIn('id', $perhitunganDetails->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data perhitungan detail');
    }
}
