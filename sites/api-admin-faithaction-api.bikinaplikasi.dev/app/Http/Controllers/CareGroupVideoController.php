<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CareGroupVideo;
use App\Models\CareGroupVideoFasilitas;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CareGroupVideoController extends Controller
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
        $careGroupVideo = CareGroupVideo::all();

        return view('care-group-video.index', [
            'careGroupVideo' => $careGroupVideo,
            'careGroupVideo_count' => $careGroupVideo->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('care-group-video.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $this->validate($request, [
            'status' => 'required|max:50',
            'link' => 'required',
        ]);

        if ($request->status == 'Aktif') {
            CareGroupVideo::where('id', '>=', '-1')->update([
                'status' => 'Tidak Aktif'
            ]);
        }

        $careGroupVideoCreate = CareGroupVideo::create([
            'status' => $request->status,
            'link' => $request->link,
        ]);

        CareGroupVideo::findOrFail($careGroupVideoCreate->id)->update([
            'status' => 'Aktif'
        ]);

        return redirect(route('care-group-video.index'))->with('success', 'Berhasil menambah care Group video');
    }


    public function show(CareGroupVideo $careGroupVideo)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $careGroupVideo
        ]);
    }


    public function edit(CareGroupVideo $careGroupVideo)
    {
        $this->checkUser();
        $data['careGroupVideo'] = $careGroupVideo;

        return view('care-group-video.edit', $data);
    }

    public function update(Request $request, CareGroupVideo $careGroupVideo)
    {
        $this->checkUser();
        $this->validate($request, [
            'status' => 'required',
            'link' => 'required',
        ]);


        if ($request->status == 'Aktif') {
            CareGroupVideo::where('id', '>=', '-1')->update([
                'status' => 'Tidak Aktif'
            ]);
        }

        $careGroupVideo->update([
            'status' => $request->status,
            'link' => $request->link,
        ]);

        return redirect(route('care-group-video.index'))->with('success', 'Berhasil mengupdate care Group video');
    }

    public function destroy(CareGroupVideo $careGroupVideo)
    {
        $this->checkUser();
        $careGroupVideo->delete();

        return redirect(route('care-group-video.index'))->with('success', 'Berhasil menghapus care Group video');
    }
}