<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpesialisController extends Controller
{
    public function index()
    {
        $data = [
            'user' => auth()->user()->user->toArray(),
            'spesialis' => \App\Spesialis::all(),
            'judul' => 'Tambah Data',
            'action' => 'Admin\SpesialisController@simpan',
            'method' => 'POST',
        ];
        return view('admin.spesialis.index', $data);
    }

    public function simpan(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required'
            ]
        );
        \App\Spesialis::create($request->only('nama'));

        return redirect('admin/spesialis')->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function ubah($id)
    {
        $data = [
            'user' => auth()->user()->user->toArray(),
            'obj' => \App\Spesialis::findOrFail($id),
            'action' => ['Admin\SpesialisController@update', $id],
            'method' => 'PUT',
        ];

        return view('admin.spesialis.form', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required'
            ]
        );
        \App\Spesialis::findOrFail($id)->update($request->only(['nama']));
        return redirect('admin/spesialis')->with(['type' => 'success', 'pesan' => 'Berhasil Mengubah Data!']);
    }

    public function hapus(Request $request)
    {
        $id = $request->input('id');
        \App\Spesialis::find($id)->delete();
        return redirect('admin/spesialis')->with(['type' => 'success', 'pesan' => 'Berhasil Menghapus Data!']);
    }
}
