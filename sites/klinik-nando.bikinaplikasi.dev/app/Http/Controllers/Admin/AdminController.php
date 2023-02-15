<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'user' => auth()->user()->user->toArray(),
            'admin' => \App\Admin::all()->toArray(),
            'judul' => 'Tambah Data',
            'action' => 'Admin\AdminController@simpan',
            'method' => 'POST',
        ];

        return view('admin.admin.index', $data);
    }

    public function simpan(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required',
                'username' => 'required|unique:akun',
                'password' => 'required'
            ]
        );

        $admin = \App\Admin::create($request->only('nama'));

        $data = [
            'user_type' => 'App\Admin',
            'user_id' => $admin->id,
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ];

        \App\Akun::create($data);

        return redirect('admin/admin')->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function ubah($id)
    {
        $admin = \App\Admin::findOrFail($id)->toArray();
        $akun = \App\Akun::where('user_type', 'App\Admin')->where('user_id', $id)->first()->toArray();
        $admin['username'] = $akun['username'];

        $data = [
            'user' => auth()->user()->user->toArray(),
            'obj' => $admin,
            'action' => ['Admin\AdminController@update', $id],
            'method' => 'PUT',
        ];

        return view('admin.admin.form', $data);
    }

    public function update(Request $request, $id)
    {
        $akun = \App\Akun::where('user_type', 'App\Admin')->where('user_id', $id);
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

        \App\Admin::findOrFail($id)->update($request->except(['username', 'password']));
        $akun->update($request->only(['username', 'password']));
        return redirect('admin/admin')->with(['type' => 'success', 'pesan' => 'Berhasil Mengubah Data!']);
    }

    public function hapus(Request $request)
    {
        $id = $request->input('id');
        if (auth()->user()->user->id == $id) {
            return redirect('admin/admin')->with(['type' => 'error', 'pesan' => 'Data Tidak Bisa Dihapus!']);
        }
        \App\Admin::find($id)->delete();
        \App\Akun::where('user_type', 'App\Admin')->where('user_id', $id)->delete();
        return redirect('admin/admin')->with(['type' => 'success', 'pesan' => 'Berhasil Menghapus Data!']);
    }
}
