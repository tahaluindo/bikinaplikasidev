<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function authenticate(Request $request): \Illuminate\Http\JsonResponse
    {
        if (auth()->attempt([
            'no_hp' => $request->noHp,
            'password' => $request->password
        ])) {
//            $user = User::where('id', auth()->id())->with(['layanan'])->first();
            $user = User::withCount(['layanan', 'bookings'])->with('layanan')->with('bookings')->where('id', auth()->id())->first();

            return response()->json([
                'status' => 'Success',
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'no hp / password tidak benar'
            ], 401);
        }
    }

    public function index(Request $request)
    {
        return response()->json(User::withCount(['layanan', 'bookings'])->with('layanan')->with('bookings')
            ->orWhere('id', "like", "%" . $request->id . "%")
            ->orWhere('name', "like", "%" . $request->name . "%")
            ->orWhere('no_hp', "like", "%" . $request->noHp . "%")
            ->orWhere('jalan', "like", "%" . $request->jalan . "%")
            ->orWhere('kecamatan', "like", "%" . $request->kecamatan . "%")
            ->orWhere('kabupaten', "like", "%" . $request->kabupaten . "%")
            ->orWhere('provinsi', "like", "%" . $request->provinsi . "%")
            ->orWhere('level', "like", "%" . $request->level . "%")
            ->get());
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

        if (User::where('no_hp', $request->no_hp)->first()) {
            return response()->json([
                'status' => 'success',
            ], 422);
        }

        file_put_contents("data_request.json", json_encode($request->all()));

        User::create($request->toArray());

        return response()->json([
            'status' => 'success',
        ], 200);
    }

    public function show(User $user)
    {
        return response()->json([
            'status' => 'Success',
            'user' => User::where('id', $user->id)->with(['layanan'])->first()
        ]);
    }

    public function edit(User $user)
    {
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();

        if ($request->password == '') {
            $data = $request->except(['password']);
        }

        $user->update($data);

        return response()->json([
            'status' => 'success',
        ], 200);
    }


    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => 'success',
        ], 200);
    }

    public function hapus_semua(Request $request)
    {

    }

    public function laporan()
    {


    }

    public function print(Request $request)
    {

    }

    public function profile()
    {

    }


    public function profileUpdate(Request $request, User $user)
    {

    }
}
