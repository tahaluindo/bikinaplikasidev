<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\ProdukShareRevenue;
use App\Models\ProdukShareRevenueFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProdukShareRevenueController extends Controller
{
    public function model()
    {
        $produkShareRevenue = new ProdukShareRevenue();
        
        return $produkShareRevenue->first();
    }
    
    public function index(Request $request)
    {
        $produkShareRevenue = new ProdukShareRevenue();

        if ($request->limit) {

            $produkShareRevenue = $produkShareRevenue->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $produkShareRevenue = DB::select("select * from produk_shareRevenue where $request->where");
        }
        
        else {
            $produkShareRevenue = $produkShareRevenue->get();
        }

        return response()->json([
            "success" => true,
            'data' => $produkShareRevenue
        ]);
    }

}