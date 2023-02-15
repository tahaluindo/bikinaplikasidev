<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->type_id){
            $data['types'] = Type::where('id', $request->type_id)->paginate(100);
        } else {
            $data['types'] = Type::paginate(100);
        }

        return view('type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('type.create');
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
            'type'   => 'required|min:3|max:15',
        ]);

        Type::create($request->all());

        return redirect()->route('type.index')->with("success", "Berhasil menambah type");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
        $data['type'] = $type;

        return view('type.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
        $data['type'] = $type;

        return view('type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
        $this->validate($request, [
            'type'   => 'required|min:3|max:15',
        ]);

        $type->update($request->all());

        return redirect()->route('type.index')->with("success", "Berhasil mengupdate type");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
        $type->delete();

        return redirect()->route('type.index')->with("success", "Berhasil menghapus type");
    }

    public function hapus_semua(Request $request)
    {
        $types = Type::whereIn('id', json_decode($request->ids, true))->get();

        Type::whereIn('id', $types->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data type');
    }
}
