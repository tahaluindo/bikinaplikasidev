<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $data['rekening'] = Rekening::paginate(1000);

        $data['rekening_count'] = count(Schema::getColumnListing('rekening'));

        return view('rekening.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('rekening.create');
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
            'nama_penyedia' => 'required',
            'atas_nama' => 'required',
            'nomor_rekening' => 'required|unique:rekening,nomor_rekening',
            'status' => 'required'
        ]);

        $requestData = $request->all();

        Rekening::create($requestData);

        return redirect()->route('rekening.index')->with('success', 'Berhasil menambah Rekening');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Rekening $rekening)
    {
        $data["item"] = $rekening;
        $data["rekening"] = $rekening;

        return view('rekening.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Rekening $rekening)
    {
        $data["rekening"] = $rekening;
        $data[strtolower("Rekening")] = $rekening;

        return view('rekening.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Rekening $rekening)
    {
        $this->validate($request, [
            'nama_penyedia' => 'required',
            'atas_nama' => 'required',
            'nomor_rekening' => "required|unique:rekening,nomor_rekening,$rekening->nomor_rekening,nomor_rekening",
            'status' => 'required'
        ]);

        $requestData = $request->all();

        $rekening->update($requestData);

        return redirect()->route('rekening.index')->with('success', 'Berhasil mengubah Rekening');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Rekening $rekening)
    {
        $rekening->delete();

        return redirect()->route('rekening.index')->with('success', 'Rekening berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $rekenings = Rekening::whereIn('id', json_decode($request->ids, true))->get();

        Rekening::whereIn('id', $rekenings->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data rekening');
    }

    public function laporan()
    {

        return view('rekening.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Rekening)->getTable();
        $object = (new Rekening);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["rekenings"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["rekenings"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("rekening.laporan.print", $data);
    }
}
