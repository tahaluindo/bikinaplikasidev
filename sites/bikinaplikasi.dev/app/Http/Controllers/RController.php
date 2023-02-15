<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class RController extends Controller
{
    public function r(AdminUser $adminUser)
    {
        
        // sengaja disetting supaya saat auth pakai socialite dia bisa kedetect kalo dia reffereal, selama 1 hari
        if (request()->segment(1) == 'r') {

            \Cookie::queue(\Cookie::forever('r', request()->segment(2)));
        }

        return view('index');
    }
}
