<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Bible;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BibleController extends Controller
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
        $bible = new Bible();

        if ($request->limit) {

            $bible = $bible->with(['juduls', 'juduls.bible', 'juduls.ayats'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $bible = DB::select("select * from bible where $request->where");
        } else {
            $bible = $bible->with(['juduls', 'juduls.bible', 'juduls.ayats'])->get();
        }

        return view('bible.index', [
            'bible' => $bible,
            'bible_count' => $bible->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('bible.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();

        $this->validate($request, [
            'judul' => 'required|max:100|unique:bible,judul',
        ]);

        $bibleCreate = Bible::create($request->all());

        return redirect()->route('bible.index')->with('success', 'Berhasil menambah bible');
    }

    public function show(Bible $bible)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $bible
        ]);
    }

    public function edit(Bible $bible)
    {
        $this->checkUser();
        $data["bible"] = $bible;
        $data[strtolower("Bible")] = $bible;

        return view('bible.edit', $data);
    }

    public function update(Request $request, Bible $bible)
    {
        $this->checkUser();
        $this->validate($request, [
            'judul' => "required|max:40|unique:bible,judul,$request->judul,judul",
        ]);

        $bible->update($request->all());

        return redirect()->route('bible.index')->with('success', 'Berhasil mengupdate bible');
    }

    public function destroy(Bible $bible)
    {
        $this->checkUser();
        $bible->delete();

        return redirect()->route('bible.index')->with('success', 'Berhasil menghapus bible');
    }
}