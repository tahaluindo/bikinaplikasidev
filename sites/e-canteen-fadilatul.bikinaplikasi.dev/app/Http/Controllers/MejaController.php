<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['meja'] = Meja::paginate(1000);

        $data['meja_count'] = count(Schema::getColumnListing('meja'));

        return view('meja.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('meja.create');
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
			'no' => 'required|unique:meja,no'
		]);
        $requestData = $request->all();

        

        Meja::create($requestData);

        return redirect()->route('meja.index')->with('success', 'Berhasil menambah Meja');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Meja $meja)
    {
        $data["item"] = $meja;
        $data["meja"] = $meja;

        return view('meja.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Meja $meja)
    {
        $data["meja"] = $meja;
        $data[strtolower("Meja")] = $meja;

        return view('meja.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Meja $meja)
    {
        $this->validate($request, [
			'no' => 'required|unique:meja,no'
		]);

        $requestData = $request->all();

        

        $meja->update($requestData);

        return redirect()->route('meja.index')->with('success', 'Berhasil mengubah Meja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();

        return redirect()->route('meja.index')->with('success', 'Meja berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $mejas = Meja::whereIn('id', json_decode($request->ids, true))->get();

        Meja::whereIn('id', $mejas->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data meja');
    }

    public function laporan()
    {

        return view('meja.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Meja)->getTable();
        $object = (new Meja);

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

        $data["mejas"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["mejas"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("meja.laporan.print", $data);
    }

}