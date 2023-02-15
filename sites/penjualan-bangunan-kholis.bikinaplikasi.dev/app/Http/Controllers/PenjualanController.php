<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['penjualan'] = Penjualan::with('penjualan_details')->get()->take(1000)->filter(function ($item) {

            return count($item->penjualan_details);
        });

        $data['penjualan_count'] = count(Schema::getColumnListing('penjualan'));

        return view('penjualan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['pelanggan'] = Pelanggan::pluck('nama', 'id');
        
        return view('penjualan.create', $data);
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
            'status' => 'required|in:pending,selesai,cancel,refund'
        ]);
        $requestData = $request->all();

        $penjualan = Penjualan::create($requestData);
        
        $produk = json_encode(Produk::pluck('nama', 'id'));

        return redirect(route('penjualan-detail.create') . "?penjualan_id={$penjualan->id}&produk=$produk");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Penjualan $penjualan)
    {
        $data["item"] = $penjualan;
        $data["penjualan"] = $penjualan;

        return view('penjualan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Penjualan $penjualan)
    {
        $data["penjualan"] = $penjualan;
        $data[strtolower("Penjualan")] = $penjualan;
        $data['pelanggan'] = Pelanggan::pluck('nama', 'id');

        return view('penjualan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        $this->validate($request, [
            'status' => 'required|in:pending,selesai,cancel,refund'
        ]);

        $requestData = $request->all();

        $penjualan->update($requestData);
        
        if($request->status == 'refund') {
            
        }

        return redirect()->route('penjualan.index')->with('success', 'Berhasil mengubah Penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $penjualans = Penjualan::whereIn('id', json_decode($request->ids, true))->get();

        Penjualan::whereIn('id', $penjualans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data penjualan');
    }

    public function laporan()
    {
        $data['limit'] = Penjualan::count();

        return view('penjualan.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Penjualan)->getTable();
        $object = (new Penjualan);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["penjualans"] = $object->orderBy($request->field, $request->order)
            ->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->limit($request->limit)->get()->filter(function($item) {
               
                return $item->penjualan_details->count();
            });

        if (!$data["penjualans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("penjualan.laporan.print", $data);
    }

    public function nota(Penjualan $penjualan)
    {
        $data['penjualan'] = $penjualan;
        
        return view('penjualan.nota', $data);
    }
}