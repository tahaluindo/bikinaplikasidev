<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\KelasDetail;
use App\Models\MapelDetail;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KelasDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->kelas_id) {

            $data['kelas_detail'] = KelasDetail::where('kelas_id', $request->kelas_id)->limit(1000)->get();
        } else {

            $data['kelas_detail'] = KelasDetail::paginate(1000);
        }

        $data['kelas_detail_count'] = count(Schema::getColumnListing('kelas_detail'));

        return view('kelas-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['siswa'] = Siswa::pluck('nama', 'id');

        return view('kelas-detail.create', $data);
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
            'kelas_id' => 'required|exists:kelas,id',
            'siswa_id' => 'required|exists:siswa,id'
        ]);
        $requestData = $request->all();

        if (KelasDetail::where([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id

        ])->count()) {
            return redirect()->back()->with('error', 'Data sudah ada');
        }

        KelasDetail::create($requestData);

        return redirect("kelas-detail?kelas_id=" . $request->kelas_id)->with('success', 'Berhasil menambah KelasDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(KelasDetail $kelas_detail)
    {
        $data["item"] = $kelas_detail;
        $data["kelas_detail"] = $kelas_detail;

        return view('kelas-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(KelasDetail $kelas_detail)
    {
        $data["kelas_detail"] = $kelas_detail;
        $data[strtolower("KelasDetail")] = $kelas_detail;

        $data['siswa'] = Siswa::pluck('nama', 'id');

        return view('kelas-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, KelasDetail $kelas_detail)
    {
        $this->validate($request, [
            'kelas_id' => 'required|exists:kelas,id',
            'siswa_id' => 'required|exists:siswa,id'
        ]);

        $requestData = $request->all();

        $kelas_detail->update($requestData);

        return redirect("kelas-detail?kelas_id=" . $kelas_detail->kelas_id)->with('success', 'Berhasil mengubah Kelas Detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(KelasDetail $kelas_detail)
    {
        $kelas_detail->delete();

        return redirect("kelas-detail?kelas_id=" . $kelas_detail->kelas_id)->with('success', 'KelasDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $kelas_details = KelasDetail::whereIn('id', json_decode($request->ids, true))->get();

        KelasDetail::whereIn('id', $kelas_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kelas-detail');
    }

    public function laporan()
    {

        return view('kelas-detail.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new KelasDetail)->getTable();
        $object = (new KelasDetail);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["kelas_details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["kelas_details"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("kelas-detail.laporan.print", $data);
    }
}