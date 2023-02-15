<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['karyawans'] = Karyawan::all();
        $data['jabatans'] = Jabatan::all();

        return view('karyawan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['jabatans'] = Jabatan::all();

        return view('karyawan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:30',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'lokasi' => 'required|max:11',
            'nik' => 'required|max:50',
            'tempat_tanggal_lahir' => 'required',
            'pendidikan' => 'required|max:15',
            'agama' => 'required',
            
        ]);
        
        Karyawan::create($request->except(['_token']));

        return redirect()->route('karyawan.index')->with('success', 'Berhasil menambah karyawan');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Karyawan $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        $data['karyawan'] = $karyawan;

        return view('karyawan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Karyawan $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        $data['jabatans'] = Jabatan::all();
        $data['karyawan'] = $karyawan;

        return view('karyawan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Karyawan $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $this->validate($request, [
            'nama' => 'required|max:30',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'lokasi' => 'required|max:11',
            'nik' => 'required|max:50',
            'tempat_tanggal_lahir' => 'required',
            'pendidikan' => 'required|max:15',
            'agama' => 'required'
        ]);

        $karyawan->update($request->except(['_token']));

        return redirect()->route('karyawan.index')->with('success', 'Berhasil mengupdate karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Karyawan $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus karyawan');
    }

    public function hapus_semua(Request $request)
    {
        $karyawans = Karyawan::whereIn('id', json_decode($request->ids, true))->get();

        Karyawan::whereIn('id', $karyawans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data karyawan');
    }

    public function laporan()
    {
        $data['limit'] = Karyawan::count();

        return view('karyawan.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $this->validate($request, [
            'field' => 'required|in:id,tanggal,jam_masuk,jam_keluar',
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . Karyawan::count(),
        ]);

        $data['karyawans'] = Karyawan::where('jenis_kelamin', 'like', "%$request->jenis_kelamin%")
            ->where('agama', 'like', "%$request->agama%")
            ->where('status', 'like', "%$request->status%")
            ->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data['karyawans']->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view('karyawan.laporan.print', $data);
    }
}
