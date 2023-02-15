<?php

namespace App\Http\Controllers;

use App\Tagihan;
use App\Kamar;
use App\Penyewa;
use App\Type;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    // mendapatkan data penyewa
    public function getPenyewas(Penyewa $penyewa)
    {
        return response()->json($penyewa);
    }

    public function getTagihanId($penyewa)
    {
        $penyewa = Penyewa::find($penyewa);
        
        $tagihan_id = str_replace(' ', '', $penyewa->kamar->type->nama . '_' . $penyewa->kamar->lokasi . '_' . $penyewa->type_sewa . '_' . rand(1000000, 9999999));

        return $tagihan_id;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['datas'] = Tagihan::orderBy('id', 'desc')->limit(50)->get();

        // update data jikalau ada menunggak
        foreach ($data['datas'] as $tagihan)
        {
            if( $tagihan->status == 'Aktif' && date('Y-m-d', strtotime($tagihan->jatuh_tempo)) < date('Y-m-d\Th:i:s'))
            {
                Tagihan::find($tagihan->id)->update(['status' => 'Menunggak']);
            }
        }

        return view('tagihan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $penyewaTerdaftar = Tagihan::pluck('penyewa_id')->toArray();

        $data['penyewas'] = Penyewa::whereNotIn('id', $penyewaTerdaftar)->whereNotNull('kamar_id')->get();

        $data['penyewa_baru'] = session()->get('penyewa_baru');

        return view('tagihan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $this->validate($request, [
            'penyewa_id' => 'required|exists:penyewas,id|numeric',
            'invoice_id' => 'required|unique:tagihans,invoice_id',
            'jatuh_tempo' => 'required|date',
            'status' => 'required|in:Aktif,Tidak Aktif,Menunggak,Nyicil',
        ]);

        //karena datanya baru maka tanggal jatuh tempo akan sama dengan tanggal terakhir_bayar
       
        $request['terakhir_bayar'] = $request->jatuh_tempo;
        Tagihan::create($request->except(['_token']))->save();

        return back()->with('success', 'Berhasil menambahkan data tagihan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function show(Tagihan $tagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagihan $tagihan)
    {

        if(!isset($tagihan->penyewa->kamar_id))
            return redirect()->route('tagihan.index')->with('error', 'Tagihan Sudah Tidak Aktif, Mohon Registrasi Ulang!');

        //
        $data['penyewas'] = Penyewa::where('status', '!=', 'Selesai Ngekos')->get();
        $data['data'] = $tagihan;
        
        return view('tagihan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        //
          $this->validate($request, [
            'penyewa_id' => 'required|exists:penyewas,id|numeric',
            'invoice_id' => 'required|exists:tagihans,invoice_id',
            'terakhir_bayar' => 'required',
            'jatuh_tempo' => 'required',
            'status' => 'required|in:Aktif,Tidak Aktif,Menunggak,Nyicil',
        ]);

      // dd($tagihan->penyewa->kamar_id);

        if ( $request->status == "Tidak Aktif" )
        {
            Kamar::findOrFail($tagihan->penyewa->kamar_id)->update([
                'status' => 'Kosong',
                'jumlah_penghuni' => 0
            ]);

            Penyewa::findOrFail($tagihan->penyewa->id)->update([
                'status' => 'Selesai Ngekos',
                'kamar_id' => null
            ]);
        }
       
        Tagihan::findOrFail($tagihan->id)->update($request->except(['_token']));

        return back()->with('success', 'Berhasil mengupdate data tagihan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagihan $tagihan)
    {
        //
        Tagihan::findOrFail($tagihan->id)->delete();

        // Kamar::findOrFail($tagihan->penyewa->kamar_id)->update([
        //     'status' => 'Kosong',
        //     'jumlah_penghuni' => 0
        // ]);

        return back()->with('success', "Berhasil menghapus data tagihan $tagihan->invoice_id");
    }
}
