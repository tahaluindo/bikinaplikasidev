<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pemasok'] = Pemasok::paginate(1000);

        $data['pemasok_count'] = count(Schema::getColumnListing('pemasok'));

        return view('pemasok.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pemasok.create');
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
			'no_hp' => 'required|max:15',
			'alamat' => 'required|max:255'
		]);
        $requestData = $request->all();

        

        Pemasok::create($requestData);

        return redirect()->route('pemasok.index')->with('success', 'Berhasil menambah Pemasok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pemasok $pemasok)
    {
        $data["item"] = $pemasok;
        $data["pemasok"] = $pemasok;

        return view('pemasok.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pemasok $pemasok)
    {
        $data["pemasok"] = $pemasok;
        $data[strtolower("Pemasok")] = $pemasok;

        return view('pemasok.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pemasok $pemasok)
    {
        $this->validate($request, [
			'nama' => 'required|max:30',
			'no_hp' => 'required|max:15',
			'alamat' => 'required|max:255'
		]);

        $requestData = $request->all();

        

        $pemasok->update($requestData);

        return redirect()->route('pemasok.index')->with('success', 'Berhasil mengubah Pemasok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pemasok $pemasok)
    {
        $pemasok->delete();

        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pemasoks = Pemasok::whereIn('id', json_decode($request->ids, true))->get();

        Pemasok::whereIn('id', $pemasoks->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pemasok');
    }

    public function laporan()
    {
        $data['limit'] = Pemasok::count();

        return view('pemasok.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Pemasok)->getTable();
        $object = (new Pemasok);

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

        $data["pemasoks"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["pemasoks"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pemasok.laporan.print", $data);
    }
}