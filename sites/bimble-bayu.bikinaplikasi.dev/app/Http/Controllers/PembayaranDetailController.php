<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pembayaran;
use App\Models\PembayaranDetail;
use App\Models\MapelDetail;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PembayaranDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->pembayaran_id) {

            $data['pembayaran_detail'] = PembayaranDetail::where('pembayaran_id', $request->pembayaran_id)->limit(1000)->get();
        } else {

            $data['pembayaran_detail'] = PembayaranDetail::paginate(1000);
        }

        $data['pembayaran_detail_count'] = count(Schema::getColumnListing('pembayaran_detail'));

        $pembayaran = Pembayaran::findOrFail($request->pembayaran_id);

        $siswa = Siswa::where([
            'kelas_id' => $pembayaran->kelas_id,
            'jenjang_id' => $pembayaran->jenjang_id,
        ])->get();

        foreach ($siswa as $key => $itemSiswa) {
            $pembayaranDetail = PembayaranDetail::where([
                'siswa_id' => $itemSiswa->id,
                'pembayaran_id' => $pembayaran->id
            ])->first();

            if(!$pembayaranDetail) {
                PembayaranDetail::create([
                    'siswa_id' => $itemSiswa->id,
                    'pembayaran_id' => $pembayaran->id,
                    'jumlah' => $pembayaran->nominal,
                    'status' => 'Belum Dibayar'
                ]);
            }
        }

        return view('pembayaran-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $pembayaran = Pembayaran::findOrFail($request->pembayaran_id);

        if (in_array(auth()->user()->level, ['Siswa', 'Ortu'])) {
            $data['siswa'] = Siswa::where([
                'id' => auth()->user()->getSiswa()->id,
                'kelas_id' => $pembayaran->kelas_id,
                'jenjang_id' => $pembayaran->jenjang_id,
                // 'angkatan' => $pembayaran->angkatan,
            ])->pluck('nama', 'id');
        } else {
            $data['siswa'] = Siswa::where([
                'kelas_id' => $pembayaran->kelas_id,
                'jenjang_id' => $pembayaran->jenjang_id,
                // 'angkatan' => $pembayaran->angkatan,
            ])->pluck('nama', 'id');
        }

        return view('pembayaran-detail.create', $data);
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
            'pembayaran_id' => 'required|exists:pembayaran,id',
            'siswa_id' => 'required|exists:siswa,id',
            'jumlah' => 'required',
        ]);
        $requestData = $request->all();

        if (PembayaranDetail::where([
            'siswa_id' => $request->siswa_id,
            'pembayaran_id' => $request->pembayaran_id

        ])->count()) {
            return redirect()->back()->with('error', 'Data sudah ada');
        }

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move("gambar", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        PembayaranDetail::create($requestData);
        
        if (in_array(auth()->user()->level, ['Siswa', 'Ortu'])) {
            return redirect("pembayaran")->with('success', 'Berhasil menambah Pembayaran'); 
        }

        return redirect("pembayaran-detail?pembayaran_id=" . $request->pembayaran_id)->with('success', 'Berhasil menambah PembayaranDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(PembayaranDetail $pembayaran_detail)
    {
        $data["item"] = $pembayaran_detail;
        $data["pembayaran_detail"] = $pembayaran_detail;

        return view('pembayaran-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(PembayaranDetail $pembayaran_detail, Request $request)
    {
        $data["pembayaran_detail"] = $pembayaran_detail;
        $data[strtolower("PembayaranDetail")] = $pembayaran_detail;

        $pembayaran = Pembayaran::findOrFail($request->pembayaran_id);

        $data['siswa'] = Siswa::where([
            'kelas_id' => $pembayaran->kelas_id,
            'jenjang_id' => $pembayaran->jenjang_id,
            // 'angkatan' => $pembayaran->angkatan,
        ])->pluck('nama', 'id');

        return view('pembayaran-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PembayaranDetail $pembayaran_detail)
    {
        $this->validate($request, [
            'pembayaran_id' => 'required|exists:pembayaran,id',
            'siswa_id' => 'required|exists:siswa,id',
            'jumlah' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move("gambar", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        $pembayaran_detail->update($requestData);

        return redirect("pembayaran-detail?pembayaran_id=" . $pembayaran_detail->pembayaran_id)->with('success', 'Berhasil mengubah Pembayaran Detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(PembayaranDetail $pembayaran_detail)
    {
        $pembayaran_detail->delete();

        return redirect("pembayaran-detail?pembayaran_id=" . $pembayaran_detail->pembayaran_id)->with('success', 'PembayaranDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pembayaran_details = PembayaranDetail::whereIn('id', json_decode($request->ids, true))->get();

        PembayaranDetail::whereIn('id', $pembayaran_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pembayaran-detail');
    }

    public function laporan()
    {

        return view('pembayaran-detail.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new PembayaranDetail)->getTable();
        $object = (new PembayaranDetail);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["pembayaran_details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["pembayaran_details"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("pembayaran-detail.laporan.print", $data);
    }
}