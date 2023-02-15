<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PembelianDetail;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PembelianDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pembelian_detail'] = PembelianDetail::where('pembelian_id', request()->pembelian_id)->limit(1000)->get();

        $data['pembelian_detail_count'] = count(Schema::getColumnListing('pembelian_detail'));
        
        if(!$data['pembelian_detail']->count()) {
            
            return redirect()->route('pembelian.index');
        }

        return view('pembelian-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['barang'] = Barang::pluck('nama', 'id');
        
        return view('pembelian-detail.create', $data);
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
			'pembelian_id' => 'required|exists:pembelian,id',
			'barang_id' => 'required|exists:barang,id',
			'harga' => 'required',
			'jumlah' => 'required',
			'total' => 'required'
		]);
        
        $requestData = $request->all();
        
        Barang::findOrFail($request->barang_id)->update([
            'harga_jual' => $request->harga,
            'stok' => $request->jumlah
        ]);

        PembelianDetail::create($requestData);
        
        return redirect(route('pembelian-detail.index') . "?pembelian_id=$request->pembelian_id")->with('success', 'Berhasil menambah pembelian detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(PembelianDetail $pembelian_detail)
    {
        $data["item"] = $pembelian_detail;
        $data["pembelian_detail"] = $pembelian_detail;

        return view('pembelian-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(PembelianDetail $pembelian_detail)
    {
        $data["pembelian_detail"] = $pembelian_detail;
        $data[strtolower("PembelianDetail")] = $pembelian_detail;
        $data['barang'] = Barang::pluck('nama', 'id');

        return view('pembelian-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PembelianDetail $pembelian_detail)
    {
        $this->validate($request, [
			'barang_id' => 'required|exists:barang,id',
			'harga' => 'required',
			'jumlah' => 'required',
			'total' => 'required'
		]);

        $requestData = $request->all();
        
        Barang::findOrFail($request->barang_id)->update([
            'harga_jual' => $request->harga,
            'stok' => $request->jumlah
        ]);

        $pembelian_detail->update($requestData);
        
        return redirect(route('pembelian-detail.index') . "?pembelian_id=" . $pembelian_detail->pembelian_id)->with('success', 'Berhasil mengubah PembelianDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(PembelianDetail $pembelian_detail)
    {
        $pembelian_detail->delete();

        return redirect(route('pembelian-detail.index') . "?pembelian_id=" . \request()->pembelian_id)->with('success', 'PembelianDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pembelian_details = PembelianDetail::whereIn('id', json_decode($request->ids, true))->get();

        PembelianDetail::whereIn('id', $pembelian_details->pluck('id'))->delete();

        return redirect(route('pembelian-detail.index') . "?pembelian_id=$request->pembelian_id")->with('success', 'Berhasil menghapus banyak data pembelian-detail');
    }

    public function laporan()
    {
        $data['limit'] = PembelianDetail::count();

        return view('pembelian-detail.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new PembelianDetail)->getTable();
        $object = (new PembelianDetail);

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

        $data["pembelian-details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["pembelian-details"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pembelian-detail.laporan.print", $data);
    }
}