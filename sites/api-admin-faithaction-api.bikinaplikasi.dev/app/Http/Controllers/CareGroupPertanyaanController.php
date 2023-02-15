<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CareGroupPertanyaan;
use App\Models\CareGroupPertanyaanFasilitas;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CareGroupPertanyaanController extends Controller
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
        $careGroupPertanyaan = CareGroupPertanyaan::all();

        return view('care-group-pertanyaan.index', [
            'careGroupPertanyaan' => $careGroupPertanyaan,
            'careGroupPertanyaan_count' => $careGroupPertanyaan->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('care-group-pertanyaan.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();

        $this->validate($request, [
            'pertanyaan' => 'required|max:50',
            'jawaban' => 'required',
        ]);

        CareGroupPertanyaan::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);

        return redirect(route('care-group-pertanyaan.index'))->with('success', 'Berhasil menambah care Group pertanyaan');
    }


    public function show(CareGroupPertanyaan $careGroupPertanyaan)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $careGroupPertanyaan
        ]);
    }


    public function edit(CareGroupPertanyaan $careGroupPertanyaan)
    {
        $this->checkUser();
        $data['careGroupPertanyaan'] = $careGroupPertanyaan;

        return view('care-group-pertanyaan.edit', $data);
    }

    public function update(Request $request, CareGroupPertanyaan $careGroupPertanyaan)
    {
        $this->checkUser();
        $this->validate($request, [
            'pertanyaan' => 'required|max:60',
            'jawaban' => 'required',
        ]);

        $careGroupPertanyaan->update([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);

        return redirect(route('care-group-pertanyaan.index'))->with('success', 'Berhasil mengupdate care Group pertanyaan');
    }

    public function destroy(CareGroupPertanyaan $careGroupPertanyaan)
    {
        $this->checkUser();
        $careGroupPertanyaan->delete();

        return redirect(route('care-group-pertanyaan.index'))->with('success', 'Berhasil menghapus care Group pertanyaan');
    }
}