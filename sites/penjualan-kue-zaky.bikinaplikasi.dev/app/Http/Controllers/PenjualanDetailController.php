<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PenjualanDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PenjualanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['penjualan_detail'] = PenjualanDetail::where('penjualan_id', request()->penjualan_id)->limit(1000)->get();

        $data['penjualan_detail_count'] = count(Schema::getColumnListing('penjualandetail'));
        
        if(!$data['penjualan_detail']->count()) {
            
            return redirect()->route('penjualan.index');
        }

        return view('penjualan-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['produk'] = Produk::pluck('nama', 'id');
        
        return view('penjualan-detail.create', $data);
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
			'penjualan_id' => 'required|exists:penjualan,id',
			'produk_id' => 'required|exists:produk,id',
			'harga' => 'required',
			'jumlah' => 'required',
			'total' => 'required'
		]);
        
        if(Produk::findOrFail($request->produk_id)->stok - $request->jumlah < 0) {
            
            die("Stok produk tidak cukup!");
        }
        
        $requestData = $request->all();

        PenjualanDetail::create($requestData);
        
        Produk::find($request->produk_id)->decrement('stok', $request->jumlah);

        return redirect(route('penjualan-detail.index') . "?penjualan_id=$request->penjualan_id")->with('success', 'Berhasil menambah PenjualanDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(PenjualanDetail $penjualan_detail)
    {
        $data["item"] = $penjualan_detail;
        $data["penjualan-detail"] = $penjualan_detail;

        return view('penjualan-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(PenjualanDetail $penjualan_detail)
    {
        $data["penjualan_detail"] = $penjualan_detail;
        $data[strtolower("PenjualanDetail")] = $penjualan_detail;
        $data['produk'] = Produk::pluck('nama', 'id');

        return view('penjualan-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PenjualanDetail $penjualan_detail)
    {
        $this->validate($request, [
			'produk_id' => 'required|exists:produk,id',
			'harga' => 'required',
			'jumlah' => 'required',
			'total' => 'required'
		]);

        $requestData = $request->all();

        $penjualan_detail->update($requestData);
        
        if(Produk::findOrFail($request->produk_id)->stok + $penjualan_detail->jumlah - $request->jumlah < 0) {
            
            die("Stok produk tidak cukup!");
        }
        
        Produk::find($request->produk_id)->increment('stok', $penjualan_detail->jumlah);
        Produk::find($request->produk_id)->decrement('stok', $request->jumlah);

        return redirect(route('penjualan-detail.index') . "?penjualan_id=" . $penjualan_detail->pembelian_id)->with('success', 'Berhasil mengubah PenjualanDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(PenjualanDetail $penjualan_detail)
    {
        $penjualan_detail->delete();

        return redirect(route('penjualan-detail.index') . "?penjualan_id=" . \request()->penjualan_id)->with('success', 'PenjualanDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $penjualan_details = PenjualanDetail::whereIn('id', json_decode($request->ids, true))->get();

        PenjualanDetail::whereIn('id', $penjualan_details->pluck('id'))->delete();

        return redirect(route('penjualan-detail.index') . "?penjualan_id=$request->penjualan_id")->with('success', 'Berhasil menghapus banyak data penjualan-detail');
    }

    public function laporan()
    {
        $data['limit'] = PenjualanDetail::count();

        return view('penjualan-detail.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new PenjualanDetail)->getTable();
        $object = (new PenjualanDetail);

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

        $data["penjualan-details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["penjualan-details"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("penjualan-detail.laporan.print", $data);
    }
}