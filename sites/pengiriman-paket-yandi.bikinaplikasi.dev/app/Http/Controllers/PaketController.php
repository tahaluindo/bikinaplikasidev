<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Mobil;
use App\Paket;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['paket'] = Paket::paginate(1000);

        $data['paket_count'] = count(Schema::getColumnListing('paket'));

        return view('paket.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('paket.create');
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
            'nama' => 'required',
            'kenaikan_harga' => 'required',
            'benefit' => 'required',
            'status' => 'required',
        ]);

        $requestData = $request->all();

        Paket::create($requestData);

        return redirect()->route('paket.index')->with('success', 'Berhasil menambah pengiriman paket');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Paket $paket)
    {
        $data["item"] = $paket;
        $data["paket"] = $paket;

        return view('paket.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Paket $paket)
    {
        $data["paket"] = $paket;
        $data[strtolower("paket")] = $paket;

        $data['mobils'] = Mobil::all();
        $data['users'] = User::where('level', '=', 'Pelanggan')->get();
        $data['supirs'] = User::where('level', '=', 'Supir')->get();

        return view('paket.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Paket $paket)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kenaikan_harga' => 'required',
            'benefit' => 'required',
            'status' => 'required',
        ]);

        $requestData = $request->all();

        $paket->update($requestData);

        return redirect()->route('paket.index')->with('success', 'Berhasil mengubah pengiriman paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Paket $paket)
    {
        $paket->delete();

        return redirect()->route('paket.index')->with('success', 'Rental Mobil berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pakets = Paket::whereIn('id', json_decode($request->ids, true))->get();

        Paket::whereIn('id', $pakets->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pengiriman paket');
    }

    public function laporan()
    {

        return view('paket.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Paket)->getTable();
        $object = (new Paket);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["pakets"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["pakets"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("paket.laporan.print", $data);
    }

    public function hitungTotalBayar(Request $request)
    {
        $mobil = Mobil::find($request->mobil_id);
        $total_bayar = 0;
        $total_bayar += $mobil->biaya_rental;
        $total_bayar += $mobil->biaya_supir;

        if($request->dari_tanggal && $request->sampai_tanggal) {
            $total_bayar *= Carbon::parse($request->dari_tanggal)->diffInDays(Carbon::parse($request->sampai_tanggal));
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
