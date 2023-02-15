<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pelanggan'] = Pelanggan::paginate(1000);

        $data['pelanggan_count'] = count(Schema::getColumnListing('pelanggan'));

        return view('pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pelanggan.create');
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
			'no_hp' => 'required|max:15'
		]);
        $requestData = $request->all();

        

        Pelanggan::create($requestData);

        return redirect()->route('pelanggan.index')->with('success', 'Berhasil menambah Pelanggan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pelanggan $pelanggan)
    {
        $data["item"] = $pelanggan;
        $data["pelanggan"] = $pelanggan;

        return view('pelanggan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pelanggan $pelanggan)
    {
        $data["pelanggan"] = $pelanggan;
        $data[strtolower("Pelanggan")] = $pelanggan;

        return view('pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $this->validate($request, [
			'nama' => 'required|max:30',
			'no_hp' => 'required|max:15'
		]);

        $requestData = $request->all();

        

        $pelanggan->update($requestData);

        return redirect()->route('pelanggan.index')->with('success', 'Berhasil mengubah Pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pelanggans = Pelanggan::whereIn('id', json_decode($request->ids, true))->get();

        Pelanggan::whereIn('id', $pelanggans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pelanggan');
    }

    public function laporan()
    {
        $data['limit'] = Pelanggan::count();

        return view('pelanggan.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Pelanggan)->getTable();
        $object = (new Pelanggan);

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

        $data["pelanggans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["pelanggans"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pelanggan.laporan.print", $data);
    }
}