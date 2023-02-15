<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\WeCareKategoriKategori;
use App\Models\Disukai;
use App\Models\WeCareKategori;
use App\Models\WeCareKategoriFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeCareKategoriController extends Controller
{
    public function index(Request $request)
    {
        $weCareKategori = new WeCareKategori();
        
        if ($request->limit) {

            $weCareKategori = $weCareKategori->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $weCareKategori = DB::select("select * from we_care_kategori where $request->where");
        }
        
        else {
            $weCareKategori = $weCareKategori->get();
        }

        return view('we-care-kategori.index', [
            'weCareKategori' => $weCareKategori,
            'weCareKategori_count' => $weCareKategori->count()
        ]);
    }
    
    public function create()
    {
        return view('we-care-kategori.create', [
        ]);
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $this->validate($request, [
            'nama' => 'required',
            'gambar' => 'required',
        ]);
        
        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }
         
        $weCareKategoriCreate = WeCareKategori::create($requestData);

        return redirect()->route('we-care-kategori.index')->with('success', 'Berhasil menambah weCareKategori');
    }

    public function show(WeCareKategori $weCareKategori)
    {
        return response()->json([
            "success" => true,
            'data' => $weCareKategori
        ]);
    }
        
    public function edit(WeCareKategori $weCareKategori)
    {
        $data["weCareKategori"] = $weCareKategori;
        $data[strtolower("WeCareKategori")] = $weCareKategori;

        return view('we-care-kategori.edit', $data);
    }

    public function update(Request $request, WeCareKategori $weCareKategori)
    {
        $requestData = $request->all();

        $this->validate($request, [
            'nama' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
            
            \File::delete($weCareKategori->gambar);
        }

        $weCareKategoriCreate = $weCareKategori->update($requestData);

        return redirect()->route('we-care-kategori.index')->with('success', 'Berhasil mengubah weCareKategori');
    }

    public function destroy(WeCareKategori $weCareKategori)
    {
        $weCareKategori->delete();

        return redirect()->route('we-care-kategori.index')->with('success', 'Berhasil mengubah weCareKategori');
    }
}