<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Fasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FasilitasController extends Controller
{

    public function index(Request $request)
    {
        $fasilitas = Fasilitas::paginate(1000)->sortByDesc('id');

        return response()->json([
            "success" => true,
            'data' => $fasilitas->values()
        ]);
    }
}