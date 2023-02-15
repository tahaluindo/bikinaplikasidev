<?php

namespace App\Http\Controllers;

use App\User;
use App\Kelas;
use App\MapelDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['kelass'] = Kelas::paginate(1000);

        if(auth()->user()->level == 'guru') {
            $mapel_details = MapelDetail::where('user_id', auth()->user()->id)->get();
            $mapel_detail_kelas_ids = $mapel_details->pluck('kelas_id')->toArray();

            $data['kelass'] = Kelas::whereIn('id', $mapel_detail_kelas_ids)->get();
        }

        return view('kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $wali_kelas_ids  = Kelas::pluck('wali_kelas')->toArray();
        // $ketua_kelas_ids = Kelas::pluck('ketua_kelas')->toArray();

        // $data['wali_kelass']  = User::where('level', 'guru')->whereNotIn('id', $wali_kelas_ids)->pluck('nama', 'id');
        // $data['ketua_kelass'] = User::where('level', 'siswa')->whereNotIn('id', $wali_kelas_ids)->pluck('nama', 'id');

        // return view('kelas.create', $data);
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi jika user menginputkan wali kelas tanpa ketua kelas
        // if ($request->wali_kelas && !$request->ketua_kelas) {
        //     $this->validate($request, [
        //         'nama'       => 'required|min:3|max:30',
        //         'wali_kelas' => 'required|exists:users,id|unique:kelass,wali_kelas',
        //         'ruang'      => 'required|max:10',
        //     ]);
        // }

        // // validasi jika user menginputkan ketua kelas tanpa wali kelas
        // elseif (!$request->wali_kelas && $request->ketua_kelas) {
        //     $this->validate($request, [
        //         'nama'        => 'required|min:3|max:30',
        //         'ketua_kelas' => 'required|exists:users,id|unique:kelass,ketua_kelas',
        //         'ruang'       => 'required|max:10',
        //     ]);
        // }

        // // validasi jika user tidak menginputkan ketua ataupun wali kelas
        // elseif (!$request->wali_kelas && !$request->ketua_kelas) {
        //     $this->validate($request, [
        //         'nama'  => 'required|min:3|max:30',
        //         'ruang' => 'required|max:10',
        //     ]);
        // }

        // // validasi jika user menginputkan semua data
        // else {
        //     $this->validate($request, [
        //         'nama'        => 'required|min:3|max:30',
        //         'ketua_kelas' => 'required|exists:users,id|unique:kelass,ketua_kelas',
        //         'wali_kelas'  => 'required|exists:users,id|unique:kelass,wali_kelas',
        //         'ruang'       => 'required|max:10',
        //     ]);
        // }

        $this->validate($request, [
            'nama'  => 'required|min:3|max:30|unique:kelass,nama',
            'ruang' => 'required|max:10',
            // 'tingkat' => 'required|integer|max:3|min:1'
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with("success", "Berhasil menambah kelas");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
        $data['kelas'] = $kelas;

        return view('kelas.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kela)
    {
        //
        $wali_kelas_ids       = Kelas::whereNotNull('wali_kelas')->pluck('wali_kelas')->toArray();
        $ketua_kelas_ids      = Kelas::whereNotNull('ketua_kelas')->pluck('ketua_kelas')->toArray();
        $data['wali_kelass']  = User::orderBy('nama')->where('level', 'guru')->whereNotIn('id', $wali_kelas_ids)->pluck('nama', 'id')->toArray();
        $data['ketua_kelass'] = User::orderBy('nama')->where('kelas_id', $kela->id)->where('level', 'siswa')->whereNotIn('id', $ketua_kelas_ids)->pluck('nama', 'id')->toArray();
        $data['kelas']        = $kela;

        if ($kela->wali_kelas) {
            $data['wali_kelass'][$kela->wali_kelas()->id] = $kela->wali_kelas()->nama;
        }

        if ($kela->ketua_kelas) {
            $data['ketua_kelass'][$kela->ketua_kelas()->id] = $kela->ketua_kelas()->nama;
        }

        return view('kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kela)
    {
        // validasi jika user menginputkan wali kelas tanpa ketua kelas
        if ($request->wali_kelas && !$request->ketua_kelas) {
            $this->validate($request, [
                'nama'       => 'required|min:3|max:30',
                'wali_kelas' => "required_if:wali_kelas,!=,{$kela->wali_kelas}|exists:users,id|unique:kelass,wali_kelas,{$kela->wali_kelas},wali_kelas",
                'ruang'      => 'required|max:10',
            ]);
        }

        // validasi jika user menginputkan ketua kelas tanpa wali kelas
        elseif (!$request->wali_kelas && $request->ketua_kelas) {
            $this->validate($request, [
                'nama'        => 'required|min:3|max:30',
                'ketua_kelas' => "required_if:ketua_kelas,!=,{$kela->ketua_kelas}|exists:users,id|unique:kelass,ketua_kelas,{$kela->ketua_kelas},ketua_kelas",
                'ruang'       => 'required|max:10',
            ]);
        }

        // validasi jika user tidak menginputkan ketua ataupun wali kelas
        elseif (!$request->wali_kelas && !$request->ketua_kelas) {
            $this->validate($request, [
                'nama'  => 'required|min:3|max:30',
                'ruang' => 'required|max:10',
            ]);
        }

        // validasi jika user menginputkan semua data
        else {
            $this->validate($request, [
                'nama'        => 'required|min:3|max:30',
                'ketua_kelas' => "required_if:ketua_kelas,!=,{$kela->ketua_kelas}|exists:users,id|unique:kelass,ketua_kelas,{$kela->ketua_kelas},ketua_kelas",
                'wali_kelas'  => "required_if:wali_kelas,!=,{$kela->wali_kelas}|exists:users,id|unique:kelass,wali_kelas,{$kela->wali_kelas},wali_kelas",
                'ruang'       => 'required|max:10',
            ]);
        }

        $kela->update($request->all());

        return redirect()->route('kelas.index')->with("success", "Berhasil mengupdate Kelas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        //
        $kela->delete();

        return redirect()->route('kelas.index')->with("success", "Berhasil menghapus Kelas");
    }

    public function hapus_semua(Request $request)
    {
        $kelass = Kelas::whereIn('id', json_decode($request->ids, true))->get();

        Kelas::whereIn('id', $kelass->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kelas');
    }

}
