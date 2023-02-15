<?php

namespace App\Http\Controllers;

use App\Bobot;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->bobot_id){
            $data['bobots'] = Bobot::where('id', $request->bobot_id)->paginate(100);
        }else{
            $data['bobots'] = Bobot::paginate(100);
        }

        return view('bobot.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('bobot.create');
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

        return redirect()->route('bobot.index')->with("success", "Berhasil menambah bobot");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function show(Bobot $bobot)
    {
        //
        $data['bobot'] = $bobot;

        return view('bobot.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function edit(Bobot $bobot)
    {
        //
        $data['bobot'] = $bobot;

        return view('bobot.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bobot $bobot)
    {
        //
        $this->validate($request, [

        ]);

        return redirect()->route('bobot.index')->with("success", "Berhasil mengupdate Bobot");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bobot $bobot)
    {
        //
        $bobot->delete();

        return redirect()->route('bobot.index')->with("success", "Berhasil menghapus Bobot");
    }
}
