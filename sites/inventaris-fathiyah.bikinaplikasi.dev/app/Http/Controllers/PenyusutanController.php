<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Barang;
use App\Models\Penyusutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PenyusutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['penyusutan'] = Penyusutan::paginate(1000);

        $data['penyusutan_count'] = count(Schema::getColumnListing('penyusutan'));

        return view('penyusutan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['barang'] = Barang::findOrFail(request()->barang_id);
        $penyusutan = Penyusutan::where('barang_id', request()->barang_id)->orderBy('tahun_ke', 'DESC')->first();
        $data['tahun_ke'] = $penyusutan ? $penyusutan->tahun_ke + 1 : 1; 
        $data['jumlah'] = $data['barang']->nilai_perolehan * ($data['barang']->penyusutan_per_tahun / 100); 
        
        if($data['tahun_ke'] > $data['barang']->umur_manfaat) {
            
            die('Umur manfaat sudah habis!');
        }
        
        return view('penyusutan.create', $data);
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
			'barang_id' => 'required|exists:barang,id',
			'tahun_ke' => 'required',
			'jumlah' => 'required'
		]);
        $requestData = $request->all();
        
        Penyusutan::create($requestData);

        return redirect()->route('barang.show', $request->barang_id)->with('success', 'Berhasil menambah Penyusutan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Penyusutan $penyusutan)
    {
        $data["item"] = $penyusutan;
        $data["penyusutan"] = $penyusutan;

        return view('penyusutan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Penyusutan $penyusutan)
    {
        $data["penyusutan"] = $penyusutan;
        $data[strtolower("Penyusutan")] = $penyusutan;
        $data['barang'] = Barang::pluck('nama', 'id');

        return view('penyusutan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Penyusutan $penyusutan)
    {
        $this->validate($request, [
			'barang_id' => 'required|exists:barang,id',
			'tahun_ke' => 'required',
			'jumlah' => 'required'
		]);

        $requestData = $request->all();

        $penyusutan->update($requestData);

        return redirect()->route('penyusutan.index')->with('success', 'Berhasil mengubah Penyusutan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Penyusutan $penyusutan)
    {
        $penyusutan->delete();

        return redirect()->route('penyusutan.index')->with('success', 'Penyusutan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $penyusutans = Penyusutan::whereIn('id', json_decode($request->ids, true))->get();

        Penyusutan::whereIn('id', $penyusutans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data penyusutan');
    }

    public function laporan()
    {
        $data['limit'] = Penyusutan::count();

        return view('penyusutan.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Penyusutan)->getTable();
        $object = (new Penyusutan);

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

        $data["penyusutans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["penyusutans"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("penyusutan.laporan.print", $data);
    }
}