<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['menu'] = Menu::paginate(1000);

        if(in_array(auth()->user()->level, ['Penjual'])) {

            $data['menu'] = Menu::where('penjual_id', auth()->user()->penjual->id)->paginate(1000);
        }

        $data['menu_count'] = count(Schema::getColumnListing('menu'));

        return view('menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['penjuals'] = Penjual::with('user')->get();

        if(in_array(auth()->user()->level, ['Penjual'])) {

            $data['penjuals'] = Penjual::where('id', auth()->user()->penjual->id)->get();
        }

        return view('menu.create', $data);
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
			'penjual_id' => 'required|exists:penjual,id',
			'nama' => 'required|unique:menu,nama',
			'harga' => 'required',
			'deskripsi' => 'required',
			'gambar' => 'file'
		]);
        $requestData = $request->all();

                if ($request->hasFile('gambar')) {
            $requestData['gambar'] = $request->file('gambar')
                ->store('uploads', 'public');
        }


        Menu::create($requestData);

        return redirect()->route('menu.index')->with('success', 'Berhasil menambah Menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Menu $menu)
    {
        $data["item"] = $menu;
        $data["menu"] = $menu;

        return view('menu.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Menu $menu)
    {
        $data['penjuals'] = Penjual::with('user')->get();
        $data["menu"] = $menu;
        $data[strtolower("Menu")] = $menu;

        
        if(in_array(auth()->user()->level, ['Penjual'])) {

            $data['penjuals'] = Penjual::where('id', auth()->user()->penjual->id)->get();
        }


        return view('menu.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
			'penjual_id' => 'required|exists:penjual,id',
			'nama' => "required|unique:menu,nama,$menu->nama,nama",
			'harga' => "required|integer",
			'deskripsi' => 'required',
			'gambar' => 'file'
		]);

        $requestData = $request->all();

                if ($request->hasFile('gambar')) {
            $requestData['gambar'] = $request->file('gambar')
                ->store('uploads', 'public');
        }


        $menu->update($requestData);

        return redirect()->route('menu.index')->with('success', 'Berhasil mengubah Menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $menus = Menu::whereIn('id', json_decode($request->ids, true))->get();

        Menu::whereIn('id', $menus->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data menu');
    }

    public function laporan()
    {

        return view('menu.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Menu)->getTable();
        $object = (new Menu);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["menus"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["menus"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("menu.laporan.print", $data);
    }
}