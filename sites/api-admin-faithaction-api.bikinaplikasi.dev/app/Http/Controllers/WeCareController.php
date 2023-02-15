<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\WeCare;
use App\Models\WeCareFasilitas;
use App\Models\WeCareKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeCareController extends Controller
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

        $weCare = new WeCare();

        if ($request->limit) {

            $weCare = $weCare->limit($request->limit)->get();
        } elseif ($request->where) {

            $weCare = DB::select("select * from we_ware where $request->where");
        } else {
            $weCare = $weCare->get();
        }

        return view('we-care.index', [
            'weCare' => $weCare,
            'weCare_count' => $weCare->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();

        return view('we-care.create', [
            'weCare_kategori' => WeCareKategori::pluck('nama', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $this->checkUser();

        $requestData = $request->all();

        $this->validate($request, [
            'we_care_kategori_id' => 'required',
            'tanggal' => 'required',
            'judul' => 'required|unique:weCare,judul',
            'isi' => 'required|unique:weCare,isi',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }


        $weCareCreate = WeCare::create($requestData);

        return redirect()->route('we-care.index')->with('success', 'Berhasil menambah weCare');
    }

    public function show(WeCare $weCare)
    {
        $this->checkUser();

        return response()->json([
            "success" => true,
            'data' => $weCare
        ]);
    }

    public function edit(WeCare $weCare)
    {
        $this->checkUser();

        $data["weCare"] = $weCare;
        $data[strtolower("WeCare")] = $weCare;
        $data['weCare_kategori'] = WeCareKategori::pluck('nama', 'id');

        return view('we-care.edit', $data);
    }

    public function update(Request $request, WeCare $weCare)
    {
        $this->checkUser();

        $requestData = $request->all();

        $this->validate($request, [
            'status' => 'required',
            'catatan' => 'required',
        ]);

        $weCareCreate = $weCare->update($requestData);

        return redirect()->route('we-care.index')->with('success', 'Berhasil mengubah weCare');
    }

    public function destroy(WeCare $weCare)
    {
        $this->checkUser();

        $weCare->delete();

        return redirect()->route('we-care.index')->with('success', 'Berhasil mengubah weCare');
    }

    public function terima(WeCare $weCare)
    {
        $weCare->update([
            'status' => 'Diterima'
        ]);

        return redirect()->route('we-care.index')->with('success', 'Berhasil menerima weCare');

    }

    public function tolak(Request $request, WeCare $weCare)
    {
        $weCare->update([
            'status' => 'Ditolak',
            'catatan' => $request->catatan
        ]);

        return redirect()->route('we-care.index')->with('success', 'Berhasil menolak weCare');
    }
}