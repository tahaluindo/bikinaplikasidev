<?php

namespace App\Http\Controllers;

use App\LaporanController as LaporanModel;
use App\Tagihan;
use App\PerpanjanganSewa;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanShowFromPeriode(Request $request)
    {
        $this->validate($request, [
            'awal_bulan' => 'required|date',
            'akhir_bulan' => "required|after:$request->awal_bulan"
        ]);

        $awal_bulan = $request->awal_bulan;
        $akhir_bulan = $request->akhir_bulan;

        $data['awal_bulan'] = $awal_bulan;
        $data['akhir_bulan'] = $akhir_bulan;

        $data['sudah_bayars'] = PerpanjanganSewa::whereBetween('untuk_tempo', [$awal_bulan, $akhir_bulan])->orderBy('id', 'desc')->get();
        $data['pemasukan_lain_lains'] = Transaksi::whereBetween('tggl', [$awal_bulan, $akhir_bulan])->where('jenis', '=', 'pemasukan')->orderBy('id', 'desc')->get();
        $data['pengeluaran_lain_lains'] = Transaksi::whereBetween('tggl', [$awal_bulan, $akhir_bulan])->where('jenis', '=', 'pengeluaran')->orderBy('id', 'desc')->get();
        $data['total_debit'] = $data['sudah_bayars']->sum('total') + $data['pemasukan_lain_lains']->sum('total');
        $data['total_kredit'] = $data['pengeluaran_lain_lains']->sum('total');
        $data['laba_rugi'] = $data['total_debit'] - $data['total_kredit'];

        $data['periode'] = date("d-M-Y", strtotime("$request->bulan-31"));

        return view('laporan.index', $data);
    }

    public function showFromPeriode(Request $request)
    {
        $data['datas'] = Tagihan::where('jatuh_tempo', '<=', date("$request->bulan-31"))->where('jatuh_tempo', '>=', date("$request->bulan-01"))->orderBy('id', 'desc')->limit(50)->get();
        Carbon::setLocale('ID');

        // dd( Carbon::parse($data['datas'][0]->jatuh_tempo)->diffForHumans());

        return view('laporan.terlambat_bayar', $data);
    }

    public function terlambatBayar()
    {
        $data['datas'] = Tagihan::where('jatuh_tempo', '<', date("Y-m-d\Th:i:s"))->where('terakhir_bayar', '!=', null)->orderBy('id', 'desc')->limit(50)->get();
        Carbon::setLocale('ID');
        // dd($data);

        // update data jikalau ada menunggak
        foreach ($data['datas'] as $tagihan) {
            if ($tagihan->status == 'Aktif' && date('Y-m-d\Th:i:s', strtotime($tagihan->jatuh_tempo)) < date('Y-m-d\Th:i:s')) {
                Tagihan::find($tagihan->id)->update(['status' => 'Menunggak']);
            }
        }

        // dd( Carbon::parse($data['datas'][0]->jatuh_tempo)->diffForHumans());

        return view('laporan.terlambat_bayar', $data);
    }

    public function laporan(Request $request)
    {
        $awal_bulan = $request->awal_bulan ?? date('Y-m-01');
        $akhir_bulan = $request->akhir_bulan ?? date('Y-m-31');

        $data['awal_bulan'] = $awal_bulan;
        $data['akhir_bulan'] = $akhir_bulan;

        $data['sudah_bayars'] = PerpanjanganSewa::where('created_at', '>=', $awal_bulan)->where('created_at', '<=', $akhir_bulan)->orderBy('id', 'desc')->get();
        // $data['terlambat_bayars'] = Tagihan::where('jatuh_tempo', '<', date('Y-m-d'))->orderBy('id', 'desc')->get();
        $data['pemasukan_lain_lains'] = Transaksi::where('created_at', '>=', $awal_bulan)->where('created_at', '<=', $akhir_bulan)->where('jenis', '=', 'pemasukan')->orderBy('id', 'desc')->get();
        $data['pengeluaran_lain_lains'] = Transaksi::where('created_at', '>=', $awal_bulan)->where('created_at', '<=', $akhir_bulan)->where('jenis', '=', 'pengeluaran')->orderBy('id', 'desc')->get();
        $data['total_debit'] = $data['sudah_bayars']->sum('total') + $data['pemasukan_lain_lains']->sum('total');
        $data['total_kredit'] = $data['pengeluaran_lain_lains']->sum('total');
        // dd($data['laba_ditahan'] = $data['terlambat_bayars']);
        // $data['laba_rugi'] = $data['total_debit'] - $data['total_kredit'] + $data['laba_ditahan'];
        $data['laba_rugi'] = $data['total_debit'] - $data['total_kredit'];

        return view('laporan.index', $data);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Laporan $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Laporan $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Laporan $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Laporan $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
