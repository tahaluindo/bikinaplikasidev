<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\BibleReadingJudul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BibleReadingJudulController extends Controller
{
    public function index(Request $request)
    {
        $bibleReadingJudul = new BibleReadingJudul();
        
        if ($request->limit) {

            $bibleReadingJudul = $bibleReadingJudul->with(['bible_reading', 'kategori'])->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $bibleReadingJudul = DB::select("select * from bible_reading_judul where $request->where");
        }
        
        else {
            $bibleReadingJudul = $bibleReadingJudul->with(['bible_reading', 'kategori'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $bibleReadingJudul
        ]);
    }

}