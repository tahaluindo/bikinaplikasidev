<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HitungPrediksiController extends Controller
{
    public function index()
    {
        
        return view("hitung-prediksi.index");
    }
}
