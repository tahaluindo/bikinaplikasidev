<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\KodeBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class KodeBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $data['kode_buku'] = KodeBuku::paginate(1000);

        $data['kode_buku_count'] = count(Schema::getColumnListing('kode_buku'));

        return view('kode-buku.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('kode-buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required|max:30',
            'keterangan' => 'required|max:30',
            'lokasi_rak' => 'required|max:30',
        ]);

        $requestData = $request->all();

        KodeBuku::create($requestData);

        return redirect()->route('kode-buku.index')->with('success', 'Berhasil menambah Kode Buku');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $kode_buku = KodeBuku::findOrFail($id);

        return view('rak.show', compact('kode_buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $kode_buku = KodeBuku::findOrFail($id);

        return view('kode-buku.edit', compact('kode_buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_buku' => 'required|max:30',
            'keterangan' => 'required|max:30',
            'lokasi_rak' => 'required|max:30',
        ]);

        $requestData = $request->all();

        $viewName = KodeBuku::findOrFail($id);
        $kode_buku = KodeBuku::findOrFail($id);

        $kode_buku->update($requestData);

        return redirect()->route('kode-buku.index')->with('success', 'Berhasil mengubah Kode Buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        KodeBuku::destroy($id);

        return redirect()->route('kode-buku.index')->with('success', 'Kode Buku berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $kode_bukus = KodeBuku::whereIn('id', json_decode($request->ids, true))->get();

        KodeBuku::whereIn('id', $kode_bukus->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kode buku');
    }

    public function laporan()
    {

        return view('kode-buku.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new KodeBuku)->getTable();
        $object = (new KodeBuku);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["kode_bukus"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["kode_bukus"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("kode-buku.laporan.print", $data);
    }
}
