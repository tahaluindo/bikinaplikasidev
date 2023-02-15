<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Http\Requests;
use App\Peminjaman;
use App\Pengembalian;
use Illuminate\Http\Request;
use App\DetailPeminjaman;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pengembalian'] = Pengembalian::paginate(1000);

        $data['pengembalian_count'] = count(Schema::getColumnListing('pengembalian'));

        if(request()->q) {
            $data['pengembalian'] = new Pengembalian;

            foreach (Schema::getColumnListing('pengembalian') as $key => $item) {
                $data['pengembalian'] = $data['pengembalian']->orwhere($item, 'like', "%$request->q%");
            }

            $data['pengembalian'] = $data['pengembalian']->paginate(1000);
        }

        if (in_array(auth()->user()->level, ['Siswa', 'Guru'])) {
            $peminjaman_ids = Peminjaman::where('anggota_id', auth()->user()->anggota->id)->pluck('id');

            $data['pengembalian'] = $data['pengembalian']->whereIn('peminjaman_id', $peminjaman_ids);
        }

        return view('pengembalian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['peminjaman'] = Peminjaman::findOrFail(request()->peminjaman_id);
        $peminjaman = $data['peminjaman'];

        if(!$peminjaman->detail_peminjaman->count()) {

            return redirect()->route('peminjaman.show', request()->peminjaman_id)->with('error', 'Anggota tidak memiliki data detail peminjaman');
        }

        return view('pengembalian.create', $data);
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
			'peminjaman_id' => 'required|integer|exists:peminjaman,id',
			'tanggal' => 'required|max:12',
			'denda_terlambat' => 'required|integer|max:32000'
        ]);

        // ubah semua status buku jadi dikembalikan
        DetailPeminjaman::where([
            'peminjaman_id' => $request->peminjaman_id,
            'status' => 'Belum Dikembalikan'
        ])->update([
            'status' => 'Dikembalikan'
        ]);

        // update semua stok buku yang telah dikembalikan
        $detail_peminjaman = DetailPeminjaman::where(['peminjaman_id' => $request->peminjaman_id])->get();
        foreach($detail_peminjaman as $item) {

            Buku::findOrFail($item->buku_id)->increment('stok');
        }

        // ubah status peminjaman == selesai
        Peminjaman::findOrFail($request->peminjaman_id)->update(['status' => 'Selesai']);

        // simpan data pengembalian ke database
        $requestData = $request->all();
        Pengembalian::create($requestData);

        return redirect()->route('peminjaman.show', request()->peminjaman_id)->with('success', 'Berhasil menambah pengembalian');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pengembalian $pengembalian)
    {
        $data["item"] = $pengembalian;
        $data["pengembalian"] = $pengembalian;

        return view('pengembalian.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pengembalian $pengembalian)
    {
        $data["pengembalian"] = $pengembalian;
        $data[strtolower("Pengembalian")] = $pengembalian;

        return view('pengembalian.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $this->validate($request, [
			'anggota_id' => 'required|number|exists:anggota,id',
			'peminjaman_id' => 'required|integer|exists:peminjaman,id',
			'tanggal' => 'required|max:12',
			'denda_terlambat' => 'required|integer|max:32000'
		]);

        $requestData = $request->all();



        $pengembalian->update($requestData);

        return redirect()->route('pengembalian.index')->with('success', 'Berhasil mengubah Pengembalian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pengembalian $pengembalian)
    {
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pengembalians = Pengembalian::whereIn('id', json_decode($request->ids, true))->get();

        Pengembalian::whereIn('id', $pengembalians->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pengembalian');
    }

    public function laporan()
    {
        $data['pengembalians'] = Pengembalian::limit(100)->get();
        $data['limit'] = Pengembalian::count();

        return view('pengembalian.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Pengembalian)->getTable();
        $object = (new Pengembalian);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $tanggal_awal = $request->tanggal_awal ? $request->tanggal_awal : (Pengembalian::get()->first()->tanggal ?? date('y-M-D'));
        $tanggal_akhir = $request->tanggal_akhir ? $request->tanggal_akhir : (Pengembalian::get()->last()->tanggal ?? date('y-M-D'));

        $data["pengembalians"] = $object->orderBy($request->field, $request->order)
        ->get()->filter(function($item) use($tanggal_awal, $tanggal_akhir) {
            $item->tanggal = date('Y-m-d', strtotime($item->tanggal));
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));

            return \Carbon\Carbon::parse($item->tanggal)->gte(\Carbon\Carbon::parse($tanggal_awal)) && \Carbon\Carbon::parse($item->tanggal)->lte(\Carbon\Carbon::parse($tanggal_akhir));
        })->take($request->limit);

        if(!$data["pengembalians"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("pengembalian.laporan.print", $data);
    }
}
