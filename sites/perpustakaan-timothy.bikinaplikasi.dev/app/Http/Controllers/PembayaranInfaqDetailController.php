<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\PembayaranInfaq;
use App\PembayaranInfaqDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class PembayaranInfaqDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PembayaranInfaq $pembayaranInfaq)
    {
        // hanya 100 data pertama dari relasi yang kita ambil biar gk kebanyakan
        $pembayaran_infaq_details = $pembayaranInfaq->pembayaran_infaq_details->take(100);

        // fiture untuk mencari berdasarkan semua columns
        if (request()->q) {
            $model   = new PembayaranInfaqDetail;
            $table   = $model->getTable();
            $query   = $model->query();

            // dapatkan semua column berdasarkan teble model
            // dilarang mencari berdasarkan id
            // index 0 = id
            $columns = Arr::except(Schema::getColumnListing($table), [0]);

            // buat querynya berdasarkan kata yang diinputkan disemua column
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . request()->q . '%');
            }

            // tambahkan berdasarkan relasi juga
            $query->where('pembayaran_infaq_id', $pembayaranInfaq->id);

            // jika user mencari berdasarkan nama user
            $user_ids = User::where('nama', 'like', '%' . request()->q . '%')->pluck('id')->toArray();
            $query->orWhereIn('user_id', $user_ids);

            // ambil datanya sebanyak 100 data
            $pembayaran_infaq_details = $query->limit(100)->get();
        }

        return view('pembayaran_infaq_detail.index', compact(
            'pembayaran_infaq_details',
            'pembayaranInfaq'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PembayaranInfaq $pembayaranInfaq)
    {

        return view('pembayaran_infaq_detail.create', compact(
            'pembayaranInfaq'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembayaranInfaq $pembayaranInfaq, Request $request)
    {
        $this->validate($request, [
            'user_id'         => 'required|exists:users,id',
            'status'          => 'required|in:Lunas,Belum Lunas',
            'tanggal_bayar'   => 'required|date',
            'nominal_dibayar' => 'required',
        ]);

        $request->request->add(['pembayaran_infaq_id' => $pembayaranInfaq->id]);

        PembayaranInfaqDetail::create($request->except(['tags']));

        return redirect()->route('pembayaran_infaq_detail.index', $pembayaranInfaq->id)->with('success', 'Berhasil menambah pembayaran infaq detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PembayaranInfaqDetail  $pembayaranInfaqDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PembayaranInfaqDetail $pembayaranInfaqDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PembayaranInfaqDetail  $pembayaranInfaqDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranInfaq $pembayaranInfaq, PembayaranInfaqDetail $pembayaranInfaqDetail)
    {
        return view('pembayaran_infaq_detail.edit', compact(
            'pembayaranInfaq',
            'pembayaranInfaqDetail'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PembayaranInfaqDetail  $pembayaranInfaqDetail
     * @return \Illuminate\Http\Response
     */
    public function update(PembayaranInfaq $pembayaranInfaq, Request $request, PembayaranInfaqDetail $pembayaranInfaqDetail)
    {
        $this->validate($request, [
            'user_id'         => 'required|exists:users,id',
            'status'          => 'required|in:Lunas,Belum Lunas',
            'tanggal_bayar'   => 'required|date',
            'nominal_dibayar' => 'required',
        ]);

        $request->request->add(['pembayaran_infaq_id' => $pembayaranInfaq->id]);

        $pembayaranInfaqDetail->update($request->except(['tags']));

        return redirect()->route('pembayaran_infaq_detail.index', $pembayaranInfaq->id)->with('success', 'Berhasil mengupdate pembayaran infaq detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PembayaranInfaqDetail  $pembayaranInfaqDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembayaranInfaq $pembayaranInfaq, PembayaranInfaqDetail $pembayaranInfaqDetail)
    {
        $pembayaranInfaqDetail->delete();

        return redirect()->route('pembayaran_infaq_detail.index', $pembayaranInfaq->id)->with('success', 'Berhasil menghapus pembayaran infaq detail');
    }

    public function hapus_semua(Request $request)
    {
        $pembayaran_infaq_details = PembayaranInfaqDetail::whereIn('id', json_decode($request->ids, true))->get();

        PembayaranInfaqDetail::whereIn('id', $pembayaran_infaq_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pembayaran infaq detail');
    }
}
