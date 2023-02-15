<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AnakAsuh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnakAsuhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['anak_asuh'] = AnakAsuh::paginate(1000);
        $data['anak_asuh_count'] = count(Schema::getColumnListing('anak_asuh'));


        return view('anak-asuh.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('anak-asuh.create');
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
            'jk' => 'required|in:Laki - Laki,Perempuan',
            'ttl' => 'required|max:50',
            'status' => 'required|in:Piatu,Yatim,Yatim Piatu,Dhuafa',
            'pendidikan' => 'required|in:TK,SD,SMP,SMA,D3,S1',
        ]);
        
        $requestData = $request->all();

        AnakAsuh::create($requestData);

        return redirect()->route('anak-asuh.index')->with('success', 'Berhasil menambah anak asuh');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(AnakAsuh $anak_asuh)
    {
        $data["item"] = $anak_asuh;
        $data["anak_asuh"] = $anak_asuh;

        return view('anak_asuh.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(AnakAsuh $anak_asuh)
    {
        $data["anak_asuh"] = $anak_asuh;
        
        $data[strtolower("anak_asuh")] = $anak_asuh;

        return view('anak-asuh.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, AnakAsuh $anak_asuh)
    {
        $this->validate($request, [
            'nama' => 'required|max:30',
            'jk' => 'required|in:Laki - Laki,Perempuan',
            'ttl' => 'required|max:50',
            'status' => 'required|in:Piatu,Yatim,Yatim Piatu,Dhuafa',
            'pendidikan' => 'required|in:TK,SD,SMP,SMA,D3,S1',
        ]);

        $requestData = $request->all();

        $anak_asuh->update($requestData);

        return redirect()->route('anak-asuh.index')->with('success', 'Berhasil mengubah Anak Asuh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(AnakAsuh $anak_asuh)
    {
        $anak_asuh->delete();

        return redirect()->route('anak-asuh.index')->with('success', 'AnakAsuh berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $anak_asuhs = AnakAsuh::whereIn('id', json_decode($request->ids, true))->get();

        AnakAsuh::whereIn('id', $anak_asuhs->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data anak-asuh');
    }

    public function laporan()
    {
        $data['limit'] = AnakAsuh::count();

        return view('anak-asuh.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new AnakAsuh)->getTable();
        $object = (new AnakAsuh);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["anak_asuhs"] = $object
            ->orderBy($request->field, $request->order)
            ->limit($request->limit)
            ->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->get();

        if (!$data["anak_asuhs"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("anak-asuh.laporan.print", $data);
    }
}