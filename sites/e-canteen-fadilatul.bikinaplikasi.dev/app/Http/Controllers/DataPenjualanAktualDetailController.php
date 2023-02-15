<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DataPenjualanAktualDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DataPenjualanAktualDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['datapenjualanaktualdetail'] = DataPenjualanAktualDetail::paginate(1000);

        $data['datapenjualanaktualdetail_count'] = count(Schema::getColumnListing('datapenjualanaktualdetail'));

        return view('datapenjualanaktualdetail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('data-penjualan-aktual-detail.create');
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
			'detail_penjualan_aktual_id' => 'required',
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

        

        DataPenjualanAktualDetail::create($requestData);

        return redirect()->route('data-penjualan-aktual-detail.index')->with('success', 'Berhasil menambah DataPenjualanAktualDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(DataPenjualanAktualDetail $data-penjualan-aktual-detail)
    {
        $data["item"] = $data-penjualan-aktual-detail;
        $data["data-penjualan-aktual-detail"] = $data-penjualan-aktual-detail;

        return view('data-penjualan-aktual-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(DataPenjualanAktualDetail $data-penjualan-aktual-detail)
    {
        $data["data-penjualan-aktual-detail"] = $data-penjualan-aktual-detail;
        $data[strtolower("DataPenjualanAktualDetail")] = $data-penjualan-aktual-detail;

        return view('data-penjualan-aktual-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, DataPenjualanAktualDetail $data-penjualan-aktual-detail)
    {
        $this->validate($request, [
			'detail_penjualan_aktual_id' => 'required',
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

        

        $data-penjualan-aktual-detail->update($requestData);

        return redirect()->route('data-penjualan-aktual-detail.index')->with('success', 'Berhasil mengubah DataPenjualanAktualDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(DataPenjualanAktualDetail $data-penjualan-aktual-detail)
    {
        $data-penjualan-aktual-detail->delete();

        return redirect()->route('data-penjualan-aktual-detail.index')->with('success', 'DataPenjualanAktualDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $data-penjualan-aktual-details = DataPenjualanAktualDetail::whereIn('id', json_decode($request->ids, true))->get();

        DataPenjualanAktualDetail::whereIn('id', $data-penjualan-aktual-details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data data-penjualan-aktual-detail');
    }

    public function laporan()
    {

        return view('data-penjualan-aktual-detail.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new DataPenjualanAktualDetail)->getTable();
        $object = (new DataPenjualanAktualDetail);

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

        $data["data-penjualan-aktual-details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["data-penjualan-aktual-details"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("data-penjualan-aktual-detail.laporan.print", $data);
    }
}