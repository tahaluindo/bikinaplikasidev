<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\ProdukDetail;
use App\Models\Tagihan;
use App\Models\TagihanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['produk_detail'] = ProdukDetail::paginate(1000);

        $data['produk_detail_count'] = count(Schema::getColumnListing('produk_detail'));

        return view('produk_detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('produk-detail.create');
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
            'produk_id' => 'required|exists:produk,id',
            'jumlah' => 'required|min:1',
            'harga_beli' => 'required|min:1',
            'harga_jual' => 'required|min:1',
            'tanggal' => 'required|date',
        ]);

        $requestData = $request->except(['from_produk_index']);

        ProdukDetail::create($requestData);

        Produk::findOrFail($request->produk_id)->increment('stok', $request->jumlah);

        return redirect()->route('produk.index')->with('success', 'Berhasil menambah ProdukDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(ProdukDetail $produk_detail)
    {
        $data["item"] = $produk_detail;
        $data["produk-detail"] = $produk_detail;

        return view('produk-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(ProdukDetail $produk_detail)
    {
        $data["produk_detail"] = $produk_detail;
        $data[strtolower("ProdukDetail")] = $produk_detail;

        return view('produk-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, ProdukDetail $produk_detail)
    {
        $this->validate($request, [
            'jumlah' => 'required|min:1',
            'harga_beli' => 'required|min:1',
            'harga_jual' => 'required|min:1',
            'tanggal' => 'required|date',
        ]);

        $requestData = $request->except(['from_produk_index']);

        $produk_detail->update($requestData);

        Produk::findOrFail($produk_detail->produk_id)->decrement('stok', $produk_detail->jumlah);
        Produk::findOrFail($produk_detail->produk_id)->increment('stok', $request->jumlah);

        return redirect()->route('produk.index')->with('success', 'Berhasil mengubah ProdukDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(ProdukDetail $produk_detail)
    {
        $produk_detail->delete();

        return redirect()->route('produk.index')->with('success', 'Produk Detail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $produk_details = ProdukDetail::whereIn('id', json_decode($request->ids, true))->get();

        ProdukDetail::whereIn('id', $produk_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data produk-detail');
    }

    public function laporan()
    {
        if (request()->type == 'produk_masuk') {

            $data['limit'] = ProdukDetail::count();
        }

        if (request()->type == 'produk_keluar') {

            $data['limit'] = TagihanDetail::count();
        }

        return view('produk-detail.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new ProdukDetail)->getTable();
        $object = (new ProdukDetail);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        if ($request->type == 'produk_masuk') {

            $data["produk_details"] = $object
                ->whereBetween('tanggal', [\Carbon\Carbon::parse($request->tanggal_awal)->addDays(-1)->toDateString(), \Carbon\Carbon::parse($request->tanggal_akhir)->addDays(1)->toDateString()])
                ->orderBy($request->field, $request->order)
                ->limit($request->limit)->get();

        }

        if ($request->type == 'produk_keluar') {

            $tagihan = Tagihan::whereBetween('created_at', [\Carbon\Carbon::parse($request->tanggal_awal)->addDays(-1)->toDateString(), \Carbon\Carbon::parse($request->tanggal_akhir)->addDays(1)->toDateString()])->get();

            $data["produk_details"] = [];

            foreach ($tagihan as $item) {
                
                foreach ($item->details as $itemTagihanDetails) {
                    $dataLaporan = [
                        'produk' => Produk::findOrFail($itemTagihanDetails->produk_id)->toArray(),
                        'jumlah' => $itemTagihanDetails->berat,
                        'harga_jual' => $itemTagihanDetails->harga,
                        'tanggal' => \Carbon\Carbon::parse($item->created_at)->toDateString()
                    ];

                    array_push($data["produk_details"], $dataLaporan);
                }
            }

            if (!count($data["produk_details"])) {

                return back()->with('error', 'Data tidak ada!');
            }
            
            $data["produk_details"] = json_decode(json_encode($data["produk_details"]));

            return view("produk-detail.laporan.produk-keluar-print", $data);
        }

        if (!$data["produk_details"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("produk-detail.laporan.produk-masuk-print", $data);
    }
}