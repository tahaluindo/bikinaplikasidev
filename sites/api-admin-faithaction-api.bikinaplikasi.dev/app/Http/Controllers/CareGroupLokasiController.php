<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CareGroupLokasi;
use App\Models\CareGroupLokasiFasilitas;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CareGroupLokasiController extends Controller
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
        $careGroupLokasi = CareGroupLokasi::all();

        return view('care-group-lokasi.index', [
            'careGroupLokasi' => $careGroupLokasi,
            'careGroupLokasi_count' => $careGroupLokasi->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('care-group-lokasi.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();

        $this->validate($request, [
            'nama' => 'required|max:50',
        ]);

        CareGroupLokasi::create([
            'nama' => $request->nama,
        ]);

        return redirect(route('care-group-lokasi.index'))->with('success', 'Berhasil menambah care Group lokasi');
    }


    public function show(CareGroupLokasi $careGroupLokasi)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $careGroupLokasi
        ]);
    }


    public function edit(CareGroupLokasi $careGroupLokasi)
    {
        $this->checkUser();
        $data['careGroupLokasi'] = $careGroupLokasi;

        return view('care-group-lokasi.edit', $data);
    }

    public function update(Request $request, CareGroupLokasi $careGroupLokasi)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:60',
        ]);

        $careGroupLokasi->update([
            'nama' => $request->nama,
        ]);

        return redirect(route('care-group-lokasi.index'))->with('success', 'Berhasil mengupdate care Group lokasi');
    }

    public function destroy(CareGroupLokasi $careGroupLokasi)
    {
        $this->checkUser();
        $careGroupLokasi->delete();

        return redirect(route('care-group-lokasi.index'))->with('success', 'Berhasil menghapus care Group lokasi');
    }
}