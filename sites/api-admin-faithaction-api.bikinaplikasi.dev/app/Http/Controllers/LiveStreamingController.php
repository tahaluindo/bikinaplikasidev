<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Disukai;
use App\Models\LiveStreaming;
use App\Models\LiveStreamingFasilitas;
use App\Models\LiveStreamingKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveStreamingController extends Controller
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
        $liveStreaming = new LiveStreaming();

        if ($request->limit) {

            $liveStreaming = $liveStreaming->limit($request->limit)->get();
        }

        if ($request->where) {

            $liveStreaming = DB::select("select * from live_streaming where $request->where");
        } else {
            $liveStreaming = $liveStreaming->get();
        }

        return view('live-streaming.index', [
            'liveStreaming' => $liveStreaming,
            'liveStreaming_count' => $liveStreaming->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();

        return view('live-streaming.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'gambar' => 'required',
            'judul' => 'required|max:255|unique:live_streaming,judul',
            'link' => 'required|max:255|unique:live_streaming,link',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        $liveStreamingCreate = LiveStreaming::create($requestData);

        return redirect()->route('live-streaming.index')->with('success', 'Berhasil menambah live Streaming');
    }

    public function show(LiveStreaming $live_streaming)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $live_streaming
        ]);
    }


    public function edit(LiveStreaming $live_streaming)
    {
        $this->checkUser();
        $data["live_streaming"] = $live_streaming;
        $data[strtolower("live_streaming")] = $live_streaming;

        return view('live-streaming.edit', $data);
    }

    public function update(Request $request, LiveStreaming $liveStreaming)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'judul' => "required|max:255|unique:live_streaming,judul,$request->judul,judul",
            'link' => "required|max:255|unique:live_streaming,link,$request->link,link",
        ]);


        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));

            \File::delete($liveStreaming->gambar);
        }

        $liveStreaming->update($requestData);

        return redirect()->route('live-streaming.index')->with('success', 'Berhasil mengupdate liveStreaming');
    }

    public function destroy(LiveStreaming $liveStreaming)
    {
        $this->checkUser();
        $liveStreaming->delete();

        return redirect()->route('live-streaming.index')->with('success', 'Berhasil menghapus liveStreaming');
    }
}