<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use PHPExcel;

class UserController extends Controller
{
    public function checkUser()
    {
        if (in_array(auth()->user()->level, ['Admin'])) {

        } else {
            die('Tidak ada hak akses!');
        }
    }

    public function index(Request $request)
    {
        $this->checkUser();
        $data['user'] = User::paginate(1000);

        $data['user_count'] = count(Schema::getColumnListing('user'));

        return view('user.index', $data);
    }

    public function create()
    {
        $this->checkUser();
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $this->validate($request, [
            'fullName' => 'required|string|max:30',
            'jenisKelamin' => 'required',
            'noHp' => "required|unique:user,noHp",
            'email' => "required|unique:user,email",
            'level' => 'required|max:100',
            'alamat' => 'required',
        ]);

        $requestData = $request->except(['password_confirmation']);

        User::create($requestData);

        return redirect()->route('user.index')->with('success', 'Berhasil menambah User');
    }

    public function show(User $user)
    {
        $this->checkUser();
        $data["item"] = $user;
        $data["user"] = $user;

        return view('user.show', $data);
    }

    public function edit(User $user)
    {
        $this->checkUser();
        $data["user"] = $user;
        $data[strtolower("User")] = $user;

        return view('user.edit', $data);
    }

    public function update(Request $request, User $user)
    {
        $this->checkUser();
        $this->validate($request, [
            'fullName' => 'required|string|max:30',
            'jenisKelamin' => 'required',
            'noHp' => "required|unique:user,noHp,$user->noHp,noHp",
            'email' => "required|unique:user,email,$user->email,email",
            'level' => 'required|max:100',
            'alamat' => 'required',
        ]);

        $requestData = $request->except(['password_confirmation', '_method']);

        $user->update($requestData);

        return redirect()->route('user.index')->with('success', 'Berhasil mengubah User');
    }

    public function destroy(User $user)
    {
        $this->checkUser();
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $this->checkUser();
        $user_ids = collect(json_decode($request->ids, true))->filter(function ($item) {

            return $item != User::where('level', 'Admin')->first()->id;
        });

        $users = User::whereIn('id', $user_ids->toArray())->get();

        User::whereIn('id', $users->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data user');
    }

    public function profile(User $user)
    {
        $this->checkUser();
        $data["user"] = $user;
        $data[strtolower("User")] = $user;

        return view('user.profile', $data);
    }

    public function profileUpdate(Request $request, User $user)
    {
        $this->checkUser();
        $this->validate($request, [
            'fullName' => 'required|string|max:30',
            'jenisKelamin' => 'required',
            'noHp' => "required|unique:user,noHp,$user->noHp,noHp",
            'email' => "required|unique:user,email,$user->email,email",
            'alamat' => 'required',
            'noHp' => 'required',
        ]);

        $requestData = $request->except(['password_confirmation']);

        if ($request->hasFile('fotoProfile')) {
            $requestData['fotoProfile'] = str_replace("\\", "/", $request->file('fotoProfile')
                ->move('uploads', time() . "." . $request->file('fotoProfile')->getClientOriginalExtension()));

            \File::delete($user->gambar);
        }

        $user->update($requestData);

        return redirect()->route('user.index')->with('success', 'Berhasil mengubah User');
    }
}