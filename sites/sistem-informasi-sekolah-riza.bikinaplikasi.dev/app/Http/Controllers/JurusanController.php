<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['jurusan'] = Jurusan::paginate(1000);

        $data['jurusan_count'] = count(Schema::getColumnListing('jurusan'));

        return view('jurusan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('jurusan.create');
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
			'nama' => 'required|max:30|unique:jurusan,nama',
			'keterangan' => 'required|max:30'
		]);
        $requestData = $request->all();

        

        Jurusan::create($requestData);

        return redirect()->route('jurusan.index')->with('success', 'Berhasil menambah Jurusan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Jurusan $jurusan)
    {
        $data["item"] = $jurusan;
        $data["jurusan"] = $jurusan;

        return view('jurusan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Jurusan $jurusan)
    {
        $data["jurusan"] = $jurusan;
        $data[strtolower("Jurusan")] = $jurusan;

        return view('jurusan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $this->validate($request, [
			'nama' => "required|max:30|unique:jurusan,nama,$jurusan->nama,nama",
			'keterangan' => 'required|max:30'
		]);

        $requestData = $request->all();

        

        $jurusan->update($requestData);

        return redirect()->route('jurusan.index')->with('success', 'Berhasil mengubah Jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $jurusans = Jurusan::whereIn('id', json_decode($request->ids, true))->get();

        Jurusan::whereIn('id', $jurusans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data jurusan');
    }

    public function laporan()
    {

        return view('jurusan.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Jurusan)->getTable();
        $object = (new Jurusan);

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

        $data["jurusans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["jurusans"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("jurusan.laporan.print", $data);
    }
}