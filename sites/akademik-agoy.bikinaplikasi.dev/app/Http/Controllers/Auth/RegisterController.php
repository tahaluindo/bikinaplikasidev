<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // todo: variable ini akan menampung semua nilai form
        $data['input'] = $request->all();

        // todo: jika tu menambahkan siswa baru
        $this->validate($request, [
            'kelas_id'     => 'required|exists:kelass,id',
            'nama'         => 'required|min:3|max:30',
            'email'        => 'required|email|min:5|max:30',
            'no_hp'        => 'required|digits_between:11,15',
            'password'     => 'required|min:6|max:15',
            'status'       => 'required|in:aktif,tidak aktif',
            'no_identitas' => 'required',
            'foto'         => 'required',
        ]);

        // todo: untuk menginput foto profile user
        $data['input']['foto'] = "foto/" . $request->foto->getClientOriginalName();
        $request->foto->move("foto", $data['input']['foto']);

        // todo: simpan semua data yang sudah ditambah
        User::create($data['input']);

        return redirect()->route('user.index')->with("success", "Berhasil menambah user");

        // return User::create([
        //     'nama' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }
}
