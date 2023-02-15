<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['paket'] = Paket::paginate(1000);

        $data['paket_count'] = count(Schema::getColumnListing('paket'));

        return view('paket.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('paket.create');
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
			'satuan' => 'required|in:Satuan,Kg',
			'harga' => 'required',
			'minimal' => 'required',
			'lama_pengerjaan' => 'required',
		]);
        
        $requestData = $request->all();

        Paket::create($requestData);

        return redirect()->route('paket.index')->with('success', 'Berhasil menambah Paket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Paket $paket)
    {
        $data["item"] = $paket;
        $data["paket"] = $paket;

        return view('paket.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Paket $paket)
    {
        $data["paket"] = $paket;
        $data[strtolower("Paket")] = $paket;

        return view('paket.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Paket $paket)
    {
        $this->validate($request, [
			'nama' => 'required|max:30',
			'satuan' => 'required|in:Satuan,Kg',
			'harga' => 'required',
			'minimal' => 'required',
			'lama_pengerjaan' => 'required',
		]);

        $requestData = $request->all();

        $paket->update($requestData);

        return redirect()->route('paket.index')->with('success', 'Berhasil mengubah Paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Paket $paket)
    {
        $paket->delete();

        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pakets = Paket::whereIn('id', json_decode($request->ids, true))->get();

        Paket::whereIn('id', $pakets->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data paket');
    }

    public function laporan()
    {
        $data['limit'] = Paket::count();

        return view('paket.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Paket)->getTable();
        $object = (new Paket);

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

        $data["pakets"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["pakets"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("paket.laporan.print", $data);
    }
}