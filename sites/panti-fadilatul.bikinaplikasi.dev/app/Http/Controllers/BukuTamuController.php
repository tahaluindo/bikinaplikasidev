<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['buku_tamu'] = BukuTamu::paginate(1000);

        $data['buku_tamu_count'] = count(Schema::getColumnListing('buku_tamu'));

        return view('buku-tamu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('buku-tamu.create');
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
			'pesan_kesan' => 'required|max:255'
		]);
        
        $requestData = $request->all();
        
        BukuTamu::create($requestData);
        
        echo "<script>alert('Berhasil menambah buku tamu'); location.href = '/';</script>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(BukuTamu $buku_tamu)
    {
        $data["item"] = $buku_tamu;
        $data["buku-tamu"] = $buku_tamu;

        return view('buku-tamu.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(BukuTamu $buku_tamu)
    {
        $data["buku-tamu"] = $buku_tamu;
        $data[strtolower("BukuTamu")] = $buku_tamu;

        return view('buku-tamu.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, BukuTamu $buku_tamu)
    {
        $this->validate($request, [
			'nama' => 'required|max:30',
			'pesan_kesan' => 'required|max:255'
		]);

        $requestData = $request->all();

        

        $buku_tamu->update($requestData);

        return redirect()->route('buku-tamu.index')->with('success', 'Berhasil mengubah BukuTamu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(BukuTamu $buku_tamu)
    {
        $buku_tamu->delete();

        return redirect()->route('buku-tamu.index')->with('success', 'BukuTamu berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $buku_tamus = BukuTamu::whereIn('id', json_decode($request->ids, true))->get();

        BukuTamu::whereIn('id', $buku_tamus->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data buku-tamu');
    }

    public function laporan()
    {

        return view('buku-tamu.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new BukuTamu)->getTable();
        $object = (new BukuTamu);

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

        $data["buku-tamus"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["buku-tamus"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("buku-tamu.laporan.print", $data);
    }
}