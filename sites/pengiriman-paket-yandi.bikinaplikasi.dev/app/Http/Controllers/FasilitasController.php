<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Mobil;
use App\Fasilitas;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['fasilitas'] = Fasilitas::paginate(1000);

        $data['fasilitas_count'] = count(Schema::getColumnListing('fasilitas'));

        return view('fasilitas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('fasilitas.create');
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
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $requestData = $request->all();

        Fasilitas::create($requestData);

        return redirect()->route('fasilitas.index')->with('success', 'Berhasil menambah pengiriman paket');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Fasilitas $fasilitas)
    {
        $data["item"] = $fasilitas;
        $data["fasilitas"] = $fasilitas;

        return view('fasilitas.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Fasilitas $fasilitas)
    {
        $data["fasilitas"] = $fasilitas;

        return view('fasilitas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $requestData = $request->all();

        $fasilitas->update($requestData);

        return redirect()->route('fasilitas.index')->with('success', 'Berhasil mengubah pengiriman paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Fasilitas $fasilitas)
    {
        $fasilitas->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Rental Mobil berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $fasilitass = Fasilitas::whereIn('id', json_decode($request->ids, true))->get();

        Fasilitas::whereIn('id', $fasilitass->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pengiriman paket');
    }

    public function laporan()
    {

        return view('fasilitas.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Fasilitas)->getTable();
        $object = (new Fasilitas);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["fasilitass"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["fasilitass"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("fasilitas.laporan.print", $data);
    }
}
