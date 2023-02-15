<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Jadwal;
use App\Mobil;
use App\Tiket;
use App\Rute;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $data['tiket'] = Tiket::paginate(1000);

        $data['tiket_count'] = count(Schema::getColumnListing('tiket'));

        return view('tiket.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data["mobils"] = Mobil::all();
        $data["rutes"] = Rute::all();
        $data["jadwals"] = Jadwal::all();
        $data["supirs"] = User::where('level', 'Supir')->get();

        return view('tiket.create', $data);
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
            'nama' => 'required|string|max:40|unique:tiket,nama',
            'status' => 'required',
            'jumlah' => 'required|integer|max:100',
            'mobil_id' => 'required',
            'rute_id' => 'required',
            'jadwal_id' => 'required',
            'supir_id' => 'required',
            'dimulai_pada' => 'required',
            'berakhir_pada' => 'required',
            'pulang_pergi' => 'required'
        ]);

        $requestData = $request->all();

        Tiket::create($requestData);

        return redirect()->route('tiket.index')->with('success', 'Berhasil menambah Tiket');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Tiket $tiket)
    {
        $data["item"] = $tiket;
        $data["tiket"] = $tiket;



        return view('tiket.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Tiket $tiket)
    {
        $data["tiket"] = $tiket;
        $data[strtolower("Tiket")] = $tiket;

        $data["mobils"] = Mobil::all();
        $data["rutes"] = Rute::all();
        $data["jadwals"] = Jadwal::all();
        $data["supirs"] = User::where('level', 'Supir')->get();

        return view('tiket.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Tiket $tiket)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:40|unique:tiket,nama',
            'status' => 'required',
            'jumlah' => 'required|integer|max:100',
            'mobil_id' => 'required',
            'rute_id' => 'required',
            'jadwal_id' => 'required',
            'supir_id' => 'required',
            'dimulai_pada' => 'required',
            'berakhir_pada' => 'required',
            'pulang_pergi' => 'required'
        ]);

        $requestData = $request->all();

        $tiket->update($requestData);

        return redirect()->route('tiket.index')->with('success', 'Berhasil mengubah Tiket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Tiket $tiket)
    {
        $tiket->delete();

        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $tikets = Tiket::whereIn('id', json_decode($request->ids, true))->get();

        Tiket::whereIn('id', $tikets->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data tiket');
    }

    public function laporan()
    {

        return view('tiket.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Tiket)->getTable();
        $object = (new Tiket);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["tikets"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["tikets"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("tiket.laporan.print", $data);
    }
}
