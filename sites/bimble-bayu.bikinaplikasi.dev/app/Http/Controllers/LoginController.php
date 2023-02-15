<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // Retrive Input
        $credentials = $request->only('email');

        $user = User::where($credentials)->get()->first();

        if($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
            }
        }

        if (auth()->user()) {
            if (auth()->user()->level == 'Siswa' || auth()->user()->level == 'Ortu') {
                if (auth()->user()->getSiswa()->status != 'Pendaftaran Diterima') {
                    Auth::logout();

                    return redirect()->back()->with('error', 'Status akun kamu belum aktif!');
                } else {
                    return redirect('pembayaran');

                }
            }

            if (auth()->user()->level == 'Guru') {
                return redirect('siswa');
            }

            return redirect()->route('dashboard');
        }

        // if failed login
        return redirect('login')->with('error', 'Username / Password Salah!');
    }
}