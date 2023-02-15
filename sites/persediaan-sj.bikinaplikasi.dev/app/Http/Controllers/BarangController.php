<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Barang;
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
        return view('barang.create');
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
            'expire_at' => 'required|date',
            'harga_beli' => 'required|lt:harga_jual',
            'harga_jual' => 'required|gt:harga_beli',
            'stok' => 'required',
            'gambar' => 'required'
        ]);
        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = $request->file('gambar')
                ->move('uploads');
        }


        Barang::create($requestData);

        return redirect()->route('barang.index')->with('success', 'Berhasil menambah Barang');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Barang $barang)
    {
        $data["item"] = $barang;
        $data["barang"] = $barang;

        return view('barang.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Barang $barang)
    {
        $data["barang"] = $barang;
        $data[strtolower("Barang")] = $barang;

        return view('barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Barang $barang)
    {
        $this->validate($request, [
            'expire_at' => 'required|date',
            'harga_beli' => 'required|lt:harga_jual',
            'harga_jual' => 'required|gt:harga_beli',
            'stok' => 'required',
            'gambar' => ''
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = $request->file('gambar')
                ->move('uploads');
        }


        $barang->update($requestData);

        return redirect()->route('barang.index')->with('success', 'Berhasil mengubah Barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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

        return view('barang.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Barang)->getTable();
        $object = (new Barang);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["barangs"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["barangs"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("barang.laporan.print", $data);
    }

    public function getBarang(Request $request)
    {
        return json_encode(Barang::findOrFail($request->barang_id));
    }
}