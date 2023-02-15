<?php
namespace App\Http\Controllers\Api;

use App\Anggota;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function authenticate(Request $request): \Illuminate\Http\JsonResponse
    {
        if (auth()->attempt([
            'nik' => $request->nik,
            'password' => $request->password
        ])) {
            $user = User::where('id', auth()->id())->first();

            return response()->json([
                'status' => 'Success',
                'user' => $user,
                'anggota' => (new \App\Anggota)->index([
                    'user_id' => $user->id
                ])->first()
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'nik / password tidak benar'
            ], 401);
        }
    }

    public function index(Request $request)
    {
        return response()->json(User::where('nik', "like", "%" . $request->nik . "%")
            ->where('level', "like", "%" . $request->level . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {

        if (User::where('no_hp', $request->no_hp)->first()) {
            return response()->json([
                'status' => 'success',
            ], 422);
        }

        User::create($request->toArray());

        return response()->json([
            'status' => 'success',
        ], 200);
    }

    public function show(User $user)
    {
        return response()->json([
            'status' => 'Success',
            'user' => User::where('id', $user->id)->first()
        ]);
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
}
