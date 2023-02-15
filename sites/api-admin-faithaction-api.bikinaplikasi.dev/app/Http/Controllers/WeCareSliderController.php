<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\WeCareSliderSlider;
use App\Models\Disukai;
use App\Models\WeCareSlider;
use App\Models\WeCareSliderFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeCareSliderController extends Controller
{
    public function index(Request $request)
    {
        $weCareSlider = new WeCareSlider();
        
        if ($request->limit) {

            $weCareSlider = $weCareSlider->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $weCareSlider = DB::select("select * from we_care_slider where $request->where");
        }
        
        else {
            $weCareSlider = $weCareSlider->get();
        }

        return view('we-care-slider.index', [
            'weCareSlider' => $weCareSlider,
            'weCareSlider_count' => $weCareSlider->count()
        ]);
    }
    
    public function create()
    {
        return view('we-care-slider.create', [
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
         
        $weCareSliderCreate = WeCareSlider::create($requestData);

        return redirect()->route('we-care-slider.index')->with('success', 'Berhasil menambah weCareSlider');
    }

    public function show(WeCareSlider $weCareSlider)
    {
        return response()->json([
            "success" => true,
            'data' => $weCareSlider
        ]);
    }
        
    public function edit(WeCareSlider $weCareSlider)
    {
        $data["weCareSlider"] = $weCareSlider;
        $data[strtolower("WeCareSlider")] = $weCareSlider;

        return view('we-care-slider.edit', $data);
    }

    public function update(Request $request, WeCareSlider $weCareSlider)
    {
        $requestData = $request->all();

        $this->validate($request, [
            'status' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
            
            \File::delete($weCareSlider->gambar);
        }

        $weCareSliderCreate = $weCareSlider->update($requestData);

        return redirect()->route('we-care-slider.index')->with('success', 'Berhasil mengubah weCareSlider');
    }

    public function destroy(WeCareSlider $weCareSlider)
    {
        $weCareSlider->delete();

        return redirect()->route('we-care-slider.index')->with('success', 'Berhasil mengubah weCareSlider');
    }
}