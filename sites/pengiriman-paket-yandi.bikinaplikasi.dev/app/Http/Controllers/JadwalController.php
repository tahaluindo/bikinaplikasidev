<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $data['jadwal'] = Jadwal::paginate(1000);

        $data['jadwal_count'] = count(Schema::getColumnListing('jadwal'));

        return view('jadwal.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('jadwal.create');
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
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required',
        ]);

        if(Jadwal::where([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_akhir' => $request->jam_akhir
        ])->first()) {
            return redirect()->back()->with('error', 'Jadwal sudah ada');
        }

        $requestData = $request->all();

        Jadwal::create($requestData);

        return redirect()->route('jadwal.index')->with('success', 'Berhasil menambah Jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Jadwal $jadwal)
    {
        $data["item"] = $jadwal;
        $data["jadwal"] = $jadwal;

        return view('jadwal.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Jadwal $jadwal)
    {
        $data["jadwal"] = $jadwal;
        $data[strtolower("Jadwal")] = $jadwal;

        return view('jadwal.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $this->validate($request, [
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required',
        ]);

        if(Jadwal::where([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_akhir' => $request->jam_akhir
        ])->where('id', '!=', $jadwal->id)->first()) {
            return redirect()->back()->with('error', 'Jadwal sudah ada');
        }

        $requestData = $request->all();

        $jadwal->update($requestData);

        return redirect()->route('jadwal.index')->with('success', 'Berhasil mengubah Jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $jadwals = Jadwal::whereIn('id', json_decode($request->ids, true))->get();

        Jadwal::whereIn('id', $jadwals->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data jadwal');
    }

    public function laporan()
    {

        return view('jadwal.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Jadwal)->getTable();
        $object = (new Jadwal);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["jadwals"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["jadwals"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("jadwal.laporan.print", $data);
    }

}
