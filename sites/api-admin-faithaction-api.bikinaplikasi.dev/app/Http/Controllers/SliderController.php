<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Slider;
use App\Models\SliderFasilitas;
use App\Models\SliderKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SliderController extends Controller
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
        $slider = new Slider();

        if ($request->limit) {

            $slider = $slider->limit($request->limit)->get();
        } elseif ($request->where) {

            $slider = DB::select("select * from slider where $request->where");
        } else {
            $slider = $slider->get();
        }

        return view('slider.index', [
            'slider' => $slider,
            'slider_count' => $slider->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('slider.create', [
            'slider_kategori' => SliderKategori::pluck('nama', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'status' => 'required',
            'gambar' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }


        $sliderCreate = Slider::create($requestData);

        return redirect()->route('slider.index')->with('success', 'Berhasil menambah slider');
    }

    public function show(Slider $slider)
    {
        $this->checkUser();
        return response()->json([
            "success" => true,
            'data' => $slider
        ]);
    }

    public function edit(Slider $slider)
    {
        $this->checkUser();
        $data["slider"] = $slider;
        $data[strtolower("Slider")] = $slider;

        return view('slider.edit', $data);
    }

    public function update(Request $request, Slider $slider)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'status' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));

            \File::delete($slider->gambar);
        }

        $sliderCreate = $slider->update($requestData);

        return redirect()->route('slider.index')->with('success', 'Berhasil mengubah slider');
    }

    public function destroy(Slider $slider)
    {
        $this->checkUser();
        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Berhasil mengubah slider');
    }
}