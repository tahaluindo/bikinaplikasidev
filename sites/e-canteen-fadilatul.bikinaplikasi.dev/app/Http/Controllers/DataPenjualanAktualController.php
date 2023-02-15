<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DataPenjualanAktual;
use App\Models\DataPenjualanAktualDetail;
use App\Models\Produk;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DataPenjualanAktualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['data_penjualan_aktual'] = DataPenjualanAktual::paginate(1000);

        $data['data_penjualan_aktual_count'] = count(Schema::getColumnListing('data_penjualan_aktual'));

        return view('data_penjualan_aktual.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['produks'] = Produk::pluck('nama', 'id');
        $data['tahuns'] = Tahun::pluck('tahun', 'id');

        return view('data_penjualan_aktual.create', $data);
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
			'produk_id' => 'required|exists:produk,id',
			'tahun_id' => 'required|exists:tahun,id'
		]);

        $requestData = $request->all();

        $data_penjualan_aktual = new DataPenjualanAktual;
        $data_penjualan_aktual_detail = new DataPenjualanAktualDetail;

        // cek apakah data sudah ada atau belum
        if($data_penjualan_aktual::where(['produk_id' => request()->produk_id, 'tahun_id' => request()->tahun_id])->first()) {

            return redirect()->back()->with('error', 'Data sudah ada!');
        }

        \DB::transaction(function() use($request, $data_penjualan_aktual, $data_penjualan_aktual_detail) {

            $data_penjualan_aktual_create = $data_penjualan_aktual::create(['produk_id' => request()->produk_id, 'tahun_id' => request()->tahun_id]);

            if($request->volume_januari) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'Januari',
                    'volume' => $request->volume_januari,
                    'harga_per_kg' => $request->harga_per_kg_januari,
                    'nilai' => $request->harga_per_kg_januari * $request->harga_per_kg_januari,
                ]);
            }

            if($request->volume_februari) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'Februari',
                    'volume' => $request->volume_februari,
                    'harga_per_kg' => $request->harga_per_kg_februari,
                    'nilai' => $request->harga_per_kg_februari * $request->harga_per_kg_februari,
                ]);
            }

            if($request->volume_maret) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'Maret',
                    'volume' => $request->volume_maret,
                    'harga_per_kg' => $request->harga_per_kg_maret,
                    'nilai' => $request->harga_per_kg_maret * $request->harga_per_kg_maret
                ]);
            }

            if($request->volume_april) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'April',
                    'volume' => $request->volume_april,
                    'harga_per_kg' => $request->harga_per_kg_april,
                    'nilai' => $request->harga_per_kg_april * $request->harga_per_kg_april,
                ]);
            }

            if($request->volume_mei) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'Mei',
                    'volume' => $request->volume_mei,
                    'harga_per_kg' => $request->harga_per_kg_mei,
                    'nilai' => $request->harga_per_kg_mei * $request->harga_per_kg_mei,
                ]);
            }

            if($request->volume_juni) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'Juni',
                    'volume' => $request->volume_juni,
                    'harga_per_kg' => $request->harga_per_kg_juni,
                    'nilai' => $request->harga_per_kg_juni * $request->harga_per_kg_juni,
                ]);
            }

            if($request->volume_juli) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'Juli',
                    'volume' => $request->volume_juli,
                    'harga_per_kg' => $request->harga_per_kg_juli,
                    'nilai' => $request->harga_per_kg_juli * $request->harga_per_kg_juli,
                ]);
            }

            if($request->volume_agustus) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'Agustus',
                    'volume' => $request->volume_agustus,
                    'harga_per_kg' => $request->harga_per_kg_agustus,
                    'nilai' => $request->harga_per_kg_agustus * $request->harga_per_kg_agustus,
                ]);
            }

            if($request->volume_september) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'September',
                    'volume' => $request->volume_september,
                    'harga_per_kg' => $request->harga_per_kg_september,
                    'nilai' => $request->harga_per_kg_september * $request->harga_per_kg_september,
                ]);
            }

            if($request->volume_oktober) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'Oktober',
                    'volume' => $request->volume_oktober,
                    'harga_per_kg' => $request->harga_per_kg_oktober,
                    'nilai' => $request->harga_per_kg_oktober * $request->harga_per_kg_oktober,
                ]);
            }

            if($request->volume_november) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'November',
                    'volume' => $request->volume_november,
                    'harga_per_kg' => $request->harga_per_kg_november,
                    'nilai' => $request->harga_per_kg_november * $request->harga_per_kg_november,
                ]);
            }

            if($request->volume_desember) {
                $data_penjualan_aktual_detail::create([
                    'data_penjualan_aktual_id' => $data_penjualan_aktual_create->id,
                    'bulan' => 'Desember',
                    'volume' => $request->volume_desember,
                    'harga_per_kg' => $request->harga_per_kg_desember,
                    'nilai' => $request->harga_per_kg_desember * $request->harga_per_kg_desember,
                ]);
            }
        });

        return redirect()->route('data_penjualan_aktual.index')->with('success', 'Berhasil menambah DataPenjualanAktual');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(DataPenjualanAktual $data_penjualan_aktual)
    {
        $data["item"] = $data_penjualan_aktual;
        $data["data_penjualan_aktual"] = $data_penjualan_aktual;

        return view('data_penjualan_aktual.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(DataPenjualanAktual $data_penjualan_aktual)
    {
        $data['produks'] = Produk::pluck('nama', 'id');
        $data['tahuns'] = Tahun::pluck('tahun', 'id');

        $data["data_penjualan_aktual"] = $data_penjualan_aktual;
        $data["data_penjualan_aktual_details"] = $data_penjualan_aktual->data_penjualan_aktual_details;
        $data[strtolower("DataPenjualanAktual")] = $data_penjualan_aktual;

        return view('data_penjualan_aktual.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, DataPenjualanAktual $data_penjualan_aktual)
    {
        $this->validate($request, [
			'produk_id' => 'required|exists:produk,id',
			'tahun_id' => 'required|exists:tahun,id'
		]);

        $requestData = $request->all();

        $data_penjualan_aktual_details = new DataPenjualanAktualDetail;

        // cek apakah data sudah ada atau belum
        $data_penjualan_aktual::where(['produk_id' => request()->produk_id, 'tahun_id' => request()->tahun_id])->update([
            'produk_id' => request()->produk_id,
            'tahun_id' => request()->tahun_id
        ]);

        \DB::transaction(function() use($request, $data_penjualan_aktual, $data_penjualan_aktual_details) {

            if($request->volume_januari) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'Januari'], [
                    'bulan' => 'Januari',
                    'volume' => $request->volume_januari,
                    'harga_per_kg' => $request->harga_per_kg_januari,
                    'nilai' => $request->harga_per_kg_januari * $request->harga_per_kg_januari,
                ]);
            }

            if($request->volume_februari) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'Februari'], [
                    'bulan' => 'Februari',
                    'volume' => $request->volume_februari,
                    'harga_per_kg' => $request->harga_per_kg_februari,
                    'nilai' => $request->harga_per_kg_februari * $request->harga_per_kg_februari,
                ]);
            }

            if($request->volume_maret) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'Maret'], [
                    'bulan' => 'Maret',
                    'volume' => $request->volume_maret,
                    'harga_per_kg' => $request->harga_per_kg_maret,
                    'nilai' => $request->harga_per_kg_maret * $request->harga_per_kg_maret
                ]);
            }

            if($request->volume_april) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'April'], [
                    'bulan' => 'April',
                    'volume' => $request->volume_april,
                    'harga_per_kg' => $request->harga_per_kg_april,
                    'nilai' => $request->harga_per_kg_april * $request->harga_per_kg_april,
                ]);
            }

            if($request->volume_mei) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'Mei'], [
                    'bulan' => 'Mei',
                    'volume' => $request->volume_mei,
                    'harga_per_kg' => $request->harga_per_kg_mei,
                    'nilai' => $request->harga_per_kg_mei * $request->harga_per_kg_mei,
                ]);
            }

            if($request->volume_juni) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'Juni'], [
                    'bulan' => 'Juni',
                    'volume' => $request->volume_juni,
                    'harga_per_kg' => $request->harga_per_kg_juni,
                    'nilai' => $request->harga_per_kg_juni * $request->harga_per_kg_juni,
                ]);
            }

            if($request->volume_juli) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'Juli'], [
                    'bulan' => 'Juli',
                    'volume' => $request->volume_juli,
                    'harga_per_kg' => $request->harga_per_kg_juli,
                    'nilai' => $request->harga_per_kg_juli * $request->harga_per_kg_juli,
                ]);
            }

            if($request->volume_agustus) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'Agustus'], [
                    'bulan' => 'Agustus',
                    'volume' => $request->volume_agustus,
                    'harga_per_kg' => $request->harga_per_kg_agustus,
                    'nilai' => $request->harga_per_kg_agustus * $request->harga_per_kg_agustus,
                ]);
            }

            if($request->volume_september) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'September'], [
                    'bulan' => 'September',
                    'volume' => $request->volume_september,
                    'harga_per_kg' => $request->harga_per_kg_september,
                    'nilai' => $request->harga_per_kg_september * $request->harga_per_kg_september,
                ]);
            }

            if($request->volume_oktober) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'Oktober'], [
                    'bulan' => 'Oktober',
                    'volume' => $request->volume_oktober,
                    'harga_per_kg' => $request->harga_per_kg_oktober,
                    'nilai' => $request->harga_per_kg_oktober * $request->harga_per_kg_oktober,
                ]);
            }

            if($request->volume_november) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'November'], [
                    'bulan' => 'November',
                    'volume' => $request->volume_november,
                    'harga_per_kg' => $request->harga_per_kg_november,
                    'nilai' => $request->harga_per_kg_november * $request->harga_per_kg_november,
                ]);
            }

            if($request->volume_desember) {
                $data_penjualan_aktual_details::updateOrCreate(['data_penjualan_aktual_id' => $data_penjualan_aktual->id, 'bulan' => 'Desember'], [
                    'bulan' => 'Desember',
                    'volume' => $request->volume_desember,
                    'harga_per_kg' => $request->harga_per_kg_desember,
                    'nilai' => $request->harga_per_kg_desember * $request->harga_per_kg_desember,
                ]);
            }
        });

        return redirect()->route('data_penjualan_aktual.index')->with('success', 'Berhasil mengubah DataPenjualanAktual');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($data_penjualan_aktual_detail)
    {
        (new DataPenjualanAktualDetail)::findOrFail($data_penjualan_aktual_detail)->delete();

        return redirect()->route('data_penjualan_aktual.index')->with('success', 'DataPenjualanAktual berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $data_penjualan_aktuals = DataPenjualanAktualDetail::whereIn('id', json_decode($request->ids, true))->get();

        DataPenjualanAktualDetail::whereIn('id', $data_penjualan_aktuals->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data data_penjualan_aktual');
    }

    public function laporan()
    {

        return view('data_penjualan_aktual.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new DataPenjualanAktual)->getTable();
        $object = (new DataPenjualanAktual);

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

        $data["data_penjualan_aktuals"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["data_penjualan_aktuals"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("data_penjualan_aktual.laporan.print", $data);
    }

    public function download()
    {
        
    }
}