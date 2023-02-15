<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MapelDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MapelDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->mapel_id) {

            $data['mapel_detail'] = MapelDetail::where('mapel_id', $request->mapel_id)->limit(1000)->get();
        } else {

            $data['mapel_detail'] = MapelDetail::paginate(1000);
        }

        $data['mapel_detail_count'] = count(Schema::getColumnListing('mapel_detail'));

        return view('mapel-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['guru'] = Guru::pluck('nama', 'id');
        $data['kelas'] = Kelas::pluck('nama', 'id');
        
        return view('mapel-detail.create', $data);
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
            'guru_id' => 'required|exists:guru,id',
            'mapel_id' => 'required|exists:mapel,id'
        ]);
        $requestData = $request->all();

        if (MapelDetail::where([
            'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id

        ])->count()) {
            return redirect()->back()->with('error', 'Data sudah ada');
        }

        MapelDetail::create($requestData);

        return redirect("mapel-detail?mapel_id=" . $request->mapel_id)->with('success', 'Berhasil menambah MapelDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(MapelDetail $mapel_detail)
    {
        $data["item"] = $mapel_detail;
        $data["mapel_detail"] = $mapel_detail;

        return view('mapel-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(MapelDetail $mapel_detail)
    {
        $data["mapel_detail"] = $mapel_detail;
        $data[strtolower("MapelDetail")] = $mapel_detail;
        
        $data['guru'] = Guru::pluck('nama', 'id');
        $data['kelas'] = Kelas::pluck('nama', 'id');
        

        return view('mapel-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, MapelDetail $mapel_detail)
    {
        $this->validate($request, [
            'guru_id' => 'required|exists:guru,id',
            'mapel_id' => 'required|exists:mapel,id'
        ]);

        $requestData = $request->all();


        $mapel_detail->update($requestData);

        return redirect("mapel-detail?mapel_id=" . $mapel_detail->mapel_id)->with('success', 'Berhasil mengubah MapelDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(MapelDetail $mapel_detail)
    {
        $mapel_detail->delete();

        return redirect("mapel-detail?mapel_id=" . $mapel_detail->mapel_id)->with('success', 'MapelDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $mapel_details = MapelDetail::whereIn('id', json_decode($request->ids, true))->get();

        MapelDetail::whereIn('id', $mapel_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data mapel-detail');
    }

    public function laporan()
    {

        return view('mapel-detail.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new MapelDetail)->getTable();
        $object = (new MapelDetail);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["mapel_details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["mapel_details"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("mapel-detail.laporan.print", $data);
    }
}