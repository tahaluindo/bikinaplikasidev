<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PemesananDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PemesananDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pemesanan_detail'] = PemesananDetail::where('pemesanan_id', request()->pemesanan_id)->limit(1000)->get();

        $data['pemesanan_detail_count'] = count(Schema::getColumnListing('pemesanandetail'));
        
        if(!$data['pemesanan_detail']->count()) {
            
            return redirect()->route('pemesanan.index');
        }

        return view('pemesanan-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['produk'] = Produk::pluck('nama', 'id');
        
        return view('pemesanan-detail.create', $data);
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
			'pemesanan_id' => 'required|exists:pemesanan,id',
			'produk_id' => 'required|exists:produk,id',
			'harga' => 'required',
			'jumlah' => 'required',
			'total' => 'required'
		]);
        
        $produk = Produk::findOrFail($request->produk_id);
            
        if($produk->stok - $request->jumlah < 0) {
            
            return redirect()->back()->with('error', 'Stok tidak cukup!');
        }
        
        $requestData = $request->all();

        PemesananDetail::create($requestData);
        
        Produk::find($request->produk_id)->decrement('stok', $request->jumlah);

        return redirect(route('pemesanan-detail.index') . "?pemesanan_id=$request->pemesanan_id")->with('success', 'Berhasil menambah PemesananDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(PemesananDetail $pemesanan_detail)
    {
        $data["item"] = $pemesanan_detail;
        $data["pemesanan-detail"] = $pemesanan_detail;

        return view('pemesanan-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(PemesananDetail $pemesanan_detail)
    {
        $data["pemesanan_detail"] = $pemesanan_detail;
        $data[strtolower("PemesananDetail")] = $pemesanan_detail;
        $data['produk'] = Produk::pluck('nama', 'id');

        return view('pemesanan-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PemesananDetail $pemesanan_detail)
    {
        $this->validate($request, [
			'produk_id' => 'required|exists:produk,id',
			'harga' => 'required',
			'jumlah' => 'required',
			'total' => 'required'
		]);
        
        $produk = Produk::findOrFail($request->produk_id);
        
        if($produk->stok + $pemesanan_detail->jumlah - $request->jumlah < 0) {
            
            return redirect()->back()->with('error', 'Stok tidak cukup!');
        }

        $requestData = $request->all();

        Produk::find($request->produk_id)->increment('stok', $pemesanan_detail->jumlah);
        Produk::find($request->produk_id)->decrement('stok', $request->jumlah);
        $pemesanan_detail->update($requestData);
        

        return redirect(route('pemesanan-detail.index') . "?pemesanan_id=" . $pemesanan_detail->pembelian_id)->with('success', 'Berhasil mengubah PemesananDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(PemesananDetail $pemesanan_detail)
    {
        $pemesanan_detail->delete();

        return redirect(route('pemesanan-detail.index') . "?pemesanan_id=" . \request()->pemesanan_id)->with('success', 'PemesananDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pemesanan_details = PemesananDetail::whereIn('id', json_decode($request->ids, true))->get();

        PemesananDetail::whereIn('id', $pemesanan_details->pluck('id'))->delete();

        return redirect(route('pemesanan-detail.index') . "?pemesanan_id=$request->pemesanan_id")->with('success', 'Berhasil menghapus banyak data pemesanan-detail');
    }

    public function laporan()
    {
        $data['limit'] = PemesananDetail::count();

        return view('pemesanan-detail.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new PemesananDetail)->getTable();
        $object = (new PemesananDetail);

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

        $data["pemesanan-details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["pemesanan-details"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pemesanan-detail.laporan.print", $data);
    }
}