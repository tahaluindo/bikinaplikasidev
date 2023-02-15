<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['satuan'] = Satuan::paginate(1000);

        $data['satuan_count'] = count(Schema::getColumnListing('satuan'));

        return view('satuan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('satuan.create');
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
			'nama' => 'required'
		]);
        $requestData = $request->all();

        

        Satuan::create($requestData);

        return redirect()->route('satuan.index')->with('success', 'Berhasil menambah Satuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Satuan $satuan)
    {
        $data["item"] = $satuan;
        $data["satuan"] = $satuan;

        return view('satuan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Satuan $satuan)
    {
        $data["satuan"] = $satuan;
        $data[strtolower("Satuan")] = $satuan;

        return view('satuan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Satuan $satuan)
    {
        $this->validate($request, [
			'nama' => 'required'
		]);

        $requestData = $request->all();

        

        $satuan->update($requestData);

        return redirect()->route('satuan.index')->with('success', 'Berhasil mengubah Satuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Satuan $satuan)
    {
        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $satuans = Satuan::whereIn('id', json_decode($request->ids, true))->get();

        Satuan::whereIn('id', $satuans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data satuan');
    }

    public function laporan()
    {
        $data['limit'] = Satuan::count();

        return view('satuan.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Satuan)->getTable();
        $object = (new Satuan);

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

        $data["satuans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["satuans"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("satuan.laporan.print", $data);
    }
}