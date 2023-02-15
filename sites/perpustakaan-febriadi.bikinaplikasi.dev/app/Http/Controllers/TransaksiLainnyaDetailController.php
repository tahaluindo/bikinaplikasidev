<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\TransaksiLainnya;
use App\TransaksiLainnyaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class TransaksiLainnyaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TransaksiLainnya $transaksiLainnya)
    {
        $transaksi_lainnya_details = TransaksiLainnyaDetail::where('transaksi_lainnya_id', $transaksiLainnya->id)->orderBy('id', 'DESC')->get();

        if (request()->q) {
            $model = new TransaksiLainnyaDetail;
            $table = $model->getTable();
            $query = $model->query();

            // dapatkan semua column berdasarkan teble model
            // dilarang mencari berdasarkan id
            // index 0 = id
            $columns = Arr::except(Schema::getColumnListing($table), [0]);

            // buat querynya berdasarkan kata yang diinputkan disemua column
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . request()->q . '%');
            }

            // tambahkan berdasarkan relasi juga
            $query->where('transaksi_lainnya_id', $transaksiLainnya->id);

            // ambil datanya sebanyak 100 data
            $transaksi_lainnya_details = $query->limit(100)->orderBy('id', 'DESC')->get();
        }

        return view('transaksi_lainnya_detail.index', compact(
            'transaksi_lainnya_details',
            'transaksiLainnya'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TransaksiLainnya $transaksiLainnya)
    {

        return view('transaksi_lainnya_detail.create', compact(
            'transaksiLainnya'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiLainnya $transaksiLainnya, Request $request)
    {
        $this->validate($request, [
            'nominal_dibayar' => 'required|integer|min:1|max:8000000',
            'status'          => 'required|in:Lunas,Belum Lunas',
            'tanggal_bayar'   => 'required|date',
        ]);

        $request->request->add(['transaksi_lainnya_id' => $transaksiLainnya->id]);

        TransaksiLainnyaDetail::create($request->all());

        return redirect()->route('transaksi_lainnya_detail.index', $transaksiLainnya->id)->with('success', 'Berhasil menambah transaksi lainnya detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiLainnyaDetail  $transaksiLainnyaDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiLainnyaDetail $transaksiLainnyaDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiLainnyaDetail  $transaksiLainnyaDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiLainnya $transaksiLainnya, TransaksiLainnyaDetail $transaksiLainnyaDetail)
    {

        return view('transaksi_lainnya_detail.edit', compact(
            'transaksiLainnya',
            'transaksiLainnyaDetail'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiLainnyaDetail  $transaksiLainnyaDetail
     * @return \Illuminate\Http\Response
     */
    public function update(TransaksiLainnya $transaksiLainnya, Request $request, TransaksiLainnyaDetail $transaksiLainnyaDetail)
    {
        $this->validate($request, [
            'nominal_dibayar' => 'required|integer|min:1|max:8000000',
            'status'          => 'required|in:Lunas,Belum Lunas',
            'tanggal_bayar'   => 'required|date',
        ]);

        $request->request->add(['transaksi_lainnya_id' => $transaksiLainnya->id]);

        $transaksiLainnyaDetail->update($request->all());

        return redirect()->route('transaksi_lainnya_detail.index', $transaksiLainnya->id)->with('success', 'Berhasil mengupdate transaksi lainnya detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiLainnyaDetail  $transaksiLainnyaDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiLainnya $transaksiLainnya, TransaksiLainnyaDetail $transaksiLainnyaDetail)
    {
        $transaksiLainnyaDetail->delete();

        return redirect()->route('transaksi_lainnya_detail.index', $transaksiLainnya->id)->with('success', 'Berhasil menghapus transaksi lainnya detail');
    }

    public function hapus_semua(Request $request)
    {
        $transaksi_lainnya_details = TransaksiLainnyaDetail::whereIn('id', json_decode($request->ids, true))->get();

        TransaksiLainnyaDetail::whereIn('id', $transaksi_lainnya_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data transaksiLainnya');
    }
}
