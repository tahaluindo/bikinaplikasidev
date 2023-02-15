<?php

namespace App\Http\Controllers;

use App\Buku;

use App\Http\Requests;
use App\KodeBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\DetailPeminjaman;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['buku'] = Buku::paginate(1000);
        $data['kode_buku'] = KodeBuku::paginate(1000)->map(function ($item) {
            $item->kode_start = explode('-', $item->kode_buku)[0];
            $item->kode_end = explode('-', $item->kode_buku)[1] ?? "";

            return $item;
        });

        $data['buku_count'] = count(Schema::getColumnListing('buku'));

        if (request()->q) {
            $data['buku'] = new Buku;

            foreach (Schema::getColumnListing('buku') as $key => $item) {
                $data['buku'] = $data['buku']->orwhere($item, 'like', "%$request->q%");
            }

            $data['buku'] = $data['buku']->paginate(1000);
        }

        return view('buku.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('buku.create');
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
            'judul' => 'required|max:100',
            'penulis' => 'required|max:30',
            'penerbit' => 'required|max:30',
            'tahun' => 'required|integer|max:' . date('Y'),
            'kota' => 'required|max:30',
            'stok' => 'required|integer|max:255'
        ]);
        $requestData = $request->all();
        $requestData['ditambahkan'] = date('d-M-Y');


        Buku::create($requestData);

        return redirect()->route('buku.index')->with('success', 'Berhasil menambah Buku');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Buku $buku)
    {
        $data["item"] = $buku;
        $data["buku"] = $buku;

        return view('buku.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Buku $buku)
    {
        $data["buku"] = $buku;
        $data[strtolower("Buku")] = $buku;
        return view('buku.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Buku $buku)
    {
        $this->validate($request, [
            'judul' => 'required|max:100',
            'penulis' => 'required|max:30',
            'penerbit' => 'required|max:30',
            'tahun' => 'required|max:4',
            'kota' => 'required|max:30',
            'stok' => 'required|max:255'
        ]);

        $requestData = $request->all();


        $buku->update($requestData);

        return redirect()->route('buku.index')->with('success', 'Berhasil mengubah Buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $bukus = Buku::whereIn('id', json_decode($request->ids, true))->get();

        Buku::whereIn('id', $bukus->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data buku');
    }

    public function laporan()
    {
        $bukus = Buku::limit(1000)->get();
        $data['bukus'] = Buku::limit(1000)->get();

        $data['kode_bukus'] = KodeBuku::pluck('kode_buku')->unique()->toArray();
        $data['penuliss'] = $bukus->pluck('penulis')->unique()->toArray();
        $data['penerbits'] = $bukus->pluck('penerbit')->unique()->toArray();
        $data['tahuns'] = $bukus->pluck('tahun')->unique()->toArray();
        $data['kotas'] = $bukus->pluck('kota')->unique()->toArray();

        return view('buku.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Buku)->getTable();
        $object = (new Buku);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

//        $this->validate($request, [
//            'field' => 'required|in:' . implode(',', $fields),
//            'order' => 'required|in:ASC,DESC'
//        ]);

        $kode_buku1 = explode('-', $request->kode_buku)[0];
        $kode_buku2 = explode('-', $request->kode_buku)[1] ?? "";

        if (!request()->status) {
            if ($request->kode_buku) {
                $data["bukus"] = $object
//                    ->orderBy($request->field, $request->order)
                    ->where('penulis', 'like', "%$request->penulis%")
                    ->where('penerbit', 'like', "%$request->penerbit%")
                    ->Where('tahun', 'like', "$request->tahun%")
                    ->Where('kota', 'like', "$request->kota%")
                    ->WhereBetween('kode_buku', [$kode_buku1, $kode_buku2]);

            } else {
                $data["bukus"] = $object
//                    ->orderBy($request->field, $request->order)
                    ->where('penulis', 'like', "%$request->penulis%")
                    ->where('penerbit', 'like', "%$request->penerbit%")
                    ->Where('tahun', 'like', "$request->tahun%")
                    ->Where('kota', 'like', "$request->kota%");
            }

        } else {
            $detail_peminjaman_buku_ids = DetailPeminjaman::where('status', request()->status)->get()->pluck('buku_id')->toArray();


            if ($request->kode_buku) {
                $data["bukus"] = $object
//                    ->orderBy($request->field, $request->order)
                    ->where('penulis', 'like', "%$request->penulis%")
                    ->where('penerbit', 'like', "%$request->penerbit%")
                    ->Where('tahun', 'like', "$request->tahun%")
                    ->Where('kota', 'like', "$request->kota%")
                    ->WhereIn('id', $detail_peminjaman_buku_ids)
                    ->WhereBetween('kode_buku', [$kode_buku1, $kode_buku2]);

            } else {
                $data["bukus"] = $object
//                    ->orderBy($request->field, $request->order)
                    ->where('penulis', 'like', "%$request->penulis%")
                    ->where('penerbit', 'like', "%$request->penerbit%")
                    ->Where('tahun', 'like', "$request->tahun%")
                    ->Where('kota', 'like', "$request->kota%")
                    ->WhereIn('id', $detail_peminjaman_buku_ids);

            }
        }


        $request->tanggal_awal = toDateIndo($request->tanggal_awal);
        $request->tanggal_akhir = toDateIndo($request->tanggal_akhir);

        $tanggal_awal = $request->tanggal_awal ? $request->tanggal_awal : (Buku::get()->first()->created_at ?? date('Y-m-d'));
        $tanggal_akhir = $request->tanggal_akhir ? $request->tanggal_akhir : (Buku::get()->last()->created_at ?? date('Y-m-d'));

        $data["bukus"] = $object->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])
            ->get()->take($request->limit);

        if (!$data["bukus"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        if($request->kode_buku) {
            $data['bukus'] = $data["bukus"]->filter(function ($item) use($request) {
                $item->kode_start = explode('-', $request->kode_buku)[0];
                $item->kode_end = explode('-', $request->kode_buku)[1] ?? "";

                return $item->kode_buku >= $item->kode_start && $item->kode_buku <= $item->kode_end;
            });

        }

        $data['kode_buku'] = KodeBuku::paginate(1000)->map(function ($item)  {
            $item->kode_start = explode('-', $item->kode_buku)[0];
            $item->kode_end = explode('-', $item->kode_buku)[1] ?? "";

            return $item;
        });

        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;

        return view("buku.laporan.print", $data);
    }
}
