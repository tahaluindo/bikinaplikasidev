<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Lokasi;
use App\LokasiTujuan;
use App\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LokasiTujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['lokasi_tujuan'] = LokasiTujuan::paginate(1000);

        $data['lokasi_tujuan_count'] = count(Schema::getColumnListing('lokasi_tujuan'));

        return view('lokasi-tujuan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['rutes'] = Rute::all();

        return view('lokasi-tujuan.create', $data);
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
            'rute_id' => 'required',
            'nama' => 'required|string|max:40|unique:lokasi_tujuan,nama',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);
        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = "uploads/" . time() . $request->gambar->getClientOriginalName();
            $request->gambar->move("uploads", $requestData['gambar']);
        }

        LokasiTujuan::create($requestData);

        return redirect()->route('lokasi-tujuan.index')->with('success', 'Berhasil menambah lokasi tujuan');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(LokasiTujuan $lokasi_tujuan)
    {
        $data["item"] = $lokasi_tujuan;
        $data["lokasi_tujuan"] = $lokasi_tujuan;

        return view('lokasi-tujuan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(LokasiTujuan $lokasi_tujuan)
    {
        $data["lokasi_tujuan"] = $lokasi_tujuan;
        $data[strtolower("Lokasi")] = $lokasi_tujuan;
        $data['rutes'] = Rute::all();

        return view('lokasi-tujuan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, LokasiTujuan $lokasi_tujuan)
    {
        $this->validate($request, [
            'rute_id' => 'required',
            'nama' => "required|string|max:40|unique:lokasi,nama,$lokasi_tujuan->id,id",
            'deskripsi' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = "uploads/" . time() . $request->gambar->getClientOriginalName();
            $request->gambar->move("uploads", $requestData['gambar']);

            File::delete($lokasi_tujuan->gambar);
        }

        $lokasi_tujuan->update($requestData);

        return redirect()->route('lokasi-tujuan.index')->with('success', 'Berhasil mengubah lokasi tujuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(LokasiTujuan $lokasi_tujuan)
    {
        $lokasi_tujuan->delete();

        return redirect()->route('lokasi-tujuan.index')->with('success', 'Lokasi tujuan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $lokasi_tujuans = LokasiTujuan::whereIn('id', json_decode($request->ids, true))->get();

        LokasiTujuan::whereIn('id', $lokasi_tujuans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data lokasi tujuan');
    }

    public function laporan()
    {

        return view('lokasi-tujuan.laporan.index');
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

        return view("lokasi-tujuan.laporan.print", $data);
    }

}
