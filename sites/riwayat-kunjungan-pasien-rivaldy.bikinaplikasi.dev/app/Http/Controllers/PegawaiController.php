<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pegawai'] = Pegawai::paginate(1000);

        $data['pegawai_count'] = count(Schema::getColumnListing('pegawai'));

        return view('pegawai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pegawai_ids = Pegawai::pluck('user_id')->toArray();
        array_push($pegawai_ids, 1);

        $data['users'] = User::whereNotIn('id', $pegawai_ids)->pluck('name', 'id');

        return view('pegawai.create', $data);
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
        
        $requestData = $request->all();

        

        Pegawai::create($requestData);

        return redirect()->route('pegawai.index')->with('success', 'Berhasil menambah Pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pegawai $pegawai)
    {
        $data["item"] = $pegawai;
        $data["pegawai"] = $pegawai;

        return view('pegawai.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pegawai $pegawai)
    {
        $data["pegawai"] = $pegawai;
        $data[strtolower("Pegawai")] = $pegawai;
        $data['users'] = User::where('id', '!=', '1')->pluck('name', 'id');

        return view('pegawai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        

        $requestData = $request->all();

        

        $pegawai->update($requestData);

        return redirect()->route('pegawai.index')->with('success', 'Berhasil mengubah Pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pegawais = Pegawai::whereIn('id', json_decode($request->ids, true))->get();

        Pegawai::whereIn('id', $pegawais->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pegawai');
    }

    public function laporan()
    {

        return view('pegawai.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Pegawai)->getTable();
        $object = (new Pegawai);

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

        $data["pegawais"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["pegawais"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pegawai.laporan.print", $data);
    }
}