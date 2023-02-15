<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Angsuran;
use App\Models\Kavling;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['angsuran'] = Angsuran::orderBy('angsuran_ke', 'asc')->where('penjualan_id', request()->penjualan_id)->get();

        $data['angsuran_count'] = count(Schema::getColumnListing('angsuran'));

        $data['penjualan'] = Penjualan::findOrFail($request->penjualan_id);

        return view('angsuran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['penjualan'] = Penjualan::findOrFail(request()->penjualan_id);
        $data['angsuran_terakhir'] = Angsuran::get()->last();
        $data['kavling'] = Kavling::findOrFail($data['penjualan']->kavling_id);

        return view('angsuran.create', $data);
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
        if (Angsuran::where([
            'penjualan_id' => $request->penjualan_id,
            'angsuran_ke' => $request->angsuran_ke
        ])->count()) {
            return redirect()->back()->with('error', 'Angsuran sudah ada!');
        }

        $this->validate($request, [
            'penjualan_id' => 'required|exists:penjualan,id',
            'angsuran_ke' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required|date'
        ]);
        $requestData = $request->all();

        $penjualan = Penjualan::findOrFail($request->penjualan_id);

        if (date('Y-m-d') > $penjualan->batas_pembayaran) {
            return redirect()->back()->with("error", "Sudah melewati batas akhir pembayaran!");
        }

        Angsuran::create($requestData);

        return redirect("angsuran?penjualan_id=" . $request->penjualan_id)->with('success', 'Berhasil menambah Angsuran');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Angsuran $angsuran)
    {
        $data["item"] = $angsuran;
        $data["angsuran"] = $angsuran;

        return view('angsuran.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Angsuran $angsuran)
    {
        $data["angsuran"] = $angsuran;
        $data[strtolower("Angsuran")] = $angsuran;
        $data['angsuran_terakhir'] = Angsuran::get()->last();
        $data['penjualan'] = Penjualan::findOrFail(request()->penjualan_id);
        $data['kavling'] = Kavling::findOrFail($data['penjualan']->kavling_id);

        return view('angsuran.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Angsuran $angsuran)
    {


        $this->validate($request, [
            'penjualan_id' => 'required|exists:penjualan,id',
            'angsuran_ke' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required|date'
        ]);

        $requestData = $request->all();


        $angsuran->update($requestData);

        return redirect("angsuran?penjualan_id=" . $request->penjualan_id)->with('success', 'Berhasil mengubah Angsuran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Angsuran $angsuran)
    {
        $angsuran->delete();

        return redirect()->route('angsuran.index')->with('success', 'Angsuran berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $angsurans = Angsuran::whereIn('id', json_decode($request->ids, true))->get();

        Angsuran::whereIn('id', $angsurans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data angsuran');
    }

    public function laporan()
    {
        $data['limit'] = Angsuran::count();

        return view('angsuran.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Angsuran)->getTable();
        $object = (new Angsuran);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["angsurans"] = $object->orderBy($request->field, $request->order)
            ->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])
            ->limit($request->limit)->get();

        if (!$data["angsurans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("angsuran.laporan.print", $data);
    }
}