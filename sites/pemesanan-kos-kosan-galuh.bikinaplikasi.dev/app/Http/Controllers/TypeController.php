<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['datas'] = Type::orderBy('id', 'desc')->limit(50)->get();
        return view('type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fasilitasies = Type::pluck('fasilitas');
        $data['fasilitasies'] = array_unique(explode(",", implode(",", $fasilitasies->toArray())));

        return view('type.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // custom validation
        $request['harga_harian'] = (int) str_replace('.', '', str_replace('Rp', '', $request->harga_harian));
        $request['harian_tambahan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->harian_tambahan));
        $request['harga_mingguan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->harga_mingguan));
        $request['mingguan_tambahan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->mingguan_tambahan));
        $request['harga_bulanan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->harga_bulanan));
        $request['bulanan_tambahan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->bulanan_tambahan));
        $request['harga_tahunan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->harga_tahunan));
        $request['tahunan_tambahan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->tahunan_tambahan));

        $request['total'] = $request['harga_harian'] + $request['harga_mingguan'] + $request['harga_bulanan'] + $request['harga_tahunan'] + $request['harian_tambahan'] + $request['mingguan_tambahan'] + $request['bulanan_tambahan'] + $request['tahunan_tambahan'];

        $this->validate($request, [
            'nama' => ['required', 'max:50', 'min:1', 'alpha_num' ],
            'harga_harian' => 'digits_between:1,9',
            'harian_tambahan' => 'digits_between:1,9|lt:harga_harian',
            'harga_mingguan' => 'digits_between:1,9|gte:harga_harian',
            'mingguan_tambahan' => 'digits_between:1,9|lt:harga_mingguan',
            'harga_bulanan' => 'digits_between:1,9|gte:harga_mingguan',
            'bulanan_tambahan' => 'digits_between:1,9|lt:harga_bulanan',
            'harga_tahunan' => 'digits_between:1,9|gte:harga_bulanan',
            'tahunan_tambahan' => 'digits_between:1,9|lt:harga_tahunan',
            'total' => [function ($attribute, $value, $fail) use ($request) {
                    if ($request['total'] == 0) {
                        return back()->with('error', 'Mohon mengisi salah satu harga!');
                    }
                },
            ],
        ]);

        $typeSave = Type::create($request->except(['_token', 'total']))->save();

        return back()->with('success', 'Berhasil menambah type');
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
        $data['data'] = $type;
        
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
        $datas['data'] = $type;

        return view('type.edit', $datas);
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
            // custom validation
        $request['harga_harian'] = (int) str_replace('.', '', str_replace('Rp', '', $request->harga_harian));
        $request['harian_tambahan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->harian_tambahan));
        $request['harga_mingguan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->harga_mingguan));
        $request['mingguan_tambahan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->mingguan_tambahan));
        $request['harga_bulanan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->harga_bulanan));
        $request['bulanan_tambahan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->bulanan_tambahan));
        $request['harga_tahunan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->harga_tahunan));
        $request['tahunan_tambahan'] = (int) str_replace('.', '', str_replace('Rp', '', $request->tahunan_tambahan));

        $request['total'] = $request['harga_harian'] + $request['harga_mingguan'] + $request['harga_bulanan'] + $request['harga_tahunan'] + $request['harian_tambahan'] + $request['mingguan_tambahan'] + $request['bulanan_tambahan'] + $request['tahunan_tambahan'];
        
        $this->validate($request, [
            'nama' => ['required', 'max:50', 'min:1', 'alpha_num' ],
            'harga_harian' => 'digits_between:1,9',
            'harian_tambahan' => 'digits_between:1,9|lt:harga_harian',
            'harga_mingguan' => 'digits_between:1,9|gte:harga_harian',
            'mingguan_tambahan' => 'digits_between:1,9|lt:harga_mingguan',
            'harga_bulanan' => 'digits_between:1,9|gte:harga_mingguan',
            'bulanan_tambahan' => 'digits_between:1,9|lt:harga_bulanan',
            'harga_tahunan' => 'digits_between:1,9|gte:harga_bulanan',
            'tahunan_tambahan' => 'digits_between:1,9|lt:harga_tahunan',
            'total' => [function ($attribute, $value, $fail) use ($request) {
                    if ($request['total'] == 0) {
                        return back()->with('error', 'Mohon mengisi salah satu harga!');
                    }
                },
            ],
        ]);
        
        $typeSave = Type::find($type->id)->update($request->except(['_token', 'total']));

        return back()->with('success', 'Berhasil mengupdate type');
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
        Type::findOrFail($type->id)->delete();

        return back()->with('success', "Berhasil menghapus type $type->nama");
    }
}
