<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\LaguSion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class LaguSionController extends Controller
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
        $laguSion = new LaguSion();

        if ($request->limit) {

            $laguSion = $laguSion->limit($request->limit)->get();
        } elseif ($request->where) {

            $laguSion = DB::select("select * from lagu_sion where $request->where");
        } else {
            $laguSion = $laguSion->all();
        }

        return view('lagu-sion.index', [
            'laguSion' => $laguSion,
            'laguSion_count' => $laguSion->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('lagu-sion.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $this->validate($request, [
            'judul' => 'required|max:100|unique:lagu_sion,judul',
            'lirik' => 'required|max:100000|unique:lagu_sion,lirik',
            'audio' => 'required',
        ]);
        
        $requestData = $request->all();
        if ($request->hasFile('audio')) {
            $requestData['audio'] = str_replace("\\", "/", $request->file('audio')
                ->move('uploads', time() . "." . $request->file('audio')->getClientOriginalExtension()));
        }

        $laguSionCreate = LaguSion::create($requestData);

        return redirect()->route('lagu-sion.index')->with('success', 'Berhasil menambah lagu sion');
    }

    public function show(LaguSion $laguSion)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $laguSion
        ]);
    }

    public function edit(LaguSion $laguSion)
    {
        $this->checkUser();
        $data["laguSion"] = $laguSion;
        $data[strtolower("LaguSion")] = $laguSion;

        return view('lagu-sion.edit', $data);
    }

    public function update(Request $request, LaguSion $laguSion)
    {
        $this->checkUser();
        $this->validate($request, [
            'judul' => "required|max:100|unique:lagu_sion,judul,$request->judul,judul",
            'lirik' => "required|max:100000",
        ]);
        
        $requestData = $request->all();
        if ($request->hasFile('audio')) {
            $requestData['audio'] = str_replace("\\", "/", $request->file('audio')
                ->move('uploads', time() . "." . $request->file('audio')->getClientOriginalExtension()));
        }

        $laguSionCreate = $laguSion->update($requestData);

        return redirect()->route('lagu-sion.index')->with('success', 'Berhasil mengubah lagu sion');
    }

    public function destroy(LaguSion $laguSion)
    {
        $this->checkUser();
        $laguSion->delete();

        return redirect()->route('lagu-sion.index')->with('success', 'Berhasil mengubah berita');
    }
}