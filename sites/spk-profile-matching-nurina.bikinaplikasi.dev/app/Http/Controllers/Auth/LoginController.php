<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {

            // if(auth()->user()->alternatif->status == 'Belum Disetujui')
            // {
            //     auth()->logout();

            //     return redirect()->back()->with('Status Belum Disetujui');
            // }

            if(auth()->user()->level == 'Siswa')
            {

                // return redirect()->route('project.index');
                return redirect()->route('user.show', auth()->user()->id);
            }

            return redirect()->route('home');
        } else {
            return redirect()->route('login')
                ->with('error', 'Email And Password Are Wrong.');
        }
    }
}
