<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = [
            'user' => auth()->user()->user->toArray(),
            'pegawai' => \App\Pegawai::all()->toArray(),
            'judul' => 'Tambah Data',
            'action' => 'Admin\PegawaiController@simpan',
            'method' => 'POST',
        ];

        return view('admin.pegawai.index', $data);
    }

    public function cari(Request $request)
    {
        if (is_null($request->input('cari'))) {
            return redirect('admin/pegawai');
        }

        $data = [
            'user' => auth()->user()->user->toArray(),
            'pegawai' => \App\Pegawai::where('nama', 'Like', '%' . $request->input('cari') . '%')->get()->toArray(),
            'cari' => $request->input('cari'),
            'obj' => null,
            'judul' => 'Tambah Data',
            'action' => 'Admin\PegawaiController@simpan',
            'method' => 'POST',
        ];

        return view('admin.pegawai.index', $data);
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
                'username' => 'required|unique:akun',
                'password' => 'required'
            ]
        );
        $pegawai = \App\Pegawai::create($request->only('nama', 'jenis_kelamin', 'alamat', 'tlpn'));

        $data = [
            'user_type' => 'App\Pegawai',
            'user_id' => $pegawai->id,
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ];

        \App\Akun::create($data);

        return redirect('admin/pegawai')->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function ubah($id)
    {
        $pegawai = \App\Pegawai::findOrFail($id)->toArray();
        $akun = \App\Akun::where('user_type', 'App\Pegawai')->where('user_id', $id)->first()->toArray();
        $pegawai['username'] = $akun['username'];

        $data = [
            'user' => auth()->user()->user->toArray(),
            'obj' => $pegawai,
            'action' => ['Admin\PegawaiController@update', $id],
            'method' => 'PUT',
        ];

        return view('admin.pegawai.form', $data);
    }

    public function update(Request $request, $id)
    {
        $akun = \App\Akun::where('user_type', 'App\Pegawai')->where('user_id', $id);
        $akun_id = $akun->first()->id;

        $this->validate(
            $request,
            [
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'tlpn' => 'required',
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

        \App\Pegawai::findOrFail($id)->update($request->except(['username', 'password']));
        $akun->update($request->only(['username', 'password']));
        return redirect('admin/pegawai')->with(['type' => 'success', 'pesan' => 'Berhasil Mengubah Data!']);
    }

    public function hapus(Request $request)
    {
        $id = $request->input('id');
        \App\Pegawai::find($id)->delete();
        \App\Akun::where('user_type', 'App\Pegawai')->where('user_id', $id)->delete();
        return redirect('admin/pegawai')->with(['type' => 'success', 'pesan' => 'Berhasil Menghapus Data!']);
    }
}
