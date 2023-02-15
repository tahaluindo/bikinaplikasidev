<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Kavling;
use App\Models\Pelanggan;
use App\Models\Penjualan;
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
        $data['penjualan'] = Penjualan::paginate(1000);

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
        $data['kavling'] = Kavling::get();

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
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'kavling_id' => 'required|exists:kavling,id',
            'cara_pembayaran' => 'required|in:Lunas,Angsuran',
            'lama_angsuran' => 'required',
            'batas_pembayaran' => 'required|date',
            'dp' => 'required',
            'biaya_ppjb' => 'required',
            'biaya_shm' => 'required'
        ]);
        $requestData = $request->all();
        
        $kavling = Kavling::findOrFail($request->kavling_id);
        $requestData['total'] = $request->biaya_ppjb + $request->biaya_shm + $kavling->harga - $request->dp;

        Penjualan::create($requestData);

        return redirect()->route('penjualan.index')->with('success', 'Berhasil menambah Penjualan');
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
        $data['kavling'] = Kavling::pluck('nomor_kavling', 'id');
        $data['kavling'] = Kavling::get();

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
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'kavling_id' => 'required|exists:kavling,id',
            'cara_pembayaran' => 'required|in:Lunas,Angsuran',
            'lama_angsuran' => 'required',
            'batas_pembayaran' => 'required|date',
            'dp' => 'required',
            'biaya_ppjb' => 'required',
            'biaya_shm' => 'required'
        ]);

        $requestData = $request->all();
        
        $kavling = Kavling::findOrFail($request->kavling_id);
        $requestData['total'] = $request->biaya_ppjb + $request->biaya_shm + $kavling->harga - $request->dp;

        $penjualan->update($requestData);

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
            ->limit($request->limit)->get();

        if (!$data["penjualans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("penjualan.laporan.print", $data);
    }

    public function batalkan(Request $request, Penjualan $penjualan)
    {
        $penjualan->update([
            'status' => 'Dibatalkan',
            'catatan' => 'Uang dikembalikan: ' . toIdr($request->uang_dikembalikan) 
        ]);
        
        return redirect()->back()->with('success', 'Dibatalkan & uang telah dikembalikan');
    }
}