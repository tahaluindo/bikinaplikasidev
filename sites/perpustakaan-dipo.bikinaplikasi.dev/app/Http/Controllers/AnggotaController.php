<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Requests;

use App\Models\Anggotum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['anggota'] = Anggotum::paginate(1000);

        $data['anggota_count'] = count(Schema::getColumnListing('anggota'));

        return view('anggota.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['kelass'] = Kelas::pluck('nama', 'id');
        

        return view('anggota.create', $data);
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
			'no_induk' => 'required|max:20|unique:anggota,no_induk',
			'nama' => 'required|max:30',
			'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
			'alamat' => 'required|max:100',
			'no_telepon' => 'required|max:15',
			'status' => 'required|in:Aktif,Tidak Aktif'
		]);
        $requestData = $request->all();
        $requestData['dibuat'] = date('d-M-Y');
        

        Anggotum::create($requestData);

        return redirect()->route('anggota.index')->with('success', 'Berhasil menambah Anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Anggotum $anggota)
    {
        $data["item"] = $anggota;
        $data["anggota"] = $anggota;

        return view('anggota.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Anggotum $anggota)
    {
        $data["anggota"] = $anggota;
        $data[strtolower("Anggotum")] = $anggota;
        $data['kelass'] = Kelas::pluck('nama', 'id');

        return view('anggota.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Anggotum $anggota)
    {
        $this->validate($request, [
			'no_induk' => "required|max:20|unique:anggota,no_induk,$anggota->no_induk,no_induk",
			'nama' => 'required|max:30',
			'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
			'alamat' => 'required|max:100',
			'no_telepon' => 'required|max:15',
			'status' => 'required|in:Aktif,Tidak Aktif'
		]);

        $requestData = $request->all();

        $anggota->update($requestData);

        return redirect()->route('anggota.index')->with('success', 'Berhasil mengubah Anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Anggotum $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggotum berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $anggotas = Anggotum::whereIn('id', json_decode($request->ids, true))->get();

        Anggotum::whereIn('id', $anggotas->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data anggota');
    }

    public function laporan()
    {
        $data['anggotas'] = Anggotum::limit(1000)->get();

        return view('anggota.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Anggotum)->getTable();
        $object = (new Anggotum);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["anggotas"] = $object->orderBy($request->field, $request->order)
        ->where('jenis_kelamin', 'like', "%$request->jenis_kelamin%")
        ->Where('status', 'like', "$request->status%")->get();

        if(!$data["anggotas"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("anggota.laporan.print", $data);
    }
}