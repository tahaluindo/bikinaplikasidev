<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TagihanDetail;
use App\Models\Pembeli;
use App\Models\Produk;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        
        $data['tagihan'] = Tagihan::paginate(1000);
        $data['pembeli'] = \App\Models\Pembeli::all();

        $data['tagihan_count'] = count(Schema::getColumnListing('tagihan'));

        return view('tagihan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tagihan.create');
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
            'pembeli_id' => 'required|exists:pembeli_id'
        ]);
        $requestData = $request->all();


        Tagihan::create($requestData);

        return redirect()->route('tagihan.index')->with('success', 'Berhasil menambah Tagihan');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Tagihan $tagihan)
    {
        $data["item"] = $tagihan;
        $data["tagihan"] = $tagihan;

        return view('tagihan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Tagihan $tagihan)
    {
        $data["tagihan"] = $tagihan;
        $data[strtolower("Tagihan")] = $tagihan;

        return view('tagihan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        $this->validate($request, [
            'pembeli_id' => 'required|exists:pembeli_id'
        ]);

        $requestData = $request->all();


        $tagihan->update($requestData);

        return redirect()->route('tagihan.index')->with('success', 'Berhasil mengubah Tagihan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Tagihan $tagihan)
    {
        $tagihan->delete();

        if ($request->from_tagihan_tambah) {

            return redirect()->back()->with('success', 'Tagihan berhasil dihapus!');
        }

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $tagihans = Tagihan::whereIn('id', json_decode($request->ids, true))->get();

        Tagihan::whereIn('id', $tagihans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data tagihan');
    }

    public function laporan()
    {

        return view('tagihan.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Tagihan)->getTable();
        $object = (new Tagihan);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["tagihans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["tagihans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("tagihan.laporan.print", $data);
    }

    public function tambah(Pembeli $pembeli)
    {
        $data['pembeli'] = $pembeli;
        $data['produk'] = Produk::where('stok', '>', '0')->get();

        if (!$data['produk']->count()) {
            return back()->with('error', 'Produk tidak ada!');
        }

        return view('tagihan.tambah', $data);
    }

    public function tambahStore(Request $request, Pembeli $pembeli)
    {
        // perulangan khusus untuk melakukan pengecekan stok produk
        foreach ($request->produk as $item) {
            $produk = Produk::findOrFail($item['id']);
            if ($produk->stok - $item['berat'] < 0) {
                return redirect()->back()->with('error', "produk $produk->nama tidak cukup!");
            }
        }

        $tagihanCreate = Tagihan::create([
            'pembeli_id' => $request->pembeli_id,
            'diskon' => $request->diskon,
            'metode' => $request->metode,
            'status' => $request->metode == "Kredit" ? "Belum Lunas" : "Lunas"
        ]);

        $total = 0;
        foreach ($request->produk as $item) {
            if ($item['harga'] && $item['berat']) {

                $total += $item['berat'] * $item['harga'];
                TagihanDetail::create([
                    'tagihan_id' => $tagihanCreate->id,
                    'produk_id' => $item['id'],
                    'berat' => $item['berat'],
                    'harga' => $item['harga'],
                    'total' => $total
                ]);

                Produk::findOrFail($item['id'])->decrement('stok', $item['berat']);
            }
        }

        if ($request->metode == 'Kas') {

            $tagihanCreate->update([
                'total' => 0
            ]);
        }
        
        if ($request->metode == 'Kredit') {

            $tagihanCreate->update([
                'total' => $total - $request->diskon
            ]);
        }

        return redirect('dashboard')->with('success', 'Berhasil menambah tagihan');
    }

    public function hitung(Request $request)
    {
        $produk = [];
        $total = 0;
        foreach ($request->produk as $key => $item) {
            $total += ($item['berat'] ?? 0) * ($item['harga'] ?? 0);

            $produk[$key]['id'] = $item['id'];
            $produk[$key]['total'] = toIdr(($item['berat'] ?? 0) * ($item['harga'] ?? 0));

        }

        $total = $total - $request->diskon;

        if ($request->metode == "Kredit") {

            $tagihans = Tagihan::where([
                'pembeli_id' => $request->pembeli_id,
                'metode' => 'Kredit'
            ])->get();

            $hutang = 0;

            foreach ($tagihans as $item) {
                $hutang += $item->details->sum('total');
            }

            $hutang += $total;
        }

        if ($request->metode == "Kas") {
            $tagihans = Tagihan::where([
                'pembeli_id' => $request->pembeli_id
            ])->get();

        }

        return response()->json([
            'total' => toIdr($total),
            'produk' => $produk,
            'hutang' => toIdr($tagihans->sum('total')),
            'length' => count($produk)
        ]);
    }


    public function lunaskan(Tagihan $tagihan)
    {
        $tagihan->update([
            'status' => 'Lunas',
            'total' => 0
        ]);

        return redirect()->back()->with('success', 'Berhasil melunaskan tagihan');
    }

    public function lunaskanSemua(Pembeli $pembeli)
    {
        Tagihan::where('id', 'like', '%%')->update([
            'status' => 'Lunas',
            'total' => 0
        ]);

        return redirect()->back()->with('success', 'Berhasil melunaskan semua tagihan');
    }
}