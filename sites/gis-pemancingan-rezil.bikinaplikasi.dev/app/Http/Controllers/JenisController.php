<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['jenis'] = Jenis::paginate(1000);

        $data['jenis_count'] = count(Schema::getColumnListing('jenis'));

        return view('jenis.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('jenis.create');
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
			'nama' => 'required|max:50',
		]);
        $requestData = $request->all();

        

        Jenis::create($requestData);

        return redirect()->route('jenis.index')->with('success', 'Berhasil menambah Jenis');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Jenis $jenis)
    {
        $data["item"] = $jenis;
        $data["jenis"] = $jenis;

        return view('jenis.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Jenis $jenis)
    {
        $data["jenis"] = $jenis;
        $data[strtolower("Jenis")] = $jenis;

        return view('jenis.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Jenis $jenis)
    {
        $this->validate($request, [
			'nama' => 'required|max:50',
		]);

        $requestData = $request->all();

        

        $jenis->update($requestData);

        return redirect()->route('jenis.index')->with('success', 'Berhasil mengubah Jenis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Jenis $jenis)
    {
        $jenis->delete();

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $jeniss = Jenis::whereIn('id', json_decode($request->ids, true))->get();

        Jenis::whereIn('id', $jeniss->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data jenis');
    }

    public function laporan()
    {
        $data['limit'] = Jenis::count();

        return view('jenis.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Jenis)->getTable();
        $object = (new Jenis);

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

        $data["jeniss"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["jeniss"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("jenis.laporan.print", $data);
    }
}