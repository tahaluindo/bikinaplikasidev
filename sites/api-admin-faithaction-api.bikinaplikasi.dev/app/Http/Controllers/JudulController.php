<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Ayat;
use App\Models\Disukai;
use App\Models\Judul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use phpQuery;

class JudulController extends Controller
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
        $judul = new Judul();

        if ($request->limit) {

            $judul = $judul->where('bible_id', $request->bible_id)->with(['bible'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $judul = DB::select("select * from judul where $request->where");
        } else {
            $judul = $judul->where('bible_id', $request->bible_id)->with(['bible'])->get();
        }

        return view('bible.judul.index', [
            'judul' => $judul,
            'judul_count' => $judul->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('bible.judul.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();

        $html = $request->judul;

        phpQuery::newDocumentHTML($html);

        $ayats = phpQuery::pq("#passage-text p");

        $judulCreate = null;
        foreach ($ayats as $key => $ayat) {
            $judul = pq($ayat)->find(".paragraphtitle")->eq(0);

            if ($judul->text() != "") {
                $judulCreate = Judul::create([
                    'bible_id' => $request->bible_id,
                    'judul' => $judul->text()
                ]);

                continue;
            }


            $isi = pq($ayat)->find('.reftext a')->eq(0)->text();
            $ayat = pq($ayat)->find('[data-dur]')->eq(0)->text();

            if ($isi || $ayat) {
                $ayatCreate = Ayat::create([
                    'bible_id' => $request->bible_id,
                    "judul_id" => $judulCreate ? $judulCreate->id : null,
                    "ayat" => $isi,
                    "isi" => $ayat
                ]);
            }

            $judulCreate = null;
        }

        return redirect(route('bible.judul.index') . "?bible_id=$request->bible_id")->with('success', 'Berhasil menambah judul');
    }

    public function show(Judul $judul)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $judul
        ]);
    }

    public function edit(Judul $judul)
    {
        $this->checkUser();
        $data["judul"] = $judul;
        $data[strtolower("Judul")] = $judul;

        return view('bible.judul.edit', $data);
    }

    public function update(Request $request, Judul $judul)
    {
        $this->checkUser();
        $this->validate($request, [
            'judul' => 'required|max:255',
        ]);

        $judul->update($request->all());

        return redirect(route('bible.judul.index') . "?bible_id=$request->bible_id")->with('success', 'Berhasil mengupdate judul');
    }

    public function destroy(Request $request, Judul $judul)
    {
        $this->checkUser();
        $judul->delete();

        return redirect(route('bible.judul.index') . "?bible_id=$request->bible_id")->with('success', 'Berhasil menghapus judul');
    }
}