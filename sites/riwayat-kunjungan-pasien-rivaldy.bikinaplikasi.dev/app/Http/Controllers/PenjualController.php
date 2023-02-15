<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Penjual;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['penjual'] = Penjual::paginate(1000);

        $data['penjual_count'] = count(Schema::getColumnListing('penjual'));

        return view('penjual.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['users'] = User::where('id', '!=', 1)->pluck('name', 'id');
        return view('penjual.create', $data);
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
			'user_id' => 'required|exists:user,id',
			'deskripsi' => 'required',
			'gambar_depan' => 'required|image'
		]);
        $requestData = $request->all();

                if ($request->hasFile('gambar_depan')) {
            $requestData['gambar_depan'] = $request->file('gambar_depan')
                ->store('uploads', 'public');
        }


        Penjual::create($requestData);

        return redirect()->route('penjual.index')->with('success', 'Berhasil menambah Penjual');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Penjual $penjual)
    {
        $data["item"] = $penjual;
        $data["penjual"] = $penjual;

        return view('penjual.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Penjual $penjual)
    {
        $data["penjual"] = $penjual;
        $data[strtolower("Penjual")] = $penjual;
        $data['users'] = User::where('id', '!=', 1)->pluck('name', 'id');

        return view('penjual.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Penjual $penjual)
    {
        $this->validate($request, [
			'user_id' => 'required|exists:user,id',
			'deskripsi' => 'required',
		]);

        $requestData = $request->all();

                if ($request->hasFile('gambar_depan')) {
            $requestData['gambar_depan'] = $request->file('gambar_depan')
                ->store('uploads', 'public');
        }


        $penjual->update($requestData);

        return redirect()->route('penjual.index')->with('success', 'Berhasil mengubah Penjual');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Penjual $penjual)
    {
        $penjual->delete();

        return redirect()->route('penjual.index')->with('success', 'Penjual berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $penjuals = Penjual::whereIn('id', json_decode($request->ids, true))->get();

        Penjual::whereIn('id', $penjuals->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data penjual');
    }

    public function laporan()
    {

        return view('penjual.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Penjual)->getTable();
        $object = (new Penjual);

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

        $data["penjuals"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["penjuals"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("penjual.laporan.print", $data);
    }
}