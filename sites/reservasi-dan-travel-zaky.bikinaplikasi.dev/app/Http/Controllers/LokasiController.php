<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['lokasi'] = Lokasi::paginate(1000);

        $data['lokasi_count'] = count(Schema::getColumnListing('lokasi'));

        return view('lokasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('lokasi.create');
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
            'nama' => 'required|string|max:40|unique:lokasi,nama',
            'foto' => 'required',
        ]);
        $requestData = $request->all();

        if ($request->hasFile('foto')) {
            $requestData['foto'] = "uploads/" . time() . $request->foto->getClientOriginalName();
            $request->foto->move("uploads", $requestData['foto']);
        }

        Lokasi::create($requestData);

        return redirect()->route('lokasi.index')->with('success', 'Berhasil menambah Lokasi');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Lokasi $lokasi)
    {
        $data["item"] = $lokasi;
        $data["lokasi"] = $lokasi;

        return view('lokasi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Lokasi $lokasi)
    {
        $data["lokasi"] = $lokasi;
        $data[strtolower("Lokasi")] = $lokasi;

        return view('lokasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $this->validate($request, [
            'nama' => "required|string|max:40|unique:lokasi,nama,$lokasi->nama,nama",
        ]);
        $requestData = $request->all();

        if ($request->hasFile('foto')) {
            $requestData['foto'] = "uploads/" . $request->foto->getClientOriginalName();
            $request->foto->move("uploads", $requestData['foto']);

            File::delete($lokasi->foto);
        }

        $lokasi->update($requestData);

        return redirect()->route('lokasi.index')->with('success', 'Berhasil mengubah Lokasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $lokasis = Lokasi::whereIn('id', json_decode($request->ids, true))->get();

        Lokasi::whereIn('id', $lokasis->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data lokasi');
    }

    public function laporan()
    {

        return view('lokasi.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Lokasi)->getTable();
        $object = (new Lokasi);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["lokasis"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["lokasis"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("lokasi.laporan.print", $data);
    }

}
