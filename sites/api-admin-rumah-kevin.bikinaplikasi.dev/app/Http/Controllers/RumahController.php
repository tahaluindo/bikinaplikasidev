<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Fasilitas;
use App\Models\Rumah;
use App\Models\RumahFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $data['rumahs'] = Rumah::paginate(1000)->sortByDesc('id');

        $data['rumah_count'] = count(Schema::getColumnListing('rumah'));

        return view('rumah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $data['fasilitas'] = Fasilitas::all();

        return view('rumah.create', $data);
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
            'alamat_lengkap' => 'required|max:255',
            'alamat_gmaps' => 'required|max:255',
            'gambar1' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'jumlah_kamar' => 'required|max:2',
            'harga_per_tahun' => 'required',
            'status' => 'required',
        ]);

        $requestData = $request->except(['fasilitas_ids']);

        if ($request->hasFile('gambar1')) {
            $requestData['gambar1'] = str_replace("\\", "/", $request->file('gambar1')
                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar1')->getClientOriginalExtension()));
        }

        if ($request->hasFile('gambar2')) {
            $requestData['gambar2'] = str_replace("\\", "/", $request->file('gambar2')
                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar2')->getClientOriginalExtension()));
        }

        if ($request->hasFile('gambar3')) {
            $requestData['gambar3'] = str_replace("\\", "/", $request->file('gambar3')
                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar3')->getClientOriginalExtension()));
        }

        if ($request->hasFile('gambar4')) {
            $requestData['gambar4'] = str_replace("\\", "/", $request->file('gambar4')
                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar4')->getClientOriginalExtension()));
        }

        if ($request->hasFile('gambar5')) {
            $requestData['gambar5'] = str_replace("\\", "/", $request->file('gambar5')
                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar5')->getClientOriginalExtension()));
        }

        DB::transaction(function () use ($requestData, $request) {
            $rumahCreate = Rumah::create($requestData);

            foreach ($request->fasilitas_ids as $item) {
                RumahFasilitas::create([
                    'rumah_id' => $rumahCreate->id,
                    'fasilitas_id' => $item->id
                ]);
            }
        });

        return redirect()->route('rumah.index')->with('success', 'Berhasil menambah Rumah');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function show(Rumah $rumah)
    {
        $data["item"] = $rumah;
        $data["rumah"] = $rumah;

        return view('rumah.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(Rumah $rumah)
    {
        $data["rumah"] = $rumah;
        $data[strtolower("Ko")] = $rumah;
        $data['fasilitas'] = Fasilitas::all();

        return view('rumah.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Rumah $rumah)
    {
        $this->validate($request, [
            'status' => 'required',
            'alasan_penolakan' => 'required_if:status,==,Ditolak',
        ]);

        $requestData = $request->except(['fasilitas_ids']);

        DB::transaction(function () use ($requestData, $request, $rumah) {
            $rumah->update($requestData);
        });

        return redirect()->route('rumah.index')->with('success', 'Berhasil mengubah Rumah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Rumah $rumah)
    {
        $rumah->delete();

        return redirect()->route('rumah.index')->with('success', 'Rumah berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $rumahs = Rumah::whereIn('id', json_decode($request->ids, true))->get();

        Rumah::whereIn('id', $rumahs->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data rumah');
    }

    public function laporan()
    {

        return view('rumah.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Rumah)->getTable();
        $object = (new Rumah);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["rumahs"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["rumahs"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("rumah.laporan.print", $data);
    }
}