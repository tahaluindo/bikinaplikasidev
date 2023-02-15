<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Paket;
use App\PemesananPaket;
use App\Tiket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PemesananPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pemesanan_paket'] = PemesananPaket::paginate(1000);

        $data['pemesanan_paket_count'] = count(Schema::getColumnListing('pemesanan_paket'));

        return view('pemesanan-paket.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['pakets'] = Paket::all();
        $data['users'] = User::where('level', '!=', 'Admin')->where('level', '!=', 'Supir')->get();

        return view('pemesanan-paket.create', $data);
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
            'paket_id' => 'required',
            'total_bayar' => 'required',
            'refund' => 'required',
        ]);

        $requestData = $request->except(['_token']);

        if ($request->hasFile('bukti_transfer')) {
            $requestData['bukti_transfer'] = "uploads/" . time() . $request->bukti_transfer->getClientOriginalName();
            $request->bukti_transfer->move("uploads", $requestData['bukti_transfer']);
        }
        PemesananPaket::create($requestData);

        return redirect()->route('pemesanan-paket.index')->with('success', 'Berhasil menambah pengiriman paket');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(PemesananPaket $pemesananPaket)
    {
        $data["item"] = $pemesananPaket;
        $data["pemesanan_paket"] = $pemesananPaket;

        return view('pemesanan-paket.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(PemesananPaket $pemesananPaket)
    {
        $data["pemesanan_paket"] = $pemesananPaket;
        $data[strtolower("pemesanan_paket")] = $pemesananPaket;

        $data['pakets'] = Paket::all();
        $data['users'] = User::where('level', '!=', 'Admin')->where('level', '!=', 'Supir')->get();

        return view('pemesanan-paket.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PemesananPaket $pemesananPaket)
    {
        $this->validate($request, [
            'paket_id' => 'required',
            'total_bayar' => 'required',
            'refund' => 'required',
        ]);

        $requestData = $request->except(['_token']);

        if ($request->hasFile('bukti_transfer')) {
            $requestData['bukti_transfer'] = "uploads/" . time() . $request->bukti_transfer->getClientOriginalName();
            $request->bukti_transfer->move("uploads", $requestData['bukti_transfer']);
        }

        $pemesananPaket->update($requestData);

        return redirect()->route('pemesanan-paket.index')->with('success', 'Berhasil mengubah pengiriman paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(PemesananPaket $pemesananPaket)
    {
        $pemesananPaket->delete();

        return redirect()->route('pemesanan-paket.index')->with('success', 'PemesananPaket berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pemesananPakets = PemesananPaket::whereIn('id', json_decode($request->ids, true))->get();

        PemesananPaket::whereIn('id', $pemesananPakets->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pengiriman paket');
    }

    public function laporan()
    {

        return view('pemesanan-paket.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new PemesananPaket)->getTable();
        $object = (new PemesananPaket);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["pemesanan_pakets"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["pemesanan_pakets"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("pemesanan-paket.laporan.print", $data);
    }

    public function hitungTotalBayar(Request $request)
    {
        $paket = Paket::find($request->paket_id);
        $total_bayar = 0;
        $total_bayar += $paket->harga;

        if($request->refund) {
            $total_bayar -= $request->refund;
        }

        return response()->json([
            'status' => 'Success',
            'data' => $total_bayar
        ]);
    }
}
