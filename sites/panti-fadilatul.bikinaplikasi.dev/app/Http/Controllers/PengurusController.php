<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pengurus'] = Pengurus::paginate(1000);

        $data['pengurus_count'] = count(Schema::getColumnListing('pengurus'));

        return view('pengurus.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pengurus.create');
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
			'jabatan' => 'required|in:Ketua,Sekretaris,Pengasuh,Bendahara,Wakil Kepala,Pembangunan,Pendidikan,Perlengkapan Inventaris,kesehatan Dan Kesejahteraan,Pengkaderan,Keterampilan',
			'jk' => 'required|in:Laki - Laki,Perempuan',
			'ttl' => 'required|max:50',
			'alamat' => 'required|max:255',
			'no_hp' => 'required|max:15'
		]);
        
        $requestData = $request->all();

        Pengurus::create($requestData);

        return redirect()->route('pengurus.index')->with('success', 'Berhasil menambah Penguru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pengurus $pengurus)
    {
        $data["item"] = $pengurus;
        $data["pengurus"] = $pengurus;

        return view('pengurus.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pengurus $pengurus)
    {
        $data["pengurus"] = $pengurus;
        $data[strtolower("Penguru")] = $pengurus;

        return view('pengurus.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pengurus $pengurus)
    {
        $this->validate($request, [
			'jabatan' => 'required|in:Ketua,Sekretaris,Pengasuh,Bendahara,Wakil Kepala,Pembangunan,Pendidikan,Perlengkapan Inventaris,kesehatan Dan Kesejahteraan,Pengkaderan,Keterampilan',
			'jk' => 'required|in:Laki - Laki,Perempuan',
			'ttl' => 'required|max:50',
			'alamat' => 'required|max:255',
			'no_hp' => 'required|max:15'
		]);

        $requestData = $request->all();

        $pengurus->update($requestData);

        return redirect()->route('pengurus.index')->with('success', 'Berhasil mengubah Penguru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pengurus $pengurus)
    {
        $pengurus->delete();

        return redirect()->route('pengurus.index')->with('success', 'Penguru berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $penguruss = Pengurus::whereIn('id', json_decode($request->ids, true))->get();

        Pengurus::whereIn('id', $penguruss->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pengurus');
    }

    public function laporan()
    {

        return view('pengurus.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Penguru)->getTable();
        $object = (new Penguru);

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

        $data["penguruss"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["penguruss"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pengurus.laporan.print", $data);
    }
}