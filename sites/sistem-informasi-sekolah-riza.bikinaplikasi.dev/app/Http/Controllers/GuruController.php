<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['guru'] = Guru::paginate(1000);

        $data['guru_count'] = count(Schema::getColumnListing('guru'));

        return view('guru.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('guru.create');
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
			'nip' => "",
			'nama' => 'required|max:30',
			'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
			'alamat' => 'required|max:255',
			'lulusan' => 'required',
		]);
        $requestData = $request->all();

        
        if ($request->hasFile('foto')) {
            $requestData['foto'] = str_replace("\\", "/", $request->file('foto')->move("foto", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('foto')->getClientOriginalExtension()));
        }

        Guru::create($requestData);

        return redirect()->route('guru.index')->with('success', 'Berhasil menambah Guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Guru $guru)
    {
        $data["item"] = $guru;
        $data["guru"] = $guru;

        return view('guru.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Guru $guru)
    {
        $data["guru"] = $guru;
        $data[strtolower("Guru")] = $guru;

        return view('guru.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Guru $guru)
    {
        $this->validate($request, [
			'nip' => "",
			'nama' => 'required|max:30',
			'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
			'alamat' => 'required|max:255',
			'lulusan' => 'required'
		]);

        $requestData = $request->all();

        if ($request->hasFile('foto')) {
            $requestData['foto'] = str_replace("\\", "/", $request->file('foto')->move("foto", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('foto')->getClientOriginalExtension()));
        }

        $guru->update($requestData);

        return redirect()->route('guru.index')->with('success', 'Berhasil mengubah Guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $gurus = Guru::whereIn('id', json_decode($request->ids, true))->get();

        Guru::whereIn('id', $gurus->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data guru');
    }

    public function laporan()
    {

        return view('guru.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Guru)->getTable();
        $object = (new Guru);

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

        $data["gurus"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["gurus"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("guru.laporan.print", $data);
    }
}