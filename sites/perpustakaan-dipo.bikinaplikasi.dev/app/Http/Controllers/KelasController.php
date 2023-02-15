<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['kelas'] = Kelas::paginate(1000);

        $data['kelas_count'] = count(Schema::getColumnListing('kelas'));

        return view('kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('kelas.create');
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
			'nama' => 'required|max:15|unique:kelas,nama'
		]);
        $requestData = $request->all();

        

        Kelas::create($requestData);

        return redirect()->route('kelas.index')->with('success', 'Berhasil menambah Kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Kelas $kelas)
    {
        $data["item"] = $kelas;
        $data["kelas"] = $kelas;

        return view('kelas.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Kelas $kelas)
    {
        $data["kelas"] = $kelas;
        $data[strtolower("Kelas")] = $kelas;

        return view('kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Kelas $kelas)
    {
        $this->validate($request, [
			'nama' => "required|max:15|unique:kelas,nama,$request->nama,nama"
		]);

        $requestData = $request->all();

        

        $kelas->update($requestData);

        return redirect()->route('kelas.index')->with('success', 'Berhasil mengubah Kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $kelass = Kelas::whereIn('id', json_decode($request->ids, true))->get();

        Kelas::whereIn('id', $kelass->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kelas');
    }

    public function laporan()
    {

        return view('kelas.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Kelas)->getTable();
        $object = (new Kelas);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["kelass"] = $object->orderBy($request->field, $request->order)->get();

        if(!$data["kelass"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("kelas.laporan.print", $data);
    }
}