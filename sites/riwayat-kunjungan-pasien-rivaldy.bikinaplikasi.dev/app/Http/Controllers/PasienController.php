<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pasien'] = Pasien::paginate(1000);

        $data['pasien_count'] = count(Schema::getColumnListing('pasien'));

        return view('pasien.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pasien.create');
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

        

        Pasien::create($requestData);

        return redirect()->route('pasien.index')->with('success', 'Berhasil menambah Pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pasien $pasien)
    {
        $data["item"] = $pasien;
        $data["pasien"] = $pasien;

        return view('pasien.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pasien $pasien)
    {
        $data["pasien"] = $pasien;
        $data[strtolower("Pasien")] = $pasien;

        return view('pasien.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pasien $pasien)
    {
        

        $requestData = $request->all();

        

        $pasien->update($requestData);

        return redirect()->route('pasien.index')->with('success', 'Berhasil mengubah Pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pasiens = Pasien::whereIn('id', json_decode($request->ids, true))->get();

        Pasien::whereIn('id', $pasiens->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pasien');
    }

    public function laporan()
    {

        return view('pasien.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Pasien)->getTable();
        $object = (new Pasien);

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

        $data["pasiens"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["pasiens"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pasien.laporan.print", $data);
    }
}