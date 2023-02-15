<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['mapel'] = Mapel::paginate(1000);

        $data['mapel_count'] = count(Schema::getColumnListing('mapel'));

        return view('mapel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('mapel.create');
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
            'nama' => 'required|max:30|unique:mapel,nama'
        ]);
        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move("gambar", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        Mapel::create($requestData);

        return redirect()->route('mapel.index')->with('success', 'Berhasil menambah Mapel');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Mapel $mapel)
    {
        $data["item"] = $mapel;
        $data["mapel"] = $mapel;

        return view('mapel.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Mapel $mapel)
    {
        $data["mapel"] = $mapel;
        $data[strtolower("Mapel")] = $mapel;

        return view('mapel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Mapel $mapel)
    {
        $this->validate($request, [
            'nama' => "required|max:30|unique:mapel,nama,$mapel->nama,nama"
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move("gambar", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        $mapel->update($requestData);

        return redirect()->route('mapel.index')->with('success', 'Berhasil mengubah Mapel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $mapels = Mapel::whereIn('id', json_decode($request->ids, true))->get();

        Mapel::whereIn('id', $mapels->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data mapel');
    }

    public function laporan()
    {

        return view('mapel.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Mapel)->getTable();
        $object = (new Mapel);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["mapels"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["mapels"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("mapel.laporan.print", $data);
    }
}