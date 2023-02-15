<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\LaporanPemesanan;
use App\Models\Meja;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pemesanan'] = Pemesanan::with('pemesanan_details')->get()->take(1000)->filter(function ($item) {

            return count($item->pemesanan_details);
        });

        $data['pemesanan_count'] = count(Schema::getColumnListing('pemesanan'));

        return view('pemesanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['meja'] = Meja::all();

        return view('pemesanan.create', $data);
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
            'status' => 'required|in:pending,selesai,cancel,refund'
        ]);
        $requestData = $request->all();

        $pemesanan = Pemesanan::create($requestData);

        $produk = json_encode(Produk::pluck('nama', 'id'));

        return redirect(route('pemesanan-detail.create') . "?pemesanan_id={$pemesanan->id}&produk=$produk");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pemesanan $pemesanan)
    {
        $data["item"] = $pemesanan;
        $data["pemesanan"] = $pemesanan;

        return view('pemesanan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pemesanan $pemesanan)
    {
        $data["pemesanan"] = $pemesanan;
        $data[strtolower("Pemesanan")] = $pemesanan;
        $data['meja'] = Meja::all();
        
        return view('pemesanan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $this->validate($request, [
            'status' => 'required|in:pending,selesai,cancel,refund'
        ]);

        $requestData = $request->all();

        $pemesanan->update($requestData);

        if ($request->status == 'refund') {

        }

        return redirect()->route('pemesanan.index')->with('success', 'Berhasil mengubah Pemesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pemesanans = Pemesanan::whereIn('id', json_decode($request->ids, true))->get();

        Pemesanan::whereIn('id', $pemesanans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pemesanan');
    }

    public function laporan()
    {
        $data['limit'] = Pemesanan::count();
        $data['laporan_pemesanan'] = LaporanPemesanan::all();

        return view('pemesanan.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Pemesanan)->getTable();
        $object = (new Pemesanan);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["pemesanans"] = $object->with(["meja", 'pemesanan_details'])->orderBy($request->field, $request->order)
            ->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->limit($request->limit)->get()->filter(function ($item) {

                return $item->pemesanan_details->count();
            });

        if (!$data["pemesanans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }
        
        if($request->nama) {
            LaporanPemesanan::create([
                'nama' => $request->nama,
                'isi' => json_encode($data)
            ]);
        }

        return view("pemesanan.laporan.print", $data);
    }
    
    public function printFromLaporanPemesanan(LaporanPemesanan $laporanPemesanan)
    {
        $data['pemesanans'] = json_decode($laporanPemesanan->isi)->pemesanans;
        
        return view("pemesanan.laporan.print", $data);
    }

    public function nota(Pemesanan $pemesanan)
    {
        $data['pemesanan'] = $pemesanan;

        return view('pemesanan.nota', $data);
    }
    
    public function selesaikan(Pemesanan $pemesanan)
    {
        $data["pemesanan"] = $pemesanan;
        $data[strtolower("Pemesanan")] = $pemesanan;
        $data['meja'] = Meja::all();
        
        return view('pemesanan.selesaikan', $data);
    }
    
    public function selesaikanUpdate(Request $request, Pemesanan $pemesanan)
    {

        $requestData = $request->except(['total', 'uang_pelanggan', 'kembalian']);

        $pemesanan->update($requestData);

        return redirect()->route('pemesanan.index')->with('success', 'Berhasil menyelesaikan Pemesanan');
    }
}