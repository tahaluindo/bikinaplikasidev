<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\JudulBookmark;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class JudulBookmarkController extends Controller
{
    public function index(Request $request)
    {
        $judulBookmark = new JudulBookmark();

        if ($request->user_id) {
            $judulBookmark = $judulBookmark->where('user_id', $request->user_id)->where('bookmark', 'Ya');
        }

        if ($request->limit) {

            $judulBookmark = $judulBookmark->with(['judul', 'judul.bible.ayats.judul', 'judul.ayats', 'user'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $judulBookmark = DB::select("select * from judul_bookmark where $request->where");
        } else {
            $judulBookmark = $judulBookmark->with(['judul', 'judul.bible.ayats.judul', 'judul.ayats', 'user'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $judulBookmark
        ]);
    }

    public function remove(Request $request)
    {
        JudulBookmark::findOrFail($request->judul_bookmark_id)->delete();

        return response()->json([
            "success" => true,
            'message' => "Berhasil menghapus Judul Bookmark"
        ]);
    }

    public function add(Request $request)
    {
        JudulBookmark::updateOrcreate(['user_id' => $request->user_id, 'judul_id' => $request->judul_id], $request->all());

        return response()->json([
            "success" => true,
            'message' => "Berhasil menambah Judul Bookmark"
        ]);
    }

}