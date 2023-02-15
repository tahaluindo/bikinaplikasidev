<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{

    public function index(Request $request)
    {
        $tentang = Tentang::first();

        return response()->json([
            "success" => true,
            'data' => $tentang
        ]);
    }
}