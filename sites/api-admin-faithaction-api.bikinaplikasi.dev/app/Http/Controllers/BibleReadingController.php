<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\BibleReading;
use App\Models\Disukai;
use App\Models\Judul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BibleReadingController extends Controller
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
        $bibleReading = BibleReading::all();

        return view('bible-reading.index', [
            'bibleReading' => $bibleReading,
            'bibleReading_count' => $bibleReading->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('bible-reading.create', [
            'judul' => Judul::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $this->validate($request, [
            'tanggal' => 'required|date|unique:bible_reading,tanggal',
            'judul_id' => 'required|unique:bible_reading,judul_id',
        ]);

        BibleReading::create($request->all());

        return redirect()->route('bible-reading.index')->with('success', 'Berhasil menambah bible reading');
    }

    public function show(BibleReading $bibleReading)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $bibleReading
        ]);
    }

    public function edit(BibleReading $bibleReading)
    {
        $this->checkUser();
        $data["bibleReading"] = $bibleReading;
        $data['judul'] = Judul::pluck('judul', 'id');

        return view('bible-reading.edit', $data);
    }

    public function update(Request $request, BibleReading $bibleReading)
    {
        $this->checkUser();
        $this->validate($request, [
            'tanggal' => "required|date|unique:bible_reading,tanggal,$request->tanggal,tanggal",
            'judul_id' => "required|unique:bible_reading,judul_id,$request->judul_id,judul_id",
        ]);

        $bibleReading->update($request->all());

        return redirect()->route('bible-reading.index')->with('success', 'Berhasil mengubah bible reading');
    }

    public function destroy(BibleReading $bibleReading)
    {
        $this->checkUser();
        $bibleReading->delete();

        return redirect()->route('bible-reading.index')->with('success', 'Berhasil menghapus bible reading');
    }

    public function reset()
    {
        $this->checkUser();
        DB::transaction(function () {
            BibleReading::where('id', '>', 0)->delete();

            $judul = Judul::all();

            for ($i = 0; $i < $judul->count(); $i++) {
                BibleReading::create([
                    'judul_id' => $judul[$i]->id,
                    'tanggal' => \Carbon\Carbon::parse(now()->setDate(date("Y"), date("m"), "01")->addDays($i))->format("Y-m-d")
                ]);
            }
        });

        return redirect()->route('bible-reading.index')->with('success', 'Berhasil mereset bible reading');
    }
}