<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pembeli'] = Pembeli::paginate(1000);

        $data['pembeli_count'] = count(Schema::getColumnListing('pembeli'));

        return view('pembeli.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pembeli.create');
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
        if (Pembeli::where('nama', $request->nama)->where('keterangan', $request->keterangan)->count()) {

            return redirect()->back()->with('error', 'Pembeli tersebut sudah ada');
        }

        $this->validate($request, [
            'nama' => 'required|max:30'
        ]);
        $requestData = $request->all();


        $pembeliCreate = Pembeli::create($request->except(['from_dashboard', 'button']));

        if ($request->from_dashboard && $request->button == 'simpan') {
            return redirect()->route('tagihan')->with('success', 'Berhasil menambah Pembeli');
        }
        if ($request->from_dashboard && $request->button == 'buat-tagihan') {

            return redirect()->route('tagihan.pembeli.tambah', $pembeliCreate->id);
        }

        return redirect()->route('pembeli.index')->with('success', 'Berhasil menambah Pembeli');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pembeli $pembeli)
    {
        $data["item"] = $pembeli;
        $data["pembeli"] = $pembeli;

        return view('pembeli.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pembeli $pembeli)
    {
        $data["pembeli"] = $pembeli;
        $data[strtolower("Pembeli")] = $pembeli;

        return view('pembeli.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $this->validate($request, [
            'nama' => 'required|max:30'
        ]);

        $requestData = $request->all();


        $pembeli->update($request->except(['from_dashboard']));

        return redirect()->route('pembeli.index')->with('success', 'Berhasil mengubah Pembeli');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pembeli $pembeli)
    {
        $pembeli->delete();

        return redirect()->route('pembeli.index')->with('success', 'Pembeli berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pembelis = Pembeli::whereIn('id', json_decode($request->ids, true))->get();

        Pembeli::whereIn('id', $pembelis->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pembeli');
    }

    public function laporan()
    {

        return view('pembeli.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Pembeli)->getTable();
        $object = (new Pembeli);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["pembelis"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["pembelis"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("pembeli.laporan.print", $data);
    }
}