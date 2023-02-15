<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;

use App\Models\Anggotum;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['peminjaman'] = Peminjaman::where('user_petugas_id', auth()->user()->id)->where('anggota_id', 'like', "%$request->anggota_id%")->paginate(1000);

        $data['peminjaman_count'] = count(Schema::getColumnListing('peminjaman'));

        return view('peminjaman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['anggotas'] = Anggotum::where(['status' => 'Aktif'])->get();
        
        return view('peminjaman.create', $data);
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
			'anggota_id' => 'required|integer|exists:anggota,id',
			'user_petugas_id' => 'required|integer|exists:user,id',
			'tanggal' => 'required|max:12|before:tanggal_pengembalian',
			'tanggal_pengembalian' => 'required|max:12|after:tanggal',
			'status' => 'required|in:Berlangsung'
        ]);
        
        $requestData = $request->all();

        Peminjaman::create($requestData);

        return redirect()->route('peminjaman.index')->with('success', 'Berhasil menambah Peminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Peminjaman $peminjaman)
    {
        $data["item"] = $peminjaman;
        $data["peminjaman"] = $peminjaman;
        $data["pengembalian"] = $peminjaman->pengembalian;

        $data['detail_peminjaman'] = DetailPeminjaman::where(['peminjaman_id' => $peminjaman->id])->get();
        $data['detail_peminjaman_count'] = count(Schema::getColumnListing('detail_peminjaman'));

        return view('peminjaman.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Peminjaman $peminjaman)
    {
        $data["peminjaman"] = $peminjaman;
        $data[strtolower("Peminjaman")] = $peminjaman;
        $data['anggotas'] = Anggotum::all();

        return view('peminjaman.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $this->validate($request, [
			'anggota_id' => 'required|integer|exists:anggota,id',
			'user_petugas_id' => 'required|integer|exists:user,id',
			'tanggal' => 'required|max:12|before:tanggal_pengembalian',
			'tanggal_pengembalian' => 'required|max:12|after:tanggal',
			'status' => 'required|in:Berlangsung,Selesai'
        ]);
        
        $requestData = $request->all();

        $peminjaman->update($requestData);

        return redirect()->route('peminjaman.index')->with('success', 'Berhasil mengubah Peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $peminjamans = Peminjaman::whereIn('id', json_decode($request->ids, true))->get();

        Peminjaman::whereIn('id', $peminjamans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data peminjaman');
    }

    public function laporan()
    {
        $peminjaman_user_petugas_ids = Peminjaman::pluck('user_petugas_id')->toArray();

        $data['peminjamans'] = Peminjaman::limit(1000)->get();
        $data['petugass'] = User::whereIn('id', $peminjaman_user_petugas_ids)->get();

        return view('peminjaman.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Peminjaman)->getTable();
        $object = (new Peminjaman);
        $fields = [];

        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $tanggal_awal = $request->tanggal_awal ? $request->tanggal_awal : Peminjaman::get()->first()->tanggal;
        $tanggal_akhir = $request->tanggal_akhir ? $request->tanggal_akhir : Peminjaman::get()->last()->tanggal;

        $data["peminjamans"] = $object->orderBy($request->field, $request->order)
        ->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])
        ->where('user_petugas_id', 'like', "%$request->user_petugas_id%")
        ->where('status', 'like', "Selesai")->get();

        if(!$data["peminjamans"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("peminjaman.laporan.print", $data);
    }
}