<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BeritaDilihat;
use App\Models\BeritaDishare;
use App\Models\BeritaDisukai;
use App\Models\BeritaKomentar;
use App\Models\Disukai;
use App\Models\Berita;
use App\Models\BeritaFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $berita = new Berita();
        
        $berita = $berita->orderBy("id", "DESC");

        if ($request->limit) {

            $berita = $berita->with(['berita_dishares', 'berita_dilihats', 'berita_disukais', 'berita_komentars', 'berita_komentars.user', 'berita_kategori'])->withCount(['berita_dishares', 'berita_dilihats', 'berita_disukais', 'berita_komentars'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $berita = DB::select("select * from berita where $request->where");
        } else {
            $berita = $berita->with(['berita_dishares', 'berita_dilihats', 'berita_disukais', 'berita_komentars', 'berita_komentars.user', 'berita_kategori'])->withCount(['berita_dishares', 'berita_dilihats', 'berita_disukais', 'berita_komentars'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $berita
        ]);
    }
    
    public function show(Berita $berita) {
        $berita = $berita->where('id', $berita->id)->with(['berita_dishares', 'berita_dilihats', 'berita_disukais', 'berita_komentars', 'berita_komentars.user', 'berita_kategori'])->withCount(['berita_dishares', 'berita_dilihats', 'berita_disukais', 'berita_komentars'])->first();

        return response()->json([
            "success" => true,
            'data' => $berita
        ]);
    }

    public function addDilihat(Request $request)
    {
        $berita = Berita::findOrFail($request->berita_id);
        $user = User::findOrFail($request->user_id);

        if (!BeritaDilihat::where($request->all())->first()) {
            BeritaDilihat::create($request->all());

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
        $berita = Berita::findOrFail($request->berita_id);
        $user = User::findOrFail($request->user_id);

        BeritaKomentar::create($request->all());

        return response()->json([
            "success" => true
        ]);

        return response()->json([
            "success" => false
        ]);
    }

    public function addDisukai(Request $request)
    {
        $berita = Berita::findOrFail($request->berita_id);
        $user = User::findOrFail($request->user_id);

        if (!BeritaDisukai::where($request->all())->first()) {
            BeritaDisukai::create($request->all());

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
        $berita = Berita::findOrFail($request->berita_id);
        $user = User::findOrFail($request->user_id);

        if (!BeritaDishare::where($request->all())->first()) {
            BeritaDishare::create($request->all());

            return response()->json([
                "success" => true
            ]);
        }

        return response()->json([
            "success" => false
        ]);
    }
}