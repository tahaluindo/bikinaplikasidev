<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = \App\Pasien::all()->toArray();
        $user = auth()->user()->user->toArray();


        $data = [
            'pasien' => $pasien,
            'user' => $user,
        ];

        return view('admin.pasien.index', $data);
    }

    public function detail($id)
    {
        $pasien = \App\Pasien::where('id', $id)->first()->toArray();
        $user = auth()->user()->user->toArray();


        $data = [
            'pasien' => $pasien,
            'user' => $user,
        ];

        return view('admin.pasien.detail', $data);
    }

    public function delete(Request $request)
    {
        \App\Pasien::findOrFail($request->id)->delete();

        return redirect()->back()->with(['type' => 'success', 'pesan' => 'Berhasil menghapus data pasien.']);
    }
}
