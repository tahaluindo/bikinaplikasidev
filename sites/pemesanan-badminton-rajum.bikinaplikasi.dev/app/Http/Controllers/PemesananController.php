<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Lapangan;
use App\Mobil;
use App\Pemesanan;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $data['pemesanan'] = Pemesanan::paginate(1000);

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
        $data['lapangan'] = Lapangan::all();
    

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
        if ($request->from_register == "Ya") {
            $this->validate($request, [
                'atas_nama' => 'required',
                'no_hp' => 'required',
                'lapangan_id' => 'required',
                'waktu_mulai' => 'required',
            ]);

            $requestData = $request->except(['from_register']);

            if ($request->hasFile('bukti_transfer')) {
                $requestData['bukti_transfer'] = str_replace("\\", "/", $request->file('bukti_transfer')->move("gambar", time() . "." . $request->file('bukti_transfer')->getClientOriginalExtension()));
            }

            Pemesanan::create($requestData);

            return redirect()->back()->with('success', 'Berhasil membuat pesanan, jika ada kendala akan kami hubungi lewat telepon / wa');
        } else {
            $this->validate($request, [
                'atas_nama' => 'required',
                'no_hp' => 'required',
                'lapangan_id' => 'required',
                'waktu_mulai' => 'required',
            ]);

            $requestData = $request->except(['from_register']);

            if ($request->hasFile('bukti_transfer')) {
                $requestData['bukti_transfer'] = str_replace("\\", "/", $request->file('bukti_transfer')->move("gambar", time() . "." . $request->file('bukti_transfer')->getClientOriginalExtension()));
            }

            Pemesanan::create($requestData);
        }

        return redirect()->route('pemesanan.index')->with('success', 'Berhasil membuat pesanan');
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
        $data['lapangan'] = Lapangan::all();
    

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
        if ($request->from_register == "Ya") {
            $this->validate($request, [
                'atas_nama' => 'required',
                'no_hp' => 'required',
                'lapangan_id' => 'required',
                'waktu_mulai' => 'required',
            ]);

            $requestData = $request->except(['from_register']);

            if ($request->hasFile('bukti_transfer')) {
                $requestData['bukti_transfer'] = str_replace("\\", "/", $request->file('bukti_transfer')->move("gambar", time() . "." . $request->file('bukti_transfer')->getClientOriginalExtension()));
            }

            $pemesanan->update($requestData);
        } else {
            $this->validate($request, [
                'atas_nama' => 'required',
                'no_hp' => 'required',
                'lapangan_id' => 'required',
                'waktu_mulai' => 'required',
            ]);

            $requestData = $request->except(['from_register']);

            if ($request->hasFile('bukti_transfer')) {
                $requestData['bukti_transfer'] = str_replace("\\", "/", $request->file('bukti_transfer')->move("gambar", time() . "." . $request->file('bukti_transfer')->getClientOriginalExtension()));
            }

            $pemesanan->update($requestData);
            return redirect()->route('pemesanan.index')->with('success', 'Berhasil mengubah reservasi tiket');
        }

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

        return redirect()->route('pemesanan.index')->with('success', 'Rental Mobil berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pemesanans = Pemesanan::whereIn('id', json_decode($request->ids, true))->get();

        Pemesanan::whereIn('id', $pemesanans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data reservasi tiket');
    }

    public function laporan()
    {

        return view('pemesanan.laporan.index');
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
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["pemesanans"] = $object->orderBy($request->field, $request->order)->get();

        if (!$data["pemesanans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("pemesanan.laporan.print", $data);
    }

    public function terima(Request $request, Pemesanan $pemesanan)
    {
        $pemesanan->update([
            'status' => 'Diterima'
        ]);

        return redirect()->route('pemesanan.index')->with('success', 'Berhasil mengupdate status!');
    }

    public function batal(Request $request, Pemesanan $pemesanan)
    {
        $pemesanan->update([
            'status' => 'Dibatalkan'
        ]);

        return redirect()->route('pemesanan.index')->with('success', 'Berhasil mengupdate status!');
    }

    public function pending(Request $request, Pemesanan $pemesanan)
    {
        $pemesanan->update([
            'status' => 'Pending'
        ]);

        return redirect()->route('pemesanan.index')->with('success', 'Berhasil mengupdate status!');
    }
}