<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->kategori_produk) {

            $data['produk'] = Produk::where('kategori_id', $request->kategori_id)->paginate(1000);
        } else {
            $data['produk'] = Produk::paginate(1000);
        }

        $data['produk_count'] = count(Schema::getColumnListing('produk'));

        return view('produk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['kategori'] = Kategori::pluck('nama', 'id');

        return view('produk.create', $data);
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
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'gambar' => 'required'
        ]);
        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = $request->file('gambar')
                ->move('uploads');
        }


        Produk::create($requestData);

        return redirect()->route('produk.index')->with('success', 'Berhasil menambah Produk');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Produk $produk)
    {
        $data["item"] = $produk;
        $data["produk"] = $produk;

        return view('produk.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Produk $produk)
    {
        $data["produk"] = $produk;
        $data[strtolower("Produk")] = $produk;
        $data['kategori'] = Kategori::pluck('nama', 'id');

        return view('produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Produk $produk)
    {
        $this->validate($request, [
            'expire_at' => 'required|date',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'gambar' => ''
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = $request->file('gambar')
                ->move('uploads');
        }


        $produk->update($requestData);

        return redirect()->route('produk.index')->with('success', 'Berhasil mengubah Produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $produks = Produk::whereIn('id', json_decode($request->ids, true))->get();

        Produk::whereIn('id', $produks->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data produk');
    }

    public function laporan()
    {
        $data['limit'] = Produk::count();

        return view('produk.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Produk)->getTable();
        $object = (new Produk);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["produks"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["produks"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("produk.laporan.print", $data);
    }

    public function getProduk(Request $request)
    {
        return json_encode(Produk::findOrFail($request->produk_id));
    }
}