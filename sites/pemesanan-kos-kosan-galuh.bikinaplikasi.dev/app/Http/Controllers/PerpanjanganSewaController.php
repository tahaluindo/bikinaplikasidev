<?php

namespace App\Http\Controllers;

use App\PerpanjanganSewa;
use App\Tagihan;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 *
 */
class Kos
{
    public $alamat = "Talang Banjar";
    public $no_hp = "082233445566";
}

class PerpanjanganSewaController extends Controller
{
    public function getNota(PerpanjanganSewa $perpanjanganSewa)
    {
        $data['perpanjanganSewa'] = $perpanjanganSewa;
        $data['kos'] = new Kos();

        return view('perpanjangan_sewa.nota', $data);
    }

    public function getBiaya($tagihan_id, $jenis_perpanjangan)
    {
        $tagihan = Tagihan::where('invoice_id', '=', $tagihan_id)->first();
        $type_sewa = $tagihan->penyewa->kamar->type;

        if ( $jenis_perpanjangan == 'Harian' )
        {
            return $type_sewa->harga_harian;
        } elseif ( $jenis_perpanjangan == 'Mingguan' )
        {
            return $type_sewa->harga_mingguan;
        } elseif ( $jenis_perpanjangan == 'Bulanan' )
        {
            return $type_sewa->harga_bulanan;
        } elseif ( $jenis_perpanjangan == 'Tahunan' )
        {
            return $type_sewa->harga_tahunan;
        }
    }

