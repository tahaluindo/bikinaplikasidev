<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Kategori;
use App\Models\Kavling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KavlingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['kavling'] = Kavling::paginate(1000);

        $data['kavling_count'] = count(Schema::getColumnListing('kavling'));

        return view('kavling.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['kategori'] = Kategori::pluck("nama", 'id');

        return view('kavling.create', $data);
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
            'kategori_id' => 'required|exists:kategori,id',
            'luas_tanah' => 'required',
            'nomor_kavling' => 'required',
            'harga' => 'required',
            'status' => 'required|in:Terjual,Belum Terjual',
            'ukuran' => 'required',
            'tipe' => 'required',
            'no_ppjb' => 'required|max:255',
            'no_ajb' => 'required',
            'angsuran' => 'required',
            'blok' => 'required',
        ]);
        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('gambar'));
        }


        Kavling::create($requestData);

        return redirect()->route('kavling.index')->with('success', 'Berhasil menambah Kavling');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Kavling $kavling)
    {
        $data["item"] = $kavling;
        $data["kavling"] = $kavling;

        return view('kavling.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Kavling $kavling)
    {
        $data["kavling"] = $kavling;
        $data[strtolower("Kavling")] = $kavling;
        $data['kategori'] = Kategori::pluck("nama", 'id');

        return view('kavling.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Kavling $kavling)
    {
        $this->validate($request, [
            'kategori_id' => 'required|exists:kategori,id',
            'luas_tanah' => 'required',
            'nomor_kavling' => 'required',
            'harga' => 'required',
            'status' => 'required|in:Terjual,Belum Terjual',
            'ukuran' => 'required',
            'tipe' => 'required',
            'no_ppjb' => 'required|max:255',
            'no_ajb' => 'required',
            'angsuran' => 'required',
            'blok' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('gambar'));
        }

        $kavling->update($requestData);

        return redirect()->route('kavling.index')->with('success', 'Berhasil mengubah Kavling');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Kavling $kavling)
    {
        $kavling->delete();

        return redirect()->route('kavling.index')->with('success', 'Kavling berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $kavlings = Kavling::whereIn('id', json_decode($request->ids, true))->get();

        Kavling::whereIn('id', $kavlings->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kavling');
    }

    public function laporan()
    {

        return view('kavling.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Kavling)->getTable();
        $object = (new Kavling);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["kavlings"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["kavlings"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("kavling.laporan.print", $data);
    }
}