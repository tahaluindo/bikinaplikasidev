<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Gereja;
use App\Models\GerejaFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GerejaController extends Controller
{
    public function checkUser()
    {
        if (in_array(auth()->user()->level, ['Admin'])) {

        } else {
            die('Tidak ada hak akses!');
        }
    }

    public function index(Request $request)
    {
        $this->checkUser();
        $gereja = Gereja::all();

        return view('gereja.index', [
            'gereja' => $gereja,
            'gereja_count' => $gereja->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('gereja.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'uni' => 'required',
            'daerah' => 'required',
        ]);

        Gereja::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'uni' => $request->uni,
            'daerah' => $request->daerah,
        ]);

        return redirect(route('gereja.index'))->with('success', 'Berhasil menambah care Group kategori');
    }


    public function show(Gereja $gereja)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $gereja
        ]);
    }


    public function edit(Gereja $gereja)
    {
        $this->checkUser();
        $data['gereja'] = $gereja;

        return view('gereja.edit', $data);
    }

    public function update(Request $request, Gereja $gereja)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:60',
            'alamat' => 'required',
        ]);

        $gereja->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'uni' => $request->uni,
            'daerah' => $request->daerah,
        ]);

        return redirect(route('gereja.index'))->with('success', 'Berhasil mengupdate care Group kategori');
    }

    public function destroy(Gereja $gereja)
    {
        $this->checkUser();
        $gereja->delete();

        return redirect(route('gereja.index'))->with('success', 'Berhasil menghapus care Group kategori');
    }
}