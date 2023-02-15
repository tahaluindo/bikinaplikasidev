<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\EbookDilihat;
use App\Models\EbookDishare;
use App\Models\EbookDisukai;
use App\Models\EbookKomentar;
use App\Models\Disukai;
use App\Models\Ebook;
use App\Models\EbookFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class EbookController extends Controller
{
    public function index(Request $request)
    {
        $ebook = new Ebook();
        
        $ebook = $ebook->orderBy("id", "DESC");

        if ($request->limit) {

            $ebook = $ebook->with(['ebook_dishares', 'ebook_dilihats', 'ebook_disukais', 'ebook_komentars', 'ebook_komentars.user', 'ebook_kategori'])->withCount(['ebook_dishares', 'ebook_dilihats', 'ebook_disukais', 'ebook_komentars'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $ebook = DB::select("select * from ebook where $request->where");
        } else {
            $ebook = $ebook->with(['ebook_dishares', 'ebook_dilihats', 'ebook_disukais', 'ebook_komentars', 'ebook_komentars.user', 'ebook_kategori'])->withCount(['ebook_dishares', 'ebook_dilihats', 'ebook_disukais', 'ebook_komentars'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $ebook
        ]);
    }

    public function show(Ebook $ebook) {
        $ebook = $ebook->where('id', $ebook->id)->with(['ebook_dishares', 'ebook_dilihats', 'ebook_disukais', 'ebook_komentars', 'ebook_komentars.user', 'ebook_kategori'])->withCount(['ebook_dishares', 'ebook_dilihats', 'ebook_disukais', 'ebook_komentars'])->first();

        return response()->json([
            "success" => true,
            'data' => $ebook
        ]);
    }

    public function addDilihat(Request $request)
    {
        $ebook = Ebook::findOrFail($request->ebook_id);
        $user = User::findOrFail($request->user_id);

        if (!EbookDilihat::where($request->all())->first()) {
            EbookDilihat::create($request->all());

            return response()->json([
                "success" => true
            ]);
        }

        return response()->json([
            "success" => false
        ]);
    }

    public function addKomentar(Request $request)
    {
        $ebook = Ebook::findOrFail($request->ebook_id);
        $user = User::findOrFail($request->user_id);

        EbookKomentar::create($request->all());

        return response()->json([
            "success" => true
        ]);

    }

    public function addDisukai(Request $request)
    {
        $ebook = Ebook::findOrFail($request->ebook_id);
        $user = User::findOrFail($request->user_id);

        if (!EbookDisukai::where($request->all())->first()) {
            EbookDisukai::create($request->all());

            return response()->json([
                "success" => true
            ]);
        }

        return response()->json([
            "success" => false
        ]);
    }

    public function addDishare(Request $request)
    {
        $ebook = Ebook::findOrFail($request->ebook_id);
        $user = User::findOrFail($request->user_id);

        if (!EbookDishare::where($request->all())->first()) {
            EbookDishare::create($request->all());

            return response()->json([
                "success" => true
            ]);
        }

        return response()->json([
            "success" => false
        ]);
    }
}