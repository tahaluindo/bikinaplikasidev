<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Renungan;
use App\Models\RenunganDilihat;
use App\Models\RenunganDishare;
use App\Models\RenunganDisukai;
use App\Models\RenunganFasilitas;
use App\Models\RenunganKomentar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RenunganController extends Controller
{
    public function index(Request $request)
    {
        $renungan = new Renungan();
        $renungan = $renungan->orderBy("id", "DESC");

        if ($request->limit) {

            $renungan = $renungan->with(['renungan_dishares', 'renungan_dilihats', 'renungan_disukais', 'renungan_komentars', 'renungan_komentars.user', 'renungan_kategori'])->withCount(['renungan_dishares', 'renungan_dilihats', 'renungan_disukais', 'renungan_komentars'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $renungan = DB::select("select * from renungan where $request->where");
        } else {
            $renungan = $renungan->with(['renungan_dishares', 'renungan_dilihats', 'renungan_disukais', 'renungan_komentars', 'renungan_komentars.user', 'renungan_kategori'])->withCount(['renungan_dishares', 'renungan_dilihats', 'renungan_disukais', 'renungan_komentars'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $renungan
        ]);
    }

    public function show(Renungan $renungan)
    {
        $renungan = $renungan->where('id', $renungan->id)->with(['renungan_dishares', 'renungan_dilihats', 'renungan_disukais', 'renungan_komentars', 'renungan_komentars.user', 'renungan_kategori'])->withCount(['renungan_dishares', 'renungan_dilihats', 'renungan_disukais', 'renungan_komentars'])->first();

        return response()->json([
            "success" => true,
            'data' => $renungan
        ]);
    }

    public function addDilihat(Request $request)
    {
        $renungan = Renungan::findOrFail($request->renungan_id);
        $user = User::findOrFail($request->user_id);

        if (!RenunganDilihat::where($request->all())->first()) {
            RenunganDilihat::create($request->all());

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
        $renungan = Renungan::findOrFail($request->renungan_id);
        $user = User::findOrFail($request->user_id);

        RenunganKomentar::create($request->all());

        return response()->json([
            "success" => true
        ]);

    }

    public function editKomentar(Request $request)
    {
        RenunganKomentar::findOrFail($request->id)->update([
            'isi' => $request->isi
        ]);

        return response()->json([
            "success" => true
        ]);

    }

    public function addDisukai(Request $request)
    {
        $renungan = Renungan::findOrFail($request->renungan_id);
        $user = User::findOrFail($request->user_id);

        if (!RenunganDisukai::where($request->all())->first()) {
            RenunganDisukai::create($request->all());

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
        $renungan = Renungan::findOrFail($request->renungan_id);
        $user = User::findOrFail($request->user_id);

        if (!RenunganDishare::where($request->all())->first()) {
            RenunganDishare::create($request->all());

            return response()->json([
                "success" => true
            ]);
        }

        return response()->json([
            "success" => false
        ]);
    }
}