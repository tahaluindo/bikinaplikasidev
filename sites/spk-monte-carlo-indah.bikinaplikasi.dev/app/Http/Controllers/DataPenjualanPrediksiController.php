<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DataPenjualanPrediksi;
use App\Models\Produk;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DataPenjualanPrediksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['data_penjualan_prediksi'] = DataPenjualanPrediksi::paginate(1000);

        $data['data_penjualan_prediksi_count'] = count(Schema::getColumnListing('data_penjualan_prediksi'));

        return view('data_penjualan_prediksi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['produks'] = Produk::pluck('nama', 'id');
        $data['tahuns'] = Tahun::pluck('tahun', 'id');
        return view('data_penjualan_prediksi.create', $data);
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
			'produk_id' => 'required|exists:produk,id',
			'tahun_id' => 'required|exists:tahun,id'
		]);
        $requestData = $request->all();

        DataPenjualanPrediksi::create($requestData);

        return redirect()->route('data_penjualan_prediksi.index')->with('success', 'Berhasil menambah DataPenjualanPrediksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(DataPenjualanPrediksi $data_penjualan_prediksi)
    {
        $data["item"] = $data_penjualan_prediksi;
        $data["data_penjualan_prediksi"] = $data_penjualan_prediksi;

        return view('data_penjualan_prediksi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(DataPenjualanPrediksi $data_penjualan_prediksi)
    {
        $data['produks'] = Produk::pluck('nama', 'id');
        $data['tahuns'] = Tahun::pluck('tahun', 'id');
        $data["data_penjualan_prediksi"] = $data_penjualan_prediksi;
        $data[strtolower("DataPenjualanPrediksi")] = $data_penjualan_prediksi;

        return view('data_penjualan_prediksi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, DataPenjualanPrediksi $data_penjualan_prediksi)
    {
        $this->validate($request, [
			'produk_id' => 'required|exists:produk,id',
			'tahun_id' => 'required|exists:tahun,id'
		]);

        $requestData = $request->all();
  
        $data_penjualan_prediksi->update($requestData);

        return redirect()->route('data_penjualan_prediksi.index')->with('success', 'Berhasil mengubah DataPenjualanPrediksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(DataPenjualanPrediksi $data_penjualan_prediksi)
    {
        $data_penjualan_prediksi->delete();

        return redirect()->route('data_penjualan_prediksi.index')->with('success', 'DataPenjualanPrediksi berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $data_penjualan_prediksis = DataPenjualanPrediksi::whereIn('id', json_decode($request->ids, true))->get();

        DataPenjualanPrediksi::whereIn('id', $data_penjualan_prediksis->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data data-penjualan-prediksi');
    }

    public function laporan()
    {

        return view('data_penjualan_prediksi.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new DataPenjualanPrediksi)->getTable();
        $object = (new DataPenjualanPrediksi);

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

        $data["data_penjualan_prediksis"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["data_penjualan_prediksis"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("data_penjualan_prediksi.laporan.print", $data);
    }
}