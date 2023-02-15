<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Donatur;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function pengeluaran()
    {
        $data['limit'] = Pengeluaran::all()->count();

        return view('donatur.laporan.index');
    }

    public function pengeluaran_print()
    {
        $data['donaturs'] = Donatur::all();

        return view('donatur.laporan.index');
    }

    public function pemasukan()
    {
        $data['limit'] = Pemasukan::all()->count();

        return view('donatur.laporan.index');
    }

    public function pemasukan_print()
    {
        $table = (new Pemasukan)->getTable();
        $object = (new Pemasukan);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["pemasukans"] = $object->orderBy($request->field, $request->order)
            // ->where('level', 'like', "%$request->level%")
            ->limit($request->limit)->get()->where('level', '!=', 'Admin');

        if (!$data["pemasukans"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        // kalo user memilih print excel
        if ($request->print_excel) {

            return $this->print_excel($data["pemasukans"]);
        }

        return view('donatur.laporan.index');
    }
}
