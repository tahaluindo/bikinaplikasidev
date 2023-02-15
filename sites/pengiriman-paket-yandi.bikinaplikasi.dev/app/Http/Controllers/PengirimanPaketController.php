<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Jadwal;
use App\PengirimanPaket;
use App\Paket;
use App\Rute;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengirimanPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pengiriman_paket'] = PengirimanPaket::paginate(1000);

        $data['pengiriman_paket_count'] = count(Schema::getColumnListing('pengiriman_paket'));

        return view('pengiriman-paket.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['rutes'] = Rute::all();
        $data['pakets'] = Paket::all();
        $data['jadwals'] = Jadwal::all();
        $data['users'] = User::where('level', '!=', 'Admin')->where('level', '!=', 'Supir')->get();

        return view('pengiriman-paket.create', $data);
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
            'rute_id' => 'required',
            'jadwal_id' => 'required',
            'jumlah' => 'required',
            'diantar_pada' => 'required',
            'total_bayar' => 'required',
            'refund' => 'required',
        ]);

        $requestData = $request->except(['_token']);

        PengirimanPaket::create($requestData);

        return redirect()->route('pengiriman-paket.index')->with('success', 'Berhasil menambah pengiriman paket');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(PengirimanPaket $pengiriman_paket)
    {
        $data["item"] = $pengiriman_paket;
        $data["pengiriman_paket"] = $pengiriman_paket;

        return view('pengiriman-paket.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(PengirimanPaket $pengiriman_paket)
    {
        $data["pengiriman_paket"] = $pengiriman_paket;
        $data[strtolower("pengiriman_paket")] = $pengiriman_paket;

        $data['rutes'] = Rute::all();
        $data['pakets'] = Paket::all();
        $data['jadwals'] = Jadwal::all();
        $data['users'] = User::where('level', '!=', 'Admin')->where('level', '!=', 'Supir')->get();

        return view('pengiriman-paket.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PengirimanPaket $pengiriman_paket)
    {
        $this->validate($request, [
            'paket_id' => 'required',
            'rute_id' => 'required',
            'jadwal_id' => 'required',
            'jumlah' => 'required',
            'diantar_pada' => 'required',
            'total_bayar' => 'required',
            'refund' => 'required',
        ]);

        $requestData = $request->all();

        $pengiriman_paket->update($requestData);

        return redirect()->route('pengiriman-paket.index')->with('success', 'Berhasil mengubah pengiriman paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(PengirimanPaket $pengiriman_paket)
    {
        $pengiriman_paket->delete();

        return redirect()->route('pengiriman-paket.index')->with('success', 'PengirimanPaket berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pengiriman_pakets = PengirimanPaket::whereIn('id', json_decode($request->ids, true))->get();

        PengirimanPaket::whereIn('id', $pengiriman_pakets->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pengiriman paket');
    }

    public function laporan()
    {

        return view('pengiriman-paket.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new PengirimanPaket)->getTable();
        $object = (new PengirimanPaket);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $tanggal_awal = $request->tanggal_awal ? $request->tanggal_awal : (PengirimanPaket::get()->first()->created_at ?? date('d-M-Y'));
        $tanggal_akhir = $request->tanggal_akhir ? $request->tanggal_akhir : (PengirimanPaket::get()->last()->created_at ?? date('d-M-Y'));

        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;

        $data["pengiriman_pakets"] = $object->orderBy($request->field, $request->order)->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->get();

        if (!$data["pengiriman_pakets"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("pengiriman-paket.laporan.print", $data);
    }

    public function hitungTotalBayar(Request $request)
    {
        $paket = Paket::find($request->paket_id);
        $rute = Rute::find($request->rute_id);

        $total_bayar = 0;
        $total_bayar += $paket->kenaikan_harga + $rute->biaya;

        if($request->jumlah) {
            $total_bayar = $request->jumlah * $total_bayar;
        }

        if($request->refund) {
            $total_bayar -= $request->refund;
        }

        return response()->json([
            'status' => 'Success',
            'data' => $total_bayar
        ]);
    }
}
