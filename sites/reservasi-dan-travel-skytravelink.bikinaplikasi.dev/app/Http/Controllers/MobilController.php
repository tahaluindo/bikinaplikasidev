<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Mobil;
use App\MobilFasilitas;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['mobil'] = Mobil::paginate(1000);

        $data['mobil_count'] = count(Schema::getColumnListing('mobil'));

        return view('mobil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['fasilitas'] = Fasilitas::all();

        return view('mobil.create', $data);
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
            'status' => 'required',
            'jumlah_kursi' => 'required',
            'biaya_rental' => 'required',
            'biaya_supir' => 'required',
        ]);

        $requestData = $request->except(['fasilitas_ids']);

        if(!count($request->fasilitas_ids)) {
            return redirect()->back()->with('error', 'Fasilitas wajib di isi');
        }

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = "uploads/" . time() . $request->gambar->getClientOriginalName();
            $request->gambar->move("uploads", $requestData['gambar']);
        }

        DB::transaction(function () use ($requestData, $request) {
            $mobilCreate = Mobil::create($requestData);

            foreach ($request->fasilitas_ids as $item) {
                MobilFasilitas::create([
                    'mobil_id' => $mobilCreate->id,
                    'fasilitas_id' => $item
                ]);
            }
        });

        return redirect()->route('mobil.index')->with('success', 'Berhasil menambah reservasi mobil');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Mobil $mobil)
    {
        $data["item"] = $mobil;
        $data["mobil"] = $mobil;

        return view('mobil.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Mobil $mobil)
    {
        $data["mobil"] = $mobil;
        $data[strtolower("mobil")] = $mobil;

        $data['mobils'] = Mobil::all();
        $data['users'] = User::where('level', '=', 'Pelanggan')->get();
        $data['supirs'] = User::where('level', '=', 'Supir')->get();
        $data['fasilitas'] = Fasilitas::all();

        return view('mobil.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Mobil $mobil)
    {
        $this->validate($request, [
            'nama' => 'required',
            'status' => 'required',
            'jumlah_kursi' => 'required',
            'biaya_rental' => 'required',
            'biaya_supir' => 'required',
        ]);

        $requestData = $request->except(['fasilitas_ids']);

        if(!count($request->fasilitas_ids)) {
            return redirect()->back()->with('error', 'Fasilitas wajib di isi');
        }

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = "uploads/" . time() . $request->gambar->getClientOriginalName();
            $request->gambar->move("uploads", $requestData['gambar']);
        }

        DB::transaction(function () use ($requestData, $request, $mobil) {
            foreach ($request->fasilitas_ids as $item) {
                MobilFasilitas::create([
                    'mobil_id' => $mobil->id,
                    'fasilitas_id' => $item
                ]);
            }

            $mobil->update($requestData);
        });

        return redirect()->route('mobil.index')->with('success', 'Berhasil mengubah reservasi mobil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return redirect()->route('mobil.index')->with('success', 'Rental Mobil berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $mobils = Mobil::whereIn('id', json_decode($request->ids, true))->get();

        Mobil::whereIn('id', $mobils->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data reservasi mobil');
    }

    public function laporan()
    {

        return view('mobil.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Mobil)->getTable();
        $object = (new Mobil);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["mobils"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["mobils"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("mobil.laporan.print", $data);
    }

    public function hitungTotalBayar(Request $request)
    {
        $mobil = Mobil::find($request->mobil_id);
        $total_bayar = 0;
        $total_bayar += $mobil->biaya_rental;
        $total_bayar += $mobil->biaya_supir;

        if ($request->dari_tanggal && $request->sampai_tanggal) {
            $total_bayar *= Carbon::parse($request->dari_tanggal)->diffInDays(Carbon::parse($request->sampai_tanggal));
        }

        if ($request->refund) {
            $total_bayar -= $request->refund;
        }

        return response()->json([
            'status' => 'Success',
            'data' => $total_bayar
        ]);
    }
}
