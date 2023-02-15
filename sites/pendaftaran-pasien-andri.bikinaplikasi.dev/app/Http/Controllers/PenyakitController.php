<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['penyakit'] = Penyakit::paginate(1000);

        $data['penyakit_count'] = count(Schema::getColumnListing('penyakit'));

        return view('penyakit.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('penyakit.create');
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

        

        Penyakit::create($requestData);

        return redirect()->route('penyakit.index')->with('success', 'Berhasil menambah Penyakit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Penyakit $penyakit)
    {
        $data["item"] = $penyakit;
        $data["penyakit"] = $penyakit;

        return view('penyakit.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Penyakit $penyakit)
    {
        $data["penyakit"] = $penyakit;
        $data[strtolower("Penyakit")] = $penyakit;

        return view('penyakit.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Penyakit $penyakit)
    {
        

        $requestData = $request->all();

        

        $penyakit->update($requestData);

        return redirect()->route('penyakit.index')->with('success', 'Berhasil mengubah Penyakit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $penyakits = Penyakit::whereIn('id', json_decode($request->ids, true))->get();

        Penyakit::whereIn('id', $penyakits->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data penyakit');
    }

    public function laporan()
    {

        return view('penyakit.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Penyakit)->getTable();
        $object = (new Penyakit);

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

        $data["penyakits"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["penyakits"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("penyakit.laporan.print", $data);
    }
}