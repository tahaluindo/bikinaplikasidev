<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Antrian;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pasien'] = Pasien::paginate(1000);

        $data['pasien_count'] = count(Schema::getColumnListing('pasien'));

        return view('pasien.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $pasienCreate = null;
        if (!preg_match("/register/", $request->server('HTTP_REFERER'))) {
            unset($requestData['poli_id'], $requestData['registrasi']);

            if (Pasien::where('no_ktp', $request->no_ktp)->first()) {

                return redirect()->back()->with('error', 'No ktp sudah ada!');
            }

            $pasienCreate = Pasien::create(
                $requestData
            );

            return redirect()->back()->with('success', 'Berhasil registrasi, silakan ambil nomor antrian.');
        }

        if ($request->sudah_pernah_berobat) {
            if ($pasien = Pasien::where('nomor_berobat', $request->nomor_berobat)->first()) {
                if (Antrian::where('pasien_id', $pasien->id)->first()) {

                    return redirect()->back()->with('error', 'Kamu Sudah Dalam Antrian!');
                }
            }
        }

        if (preg_match("/register/", $request->server('HTTP_REFERER'))) {

            if ($request->sudah_pernah_berobat) {
                $antrian = Antrian::where('nomor', ">", Antrian::where('status', 'Sekarang')
                    ->where('poli_id', request('poli_id'))->first()->nomor)
                    ->where('pasien_id', null)->where('poli_id', request('poli_id'))
                    ->first();
                $pasien = Pasien::where('nomor_berobat', $request->nomor_berobat)->first();


                if ($pasien) {
                    $pasien->update([
                        'keluhan_penyakit' => $request->keluhan_penyakit,
                        'bpjs' => $request->bpjs
                    ]);
                } else {

                    return redirect()->back()->with('error', 'Nomor Berobat Tidak Ditemukan!');
                }
            } else {
                $pasien = Pasien::where('nomor_berobat', $request->nomor_berobat)->first();

                if ($pasien) {
                    return redirect()->back()->with('error', 'Nomor Berobat Sudah Ada!');
                }

                unset($requestData['poli_id'], $requestData['registrasi']);
                $pasien = Pasien::create($requestData);
                
                return redirect()->back()->with('success', 'Berhasil registrasi, silakan ambil nomor antrian.');
            }

            $antrian->update([
                'pasien_id' => $pasien->id
            ]);

            return view("pasien-register-get-no-antrian")->with([
                'no_antrian' => $antrian->nomor,
                'poli' => $antrian->poli->nama_poli,
                'pasienCreate' => $pasien
            ]);
        }

        return redirect("riwayat_berobat?pasien_id={$pasienCreate->id}")->with('success', 'Berhasil menambah Pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pasien $pasien)
    {
        $data["item"] = $pasien;
        $data["pasien"] = $pasien;

        return view('pasien.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pasien $pasien)
    {
        $data["pasien"] = $pasien;
        $data[strtolower("Pasien")] = $pasien;

        return view('pasien.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pasien $pasien)
    {


        $requestData = $request->all();


        $pasien->update($requestData);

        return redirect()->route('pasien.index')->with('success', 'Berhasil mengubah Pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pasiens = Pasien::whereIn('id', json_decode($request->ids, true))->get();

        Pasien::whereIn('id', $pasiens->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pasien');
    }

    public function laporan()
    {

        return view('pasien.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Pasien)->getTable();
        $object = (new Pasien);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["pasiens"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["pasiens"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("pasien.laporan.print", $data);
    }
}