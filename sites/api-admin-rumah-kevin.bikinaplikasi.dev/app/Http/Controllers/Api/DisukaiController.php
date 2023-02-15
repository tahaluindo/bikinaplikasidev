<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DisukaiController extends Controller
{

    public function index(User $user)
    {
        $disukai = $user->rumahs;

        return response()->json([
            "success" => true,
            'data' => $disukai
        ]);
    }
}