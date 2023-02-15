<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenis;
use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        if (in_array(auth()->user()->level, ['Admin'])) {
            $data['map'] = Map::paginate(1000);

        } else {
            $data['map'] = Map::where('user_id', auth()->id())->paginate(1000);
        }

        $data['map_count'] = count(Schema::getColumnListing('map'));

        return view('map.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['jenis'] = Jenis::pluck('nama', 'id');

        return view('map.create', $data);
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
            'nama' => 'required|max:50',
            'no_hp' => 'required|max:15',
            'alamat' => 'required|max:255',
            'lat' => 'required|max:255',
            'lng' => 'required|max:255',
            'jam_buka' => 'required|max:255',
            'jam_tutup' => 'required|max:255',
            'gambars' => 'required',
        ]);
        
        $requestData = $request->all();

        if ($request->hasFile('gambars')) {
            $urlGambars = [];

            foreach ($request->gambars as $itemGambar) {
                $gambar = str_replace("\\", "/", $itemGambar
                    ->move('uploads', time() . "." . $itemGambar->getClientOriginalExtension()));

                $urlGambars[] = $gambar;
            }

            $requestData['gambars'] = json_encode($urlGambars);
        }

        Map::create($requestData);

        return redirect()->route('map.index')->with('success', 'Berhasil menambah Map');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Map $map)
    {
        $data["item"] = $map;
        $data["map"] = $map;

        return view('map.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Map $map)
    {
        $data["map"] = $map;
        $data[strtolower("Map")] = $map;
        $data['jenis'] = Jenis::pluck('nama', 'id');

        return view('map.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Map $map)
    {
        $this->validate($request, [
            'nama' => 'required|max:50',
            'no_hp' => 'required|max:15',
            'alamat' => 'required|max:255',
            'lat' => 'required|max:255',
            'lng' => 'required|max:255',
            'jam_buka' => 'required|max:255',
            'jam_tutup' => 'required|max:255',
            'gambars' => 'required'
        ]);

        $requestData = $request->all();
        
        


        if ($request->hasFile('gambars')) {
            $urlGambars = [];

            foreach ($request->gambars as $itemGambar) {
                $gambar = str_replace("\\", "/", $itemGambar
                    ->move('uploads', time() . "." . $itemGambar->getClientOriginalExtension()));

                $urlGambars[] = $gambar;
            }

            $requestData['gambars'] = json_encode($urlGambars);
        }

        $map->update($requestData);

        return redirect()->route('map.index')->with('success', 'Berhasil mengubah Map');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Map $map)
    {
        $map->delete();

        return redirect()->route('map.index')->with('success', 'Map berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $maps = Map::whereIn('id', json_decode($request->ids, true))->get();

        Map::whereIn('id', $maps->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data map');
    }

    public function laporan()
    {
        $data['limit'] = Map::count();

        return view('map.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Map)->getTable();
        $object = (new Map);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["maps"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["maps"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("map.laporan.print", $data);
    }

    public function persebaran()
    {
        $data['map'] = Map::where('status', 'Diterima')->get()->map(function($item) {
            $gambars = json_decode($item->gambars);
            
            $item->gambars = $gambars;
            
            return $item;
        });

        return view('map.persebaran', $data);
    }
}