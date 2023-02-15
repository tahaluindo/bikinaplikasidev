<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Jemaat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class JemaatController extends Controller
{
    public function checkUser()
    {
        if (in_array(auth()->user()->level, ['Admin', 'Pendeta'])) {

        } else {
            die('Tidak ada hak akses!');
        }
    }

    public function index(Request $request)
    {
        $this->checkUser();
        $jemaat = new Jemaat();

        if (auth()->user()->level == 'Pendeta') {
            $jemaat = $jemaat->where('gereja_id', auth()->user()->pendeta->gereja_id);
        }

        if ($request->limit) {

            $jemaat = $jemaat->with(['gereja'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $jemaat = DB::select("select * from jemaat where $request->where");
        } else {
            $jemaat = $jemaat->with(['gereja'])->get();
        }

        return view('jemaat.index', [
            'jemaat' => $jemaat,
            'jemaat_count' => $jemaat->count()
        ]);
    }

    public function create()
    {
        return view('jemaat.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();

        $this->validate($request, [
            'fullName' => 'required|string|max:40',
            'jenisKelamin' => 'required',
            'alamat' => 'required',
            'noHp' => 'required|unique:user,noHp',
            'email' => 'required|unique:user,email',
            'password' => 'required|max:100|confirmed',
            'password_confirmation' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $requestData = $request->except(['password_confirmation']);
            $requestData['level'] = 'Jemaat';

            $userCreate = User::create($requestData);

            Jemaat::create([
                'user_id' => $userCreate->id,
                'gereja_id' => auth()->user()->pendeta->gereja_id,
            ]);
        });

        return redirect()->route('jemaat.index')->with('success', 'Berhasil menambah User');
    }

    public function show(Jemaat $jemaat)
    {
        $this->checkUser();

    }

    public function edit(Jemaat $jemaat)
    {
        $data['user'] = $jemaat->user;
        $data['jemaat'] = $jemaat;
        
        return view('jemaat.edit', $data);
    }

    public function update(Request $request, Jemaat $jemaat)
    {
        $this->checkUser();

        $this->validate($request, [
            'fullName' => 'required|string|max:40',
            'jenisKelamin' => 'required',
            'alamat' => 'required',
            'noHp' => "required|unique:user,noHp,$request->noHp,noHp",
            'noHp' => "required|unique:user,email,$request->email,email",
            'password' => 'required|max:100|confirmed',
            'password_confirmation' => 'required',
        ]);

        DB::transaction(function () use ($request, $jemaat) {
            $requestData = $request->except(['password_confirmation']);
            $requestData['level'] = 'Jemaat';

            $jemaat->user->update($requestData);
        });

        return redirect()->route('jemaat.index')->with('success', 'Berhasil menambah User');
    }

    public function destroy(Jemaat $jemaat)
    {
        $this->checkUser();
        
        $jemaat->delete();
        
        return redirect()->route('jemaat.index')->with('success', 'Berhasil menghapus Jemaat');

    }


    public function disukai(Jemaat $jemaat, User $user)
    {
        $this->checkUser();

    }
}