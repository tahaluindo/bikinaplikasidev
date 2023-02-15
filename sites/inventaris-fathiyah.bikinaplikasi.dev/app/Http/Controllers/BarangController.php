<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Pembelian;
use App\Models\Penyusutan;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['barang'] = Barang::paginate(1000);

        $data['barang_count'] = count(Schema::getColumnListing('barang'));

        return view('barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['jenis'] = Jenis::pluck('keterangan', 'id');
        $data['satuan'] = Satuan::pluck('nama', 'id');
        
        return view('barang.create', $data);
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
			'jenis_id' => 'required|exists:jenis,id',
			'satuan_id' => 'required|exists:satuan,id',
			'kode' => "required|max:5|unique:barang,kode",
			'nama' => 'required|max:50',
			'jumlah' => 'required|max:100',
			'umur_manfaat' => 'required',
			'harga_per_unit' => 'required',
			'penyusutan_per_tahun' => 'required',
			'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat'
		]);
        $requestData = $request->all();

        $requestData['nilai_perolehan'] = $request->jumlah * $request->harga_per_unit;

        Barang::create($requestData);

        return redirect()->route('barang.index')->with('success', 'Berhasil menambah Barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Barang $barang)
    {
        $data["item"] = $barang;
        $data["barang"] = $barang;
        $data["penyusutan"] = Penyusutan::where('barang_id', $barang->id)->get();
        $data["pembelian"] = Pembelian::where('barang_id', $barang->id)->get();

        return view('barang.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Barang $barang)
    {
        $data["barang"] = $barang;
        $data[strtolower("Barang")] = $barang;
        $data['jenis'] = Jenis::pluck('keterangan', 'id');
        $data['satuan'] = Satuan::pluck('nama', 'id');

        return view('barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Barang $barang)
    {
        $this->validate($request, [
			'jenis_id' => 'required|exists:jenis,id',
			'satuan_id' => 'required|exists:satuan,id',
			'kode' => "required|max:5|unique:barang,kode,$barang->kode,kode",
			'nama' => 'required|max:50',
			'jumlah' => 'required|max:100',
			'umur_manfaat' => 'required',
			'harga_per_unit' => 'required',
			'penyusutan_per_tahun' => 'required',
			'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat'
		]);

        $requestData = $request->all();

        $requestData['nilai_perolehan'] = $request->jumlah * $request->harga_per_unit;

        $barang->update($requestData);

        return redirect()->route('barang.index')->with('success', 'Berhasil mengubah Barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $barangs = Barang::whereIn('id', json_decode($request->ids, true))->get();

        Barang::whereIn('id', $barangs->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data barang');
    }

    public function laporan()
    {
        $data['limit'] = Barang::count();
        $data['jenis'] = Jenis::pluck('keterangan', 'id');
        $data['satuan'] = Satuan::pluck('nama', 'id');

        return view('barang.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Barang)->getTable();
        $object = (new Barang);

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

        $data["barangs"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["barangs"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("barang.laporan.print", $data);
    }
}