<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Donatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['donatur'] = Donatur::paginate(1000);

        $data['donatur_count'] = count(Schema::getColumnListing('donatur'));

        return view('donatur.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('donatur.create');
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
            'nama' => 'required|max:30',
            'no_hp' => 'required|max:15',
            'nama_pemilik_rekening' => 'required|max:30',
            'jumlah' => 'required',
            'tanggal' => 'required|date',
            'pesan' => 'required|max:255'
        ]);
        
        $requestData = $request->all();

        Donatur::create($requestData);
        
        echo "<script>alert('Berhasil menambah donasi, donasi akan segera dicek, TERIMAKASIH YAA... :)'); location.href = '{$request->server->getHeaders()['REFERER']}';</script>";
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Donatur $donatur)
    {
        $data["item"] = $donatur;
        $data["donatur"] = $donatur;

        return view('donatur.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Donatur $donatur)
    {
        $data["donatur"] = $donatur;
        $data[strtolower("Donatur")] = $donatur;

        return view('donatur.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Donatur $donatur)
    {
        $this->validate($request, [
            'nama' => 'required|max:30',
            'no_hp' => 'required|max:15',
            'nama_pemilik_rekening' => 'required|max:30',
            'jumlah' => 'required',
            'tanggal' => 'required|date',
            'pesan' => 'required|max:255'
        ]);

        $requestData = $request->all();

        $donatur->update($requestData);

        return redirect()->route('donatur.index')->with('success', 'Berhasil mengubah Donatur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Donatur $donatur)
    {
        $donatur->delete();

        return redirect()->route('donatur.index')->with('success', 'Donatur berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $donaturs = Donatur::whereIn('id', json_decode($request->ids, true))->get();

        Donatur::whereIn('id', $donaturs->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data donatur');
    }

    public function laporan()
    {
        $data['limit'] = Donatur::count();

        return view('donatur.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Donatur)->getTable();
        $object = (new Donatur);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["donaturs"] = $object->orderBy($request->field, $request->order)
            ->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])
            ->where('status', 'like', "%$request->status%")
            ->limit($request->limit)->get();

        if (!$data["donaturs"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("donatur.laporan.print", $data);
    }

    public function konfirmasi(Donatur $donatur, Request $request)
    {
        $donatur->update([
            'status' => 'Terkonfirmasi'
        ]);

        return redirect()->route('donatur.index')->with('success', 'Berhasil mengkonfirmasi donatur');
    }
}