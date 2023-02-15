<?php

namespace App\Http\Controllers;

use App\Transaksi;
// use App\Tagihan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // public function getTotalTagihan($invoice_id)
    // {
    //     $tagihan = Tagihan::select('total')->where('invoice_id', '=', $invoice_id)->first();

    //     return $tagihan->total;
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['datas'] = Transaksi::orderBy('id', 'desc')->limit(50)->get();

        return view('transaksi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $data['invoice_ids'] = Tagihan::limit(50)->get();

        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request['total'] = str_replace('.', '', $request->total);
        $request['total'] = str_replace('Rp', '', $request['total']);
        // dd($request);
        //
        $this->validate($request, [
            'jenis' => 'required|in:Pemasukan,Pengeluaran',
            'tggl' => 'required|date',
            'total'  => 'required|digits_between:4,15',
            'keterangan' => 'max:500',
            'methode' => 'required|in:Bank,Cash,Nyicil',
        ]);
       
        Transaksi::create($request->except(['_token']))->save();

        return back()->with('success', 'Berhasil menambahkan data transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
        $data['data'] = $transaksi;
        // $data['invoice_ids'] = Tagihan::paginate(50);

        return view('transaksi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $request['total'] = str_replace('.', '', $request->total);

        $this->validate($request, [
            'jenis' => 'required|in:Pemasukan,Pengeluaran',
            'tggl' => 'required|date',
            'total'  => 'required|digits_between:4,15',
            'keterangan' => 'max:500',
            'methode' => 'in:Bank,Cash,Nyicil',
        ]);
       
        Transaksi::findOrFail($transaksi->id)->update($request->except(['_token']));

        return back()->with('success', 'Berhasil mengupdate data transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        Transaksi::findOrFail($transaksi->id)->delete();

        return back()->with('success', 'Berhasil menghapus data transaksi');
    }
}
