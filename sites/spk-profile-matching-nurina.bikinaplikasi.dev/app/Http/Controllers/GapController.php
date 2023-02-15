<?php

namespace App\Http\Controllers;

use App\Gap;
use Illuminate\Http\Request;

class GapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['gaps'] = Gap::paginate(100);

        return view('gap.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('gap.create');
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

        return redirect()->route('gap.index')->with("success", "Berhasil menambah gap");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gap  $gap
     * @return \Illuminate\Http\Response
     */
    public function show(Gap $gap)
    {
        //
        $data['gap'] = $gap;

        return view('gap.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gap  $gap
     * @return \Illuminate\Http\Response
     */
    public function edit(Gap $gap)
    {
        //
        $data['gap'] = $gap;

        return view('gap.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gap  $gap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gap $gap)
    {
        //
        $this->validate($request, [

        ]);

        return redirect()->route('gap.index')->with("success", "Berhasil mengupdate Gap");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gap  $gap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gap $gap)
    {
        //
        $gap->delete();

        return redirect()->route('gap.index')->with("success", "Berhasil menghapus Gap");
    }
}
