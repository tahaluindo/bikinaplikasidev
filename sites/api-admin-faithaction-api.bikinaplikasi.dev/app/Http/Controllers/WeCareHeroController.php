<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\WeCareHeroKategori;
use App\Models\Disukai;
use App\Models\WeCareHero;
use App\Models\WeCareHeroFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeCareHeroController extends Controller
{
    public function index(Request $request)
    {
        $weCareHero = new WeCareHero();
        
        if ($request->limit) {

            $weCareHero = $weCareHero->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $weCareHero = DB::select("select * from we_care_hero where $request->where");
        }
        
        else {
            $weCareHero = $weCareHero->get();
        }

        return view('we-care-hero.index', [
            'weCareHero' => $weCareHero,
            'weCareHero_count' => $weCareHero->count()
        ]);
    }
    
    public function create()
    {
        return view('we-care-hero.create', [
        ]);
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $this->validate($request, [
            'status' => 'required',
            'gambar' => 'required',
        ]);
        
        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }
        
        if ($request->status == 'Aktif') {
            WeCareHero::where('id', '>=', '-1')->update([
                'status' => 'Tidak Aktif'
            ]);
        }

        
        $weCareHeroCreate = WeCareHero::create($requestData);

        return redirect()->route('we-care-hero.index')->with('success', 'Berhasil menambah weCareHero');
    }

    public function show(WeCareHero $weCareHero)
    {
        return response()->json([
            "success" => true,
            'data' => $weCareHero
        ]);
    }
        
    public function edit(WeCareHero $weCareHero)
    {
        $data["weCareHero"] = $weCareHero;
        $data[strtolower("WeCareHero")] = $weCareHero;

        return view('we-care-hero.edit', $data);
    }

    public function update(Request $request, WeCareHero $weCareHero)
    {
        $requestData = $request->all();

        $this->validate($request, [
            'status' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
            
            \File::delete($weCareHero->gambar);
        }
        
        if ($request->status == 'Aktif') {
            WeCareHero::where('id', '>=', '-1')->update([
                'status' => 'Tidak Aktif'
            ]);
        }

        $weCareHeroCreate = $weCareHero->update($requestData);

        return redirect()->route('we-care-hero.index')->with('success', 'Berhasil mengubah weCareHero');
    }

    public function destroy(WeCareHero $weCareHero)
    {
        $weCareHero->delete();

        return redirect()->route('we-care-hero.index')->with('success', 'Berhasil mengubah weCareHero');
    }
}