<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ReservasiTiket;
use App\Tiket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReservasiTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['reservasi_tiket'] = ReservasiTiket::paginate(1000);

        $data['reservasi_tiket_count'] = count(Schema::getColumnListing('reservasi_tiket'));

        return view('reservasi-tiket.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['tikets'] = Tiket::all();
        $data['users'] = User::where('level', '!=', 'Admin')->where('level', '!=', 'Supir')->get();

        return view('reservasi-tiket.create', $data);
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
            'tiket_id' => 'required',
            'jumlah' => 'required',
            'berakhir_pada' => 'required',
            'pulang_pergi' => 'required',
            'total_bayar' => 'required',
        ]);

        $requestData = $request->except(['_token']);

        if ($request->hasFile('bukti_transfer')) {
            $requestData['bukti_transfer'] = "uploads/" . time() . $request->bukti_transfer->getClientOriginalName();
            $request->bukti_transfer->move("uploads", $requestData['bukti_transfer']);
        }
        ReservasiTiket::create($requestData);

        return redirect()->route('reservasi-tiket.index')->with('success', 'Berhasil menambah reservasi tiket');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(ReservasiTiket $reservasiTiket)
    {
        $data["item"] = $reservasiTiket;
        $data["reservasi_tiket"] = $reservasiTiket;

        return view('reservasi-tiket.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(ReservasiTiket $reservasiTiket)
    {
        $data["reservasi_tiket"] = $reservasiTiket;
        $data[strtolower("reservasi_tiket")] = $reservasiTiket;

        $data['tikets'] = Tiket::all();
        $data['users'] = User::where('level', '!=', 'Admin')->where('level', '!=', 'Supir')->get();

        return view('reservasi-tiket.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, ReservasiTiket $reservasiTiket)
    {
        $this->validate($request, [
            'tiket_id' => 'required',
            'jumlah' => 'required',
            'berakhir_pada' => 'required',
            'pulang_pergi' => 'required',
            'total_bayar' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('bukti_transfer')) {
            $requestData['bukti_transfer'] = "uploads/" . time() . $request->bukti_transfer->getClientOriginalName();
            $request->bukti_transfer->move("uploads", $requestData['bukti_transfer']);
        }

        $reservasiTiket->update($requestData);

        return redirect()->route('reservasi-tiket.index')->with('success', 'Berhasil mengubah reservasi tiket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(ReservasiTiket $reservasiTiket)
    {
        $reservasiTiket->delete();

        return redirect()->route('reservasi-tiket.index')->with('success', 'ReservasiTiket berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $reservasiTikets = ReservasiTiket::whereIn('id', json_decode($request->ids, true))->get();

        ReservasiTiket::whereIn('id', $reservasiTikets->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data reservasi tiket');
    }

    public function laporan()
    {

        return view('reservasi-tiket.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new ReservasiTiket)->getTable();
        $object = (new ReservasiTiket);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["reservasi_tikets"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["reservasi_tikets"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("reservasi-tiket.laporan.print", $data);
    }

    public function hitungTotalBayar(Request $request)
    {
        $tiket = Tiket::find($request->tiket_id);
        $total_bayar = 0;
        $total_bayar += $tiket->rute->biaya;

        if($request->pulang_pergi == "Ya") {
            $total_bayar = $total_bayar * 2;
        }

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
