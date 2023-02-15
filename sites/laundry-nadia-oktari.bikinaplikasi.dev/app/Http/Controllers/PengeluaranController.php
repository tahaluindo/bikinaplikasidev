<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pengeluaran'] = Pengeluaran::paginate(1000);

        $data['pengeluaran_count'] = count(Schema::getColumnListing('pengeluaran'));

        return view('pengeluaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pengeluaran.create');
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
			'jumlah' => 'required',
			'tanggal' => 'required|date',
			'keterangan' => 'required'
		]);
        $requestData = $request->all();

        

        Pengeluaran::create($requestData);

        return redirect()->route('pengeluaran.index')->with('success', 'Berhasil menambah Pengeluaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pengeluaran $pengeluaran)
    {
        $data["item"] = $pengeluaran;
        $data["pengeluaran"] = $pengeluaran;

        return view('pengeluaran.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        $data["pengeluaran"] = $pengeluaran;
        $data[strtolower("Pengeluaran")] = $pengeluaran;

        return view('pengeluaran.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $this->validate($request, [
			'jumlah' => 'required',
			'tanggal' => 'required|date',
			'keterangan' => 'required'
		]);

        $requestData = $request->all();

        

        $pengeluaran->update($requestData);

        return redirect()->route('pengeluaran.index')->with('success', 'Berhasil mengubah Pengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pengeluarans = Pengeluaran::whereIn('id', json_decode($request->ids, true))->get();

        Pengeluaran::whereIn('id', $pengeluarans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pengeluaran');
    }

    public function laporan()
    {
        $data['limit'] = Pengeluaran::count();

        return view('pengeluaran.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Pengeluaran)->getTable();
        $object = (new Pengeluaran);

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

        $data["pengeluarans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)
            ->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_akhir])
            ->get();

        if(!$data["pengeluarans"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pengeluaran.laporan.print", $data);
    }
}