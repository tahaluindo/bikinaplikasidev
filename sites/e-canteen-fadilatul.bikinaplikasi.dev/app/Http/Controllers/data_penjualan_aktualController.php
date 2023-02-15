<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\data_penjualan_aktual;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class data_penjualan_aktualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['data_penjualan_aktual'] = data_penjualan_aktual::paginate(1000);

        $data['data_penjualan_aktual_count'] = count(Schema::getColumnListing('data_penjualan_aktual'));

        return view('data_penjualan_aktual.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['produks'] = Produk::all();

        return view('data_penjualan_aktual.create', $data);
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
			'produk' => 'required|exists:produk,id',
			'tahun' => 'required|exists:tahun,id'
		]);

        $requestData = $request->all();

        data_penjualan_aktual::create($requestData);

        return redirect()->route('data_penjualan_aktual.index')->with('success', 'Berhasil menambah data_penjualan_aktual');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(data_penjualan_aktual $data_penjualan_aktual)
    {
        $data["item"] = $data_penjualan_aktual;
        $data["data_penjualan_aktual"] = $data_penjualan_aktual;

        return view('data_penjualan_aktual.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(data_penjualan_aktual $data_penjualan_aktual)
    {
        $data["data_penjualan_aktual"] = $data_penjualan_aktual;
        $data[strtolower("data_penjualan_aktual")] = $data_penjualan_aktual;

        return view('data_penjualan_aktual.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, data_penjualan_aktual $data_penjualan_aktual)
    {
        $this->validate($request, [
			'produk' => 'required|exists:produk,id',
			'tahun' => 'required|exists:tahun,id'
		]);

        $requestData = $request->all();

        

        $data_penjualan_aktual->update($requestData);

        return redirect()->route('data_penjualan_aktual.index')->with('success', 'Berhasil mengubah data_penjualan_aktual');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(data_penjualan_aktual $data_penjualan_aktual)
    {
        $data_penjualan_aktual->delete();

        return redirect()->route('data_penjualan_aktual.index')->with('success', 'data_penjualan_aktual berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $data_penjualan_aktuals = data_penjualan_aktual::whereIn('id', json_decode($request->ids, true))->get();

        data_penjualan_aktual::whereIn('id', $data_penjualan_aktuals->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data data_penjualan_aktual');
    }

    public function laporan()
    {

        return view('data_penjualan_aktual.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new data_penjualan_aktual)->getTable();
        $object = (new data_penjualan_aktual);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["data_penjualan_aktuals"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["data_penjualan_aktuals"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("data_penjualan_aktual.laporan.print", $data);
    }
}