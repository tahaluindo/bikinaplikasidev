<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Http\Requests;

use App\Peminjaman;
use Illuminate\Http\Request;
use App\DetailPeminjaman;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DetailPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['detail_peminjaman'] = DetailPeminjaman::paginate(1000);

        $data['detail_peminjaman_count'] = count(Schema::getColumnListing('detail_peminjaman'));

        if(request()->q) {
            $data['detail_peminjaman'] = new DetailPeminjaman;

            foreach (Schema::getColumnListing('detail_peminjaman') as $key => $item) {
                $data['detail_peminjaman'] = $data['detail_peminjaman']->orwhere($item, 'like', "%$request->q%");
            }

            $data['detail_peminjaman'] = $data['detail_peminjaman']->paginate(1000);
        }

        return view('detail_peminjaman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['bukus'] = Buku::all();
        $data['peminjaman'] = Peminjaman::findOrFail(request()->peminjaman_id);

        return view('detail_peminjaman.create', $data);
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
			'buku_id' => 'required|integer|exists:buku,id'
        ]);

        // cek bukunya dulu
        $buku = Buku::find($request->buku_id);

        if(!$buku->stok) {

            return back()->with('error', "Stok buku kosong");
        }

        $requestData = $request->all();

        if(DetailPeminjaman::where('peminjaman_id', $request->peminjaman_id)->count() == env('APP_MAX_PEMINJAMAN')) {
            return redirect()->back()->with('error', 'Maksimal peminjaman adalah ' . env('APP_MAX_PEMINJAMAN'));
        }

        // kalo buku yang dipinjam udah ada maka jumlahkan stoknya saja
        $detail_peminjman_buku_dipinjam = DetailPeminjaman::where(['peminjaman_id' => $request->peminjaman_id, 'buku_id' => $request->buku_id])->first();

        if($detail_peminjman_buku_dipinjam) {

            return back()->with('error', 'Buku sudah dipinjam');
        }

        DetailPeminjaman::create($requestData);

        $buku->decrement('stok');

        return redirect()->route('peminjaman.show', $request->peminjaman_id)->with('success', 'Berhasil menambah DetailPeminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(DetailPeminjaman $detail_peminjaman)
    {
        $data["item"] = $detail_peminjaman;
        $data["detail_peminjaman"] = $detail_peminjaman;

        return view('detail_peminjaman.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(DetailPeminjaman $detail_peminjaman)
    {
        $data['bukus'] = Buku::all();
        $data["detail_peminjaman"] = $detail_peminjaman;
        $data[strtolower("DetailPeminjaman")] = $detail_peminjaman;

        $data['peminjaman'] = Peminjaman::findOrFail(request()->peminjaman_id);

        return view('detail_peminjaman.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, DetailPeminjaman $detail_peminjaman)
    {
        $this->validate($request, [
			'buku_id' => 'required|integer|exists:buku,id'
        ]);

        $buku = Buku::find($request->buku_id);

        $requestData = $request->all();

        if(!$buku->stok) {

            return back()->with('error', "Stok buku kosong");
        }

        // kalo buku yang dipinjam udah ada maka jumlahkan stoknya saja
        $detail_peminjman_buku_dipinjam = DetailPeminjaman::where(['peminjaman_id' => $request->peminjaman_id, 'buku_id' => $request->buku_id])->first();

        if($detail_peminjman_buku_dipinjam) {

            return back()->with('error', 'Buku sudah dipinjam');
        }

        $buku->increment('stok');
        $buku->decrement('stok');

        $detail_peminjaman->update($requestData);

        return redirect()->route('peminjaman.show', request()->peminjaman_id)->with('success', 'Berhasil mengubah DetailPeminjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(DetailPeminjaman $detail_peminjaman)
    {
        $detail_peminjaman->delete();

        return redirect()->route('peminjaman.show', request()->peminjaman_id)->with('success', 'Berhasil menghapus DetailPeminjaman');
    }

    public function hapus_semua(Request $request)
    {
        $detail_peminjamans = DetailPeminjaman::whereIn('id', json_decode($request->ids, true))->get();

        DetailPeminjaman::whereIn('id', $detail_peminjamans->pluck('id'))->delete();

        return redirect()->route('peminjaman.show', request()->peminjaman_id)->with('success', 'Berhasil menghapus banyak DetailPeminjaman');
    }

    public function laporan()
    {

        return view('detail_peminjaman.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new DetailPeminjaman)->getTable();
        $object = (new DetailPeminjaman);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["detail_peminjamans"] = $object->orderBy($request->field, $request->order)
        ->where('status', 'like', "%$request->status%")->get();

        if(!$data["detail_peminjamans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("detail_peminjaman.laporan.print", $data);
    }
}
