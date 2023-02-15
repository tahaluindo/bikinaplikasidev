<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Http\Requests;

use App\Kriteria;
use App\KriteriaDetail;
use App\Perhitungan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class KriteriaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['kriteria_detail'] = KriteriaDetail::where('kriteria_id', $request->kriteria_id)->paginate(1000);
        $data['kriteria_detail_count'] = count(Schema::getColumnListing('kriteria_detail'));

        return view('kriteria-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['kriteria'] = Kriteria::all();

        return view('kriteria-detail.create', $data);
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
            'kriteria_id' => "required",
            'keterangan' => "required",
        ]);

        $requestData = $request->except([]);

        KriteriaDetail::create($requestData);

        return redirect('kriteria-detail?kriteria_id=' . $request->kriteria_id)->with('success', 'Berhasil menambah kriteria detail');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(KriteriaDetail $kriteria_detail)
    {
        $data['kriteria_detail'] = $kriteria_detail;

        return view('kriteria-detail.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(KriteriaDetail $kriteria_detail)
    {
        $data['kriteria_detail'] = $kriteria_detail;

        return view('kriteria-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, KriteriaDetail $kriteria_detail)
    {
        $this->validate($request, [
            'kriteria_id' => "required",
            'keterangan' => "required",
        ]);

        $requestData = $request->except([]);

        $kriteria_detail->update($requestData);

        return redirect('kriteria-detail?kriteria_id=' . $request->kriteria_id)->with('success', 'Berhasil mengubah kriteria detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(KriteriaDetail $kriteria_detail)
    {
        $kriteria_detail->delete();

        return redirect('kriteria-detail?kriteria_id=' . $kriteria_detail->kriteria_id)->with('success', 'KriteriaDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $kriteria_details = KriteriaDetail::whereIn('id', json_decode($request->ids, true))->get();

        KriteriaDetail::whereIn('id', $kriteria_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kriteria detail');
    }
}
