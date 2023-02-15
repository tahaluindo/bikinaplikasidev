<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Gerejaku;
use App\Models\GerejakuFasilitas;
use App\Models\GerejakuKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GerejakuController extends Controller
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

        if (auth()->user()->level == 'Pendeta') {
            $gerejaku = Gerejaku::where('user_id', auth()->user()->id)->get();

        } else {
            $gerejaku = Gerejaku::all();
        }
        return view('gerejaku.index', [
            'gerejaku' => $gerejaku,
            'gerejaku_count' => $gerejaku->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        $data['gerejakuKategori'] = GerejakuKategori::pluck('nama', 'id');
        
        return view('gerejaku.create', $data);
    }

    public function store(Request $request)
    {
        $this->checkUser();

        $this->validate($request, [
            'judul' => 'required|max:50',
            'dariJam' => 'required',
            'sampaiJam' => 'required',
            'tanggal' => 'required',
            'gambar' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        $requestData['user_id'] = auth()->user()->id;

        Gerejaku::create($requestData);

        return redirect(route('gerejaku.index'))->with('success', 'Berhasil menambah gerejaku');
    }


    public function show(Gerejaku $gerejaku)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $gerejaku
        ]);
    }


    public function edit(Gerejaku $gerejaku)
    {
        $this->checkUser();
        $data['gerejaku'] = $gerejaku;
        $data['gerejakuKategori'] = GerejakuKategori::pluck('nama', 'id');

        return view('gerejaku.edit', $data);
    }

    public function update(Request $request, Gerejaku $gerejaku)
    {
        $this->checkUser();
        $this->validate($request, [
            'judul' => 'required|max:50',
            'dariJam' => 'required',
            'sampaiJam' => 'required',
            'tanggal' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));

            \File::delete($gerejaku->gambar);
        }

        $requestData['user_id'] = auth()->user()->id;

        $gerejaku->update($requestData);

        return redirect(route('gerejaku.index'))->with('success', 'Berhasil mengupdate gerejaku');
    }

    public function destroy(Gerejaku $gerejaku)
    {
        $this->checkUser();
        $gerejaku->delete();

        return redirect(route('gerejaku.index'))->with('success', 'Berhasil menghapus gerejaku');
    }
}