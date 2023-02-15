<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Ayat;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AyatController extends Controller
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
        $ayat = new Ayat();

        if ($request->limit) {

            $ayat = $ayat->where('bible_id', $request->bible_id)->limit($request->limit)->get();
        } elseif ($request->where) {

            $ayat = DB::select("select * from ayat where $request->where");
        } else {
            $ayat = $ayat->where('bible_id', $request->bible_id)->get();
        }

        return view('bible.judul.ayat.index', [
            'ayat' => $ayat,
            'ayat_count' => $ayat->count()
        ]);
    }


    public function show(Ayat $ayat)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $ayat
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('bible.judul.ayat.create');
    }


    public function store(Request $request)
    {
        $this->checkUser();
        $this->validate($request, [
//            'ayat' => 'required|max:3',
//            'isi' => 'required|max:5000',
        ]);

        if ($request->items) {
            foreach (explode("\r\n\r\n", $request->items) as $item) {
                if (Ayat::where(['ayat' => $request->ayat, 'judul_id' => $request->judul_id])->first()) {
                    continue;
                }

                preg_match("/(#([0-9]+)#\s)/", $item, $ayat);
                $isi = preg_replace("/(#([0-9]+)#\s)/", "", $item);

                $ayatCreate = Ayat::create([
                    "judul_id" => $request->judul_id,
                    "ayat" => end($ayat),
                    "isi" => $isi
                ]);
            }
        } else {
            $request->request->remove("items");

            if (Ayat::where(['ayat' => $request->ayat, 'judul_id' => $request->judul_id])->first()) {
                return redirect()->back()->with('error', 'judul dan ayat tersebut sudah ada!');
            }

            $ayatCreate = Ayat::create($request->all());
        }


        return redirect(route('bible.judul.ayat.index') . "?judul_id=$request->judul_id")->with('success', 'Berhasil menambah ayat');
    }

    public function edit(Ayat $ayat)
    {
        $this->checkUser();
        $data["ayat"] = $ayat;
        $data[strtolower("Ayat")] = $ayat;

        return view('bible.judul.ayat.edit', $data);
    }

    public function update(Request $request, Ayat $ayat)
    {
        $this->checkUser();
        $this->validate($request, [
            'ayat' => 'required|max:3',
            'isi' => 'required|max:5000',
        ]);

        if (Ayat::where(['ayat' => $request->ayat, 'judul_id' => $request->judul_id])->where('id', '!=', $ayat->id)->first()) {
            return redirect()->back()->with('error', 'judul dan ayat tersebut sudah ada!');
        }

        $ayat->update($request->all());

        return redirect(route('bible.judul.ayat.index') . "?judul_id=$request->judul_id")->with('success', 'Berhasil mengupdate ayat');
    }

    public function destroy(Request $request, Ayat $ayat)
    {
        $this->checkUser();
        $ayat->delete();

        return redirect(route('bible.judul.ayat.index') . "?judul_id=$request->judul_id")->with('success', 'Berhasil menghapus ayat');
    }
}