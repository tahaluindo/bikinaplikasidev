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
        if ($user = User::where([
            'username' => $request->username,
            'password' => $request->password
        ])->first()) {
            return response()->json([
                'status' => 'Success',
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'username / password tidak benar'
            ], 401);
        }
    }

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(["data" => User::limit($request->limit)
            ->get()
            ->values()
        ]);
    }

    public function update(Request $request, User $user): \Illuminate\Http\JsonResponse
    {
        $user->update($request->except(["_method"]));

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'username' => 'required|unique:tb_user,username',
            'nama' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "Error",
                'message' => $validator->errors()
            ], 200);
        }

        User::create($request->all());

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function destroy(User $user, Request $request)
    {
        file_put_contents("errors.json", "woiii");
        $user->delete();

        return response()->json([
            "status" => "Success",
        ], 200);
    }
}
