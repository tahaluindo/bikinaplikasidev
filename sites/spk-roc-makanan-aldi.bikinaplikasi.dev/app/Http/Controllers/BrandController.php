<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Http\Requests;

use App\Brand;
use App\Perhitungan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['brand'] = Brand::paginate(1000);
        $data['brand_count'] = count(Schema::getColumnListing('brand'));

        return view('brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $data['perhitungans'] = Perhitungan::all();

        return view('brand.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => "required|max:40|unique:brand,nama",
        ]);

        $requestData = $request->except([]);

        Brand::create($requestData);

        return redirect()->route('brand.index')->with('success', 'Berhasil menambah Brand');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Brand $brand)
    {
        $data["item"] = $brand;
        $data["brand"] = $brand;
        $data["brand_detail"] = $brand->brand_details;

        return view('brand.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Brand $brand)
    {
        $data["brand"] = $brand;
        $data[strtolower("Anggotum")] = $brand;
        $data['perhitungans'] = Perhitungan::all();

        return view('brand.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'nama' => "required|max:40|unique:brand,nama,$brand->nama,nama",
        ]);

        $requestData = $request->except([]);

        $brand->update($requestData);

        return redirect()->route('brand.index')->with('success', 'Berhasil mengubah Brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Brand berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $brands = Brand::whereIn('id', json_decode($request->ids, true))->get();

        Brand::whereIn('id', $brands->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data brand');
    }
}
