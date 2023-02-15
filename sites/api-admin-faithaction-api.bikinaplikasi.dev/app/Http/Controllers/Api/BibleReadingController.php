<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\BibleReading;
use App\Models\BibleReadingUser;
use App\Models\Disukai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BibleReadingController extends Controller
{
    public function index(Request $request)
    {
        $bibleReading = new BibleReading();

        if ($request->limit) {
            $bibleReading = $bibleReading->with(['judul', 'judul.bible', 'bible_reading_users' => function ($query) use ($request) {
                $query->where('user_id', $request->user_id);
            }])->limit($request->limit)->get();
        } elseif ($request->where) {

            $bibleReading = DB::select("select * from bible_reading where $request->where");
        } else {
            $bibleReading = $bibleReading->with(['judul', 'judul.bible', 'judul.ayats', 'bible_reading_users' => function ($query) use ($request) {
                $query->where('user_id', $request->user_id);
            }])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $bibleReading
        ]);
    }


    public function bookmark(Request $request)
    {
        DB::transaction(function () use ($request) {
            BibleReadingUser::where('user_id', $request->user_id)->delete();
            foreach (json_decode($request->bible_reading_ids) as $bible_reading_id) {
                BibleReadingUser::create([
                    'user_id' => $request->user_id,
                    'bible_reading_id' => $bible_reading_id
                ]);
            }
        });

        return response()->json([
            "success" => true
        ]);
    }
}