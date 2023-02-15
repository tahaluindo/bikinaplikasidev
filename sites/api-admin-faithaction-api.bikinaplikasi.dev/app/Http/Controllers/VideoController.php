<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Video;
use App\Models\VideoFasilitas;
use App\Models\VideoKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
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
        $video = new Video();

        if ($request->limit) {

            $video = $video->with(['video_kategori'])->limit($request->limit)->get();
        }

        if ($request->where) {

            $video = DB::select("select * from video where $request->where");
        } else {
            $video = $video->with(['video_kategori'])->get();
        }

        return view('video.index', [
            'video' => $video,
            'video_count' => $video->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        $data['video_kategori'] = VideoKategori::pluck('nama', 'id');

        return view('video.create', $data);
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'gambar' => 'required',
            'judul' => 'required|max:255|unique:video,judul',
            'link' => 'required|max:255|unique:video,link',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        $videoCreate = Video::create($requestData);

        return redirect()->route('video.index')->with('success', 'Berhasil menambah video');
    }

    public function show(Video $video)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $video
        ]);
    }


    public function edit(Video $video)
    {
        $this->checkUser();
        $data["video"] = $video;
        $data[strtolower("Video")] = $video;
        $data['video_kategori'] = VideoKategori::pluck('nama', 'id');

        return view('video.edit', $data);
    }

    public function update(Request $request, Video $video)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'judul' => "required|max:255|unique:video,judul,$request->judul,judul",
            'link' => "required|max:255|unique:video,link,$request->link,link",
        ]);


        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));

            \File::delete($video->gambar);
        }

        $video->update($requestData);

        return redirect()->route('video.index')->with('success', 'Berhasil mengupdate video');
    }

    public function destroy(Video $video)
    {
        $this->checkUser();
        $video->delete();

        return redirect()->route('video.index')->with('success', 'Berhasil menghapus video');
    }
}