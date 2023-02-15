<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\PembayaranDetail;
use App\Models\Pengaturan;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (in_array(auth()->user()->level, ['Siswa', 'Ortu'])) {
            $siswa = auth()->user()->getSiswa();
            $pembayaran_ids = Pembayaran::where([
                'jenjang_id' => $siswa->jenjang_id,
                'kelas_id' => $siswa->kelas_id,
                // 'angkatan' => $siswa->angkatan,
            ])->pluck('id');
            $data['pembayaran'] = Pembayaran::whereIn('id', $pembayaran_ids)->paginate(1000);
        } else {

            $data['pembayaran'] = Pembayaran::paginate(1000);
        }

        foreach ($data['pembayaran'] as $pembayaran) {
            $siswa = Siswa::where([
                'kelas_id' => $pembayaran->kelas_id,
                'jenjang_id' => $pembayaran->jenjang_id,
            ])->get();

            foreach ($siswa as $key => $itemSiswa) {
                $pembayaranDetail = PembayaranDetail::where([
                    'siswa_id' => $itemSiswa->id,
                    'pembayaran_id' => $pembayaran->id
                ])->first();

                if (!$pembayaranDetail) {
                    PembayaranDetail::create([
                        'siswa_id' => $itemSiswa->id,
                        'pembayaran_id' => $pembayaran->id,
                        'jumlah' => $pembayaran->nominal,
                        'status' => 'Belum Dibayar'
                    ]);
                }
            }
        }


        $data['pembayaran_count'] = count(Schema::getColumnListing('pembayaran'));

        return view('pembayaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $data['angkatan'] = Pengaturan::first()->angkatan_registrasi;
        $data['jenjang'] = Jenjang::pluck('nama', 'id', );
        $data['kelas'] = Kelas::pluck('nama', 'id', );

        return view('pembayaran.create', $data);
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
            // 'angkatan' => 'required|max:30',
            'untuk_bulan' => 'required',
        ]);
        $requestData = $request->all();

        if (
            Pembayaran::where([
                'jenjang_id' => $request->jenjang_id,
                'kelas_id' => $request->kelas_id,
                // 'angkatan' => $request->angkatan,
                'untuk_bulan' => $request->untuk_bulan,
            ])->count()
        ) {
            return redirect()->back()->with('error', 'Data sudah ada');
        }

        Pembayaran::create($requestData);

        return redirect()->route('pembayaran.index')->with('success', 'Berhasil menambah Pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pembayaran $pembayaran)
    {
        $data["item"] = $pembayaran;
        $data["pembayaran"] = $pembayaran;

        return view('pembayaran.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pembayaran $pembayaran)
    {
        $data["pembayaran"] = $pembayaran;
        $data[strtolower("Pembayaran")] = $pembayaran;
        // $data['angkatan'] = Pengaturan::first()->angkatan_registrasi;
        $data['jenjang'] = Jenjang::pluck('nama', 'id', );
        $data['kelas'] = Kelas::pluck('nama', 'id', );

        return view('pembayaran.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $this->validate($request, [
            // 'angkatan' => "required",
            'untuk_bulan' => "required",
        ]);

        if (
            Pembayaran::where([
                'jenjang_id' => $request->jenjang_id,
                'kelas_id' => $request->kelas_id,
                // 'angkatan' => $request->angkatan,
                'untuk_bulan' => $request->untuk_bulan,
            ])->where('id', '!=', $pembayaran->id)->count()
        ) {
            return redirect()->back()->with('error', 'Data sudah ada');
        }

        $requestData = $request->all();

        $pembayaran->update($requestData);

        return redirect()->route('pembayaran.index')->with('success', 'Berhasil mengubah Pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pembayarans = Pembayaran::whereIn('id', json_decode($request->ids, true))->get();

        Pembayaran::whereIn('id', $pembayarans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pembayaran');
    }

    public function laporan()
    {
        $data = [];

        $data['limit'] = Pembayaran::count();

        return view('pembayaran.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Pembayaran)->getTable();
        $object = (new Pembayaran);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["pembayarans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["pembayarans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("pembayaran.laporan.print", $data);
    }
}