<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DataPenjualanPrediksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DataPenjualanPrediksiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['datapenjualanprediksidetail'] = DataPenjualanPrediksiDetail::paginate(1000);

        $data['datapenjualanprediksidetail_count'] = count(Schema::getColumnListing('datapenjualanprediksidetail'));

        return view('datapenjualanprediksidetail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('data-penjualan-prediksi-detail.create');
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
			'detail_penjualan_prediksi_id' => 'required',
			'volume_januari' => 'required',
			'volume_februari' => 'required',
			'volume_maret' => 'required',
			'volume_april' => 'required',
			'volume_mei' => 'required',
			'volume_juni' => 'required',
			'volume_juli' => 'required',
			'volume_agustus' => 'required',
			'volume_september' => 'required',
			'volume_oktober' => 'required',
			'volume_november' => 'required',
			'volume_desember' => 'required',
			'harga_per_kg_januari' => 'required',
			'harga_per_kg_februari' => 'required',
			'harga_per_kg_maret' => 'required',
			'harga_per_kg_april' => 'required',
			'harga_per_kg_mei' => 'required',
			'harga_per_kg_juli' => 'required',
			'harga_per_kg_agustus' => 'required',
			'harga_per_kg_september' => 'required',
			'harga_per_kg_oktober' => 'required',
			'harga_per_kg_november' => 'required',
			'harga_per_kg_desember' => 'required'
		]);
        $requestData = $request->all();

        

        DataPenjualanPrediksiDetail::create($requestData);

        return redirect()->route('data-penjualan-prediksi-detail.index')->with('success', 'Berhasil menambah DataPenjualanPrediksiDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(DataPenjualanPrediksiDetail $data-penjualan-prediksi-detail)
    {
        $data["item"] = $data-penjualan-prediksi-detail;
        $data["data-penjualan-prediksi-detail"] = $data-penjualan-prediksi-detail;

        return view('data-penjualan-prediksi-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(DataPenjualanPrediksiDetail $data-penjualan-prediksi-detail)
    {
        $data["data-penjualan-prediksi-detail"] = $data-penjualan-prediksi-detail;
        $data[strtolower("DataPenjualanPrediksiDetail")] = $data-penjualan-prediksi-detail;

        return view('data-penjualan-prediksi-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, DataPenjualanPrediksiDetail $data-penjualan-prediksi-detail)
    {
        $this->validate($request, [
			'detail_penjualan_prediksi_id' => 'required',
			'volume_januari' => 'required',
			'volume_februari' => 'required',
			'volume_maret' => 'required',
			'volume_april' => 'required',
			'volume_mei' => 'required',
			'volume_juni' => 'required',
			'volume_juli' => 'required',
			'volume_agustus' => 'required',
			'volume_september' => 'required',
			'volume_oktober' => 'required',
			'volume_november' => 'required',
			'volume_desember' => 'required',
			'harga_per_kg_januari' => 'required',
			'harga_per_kg_februari' => 'required',
			'harga_per_kg_maret' => 'required',
			'harga_per_kg_april' => 'required',
			'harga_per_kg_mei' => 'required',
			'harga_per_kg_juli' => 'required',
			'harga_per_kg_agustus' => 'required',
			'harga_per_kg_september' => 'required',
			'harga_per_kg_oktober' => 'required',
			'harga_per_kg_november' => 'required',
			'harga_per_kg_desember' => 'required'
		]);

        $requestData = $request->all();

        

        $data-penjualan-prediksi-detail->update($requestData);

        return redirect()->route('data-penjualan-prediksi-detail.index')->with('success', 'Berhasil mengubah DataPenjualanPrediksiDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(DataPenjualanPrediksiDetail $data-penjualan-prediksi-detail)
    {
        $data-penjualan-prediksi-detail->delete();

        return redirect()->route('data-penjualan-prediksi-detail.index')->with('success', 'DataPenjualanPrediksiDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $data-penjualan-prediksi-details = DataPenjualanPrediksiDetail::whereIn('id', json_decode($request->ids, true))->get();

        DataPenjualanPrediksiDetail::whereIn('id', $data-penjualan-prediksi-details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data data-penjualan-prediksi-detail');
    }

    public function laporan()
    {

        return view('data-penjualan-prediksi-detail.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new DataPenjualanPrediksiDetail)->getTable();
        $object = (new DataPenjualanPrediksiDetail);

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

        $data["data-penjualan-prediksi-details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["data-penjualan-prediksi-details"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("data-penjualan-prediksi-detail.laporan.print", $data);
    }
}