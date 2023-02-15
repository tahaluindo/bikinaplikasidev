<?php


namespace App\Http\Controllers;


use App\Kamar;
use App\Penyewa;
use Illuminate\Support\Facades\Request;

class CustomAuthController
{
    public function login()
    {
        $data['datas'] = Penyewa::orderBy('id', 'desc')->paginate(10);
        $data['kamars'] = Kamar::where('status', '=', 'Kosong')->get();

        return view('auth.login', $data);
    }

    public function postLogin(Request $request)
    {

    }
}
