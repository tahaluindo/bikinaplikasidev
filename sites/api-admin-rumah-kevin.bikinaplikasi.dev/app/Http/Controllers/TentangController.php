<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{

    public function index(Request $request)
    {
        $data['tentang'] = Tentang::first();

        $data['tentang_count'] = count(Schema::getColumnListing('tentang'));

        return view('tentang.index', $data);
    }

    public function create()
    {
        return view('tentang.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        Tentang::create($requestData);

        return redirect()->route('tentang.index')->with('success', 'Berhasil menambah Tentang');
    }
 
    public function show(Tentang $tentang)
    {
        $data["item"] = $tentang;
        $data["tentang"] = $tentang;

        return view('tentang.show', $data);
    }

    public function edit(Tentang $tentang)
    {
        $data["tentang"] = $tentang;
        $data[strtolower("Tentang")] = $tentang;

        return view('tentang.edit', $data);
    }

    public function update(Request $request, Tentang $tentang)
    {
        $requestData = $request->all();
        
        $tentang->update($requestData);

        return redirect()->route('tentang.index')->with('success', 'Berhasil mengubah Tentang');
    }

    public function destroy(Tentang $tentang)
    {
        $tentang->delete();

        return redirect()->route('tentang.index')->with('success', 'Tentang berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $tentangs = Tentang::whereIn('id', json_decode($request->ids, true))->get();

        Tentang::whereIn('id', $tentangs->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data tentang');
    }

    public function laporan()
    {

        return view('tentang.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Tentang)->getTable();
        $object = (new Tentang);

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

        $data["tentangs"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["tentangs"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("tentang.laporan.print", $data);
    }
}