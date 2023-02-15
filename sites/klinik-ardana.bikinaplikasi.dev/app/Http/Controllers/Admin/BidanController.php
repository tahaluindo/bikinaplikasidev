<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class BidanController extends Controller
{
    public function index()
    {

        $data = [
            'user' => auth()->user()->user->toArray(),
            'bidan' => \App\Bidan::get()->toArray(),
            'obj' => null,
            'judul' => 'Tambah Data',
            'action' => 'Admin\BidanController@simpan',
            'method' => 'POST',
        ];

        return view('admin.bidan.index', $data);
    }

    public function cari(Request $request)
    {
        if (is_null($request->input('cari'))) {
            return redirect('admin/bidan');
        }

        $data = [
            'user' => auth()->user()->user->toArray(),
            'bidan' => \App\Bidan::where('nama', 'Like', '%' . $request->input('cari') . '%')->get()->toArray(),
            'cari' => $request->input('cari'),
            'obj' => null,
            'judul' => 'Tambah Data',
            'action' => 'Admin\BidanController@simpan',
            'method' => 'POST',
        ];

        return view('admin.bidan.index', $data);
    }

    public function simpan(Request $request)
    {

        $this->validate(
            $request,
            [
                'nama' => 'required',
                'alamat' => 'required',
                'tlpn' => 'required',
                'jadwal' => 'required',
                'username' => 'required|unique:akun',
                'password' => 'required'
            ]
        );

        $bidan = \App\Bidan::create($request->only('nama', 'jenis_kelamin', 'alamat', 'tlpn', 'poli', 'jadwal'));

        $data = [
            'user_type' => 'App\Bidan',
            'user_id' => $bidan->id,
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ];

        \App\Akun::create($data);

        return redirect('admin/bidan')->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function ubah($id)
    {
        $bidan = \App\Bidan::findOrFail($id)->toArray();
        $akun = \App\Akun::where('user_type', 'App\Bidan')->where('user_id', $id)->first()->toArray();
        $bidan['username'] = $akun['username'];

        $data = [
            'user' => auth()->user()->user->toArray(),
            'obj' => $bidan,
            'action' => ['Admin\BidanController@update', $id],
            'method' => 'PUT',
        ];

        return view('admin.bidan.form', $data);
    }

    public function update(Request $request, $id)
    {
        $akun = \App\Akun::where('user_type', 'App\Bidan')->where('user_id', $id);
        $akun_id = $akun->first()->id;

        $this->validate(
            $request,
            [
                'nama' => 'required',
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

        \App\Bidan::findOrFail($id)->update($request->except(['username', 'password']));
        $akun->update($request->only(['username', 'password']));
        return redirect('admin/bidan')->with(['type' => 'success', 'pesan' => 'Berhasil Mengubah Data!']);
    }

    public function detail($id)
    {

        $data = [
            'user' => auth()->user()->user->toArray(),
            'bidan' => \App\Bidan::where('id', $id)->first()->toArray(),
            'obj' => null,
            'judul' => 'Tambah Data',
            'action' => ['Admin\BidanController@simpan_spesialis', $id],
            'method' => 'POST',
        ];

        return view('admin.bidan.detail', $data);
    }

    public function simpan_spesialis(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'spesialis_id' => 'required'
            ]
        );

        $bidan_spesialis = \App\BidanSpesialis::where('bidan_id', $request->input('bidan_id'))->where('spesialis_id', $request->input('spesialis_id'))->get()->toArray();

        if (!(empty($bidan_spesialis))) {
            return redirect('admin/bidan/' . $id . '/detail')->with(['type' => 'error', 'pesan' => 'Data Sudah Ada!']);
        }

        \App\BidanSpesialis::create($request->only('bidan_id', 'spesialis_id'));
        return redirect('admin/bidan/' . $id . '/detail')->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function hapus(Request $request)
    {
        $id = $request->input('id');
        \App\Bidan::find($id)->delete();
        \App\Akun::where('user_type', 'App\Bidan')->where('user_id', $id)->delete();
        return redirect('admin/bidan')->with(['type' => 'success', 'pesan' => 'Berhasil Menghapus Data!']);
    }

    public function hapus_spesialis(Request $request, $id1)
    {
        $data = $request->input('id');
        $data = explode(',', $data);

        $bidan_id = $data[0];

        \App\BidanSpesialis::where('bidan_id', $id1)->where('spesialis_id', $request->id)->delete();
        return redirect('admin/bidan/' . $id1 . '/detail')->with(['type' => 'success', 'pesan' => 'Berhasil Menghapus Data!']);
    }
}
