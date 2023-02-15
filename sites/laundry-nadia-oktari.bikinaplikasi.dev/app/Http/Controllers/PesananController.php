<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pesanan'] = Pesanan::paginate(1000);

        $data['pesanan_count'] = count(Schema::getColumnListing('pesanan'));

        return view('pesanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['pelanggan'] = Pelanggan::pluck('nama', 'id');
        $data['paket'] = Paket::get();

        return view('pesanan.create', $data);
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
        if ($request->cetak_nota_tanpa_pelanggan) {
            $this->validate($request, [
                'paket_id' => 'required|exists:paket,id',
                'dipesan_pada' => 'required',
                'diambil_pada' => 'required',
                'status' => 'required|in:Belum Diproses,Sedang Diproses,Selesai',
                'admin' => 'required',
                'diskon' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'paket_id' => 'required|exists:paket,id',
                'pelanggan_id' => 'required|exists:pelanggan,id',
                'dipesan_pada' => 'required',
                'diambil_pada' => 'required',
                'status' => 'required|in:Belum Diproses,Sedang Diproses,Selesai',
                'admin' => 'required',
                'diskon' => 'required'
            ]);
        }

        $requestData = $request->all();
        $requestData['user_id'] = auth()->id();

        $pesanan = Pesanan::orderBy('id', 'DESC')->first();
        $requestData['no'] = $pesanan ? $pesanan->no++ : 'INV000001';

        $paket = Paket::findOrFail($request->paket_id);
        $requestData['total'] = $request->jumlah * $paket->harga + $request->admin - $request->diskon;

        if ($request->cetak_nota_tanpa_pelanggan) {

            unset($requestData['cetak_nota_tanpa_pelanggan']);
            $pesananCreate = (new \App\Models\Pesanan)->create($requestData);
            $pesananCreate->id = rand(1000, 9999);

            $data['pesanan'] = $pesananCreate->toArray();
            $data['pesanan']['paket'] = Paket::findOrFail($request->paket_id)->toArray();

            $link_print_nota = route('pesanan.print-nota', $pesananCreate) . "?" . http_build_query($data);
            $link_pesanan = route('pesanan.index');

            echo "<script>window.open('$link_print_nota', '_blank'); window.location.href = '$link_pesanan'; </script>";
        } else {

            $pesananCreate = Pesanan::create($requestData);
        }

        $link_print_nota = route('pesanan.print-nota', $pesananCreate);
        $link_pesanan = route('pesanan.index');

        echo "<script>window.open('$link_print_nota', '_blank'); window.location.href = '$link_pesanan'; </script>";
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pesanan $pesanan)
    {
        $data["item"] = $pesanan;
        $data["pesanan"] = $pesanan;

        return view('pesanan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pesanan $pesanan)
    {
        $data["pesanan"] = $pesanan;
        $data[strtolower("Pesanan")] = $pesanan;
        $data['paket'] = Paket::get();
        $data['pelanggan'] = Pelanggan::pluck('nama', 'id');

        return view('pesanan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        if ($request->cetak_nota_tanpa_pelanggan) {
            $this->validate($request, [
                'paket_id' => 'required|exists:paket,id',
                'dipesan_pada' => 'required',
                'diambil_pada' => 'required',
                'status' => 'required|in:Belum Diproses,Sedang Diproses,Selesai',
                'admin' => 'required',
                'diskon' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'paket_id' => 'required|exists:paket,id',
                'pelanggan_id' => 'required|exists:pelanggan,id',
                'dipesan_pada' => 'required',
                'diambil_pada' => 'required',
                'status' => 'required|in:Belum Diproses,Sedang Diproses,Selesai',
                'admin' => 'required',
                'diskon' => 'required'
            ]);
        }

        $requestData = $request->all();
        $requestData['user_id'] = auth()->id();

        $paket = Paket::findOrFail($request->paket_id);
        $requestData['total'] = $request->jumlah * $paket->harga + $request->admin - $request->diskon;

        if ($request->cetak_nota_tanpa_pelanggan) {

            unset($requestData['cetak_nota_tanpa_pelanggan']);
            $pesanan->update($requestData);
            
            $pesananCreate = $pesanan->fill($requestData);

            $data['pesanan'] = $pesananCreate->toArray();
            $data['pesanan']['paket'] = Paket::findOrFail($request->paket_id)->toArray();

            $link_print_nota = route('pesanan.print-nota', $pesananCreate) . "?" . http_build_query($data);
            $link_pesanan = route('pesanan.index');

            return "<script>window.open('$link_print_nota', '_blank'); window.location.href = '$link_pesanan'; </script>";
        } else {

            $pesananCreate = Pesanan::create($requestData);
        }

        return redirect()->route('pesanan.index')->with('success', 'Berhasil mengubah Pesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pesanans = Pesanan::whereIn('id', json_decode($request->ids, true))->get();

        Pesanan::whereIn('id', $pesanans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pesanan');
    }

    public function laporan()
    {
        $data['limit'] = Pesanan::count();

        return view('pesanan.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Pesanan)->getTable();
        $object = (new Pesanan);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["pesanans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)
            ->whereBetween('dipesan_pada', [$request->tanggal_mulai, $request->tanggal_akhir])
            ->get();

        if (!$data["pesanans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("pesanan.laporan.print", $data);
    }

    public function hitung_pesanan(Request $request)
    {
        header('content-type: application/json');

        $paket = Paket::findOrFail($request->paket_id);
        $diambil_pada = \Carbon\Carbon::parse($request->dipesan_pada)->addHours($paket->lama_pengerjaan)->toDateTimeLocalString();
        $total = $paket->harga * $request->jumlah;

        return json_encode([
            'diambil_pada' => $diambil_pada,
            'total' => toIdr($total)
        ]);
    }

    public function proses(Pesanan $pesanan)
    {
        $pesanan->update([
            'status' => 'Sedang Diproses',
        ]);

        return redirect()->back()->with('success', 'Berhasil memproses pesanan');
    }

    public function selesai(Pesanan $pesanan)
    {
        $pesanan->update([
            'status' => 'Selesai',
        ]);

        return redirect()->back()->with('success', 'Berhasil menyelesaikan pesanan');
    }

    public function autoUpdateAdmin()
    {
        Pesanan::all()->map(function ($item) {
            $diff = \Carbon\Carbon::parse($item->diambil_pada)->diffInDays(now());
            if ($diff > 0) {

                Pesanan::findOrFail($item->id)->update([
                    'admin' => $diff * env('APP_ADMIN_IN_DAYS'),
                    'total' => $diff * env('APP_ADMIN_IN_DAYS') + $item->total
                ]);
            }

            return $item;
        });
    }

    public function printNota($pesanan)
    {
        if ($pesanan = Pesanan::find($pesanan)) {

            $data['pesanan'] = $pesanan;
        } else {
            $data['pesanan'] = json_decode(json_encode(request()->all()))->pesanan;
        }

        return view('pesanan.nota', $data);
    }
}