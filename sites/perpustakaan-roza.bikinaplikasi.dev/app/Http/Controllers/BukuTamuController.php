<?php

namespace App\Http\Controllers;

use App\Buku;
use App\BukuTamu;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\DetailPeminjaman;

class BukuTamuController extends Controller
{

    public function index(Request $request)
    {
        $data['buku_tamu'] = BukuTamu::paginate(1000);

        $data['buku_tamu_count'] = count(Schema::getColumnListing('buku-tamu'));

        if (request()->q) {
            $data['buku_tamu'] = new BukuTamu;

            foreach (Schema::getColumnListing('buku-tamu') as $key => $item) {
                $data['buku_tamu'] = $data['buku_tamu']->orwhere($item, 'like', "%$request->q%");
            }

            $data['buku_tamu'] = $data['buku_tamu']->paginate(1000);
        }

        return view('buku-tamu.index', $data);
    }

    public function laporan()
    {
        $data['buku_tamus'] = BukuTamu::limit(1000)->get();
        $data['limit'] = BukuTamu::count();

        return view('buku-tamu.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new BukuTamu)->getTable();
        $object = (new BukuTamu);
//dd($request);
        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC'
        ]);

        $tanggal_awal = $request->tanggal_awal ? $request->tanggal_awal : (BukuTamu::get()->first()->created_at ?? date('d-M-Y'));
        $tanggal_akhir = $request->tanggal_akhir ? $request->tanggal_akhir : (BukuTamu::get()->last()->created_at ?? date('d-M-Y'));

        $data["buku_tamus"] = $object->orderBy($request->field, $request->order)
        ->get()->filter(function($item) use($tanggal_awal, $tanggal_akhir) {
            $item->created_at = date('Y-m-d', strtotime($item->created_at));
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));

            return \Carbon\Carbon::parse($item->created_at)->gte(\Carbon\Carbon::parse($tanggal_awal)) && \Carbon\Carbon::parse($item->created_at)->lte(\Carbon\Carbon::parse($tanggal_akhir));
        })->take($request->limit);

        if (!$data["buku_tamus"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("buku-tamu.laporan.print", $data);
    }
}