    public function renew($tagihan_id)
    {
        $data['tagihan_id'] = $tagihan_id;
        $tagihan = Tagihan::where('invoice_id', '=', $tagihan_id)->first();
        $data['tagihan'] = $tagihan;

        $data['untuk_tempo'] = $tagihan->jatuh_tempo;
        $data['jenis_perpanjangan'] = $tagihan->penyewa->type_sewa;

        if ( $data['jenis_perpanjangan'] == 'Harian' )
        {
            $data['biaya'] = $tagihan->penyewa->kamar->type->harga_harian;
            $data['biaya_tambahan'] = $tagihan->penyewa->kamar->type->harian_tambahan * ($tagihan->penyewa->kamar->jumlah_penghuni - 1);
        }
        elseif ( $data['jenis_perpanjangan'] == 'Mingguan' )
        {
            $data['biaya'] = $tagihan->penyewa->kamar->type->harga_mingguan;
            $data['biaya_tambahan'] = $tagihan->penyewa->kamar->type->mingguan_tambahan * ($tagihan->penyewa->kamar->jumlah_penghuni - 1);
        }
        elseif ( $data['jenis_perpanjangan'] == 'Bulanan' )
        {
            $data['biaya'] = $tagihan->penyewa->kamar->type->harga_bulanan;
            $data['biaya_tambahan'] = $tagihan->penyewa->kamar->type->bulanan_tambahan * ($tagihan->penyewa->kamar->jumlah_penghuni - 1);
        }
        elseif ( $data['jenis_perpanjangan'] == 'Tahunan' )
        {
            $data['biaya'] = $tagihan->penyewa->kamar->type->harga_tahunan;
            $data['biaya_tambahan'] = $tagihan->penyewa->kamar->type->tahunan_tambahan * ($tagihan->penyewa->kamar->jumlah_penghuni - 1);
        }

        //untuk menghitung biaya tambahan lagi jika menunggak
        $waktu_sekarang = strtotime(date('Y-m-d\Th:i:s'));
        $data['terdeteksimenunggaklebihdariatausamadengan'] = 0;
        $data['biaya_menunggak'] = 0;

        Carbon::setLocale('ID');

        $date = Carbon::create(date("Y", strtotime($tagihan->jatuh_tempo)), date("m", strtotime($tagihan->jatuh_tempo)), date("d", strtotime($tagihan->jatuh_tempo)), date("h", strtotime($tagihan->jatuh_tempo)), date("i", strtotime($tagihan->jatuh_tempo)), date("s", strtotime($tagihan->jatuh_tempo)));


        if( $tagihan->status == 'Menunggak' )
        {
            //jika tanggal jatuh tempo < dari waktu sekarang dan tanggal jatuh tempo + 1 hari > dari waktu sekarang
            if ( $date->diffInHours() < 24 )
            {
                $data['biaya_tambahan'] += $tagihan->penyewa->kamar->type->harga_harian;
                $data['biaya_menunggak'] = $tagihan->penyewa->kamar->type->harga_harian;

                $data['terdeteksimenunggaklebihdariatausamadengan'] = 1;
            }

            // jika + 2 hari
            elseif ($date->diffInHours() < 48 )
            {
                $data['biaya_tambahan'] += $tagihan->penyewa->kamar->type->harga_harian * 2;
                $data['biaya_menunggak'] = $tagihan->penyewa->kamar->type->harga_harian * 2;

                $data['terdeteksimenunggaklebihdariatausamadengan'] = 2;
            }

            //jika + 3 hari
            elseif ($date->diffInHours() < 72 )
            {
                $data['biaya_tambahan'] += $tagihan->penyewa->kamar->type->harga_harian * 3;
                $data['biaya_menunggak'] = $tagihan->penyewa->kamar->type->harga_harian * 3;

                $data['terdeteksimenunggaklebihdariatausamadengan'] = 3;
            }
            //jika > 3 hari maka akan (dihitung mingguan)
            elseif( $date->diffInHours() < 168 )
            {
                $data['biaya_tambahan'] += $tagihan->penyewa->kamar->type->harga_mingguan;
                $data['biaya_menunggak'] = $tagihan->penyewa->kamar->type->harga_mingguan;

                $data['terdeteksimenunggaklebihdariatausamadengan'] = 4;
            }

            //jika 2 minggu
            elseif( $date->diffInHours() < 336 )
            {
                $data['biaya_tambahan'] += $tagihan->penyewa->kamar->type->harga_mingguan * 2;
                $data['biaya_menunggak'] = $tagihan->penyewa->kamar->type->harga_mingguan * 2;

                $data['terdeteksimenunggaklebihdariatausamadengan'] = 14;
            }

            //jika 3 minggu
            elseif( $date->diffInHours() < 504 )
            {
                $data['biaya_tambahan'] += $tagihan->penyewa->kamar->type->harga_mingguan * 3;
                $data['biaya_menunggak'] = $tagihan->penyewa->kamar->type->harga_mingguan * 3;

                $data['terdeteksimenunggaklebihdariatausamadengan'] = 21;
            }

            //jika 4 minggu
            elseif( $date->diffInHours() < 672  )
            {
                $data['biaya_tambahan'] += $tagihan->penyewa->kamar->type->harga_mingguan * 4;
                $data['biaya_menunggak'] = $tagihan->penyewa->kamar->type->harga_mingguan * 4;

                $data['terdeteksimenunggaklebihdariatausamadengan'] = 28;
            }

            //jika 1 bulan
            elseif( $date->diffInHours() < 720  )
            {
                $data['biaya_tambahan'] += $tagihan->penyewa->kamar->type->harga_bulanan;
                $data['biaya_menunggak'] = $tagihan->penyewa->kamar->type->harga_bulanan;

                $data['terdeteksimenunggaklebihdariatausamadengan'] = 30;
            }
        }

        $data['total'] = $data['biaya'] + $data['biaya_tambahan'];

        return view('perpanjangan_sewa.renew', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['biaya'] = str_replace('Rp', '', $request->biaya);
        $request['biaya'] = str_replace('.', '', $request['biaya']);

        $request['biaya_tambahan'] = str_replace('Rp', '', $request->biaya_tambahan);
        $request['biaya_tambahan'] = str_replace('.', '', $request['biaya_tambahan']);

        $request['total'] = str_replace('Rp', '', $request->total);
        $request['total'] = str_replace('.', '', $request['total']);

        //
        $this->validate($request, [
            'tagihan_id' => 'required|exists:tagihans,invoice_id',
            'jenis_perpanjangan' => 'required|in:Harian,Mingguan,Bulanan,Tahunan',
            'lama_perpanjangan' => 'required|numeric|max:11',
            'untuk_tempo' => 'required|date',
            'biaya' => 'required|numeric',
            'biaya_tambahan' => 'required|numeric',
            'total' => 'required|numeric',
            'methode' => 'required|in:Bank,Cash,Bank Nyicil,Cash Nyicil',
            'status' => 'in:Lunas,Belum Lunas',
        ]);

        if ( $request->jenis_perpanjangan == 'Harian')
        {
            $dayName = 'day';
        }

        elseif ( $request->jenis_perpanjangan == 'Mingguan')
        {
            $dayName = 'week';
        }

        elseif ( $request->jenis_perpanjangan == 'Bulanan')
        {
            $dayName = 'month';
        }

        elseif ( $request->jenis_perpanjangan == 'Tahunan')
        {
            $dayName = 'year';
        }

        // untuk mengantisipasi jika dia memilih methode nyicil
        $terakhir_bayar = date('Y-m-d\Th:i:s');
        if ( $request->methode === 'Bank Nyicil' || $request->methode === 'Cash Nyicil')
        {
            Tagihan::where('invoice_id', '=', $request->tagihan_id)->update([
                'terakhir_bayar' => $terakhir_bayar,
                'jatuh_tempo' => $request->untuk_tempo,
                'status' => 'Aktif'
            ]);

        }else #selain nyicil
        {
            $jatuh_tempo = date('Y-m-d\Th:i:s', strtotime("+$request->lama_perpanjangan $dayName", strtotime(date('Y-m-d\Th:i:s', strtotime($request->untuk_tempo)))));

            Tagihan::where('invoice_id', '=', $request->tagihan_id)->update([
                'terakhir_bayar' => $terakhir_bayar,
                'jatuh_tempo' => $jatuh_tempo,
                'status' => 'Aktif'
            ]);
        }

        PerpanjanganSewa::create($request->except(['_token']))->save();

        return redirect("perpanjangan_sewa/$request->tagihan_id")->with('success', 'Berhasil menambah perpanjangan sewa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PerpanjanganSewa  $perpanjanganSewa
     * @return \Illuminate\Http\Response
     */
    public function show($perpanjanganSewa)
    {
        //
        $data['datas'] = PerpanjanganSewa::where('tagihan_id', '=', $perpanjanganSewa)->orderBy('id', 'desc')->limit(50)->get();

        return view('perpanjangan_sewa.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PerpanjanganSewa  $perpanjanganSewa
     * @return \Illuminate\Http\Response
     */
    public function edit(PerpanjanganSewa $perpanjanganSewa)
    {
        //
        $data['tagihan_id'] = $perpanjanganSewa->tagihan_id;
        $data['data'] = $perpanjanganSewa;

        $tagihan = Tagihan::where('invoice_id', '=', $perpanjanganSewa->tagihan_id)->first();

        $data['untuk_tempo'] = $tagihan->jatuh_tempo;
        $data['jenis_perpanjangan'] = $tagihan->penyewa->type_sewa;

        if ( $data['jenis_perpanjangan'] == 'Harian' )
        {
            $data['biaya'] = $tagihan->penyewa->kamar->type->harga_harian;
            $data['biaya_tambahan'] = $tagihan->penyewa->kamar->type->harian_tambahan * ($tagihan->penyewa->kamar->jumlah_penghuni - 1);
        }
        elseif ( $data['jenis_perpanjangan'] == 'Mingguan' )
        {
            $data['biaya'] = $tagihan->penyewa->kamar->type->harga_mingguan;
            $data['biaya_tambahan'] = $tagihan->penyewa->kamar->type->mingguan_tambahan * ($tagihan->penyewa->kamar->jumlah_penghuni - 1);
        }
        elseif ( $data['jenis_perpanjangan'] == 'Bulanan' )
        {
            $data['biaya'] = $tagihan->penyewa->kamar->type->harga_bulanan;
            $data['biaya_tambahan'] = $tagihan->penyewa->kamar->type->bulanan_tambahan * ($tagihan->penyewa->kamar->jumlah_penghuni - 1);
        }
        elseif ( $data['jenis_perpanjangan'] == 'Tahunan' )
        {
            $data['biaya'] = $tagihan->penyewa->kamar->type->harga_tahunan;
            $data['biaya_tambahan'] = $tagihan->penyewa->kamar->type->tahunan_tambahan * ($tagihan->penyewa->kamar->jumlah_penghuni - 1);
        }

        return view('perpanjangan_sewa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PerpanjanganSewa  $perpanjanganSewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerpanjanganSewa $perpanjanganSewa)
    {
        //
        $request['biaya'] = str_replace('Rp', '', $request->biaya);
        $request['biaya'] = str_replace('.', '', $request['biaya']);

        $request['biaya_tambahan'] = str_replace('Rp', '', $request->biaya_tambahan);
        $request['biaya_tambahan'] = str_replace('.', '', $request['biaya_tambahan']);

        $request['total'] = str_replace('Rp', '', $request->total);
        $request['total'] = str_replace('.', '', $request['total']);

        $this->validate($request, [
            'tagihan_id' => 'required|exists:tagihans,invoice_id',
            'jenis_perpanjangan' => 'required|in:Harian,Mingguan,Bulanan,Tahunan',
            'lama_perpanjangan' => 'required|numeric|max:11',
            'untuk_tempo' => 'required|date',
            'biaya' => 'required|numeric',
            'biaya_tambahan' => 'required|numeric',
            'total' => 'required|numeric',
            'methode' => 'required|in:Bank,Cash,Bank Nyicil,Cash Nyicil',
            'status' => 'in:Lunas,Belum Lunas',
        ]);

        if ( $request->jenis_perpanjangan == 'Harian')
        {
            $dayName = 'day';
        }

        elseif ( $request->jenis_perpanjangan == 'Mingguan')
        {
            $dayName = 'week';
        }

        elseif ( $request->jenis_perpanjangan == 'Bulanan')
        {
            $dayName = 'month';
        }

        elseif ( $request->jenis_perpanjangan == 'Tahunan')
        {
            $dayName = 'year';
        }

        // untuk mengantisipasi jika dia memilih methode nyicil
        $terakhir_bayar = date('Y-m-d\Th:i:s');
        if ( $request->methode === 'Bank Nyicil' || $request->methode === 'Cash Nyicil')
        {
            Tagihan::where('invoice_id', '=', $request->tagihan_id)->update([
                'terakhir_bayar' => $terakhir_bayar,
                'jatuh_tempo' => $request->untuk_tempo,
                'status' => 'Aktif'
            ]);

        }else #selain nyicil
        {
            $jatuh_tempo = date('Y-m-dY-m-d\Th:i:s', strtotime("+$request->lama_perpanjangan $dayName", strtotime($terakhir_bayar)));

            Tagihan::where('invoice_id', '=', $request->tagihan_id)->update([
                'terakhir_bayar' => $terakhir_bayar,
                'jatuh_tempo' => $jatuh_tempo,
                'status' => 'Aktif'
            ]);
        }

        PerpanjanganSewa::findOrFail($perpanjanganSewa->id)->update($request->except(['_token']));

        return redirect("perpanjangan_sewa/$request->tagihan_id")->with('success', 'Berhasil menambah perpanjangan sewa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PerpanjanganSewa  $perpanjanganSewa
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerpanjanganSewa $perpanjanganSewa)
    {
        //
        // $perpanjanganSewaSebelumnya = PerpanjanganSewa::where('created_at', '<', $perpanjanganSewa->created_at)->first();

        // Tagihan::where('invoice_id', '=', $perpanjanganSewa->tagihan_id)->update([
        //     'terakhir_bayar' => $perpanjanganSewaSebelumnya
        // ]);

        PerpanjanganSewa::findOrFail($perpanjanganSewa->id)->delete();

        return back()->with('success', 'Berhasil menghapus perpanjangan sewa');
    }
}
