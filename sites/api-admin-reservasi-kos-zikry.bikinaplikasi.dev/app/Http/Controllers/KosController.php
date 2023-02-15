<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Kos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class KosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $data['kos'] = Kos::paginate(1000)->sortByDesc('id');
        $data['user'] = User::paginate(1000);

        $data['kos_count'] = count(Schema::getColumnListing('kos'));

        return view('kos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('kos.create');
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
            'nama' => 'required|max:30',
            'pemilik' => 'required|max:30',
            'alamat_lengkap' => 'required|max:255',
            'alamat_gmaps' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'no_hp' => 'required|max:15',
            'jumlah_kamar' => 'required|max:2',
            'pemilik' => 'required|max:99',
            'fasilitas' => 'required|max:255',
            'gambar' => 'required',
//            'gambar2' => 'required',
//            'gambar3' => 'required',
//            'gambar4' => 'required',
//            'gambar5' => 'required',
            'kategori' => 'required|in:Laki - Laki,Perempuan,Laki - Laki / Perempuan',
            'harga_terendah' => 'required|max:10000000',
            'harga_tertinggi' => 'required|max:10000000',
            'harga_tertinggi' => 'required|max:10000000',
            'kamar_kosong' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar')->getClientOriginalExtension()));
        }
//
//        if ($request->hasFile('gambar2')) {
//            $requestData['gambar2'] = str_replace("\\", "/", $request->file('gambar2')
//                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar2')->getClientOriginalExtension()));
//        }
//
//        if ($request->hasFile('gambar3')) {
//            $requestData['gambar3'] = str_replace("\\", "/", $request->file('gambar3')
//                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar3')->getClientOriginalExtension()));
//        }
//
//        if ($request->hasFile('gambar4')) {
//            $requestData['gambar4'] = str_replace("\\", "/", $request->file('gambar4')
//                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar4')->getClientOriginalExtension()));
//        }
//
//        if ($request->hasFile('gambar5')) {
//            $requestData['gambar5'] = str_replace("\\", "/", $request->file('gambar5')
//                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar5')->getClientOriginalExtension()));
//        }

        Kos::create($requestData);

        return redirect()->route('kos.index')->with('success', 'Berhasil menambah Kos');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function show(Kos $kos)
    {
        $data["item"] = $kos;
        $data["kos"] = $kos;

        return view('kos.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(Kos $kos)
    {
        $data["kos"] = $kos;
        $data[strtolower("Ko")] = $kos;

        return view('kos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Kos $kos)
    {
        $this->validate($request, [
            'nama' => 'required|max:30',
            'pemilik' => 'required|max:30',
            'alamat_lengkap' => 'required|max:255',
            'alamat_gmaps' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'no_hp' => 'required|max:15',
            'jumlah_kamar' => 'required|max:2',
            'pemilik' => 'required|max:99',
            'fasilitas' => 'required|max:255',
            'gambar' => '',
//            'gambar2' => '',
//            'gambar3' => '',
//            'gambar4' => '',
//            'gambar5' => '',
            'kategori' => 'required|in:Laki - Laki,Perempuan,Laki - Laki / Perempuan',
            'harga_terendah' => 'required|max:10000000',
            'harga_tertinggi' => 'required|max:10000000',
            'harga_tertinggi' => 'required|max:10000000',
            'kamar_kosong' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar')->getClientOriginalExtension()));
        }
//
//        if ($request->hasFile('gambar2')) {
//            $requestData['gambar2'] = str_replace("\\", "/", $request->file('gambar2')
//                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar2')->getClientOriginalExtension()));
//        }
//
//        if ($request->hasFile('gambar3')) {
//            $requestData['gambar3'] = str_replace("\\", "/", $request->file('gambar3')
//                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar3')->getClientOriginalExtension()));
//        }
//
//        if ($request->hasFile('gambar4')) {
//            $requestData['gambar4'] = str_replace("\\", "/", $request->file('gambar4')
//                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar4')->getClientOriginalExtension()));
//        }
//
//        if ($request->hasFile('gambar5')) {
//            $requestData['gambar5'] = str_replace("\\", "/", $request->file('gambar5')
//                ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar5')->getClientOriginalExtension()));
//        }


        $kos->update($requestData);

        return redirect()->route('kos.index')->with('success', 'Berhasil mengubah Kos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Kos $kos)
    {
        $kos->delete();

        return redirect()->route('kos.index')->with('success', 'Kos berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $koss = Kos::whereIn('id', json_decode($request->ids, true))->get();

        Kos::whereIn('id', $koss->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kos');
    }

    public function laporan()
    {

        return view('kos.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Kos)->getTable();
        $object = (new Kos);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["koss"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["koss"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("kos.laporan.print", $data);
    }
}