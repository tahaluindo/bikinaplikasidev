<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Berita;
use App\Models\Disukai;
use App\Models\VideoKategori;
use App\Models\VideoKategoriFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class VideoKategoriController extends Controller
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
        $videoKategori = new VideoKategori();

        if ($request->limit) {

            $videoKategori = $videoKategori->limit($request->limit)->get();
        }

        if ($request->where) {

            $videoKategori = DB::select("select * from video_kategori where $request->where");
        } else {
            $videoKategori = $videoKategori->get();
        }

        return view('video-kategori.index', [
            'videoKategori' => $videoKategori,
            'videoKategori_count' => $videoKategori->count()
        ]);
    }


    public function create()
    {
        $this->checkUser();
        return view('video-kategori.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:40|unique:video_kategori,nama',
        ]);

        $videoKategoriCreate = VideoKategori::create($request->all());

        return redirect()->route('video-kategori.index')->with('success', 'Berhasil menambah video kategori');
    }

    public function show(VideoKategori $videoKategori)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $videoKategori
        ]);
    }

    public function edit(VideoKategori $videoKategori)
    {
        $this->checkUser();
        $data["videoKategori"] = $videoKategori;
        $data[strtolower("VideoKategori")] = $videoKategori;

        return view('video-kategori.edit', $data);
    }

    public function update(Request $request, VideoKategori $videoKategori)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => "required|max:40|unique:video_kategori,nama,$request->nama,nama",
        ]);

        $videoKategoriCreate = $videoKategori->update($request->all());

        return redirect()->route('video-kategori.index')->with('success', 'Berhasil mengupdate video kategori');
    }

    public function destroy(VideoKategori $videoKategori)
    {
        $this->checkUser();
        $videoKategori->delete();

        return redirect()->route('video-kategori.index')->with('success', 'Berhasil menghapus video kategori');
    }
}