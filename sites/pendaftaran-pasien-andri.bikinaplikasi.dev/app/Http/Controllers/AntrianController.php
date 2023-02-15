<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Antrian;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->poli_id) {

            $data['antrian'] = Antrian::where('poli_id', request()->poli_id ?? null)->paginate(1000);
        } else {
            $data['antrian'] = [];
        }
        
        $data['poli'] = Poli::all();

        $data['antrian_count'] = count(Schema::getColumnListing('antrian'));

        return view('antrian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        foreach (Poli::all() as $item) {
            for ($i = 1; $i < 100; $i++) {
                Antrian::create([
                    'status' => $i == 1 ? 'Sekarang' : 'Belum',
                    'nomor' => $i,
                    'poli_id' => $item->id
                ]);
            }
        }

        return redirect()->route('antrian.index');
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


        Antrian::create($requestData);

        return redirect()->route('antrian.index')->with('success', 'Berhasil menambah Antrian');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Antrian $antrian)
    {
        $data["item"] = $antrian;
        $data["antrian"] = $antrian;

        return view('antrian.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Antrian $antrian)
    {
        $data["antrian"] = $antrian;
        $data[strtolower("Antrian")] = $antrian;

        return view('antrian.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Antrian $antrian)
    {


        $requestData = $request->all();


        $antrian->update($requestData);

        return redirect()->route('antrian.index')->with('success', 'Berhasil mengubah Antrian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Antrian $antrian)
    {
        $antrian->delete();

        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $antrians = Antrian::whereIn('id', json_decode($request->ids, true))->get();

        Antrian::whereIn('id', $antrians->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data antrian');
    }

    public function laporan()
    {

        return view('antrian.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Antrian)->getTable();
        $object = (new Antrian);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["antrians"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["antrians"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("antrian.laporan.print", $data);
    }

    public function reset()
    {
        Antrian::where('nomor', 'like', '%%')->where('poli_id', request()->poli_id)->update([
            'status' => 'Belum'
        ]);

        Antrian::Where('nomor', 1)->where('poli_id', request()->poli_id)->update([
            'status' => 'Sekarang'
        ]);

        return redirect()->back()->with('success', 'Berhasil mereset nomor');
    }

    public function sebelumnya()
    {
        $antrian = Antrian::where('status', 'Sekarang')->where('poli_id', request()->poli_id)->first();

        if ($antrian->nomor != 1) {
            Antrian::where('nomor', $antrian->nomor - 1)->where('poli_id', request()->poli_id)->update([
                'status' => 'Sekarang'
            ]);

            $antrian->update([
                'status' => 'Belum'
            ]);
        }

        return redirect()->back();
    }

    public function skip()
    {
        $antrian = Antrian::where('status', 'Sekarang')->where('poli_id', request()->poli_id)->first();

        $antrian->update([
            'status' => 'Di Skip'
        ]);

        Antrian::where('nomor', $antrian->nomor + 1)->where('poli_id', request()->poli_id)->update([
            'status' => 'Sekarang'
        ]);

        return redirect()->back();
    }

    public function selanjutnya()
    {
        $antrian = Antrian::where('status', 'Sekarang')->where('poli_id', request()->poli_id)->first();

        $antrian->update([
            'status' => 'Sudah'
        ]);

        Antrian::where('nomor', $antrian->nomor + 1)->update([
            'status' => 'Sekarang'
        ]);

        return redirect()->back();
    }

    public function sudah(Request $request)
    {
        Antrian::findOrFail($request->id)->where('poli_id', request()->poli_id)->update([
            'status' => 'Sudah'
        ]);

        return redirect()->back();
    }
}