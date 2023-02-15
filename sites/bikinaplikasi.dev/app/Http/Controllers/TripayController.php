<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tripay;
use Illuminate\Http\Request;

class TripayController extends Controller
{
    
    public function callback(Request $request)
    {
        
        Tripay::callback();
    }
}
