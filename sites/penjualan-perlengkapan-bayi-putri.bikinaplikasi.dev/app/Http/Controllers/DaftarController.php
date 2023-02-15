<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|unique:users,no_hp',
            'password' => 'required|confirmed|min:6'
        ]);

        $dataInput = $request->except(['password_confirmation']);
        $dataInput['password'] = \Hash::make($request->password);

        User::create($dataInput);

        auth()->attempt(['email' => $dataInput['email'], 'password' => $request->password]);

        return \redirect('')->with('success', 'Berhasil meregistrasi');
    }
}
