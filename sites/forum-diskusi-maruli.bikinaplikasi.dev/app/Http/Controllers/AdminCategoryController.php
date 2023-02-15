<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
       return view('dashboard.categories.index',[
           'categories' => Category::all()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $requestData = $request->except(['_token']);
        $requestData['slug'] = preg_replace('/[^a-zA-Z0-9]/', '-', $request->name);

        $validator = Validator::make($requestData, [
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug'
        ]);

        if($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors());
        }

        Category::create($requestData);

        return redirect()->to('dashboard/categories')->with('success', 'Berhasil menambah kategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $requestData = $request->except(['_token']);
        $requestData['slug'] = preg_replace('/[^a-zA-Z0-9]/', '-', $request->name);

        $validator = Validator::make($requestData, [
            'name' => "required|unique:categories,name,$category->name,name",
            'slug' => "required|unique:categories,slug,$category->slug,slug"
        ]);

        if($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors());
        }

        $category->update($requestData);

        return redirect()->to('dashboard/categories')->with('success', 'Berhasil mengupdate kategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back();
    }
}
