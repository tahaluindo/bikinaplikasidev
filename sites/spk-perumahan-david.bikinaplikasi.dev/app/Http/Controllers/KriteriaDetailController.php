<?php

namespace App\Http\Controllers;

use App\Kriteria;
use App\KriteriaDetail;
use Illuminate\Http\Request;

class KriteriaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kriteria $kriteria, Request $request)
    {
        //
        $data['kriteria'] = $kriteria;

        if($request->kriteria_id){

            $data['kriteria_details'] = KriteriaDetail::where('kriteria_id', $request->kriteria_id)->paginate(100);
        }else{

            $data['kriteria_details'] = KriteriaDetail::where('kriteria_id', $kriteria->id)->paginate(100);
        }

        return view('kriteria_detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kriteria $kriteria)
    {
        //
        $data['kriteria'] = $kriteria;

        return view('kriteria_detail.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kriteria $kriteria)
    {
        //
        $this->validate($request, [
            'keterangan' => 'required|min:3|max:255',
            'nilai' => 'required|min:1|max:5'
        ]);

        $request->request->add(['kriteria_id' => $kriteria->id]);
        KriteriaDetail::create($request->all());

        return redirect()->route('kriteria_detail.index', ['kriteria' => $kriteria->id])->with("success", "Berhasil menambah kriteria_detail");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KriteriaDetail  $kriteria_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria, KriteriaDetail $kriteria_detail)
    {
        //
        $data['kriteria_detail'] = $kriteria_detail;

        return view('kriteria_detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KriteriaDetail  $kriteria_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria, KriteriaDetail $kriteria_detail)
    {
        //
        $data['kriteria_detail'] = $kriteria_detail;
        $data['kriteria'] = $kriteria;

        return view('kriteria_detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KriteriaDetail  $kriteria_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria, KriteriaDetail $kriteria_detail)
    {
        //
        $this->validate($request, [
            'keterangan' => 'required|min:3|max:255',
            'nilai' => 'required|min:1|max:5'
        ]);

        $request->request->add(['kriteria_id' => $kriteria->id]);
        $kriteria_detail->update($request->all());

        return redirect()->route('kriteria_detail.index', ['kriteria' => $kriteria->id])->with("success", "Berhasil mengupdate KriteriaDetail");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KriteriaDetail  $kriteria_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria, KriteriaDetail $kriteria_detail)
    {
        //
        $kriteria_detail->delete();

        return redirect()->route('kriteria_detail.index', ['kriteria' => $kriteria->id])->with("success", "Berhasil menghapus Kriteria Detail");
    }

    public function hapus_semua(Kriteria $kriteria, Request $request)
    {
        $kriteria_details = KriteriaDetail::whereIn('id', json_decode($request->ids, true))->get();

        KriteriaDetail::whereIn('id', $kriteria_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kriteriaDetail');
    }
}
