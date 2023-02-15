<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['jenjang'] = Jenjang::paginate(1000);

        $data['jenjang_count'] = count(Schema::getColumnListing('jenjang'));

        return view('jenjang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('jenjang.create');
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
            'nama' => 'required|max:30|unique:jenjang,nama',
            'keterangan' => 'required|max:30',
            'gambar' => 'required'
        ]);
        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move("gambar", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        Jenjang::create($requestData);

        return redirect()->route('jenjang.index')->with('success', 'Berhasil menambah Jenjang');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Jenjang $jenjang)
    {
        $data["item"] = $jenjang;
        $data["jenjang"] = $jenjang;

        return view('jenjang.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Jenjang $jenjang)
    {
        $data["jenjang"] = $jenjang;
        $data[strtolower("Jenjang")] = $jenjang;

        return view('jenjang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Jenjang $jenjang)
    {
        $this->validate($request, [
            'nama' => "required|max:30|unique:jenjang,nama,$jenjang->nama,nama",
            'keterangan' => 'required|max:30'
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move("gambar", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        $jenjang->update($requestData);

        return redirect()->route('jenjang.index')->with('success', 'Berhasil mengubah Jenjang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Jenjang $jenjang)
    {
        $jenjang->delete();

        return redirect()->route('jenjang.index')->with('success', 'Jenjang berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $jenjangs = Jenjang::whereIn('id', json_decode($request->ids, true))->get();

        Jenjang::whereIn('id', $jenjangs->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data jenjang');
    }

    public function laporan()
    {

        return view('jenjang.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Jenjang)->getTable();
        $object = (new Jenjang);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["jenjangs"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["jenjangs"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("jenjang.laporan.print", $data);
    }
}