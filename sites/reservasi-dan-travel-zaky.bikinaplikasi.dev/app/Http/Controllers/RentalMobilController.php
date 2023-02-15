<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Mobil;
use App\RentalMobil;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RentalMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['rental_mobil'] = RentalMobil::paginate(1000);

        $data['rental_mobil_count'] = count(Schema::getColumnListing('rental_mobil'));

        return view('rental-mobil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['mobils'] = Mobil::all();
        $data['users'] = User::where('level', '=', 'Pelanggan')->get();
        $data['supirs'] = User::where('level', '=', 'Supir')->get();

        return view('rental-mobil.create', $data);
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
            'mobil_id' => 'required',
            'supir_id' => 'required',
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'total_bayar' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('bukti_transfer')) {
            $requestData['bukti_transfer'] = "uploads/"  . time() .  $request->bukti_transfer->getClientOriginalName();
            $request->bukti_transfer->move("uploads", $requestData['bukti_transfer']);
        }

        RentalMobil::create($requestData);

        return redirect()->route('rental-mobil.index')->with('success', 'Berhasil menambah reservasi tiket');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(RentalMobil $rentalMobil)
    {
        $data["item"] = $rentalMobil;
        $data["rental_mobil"] = $rentalMobil;

        return view('rental-mobil.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(RentalMobil $rentalMobil)
    {
        $data["rental_mobil"] = $rentalMobil;
        $data[strtolower("rental_mobil")] = $rentalMobil;

        $data['mobils'] = Mobil::all();
        $data['users'] = User::where('level', '=', 'Pelanggan')->get();
        $data['supirs'] = User::where('level', '=', 'Supir')->get();

        return view('rental-mobil.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, RentalMobil $rentalMobil)
    {
        $this->validate($request, [
            'mobil_id' => 'required',
            'supir_id' => 'required',
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'total_bayar' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('bukti_transfer')) {
            $requestData['bukti_transfer'] = "uploads/"  . time() .  $request->bukti_transfer->getClientOriginalName();
            $request->bukti_transfer->move("uploads", $requestData['bukti_transfer']);
        }

        $rentalMobil->update($requestData);

        return redirect()->route('rental-mobil.index')->with('success', 'Berhasil mengubah reservasi tiket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(RentalMobil $rentalMobil)
    {
        $rentalMobil->delete();

        return redirect()->route('rental-mobil.index')->with('success', 'Rental Mobil berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $rentalMobils = RentalMobil::whereIn('id', json_decode($request->ids, true))->get();

        RentalMobil::whereIn('id', $rentalMobils->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data reservasi tiket');
    }

    public function laporan()
    {

        return view('rental-mobil.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new RentalMobil)->getTable();
        $object = (new RentalMobil);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["rental_mobils"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["rental_mobils"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("rental-mobil.laporan.print", $data);
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
