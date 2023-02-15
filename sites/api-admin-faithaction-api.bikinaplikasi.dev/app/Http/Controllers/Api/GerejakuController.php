<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\Gerejaku;
use App\Models\GerejakuDilihat;
use App\Models\GerejakuDishare;
use App\Models\GerejakuDisukai;
use App\Models\GerejakuFasilitas;
use App\Models\GerejakuKomentar;
use App\Models\Pendeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GerejakuController extends Controller
{
    public function index(Request $request)
    {
        $gerejaku = new Gerejaku();
        $gerejaku = $gerejaku->orderBy("id", "DESC");
        
        if($request->keyword) {
            $gerejaku = $gerejaku->where('judul', 'like', '%' . $request->keyword . '%');
        }

        if ($request->limit) {

            $gerejaku = $gerejaku->with(['gerejaku_dishares', 'gerejaku_dishares.user', 'gerejaku_kategori', 'gerejaku_dilihats', 'gerejaku_dilihats.user', 'gerejaku_komentars', 'gerejaku_komentars.user', 'gerejaku_disukais', 'gerejaku_disukais.user'])->withCount(['gerejaku_dishares', 'gerejaku_kategori', 'gerejaku_dilihats', 'gerejaku_komentars', 'gerejaku_disukais',])->limit($request->limit);
        }

        if ($request->where) {

            $gerejaku = DB::select("select * from gerejaku where $request->where");
        } else {
            $gerejaku = $gerejaku->with(['gerejaku_dishares', 'gerejaku_dishares.user', 'gerejaku_kategori', 'gerejaku_dilihats', 'gerejaku_dilihats.user', 'gerejaku_komentars', 'gerejaku_komentars.user', 'gerejaku_disukais', 'gerejaku_disukais.user'])->withCount(['gerejaku_dishares', 'gerejaku_kategori', 'gerejaku_dilihats', 'gerejaku_komentars', 'gerejaku_disukais',]);
        }
        
        if($request->gereja_id) {
            $gerejaUser = Pendeta::where('gereja_id', $request->gereja_id)->pluck('user_id')->toArray();
            $gerejaku = $gerejaku->whereIn('user_id', $gerejaUser);
        }

        return response()->json([
            "success" => true,
            'data' => $gerejaku->get()
        ]);
    }

    public function show(Gerejaku $gerejaku) {
        $gerejaku = $gerejaku->where('id', $gerejaku->id)->with(['gerejaku_dishares', 'gerejaku_dishares.user', 'gerejaku_kategori', 'gerejaku_dilihats', 'gerejaku_dilihats.user', 'gerejaku_komentars', 'gerejaku_komentars.user', 'gerejaku_disukais', 'gerejaku_disukais.user'])->withCount(['gerejaku_dishares', 'gerejaku_kategori', 'gerejaku_dilihats', 'gerejaku_komentars', 'gerejaku_disukais',])->first();

        return response()->json([
            "success" => true,
            'data' => $gerejaku
        ]);
    }

    public function addDilihat(Request $request)
    {
        $gerejaku = Gerejaku::findOrFail($request->gerejaku_id);
        $user = User::findOrFail($request->user_id);

        if (!GerejakuDilihat::where($request->all())->first()) {
            GerejakuDilihat::create($request->all());

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
        $gerejaku = Gerejaku::findOrFail($request->gerejaku_id);
        $user = User::findOrFail($request->user_id);

        GerejakuKomentar::create($request->all());

        return response()->json([
            "success" => true
        ]);

        return response()->json([
            "success" => false
        ]);
    }

    public function addDisukai(Request $request)
    {
        $gerejaku = Gerejaku::findOrFail($request->gerejaku_id);
        $user = User::findOrFail($request->user_id);

        if (!GerejakuDisukai::where($request->all())->first()) {
            GerejakuDisukai::create($request->all());

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
        $gerejaku = Gerejaku::findOrFail($request->gerejaku_id);
        $user = User::findOrFail($request->user_id);

        if (!GerejakuDishare::where($request->all())->first()) {
            GerejakuDishare::create($request->all());

            return response()->json([
                "success" => true
            ]);
        }

        return response()->json([
            "success" => false
        ]);
    }
    
    
}