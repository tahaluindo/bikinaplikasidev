<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\data_penjualan_aktual_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class data_penjualan_aktual_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['data_penjualan_aktual_detail'] = data_penjualan_aktual_detail::paginate(1000);

        $data['data_penjualan_aktual_detail_count'] = count(Schema::getColumnListing('data_penjualan_aktual_detail'));

        return view('data_penjualan_aktual_detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('data_penjualan_aktual_detail.create');
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

        

        data_penjualan_aktual_detail::create($requestData);

        return redirect()->route('data_penjualan_aktual_detail.index')->with('success', 'Berhasil menambah data_penjualan_aktual_detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(data_penjualan_aktual_detail $data_penjualan_aktual_detail)
    {
        $data["item"] = $data_penjualan_aktual_detail;
        $data["data_penjualan_aktual_detail"] = $data_penjualan_aktual_detail;

        return view('data_penjualan_aktual_detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(data_penjualan_aktual_detail $data_penjualan_aktual_detail)
    {
        $data["data_penjualan_aktual_detail"] = $data_penjualan_aktual_detail;
        $data[strtolower("data_penjualan_aktual_detail")] = $data_penjualan_aktual_detail;

        return view('data_penjualan_aktual_detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, data_penjualan_aktual_detail $data_penjualan_aktual_detail)
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

        

        $data_penjualan_aktual_detail->update($requestData);

        return redirect()->route('data_penjualan_aktual_detail.index')->with('success', 'Berhasil mengubah data_penjualan_aktual_detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(data_penjualan_aktual_detail $data_penjualan_aktual_detail)
    {
        $data_penjualan_aktual_detail->delete();

        return redirect()->route('data_penjualan_aktual_detail.index')->with('success', 'data_penjualan_aktual_detail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $data_penjualan_aktual_details = data_penjualan_aktual_detail::whereIn('id', json_decode($request->ids, true))->get();

        data_penjualan_aktual_detail::whereIn('id', $data_penjualan_aktual_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data data_penjualan_aktual_detail');
    }

    public function laporan()
    {

        return view('data_penjualan_aktual_detail.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new data_penjualan_aktual_detail)->getTable();
        $object = (new data_penjualan_aktual_detail);

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

        $data["data_penjualan_aktual_details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["data_penjualan_aktual_details"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("data_penjualan_aktual_detail.laporan.print", $data);
    }
}