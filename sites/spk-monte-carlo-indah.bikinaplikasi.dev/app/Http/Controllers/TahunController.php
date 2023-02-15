<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['tahun'] = tahun::paginate(1000);

        $data['tahun_count'] = count(Schema::getColumnListing('tahun'));

        return view('tahun.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tahun.create');
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
			'tahun' => 'required'
		]);
        $requestData = $request->all();
     
        tahun::create($requestData);

        return redirect()->route('tahun.index')->with('success', 'Berhasil menambah tahun');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(tahun $tahun)
    {
        $data["item"] = $tahun;
        $data["tahun"] = $tahun;

        return view('tahun.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(tahun $tahun)
    {
        $data["tahun"] = $tahun;
        $data[strtolower("tahun")] = $tahun;

        return view('tahun.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, tahun $tahun)
    {
        $this->validate($request, [
			'tahun' => 'required'
		]);

        $requestData = $request->all();

        

        $tahun->update($requestData);

        return redirect()->route('tahun.index')->with('success', 'Berhasil mengubah tahun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(tahun $tahun)
    {
        $tahun->delete();

        return redirect()->route('tahun.index')->with('success', 'tahun berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $tahuns = tahun::whereIn('id', json_decode($request->ids, true))->get();

        tahun::whereIn('id', $tahuns->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data tahun');
    }

    public function laporan()
    {

        return view('tahun.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new tahun)->getTable();
        $object = (new tahun);

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

        $data["tahuns"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["tahuns"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("tahun.laporan.print", $data);
    }
}