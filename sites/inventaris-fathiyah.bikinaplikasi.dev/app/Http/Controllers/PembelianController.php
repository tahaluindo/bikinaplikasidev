<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pembelian'] = Pembelian::paginate(1000);

        $data['pembelian_count'] = count(Schema::getColumnListing('pembelian'));

        return view('pembelian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['barang'] = Barang::all();
        
        return view('pembelian.create', $data);
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
			'barang_id' => 'required|exists:barang,id',
			'jumlah' => 'required',
			'tanggal' => 'required|date'
		]);
        $requestData = $request->all();

        $barang = Barang::findOrFail($request->barang_id);
        $requestData['total'] = $request->jumlah * $barang->harga_per_unit;
        $barang->increment('jumlah', $request->jumlah);

        Pembelian::create($requestData);

        return redirect()->route('pembelian.index')->with('success', 'Berhasil menambah Pembelian');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pembelian $pembelian)
    {
        $data["item"] = $pembelian;
        $data["pembelian"] = $pembelian;

        return view('pembelian.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pembelian $pembelian)
    {
        $data["pembelian"] = $pembelian;
        $data[strtolower("Pembelian")] = $pembelian;
        $data['barang'] = Barang::all();

        return view('pembelian.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        $this->validate($request, [
			'barang_id' => 'required|exists:barang,id',
			'jumlah' => 'required',
			'harga' => 'required',
			'tanggal' => 'required|date'
		]);

        $requestData = $request->all();
        $requestData['total'] = $request->jumlah * $barang->harga_per_unit;

        $pembelian->update($requestData);
        
        $barang->decrement('jumlah', $pembelian->jumlah);
        $barang->increment('jumlah', $request->jumlah);

        return redirect()->route('pembelian.index')->with('success', 'Berhasil mengubah Pembelian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pembelians = Pembelian::whereIn('id', json_decode($request->ids, true))->get();

        Pembelian::whereIn('id', $pembelians->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pembelian');
    }

    public function laporan()
    {
        $data['limit'] = Pembelian::count();

        return view('pembelian.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Pembelian)->getTable();
        $object = (new Pembelian);

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

        $data["pembelians"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["pembelians"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pembelian.laporan.print", $data);
    }
}