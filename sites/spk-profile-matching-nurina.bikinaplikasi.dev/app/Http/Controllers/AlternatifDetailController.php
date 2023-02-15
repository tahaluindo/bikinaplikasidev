<?php

namespace App\Http\Controllers;

use App\Aspek;
use App\Bobot;
use App\Project;
use App\Alternatif;
use App\ProjectDetail;
use App\KriteriaDetail;
use App\AlternatifDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlternatifDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //
        $data['project']            = $project;
        $data['alternatifs']        = Alternatif::where('project_id', $project->id)->where('status', 'Disetujui')->get();
        $project_detail_aspek_ids   = ProjectDetail::where('project_id', $project->id)->pluck('aspek_id')->toArray();
        $data['aspeks']             = Aspek::whereIn('id', $project_detail_aspek_ids)->get();
        $data['alternatif_details'] = AlternatifDetail::paginate(100);
        $data['kriteria_details']   = KriteriaDetail::paginate(100);
        $data['bobots']             = Bobot::all();

        return view('alternatif_detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('alternatif_detail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [

        ]);

        return redirect()->route('alternatif_detail.index')->with("success", "Berhasil menambah alternatif_detail");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AlternatifDetail  $alternatif_detail
     * @return \Illuminate\Http\Response
     */
    public function show(AlternatifDetail $alternatif_detail)
    {
        //
        $data['alternatif_detail'] = $alternatif_detail;

        return view('alternatif_detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AlternatifDetail  $alternatif_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(AlternatifDetail $alternatif_detail)
    {
        //
        $data['alternatif_detail'] = $alternatif_detail;

        return view('alternatif_detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AlternatifDetail  $alternatif_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlternatifDetail $alternatif_detail)
    {
        //
        $this->validate($request, [

        ]);

        return redirect()->route('alternatif_detail.index')->with("success", "Berhasil mengupdate AlternatifDetail");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AlternatifDetail  $alternatif_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlternatifDetail $alternatif_detail)
    {
        //
        $alternatif_detail->delete();

        return redirect()->route('alternatif_detail.index')->with("success", "Berhasil menghapus Alternatif Detail");
    }
}
