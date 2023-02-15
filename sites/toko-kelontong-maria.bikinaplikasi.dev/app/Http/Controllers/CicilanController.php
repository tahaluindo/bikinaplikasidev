<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cicilan;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CicilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['cicilan'] = Cicilan::paginate(1000);

        $data['cicilan_count'] = count(Schema::getColumnListing('cicilan'));

        return view('cicilan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cicilan.create');
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
            'tagihan_id' => 'required|exists:tagihan,id',
            'jumlah' => 'required|min:1'
        ]);
        $requestData = $request->except(['from_tagihan_tambah']);

        $requestData['cicilan_ke'] = Cicilan::get()->last() ? Cicilan::get()->last()->cicilan_ke + 1 : 1;

        $tagihan = Tagihan::findOrFail($request->tagihan_id);
        $cicilan = Cicilan::where('tagihan_id', $tagihan->id)->get();

        if ($tagihan->total - $request->jumlah < 0) {

            return redirect()->back()->with('error', 'Bayaran terlalu besar, Sisa ' . toIdr($tagihan->total));
        }

        Cicilan::create($requestData);
        if ($tagihan->total - $request->jumlah == 0) {
            $tagihan->update([
                'status' => 'Lunas'
            ]);

            $tagihan->decrement('total', $request->jumlah);
            return redirect()->back()->with('success', 'Tagihan berhasil dilunaskan');
        }

        if ($request->from_tagihan_tambah) {
            $tagihan->decrement('total', $request->jumlah);

            return redirect()->back()->with('success', 'Berhasil menambah Cicilan');
        }

        return redirect()->route('cicilan.index')->with('success', 'Berhasil menambah Cicilan');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Cicilan $cicilan)
    {
        $data["item"] = $cicilan;
        $data["cicilan"] = $cicilan;

        return view('cicilan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Cicilan $cicilan)
    {
        $data["cicilan"] = $cicilan;
        $data[strtolower("Cicilan")] = $cicilan;

        return view('cicilan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Cicilan $cicilan)
    {
        $this->validate($request, [
            'tagihan_id' => 'required|exists:produk,id',
            'jumlah' => 'required|min:1'
        ]);

        $requestData = $request->all();


        $cicilan->update($requestData);

        return redirect()->route('cicilan.index')->with('success', 'Berhasil mengubah Cicilan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Cicilan $cicilan)
    {
        $cicilan->delete();

        return redirect()->route('cicilan.index')->with('success', 'Cicilan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $cicilans = Cicilan::whereIn('id', json_decode($request->ids, true))->get();

        Cicilan::whereIn('id', $cicilans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data cicilan');
    }

    public function laporan()
    {

        return view('cicilan.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Cicilan)->getTable();
        $object = (new Cicilan);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["cicilans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["cicilans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("cicilan.laporan.print", $data);
    }

}