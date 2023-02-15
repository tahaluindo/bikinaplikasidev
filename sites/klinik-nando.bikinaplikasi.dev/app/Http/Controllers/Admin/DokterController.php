<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function index()
    {
        $data = [
            'user' => auth()->user()->user->toArray(),
            'dokter' => \App\Dokter::with('spesialis')->get()->toArray(),
            'obj' => null,
            'judul' => 'Tambah Data',
            'action' => 'Admin\DokterController@simpan',
            'method' => 'POST',
        ];

        return view('admin.dokter.index', $data);
    }

    public function cari(Request $request)
    {
        if (is_null($request->input('cari'))) {
            return redirect('admin/dokter');
        }

        $data = [
            'user' => auth()->user()->user->toArray(),
            'dokter' => \App\Dokter::where('nama', 'Like', '%' . $request->input('cari') . '%')->get()->toArray(),
            'cari' => $request->input('cari'),
            'obj' => null,
            'judul' => 'Tambah Data',
            'action' => 'Admin\DokterController@simpan',
            'method' => 'POST',
        ];

        return view('admin.dokter.index', $data);
    }

    public function simpan(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'tlpn' => 'required',
                'jadwal' => 'required',
                'username' => 'required|unique:akun',
                'password' => 'required'
            ]
        );

        $dokter = \App\Dokter::create($request->only('nama', 'jenis_kelamin', 'alamat', 'tlpn', 'poli', 'jadwal'));

        $data = [
            'user_type' => 'App\Dokter',
            'user_id' => $dokter->id,
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ];

        \App\Akun::create($data);

        return redirect('admin/dokter')->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function ubah($id)
    {
        $dokter = \App\Dokter::findOrFail($id)->toArray();
        
        $akun = \App\Akun::where('user_type', 'App\Dokter')->where('user_id', $id)->first()->toArray();
        $dokter['username'] = $akun['username'];

        $data = [
            'user' => auth()->user()->user->toArray(),
            'obj' => $dokter,
            'action' => ['Admin\DokterController@update', $id],
            'method' => 'PUT',
        ];

        return view('admin.dokter.form', $data);
    }

    public function update(Request $request, $id)
    {
        $akun = \App\Akun::where('user_type', 'App\Dokter')->where('user_id', $id);
        $akun_id = $akun->first()->id;

        $this->validate(
            $request,
            [
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'tlpn' => 'required',
                'jadwal' => 'required',
                'username' => 'required|unique:akun,username,' . $akun_id,
            ]
        );

        if (is_null($request->input('password'))) {
            $request->request->remove('password');
        } else {
            $password = $request->input('password');
            $password = Hash::make($password);
            $request->merge(['password' => $password]);
        }

        \App\Dokter::findOrFail($id)->update($request->except(['username', 'password']));
        $akun->update($request->only(['username', 'password']));
        return redirect('admin/dokter')->with(['type' => 'success', 'pesan' => 'Berhasil Mengubah Data!']);
    }

    public function detail($id)
    {

        $data = [
            'user' => auth()->user()->user->toArray(),
            'dokter' => \App\Dokter::where('id', $id)->with('spesialis')->first()->toArray(),
            'spesialis' => \App\Spesialis::pluck('nama', 'id'),
            'obj' => null,
            'judul' => 'Tambah Data',
            'action' => ['Admin\DokterController@simpan_spesialis', $id],
            'method' => 'POST',
        ];

        return view('admin.dokter.detail', $data);
    }

    public function simpan_spesialis(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'spesialis_id' => 'required'
            ]
        );

        $dokter_spesialis = \App\DokterSpesialis::where('dokter_id', $request->input('dokter_id'))->where('spesialis_id', $request->input('spesialis_id'))->get()->toArray();

        if (!(empty($dokter_spesialis))) {
            return redirect('admin/dokter/' . $id . '/detail')->with(['type' => 'error', 'pesan' => 'Data Sudah Ada!']);
        }

        \App\DokterSpesialis::create($request->only('dokter_id', 'spesialis_id'));
        return redirect('admin/dokter/' . $id . '/detail')->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function hapus(Request $request)
    {
        $id = $request->input('id');
        \App\Dokter::find($id)->delete();
        \App\Akun::where('user_type', 'App\Dokter')->where('user_id', $id)->delete();
        return redirect('admin/dokter')->with(['type' => 'success', 'pesan' => 'Berhasil Menghapus Data!']);
    }

    public function hapus_spesialis(Request $request, $id1)
    {
        $data = $request->input('id');
        $data = explode(',', $data);

        $dokter_id = $data[0];

        \App\DokterSpesialis::where('dokter_id', $id1)->where('spesialis_id', $request->id)->delete();
        return redirect('admin/dokter/' . $id1 . '/detail')->with(['type' => 'success', 'pesan' => 'Berhasil Menghapus Data!']);
    }
}
