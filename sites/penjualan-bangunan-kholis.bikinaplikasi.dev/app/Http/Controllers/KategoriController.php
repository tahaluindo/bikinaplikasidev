<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['kategori'] = Kategori::paginate(1000);

        $data['kategori_count'] = count(Schema::getColumnListing('kategori'));

        return view('kategori.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('kategori.create');
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
			'nama' => 'required|max:30',
		]);
        $requestData = $request->all();

        

        Kategori::create($requestData);

        return redirect()->route('kategori.index')->with('success', 'Berhasil menambah Kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Kategori $kategori)
    {
        $data["item"] = $kategori;
        $data["kategori"] = $kategori;

        return view('kategori.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Kategori $kategori)
    {
        $data["kategori"] = $kategori;
        $data[strtolower("Kategori")] = $kategori;

        return view('kategori.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request, [
			'nama' => 'required|max:30',
		]);

        $requestData = $request->all();

        

        $kategori->update($requestData);

        return redirect()->route('kategori.index')->with('success', 'Berhasil mengubah Kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $kategoris = Kategori::whereIn('id', json_decode($request->ids, true))->get();

        Kategori::whereIn('id', $kategoris->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kategori');
    }

    public function laporan()
    {
        $data['limit'] = Kategori::count();

        return view('kategori.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Kategori)->getTable();
        $object = (new Kategori);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["kategoris"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["kategoris"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("kategori.laporan.print", $data);
    }
}