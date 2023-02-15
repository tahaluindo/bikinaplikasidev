<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\AlternatifDetail;
use App\Kriteria;

use Illuminate\Http\Request;
use App\Perhitungan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\KriteriaDetail;

class AlternatifDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['alternatif_detail'] = AlternatifDetail::where('alternatif_id', $request->alternatif_id)->get();
        $data['alternatif_detail_count'] = count(Schema::getColumnListing('alternatif_detail'));

        return view('alternatif-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['alternatif'] = \request('alternatif_id');
        $data['kriteria_details'] = KriteriaDetail::all();
        $data['kriteria'] = Kriteria::all();

        return view('alternatif-detail.create', $data);
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
            'kriteria_detail_id' => 'required',
        ]);

        $requestData = $request->all();

        AlternatifDetail::create($requestData);

        return redirect(route('alternatif-detail.index') . '?alternatif_id=' . $request->alternatif_id)->with('success', 'Berhasil menambah alternatif detail');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(AlternatifDetail $alternatif_detail)
    {
        $data["item"] = $alternatif_detail;
        $data["alternatif_detail"] = $alternatif_detail;

        return view('alternatif-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(AlternatifDetail $alternatif_detail)
    {
        $data['alternatifs'] = Alternatif::all();
        $data["alternatif_detail"] = $alternatif_detail;
        $data['kriteria'] = Kriteria::all();

        return view('alternatif-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, AlternatifDetail $alternatif_detail)
    {
        $this->validate($request, [
            'alternatif_id' => 'required',
            'kriteria_detail_id' => 'required',
        ]);

        $requestData = $request->all();

        $alternatif_detail->update($requestData);

        return redirect(route('alternatif-detail.index') . '?alternatif_id=' . $request->alternatif_id)->with('success', 'Berhasil mengubah alternatif detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(AlternatifDetail $alternatif_detail)
    {
        $alternatif_detail->delete();

        return redirect(route('alternatif-detail.index') . '?alternatif_id=' . $alternatif_detail->alternatif_id)->with('success', 'Alternatif detail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $alternatif_details = AlternatifDetail::whereIn('id', json_decode($request->ids, true))->get();

        AlternatifDetail::whereIn('id', $alternatif_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data alternatif detail');
    }
}
