<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CareGroup;
use App\Models\CareGroupKategori;
use App\Models\CareGroupLokasi;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CareGroupController extends Controller
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
        $careGroup = new CareGroup();
        
        if(auth()->user()->level == 'Pendeta') {
            $careGroup = $careGroup->where('user_id', auth()->user()->id);
        }

        if ($request->limit) {

            $careGroup = $careGroup->with(['care_group_kategori', 'care_group_lokasi'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $careGroup = DB::select("select * from care_group where $request->where");
        } else {
            $careGroup = $careGroup->with(['care_group_kategori', 'care_group_lokasi'])->get();
        }

        return view('care-group.index', [
            'careGroup' => $careGroup,
            'careGroup_count' => $careGroup->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        $data['careGroupKategori'] = CareGroupKategori::all();
        $data['careGroupLokasi'] = CareGroupLokasi::all();

        return view('care-group.create', $data);
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'care_group_kategori_id' => 'required',
            'care_group_lokasi_id' => 'required',
            'nama' => 'required|max:40',
            'tipePertemuan' => 'required|max:255',
            'hari' => 'required|max:40',
            'dariJam' => 'required|max:40',
            'sampaiJam' => 'required|max:255',
        ]);
        
        $requestData['user_id'] = auth()->user()->id;

        CareGroup::create($requestData);

        return redirect()->route('care-group.index')->with('success', 'Berhasil menambah care group');
    }

    public function show(CareGroup $careGroup)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $careGroup
        ]);
    }


    public function edit(CareGroup $careGroup)
    {
        $this->checkUser();
        $data['careGroupKategori'] = CareGroupKategori::all();
        $data['careGroupLokasi'] = CareGroupLokasi::all();
        $data['careGroup'] = $careGroup;

        return view('care-group.edit', $data);
    }

    public function update(Request $request, CareGroup $careGroup)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'care_group_kategori_id' => 'required',
            'care_group_lokasi_id' => 'required',
            'nama' => 'required|max:40',
            'tipePertemuan' => 'required|max:255',
            'hari' => 'required|max:40',
            'dariJam' => 'required|max:40',
            'sampaiJam' => 'required|max:255',
        ]);
        
        $requestData['user_id'] = auth()->user()->id;

        $careGroup->update($requestData);

        return redirect()->route('care-group.index')->with('success', 'Berhasil mengupdate care group');
    }

    public function destroy(CareGroup $careGroup)
    {
        $this->checkUser();
        $careGroup->delete();

        return redirect()->route('care-group.index')->with('success', 'Berhasil mengupdate care group');
    }
}