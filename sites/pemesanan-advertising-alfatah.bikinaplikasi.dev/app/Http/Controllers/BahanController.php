<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['bahan'] = Bahan::paginate();

        $data['bahan_count'] = count(Schema::getColumnListing('bahan'));

        return view('bahan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bahan.create');
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
            'nama' => 'required|unique:bahan,nama',
            'harga_beli' => 'required',
            'stok' => 'required',
        ]);
        $requestData = $request->all();

        Bahan::create($requestData);

        return redirect()->route('bahan.index')->with('success', 'Berhasil menambah Bahan');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Bahan $bahan)
    {
        $data["item"] = $bahan;
        $data["bahan"] = $bahan;

        return view('bahan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Bahan $bahan)
    {
        $data["bahan"] = $bahan;
        $data[strtolower("Bahan")] = $bahan;

        return view('bahan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Bahan $bahan)
    {
        $this->validate($request, [
            'nama' => "required|unique:bahan,nama,$bahan->nama,nama",
            'harga_beli' => 'required',
            'stok' => 'required',

        ]);

        $requestData = $request->all();

        $bahan->update($requestData);

        return redirect()->route('bahan.index')->with('success', 'Berhasil mengubah Bahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Bahan $bahan)
    {
        $bahan->delete();

        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $bahans = Bahan::whereIn('id', json_decode($request->ids, true))->get();

        Bahan::whereIn('id', $bahans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data bahan');
    }

    public function laporan()
    {
        $data['limit'] = Bahan::count();

        return view('bahan.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Bahan)->getTable();
        $object = (new Bahan);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["bahans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["bahans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("bahan.laporan.print", $data);
    }

    public function getBahan(Request $request)
    {
        return json_encode(Bahan::findOrFail($request->bahan_id));
    }
}