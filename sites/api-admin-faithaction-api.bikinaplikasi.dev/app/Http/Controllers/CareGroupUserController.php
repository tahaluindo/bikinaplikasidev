<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\CareGroupUser;
use App\Models\CareGroupUserFasilitas;
use App\Models\Disukai;
use Illuminate\Http\Request;

class CareGroupUserController extends Controller
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
        $careGroupUser = CareGroupUser::all();

        return view('care-group-user.index', [
            'careGroupUser' => $careGroupUser,
            'careGroupUser_count' => $careGroupUser->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('care-group-user.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();

        $this->validate($request, [
            'nama' => 'required|max:50',
        ]);

        CareGroupUser::create([
            'nama' => $request->nama,
        ]);

        return redirect(route('care-group-user.index'))->with('success', 'Berhasil menambah care Group user');
    }


    public function show(CareGroupUser $careGroupUser)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $careGroupUser
        ]);
    }


    public function edit(CareGroupUser $careGroupUser)
    {
        $this->checkUser();
        $data['careGroupUser'] = $careGroupUser;

        return view('care-group-user.edit', $data);
    }

    public function update(Request $request, CareGroupUser $careGroupUser)
    {
        $this->checkUser();
        $this->validate($request, [
            'nama' => 'required|max:60',
        ]);

        $careGroupUser->update([
            'nama' => $request->nama,
        ]);

        return redirect(route('care-group-user.index'))->with('success', 'Berhasil mengupdate care Group user');
    }

    public function destroy(CareGroupUser $careGroupUser)
    {
        $this->checkUser();
        $careGroupUser->delete();

        return redirect(route('care-group-user.index'))->with('success', 'Berhasil menghapus care Group user');
    }
}