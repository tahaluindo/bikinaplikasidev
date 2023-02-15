<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class LabaRugiController extends Controller
{
    public function index()
    {

        return view('laba-rugi.laporan.index');
    }

    public function print(Request $request)
    {
        $list = array();
        $month = \Carbon\Carbon::parse($request->tanggal_mulai)->format("m");
        $year = \Carbon\Carbon::parse($request->tanggal_mulai)->format("Y");

        for ($d = 1; $d <= \Carbon\Carbon::parse($request->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($request->tanggal_akhir)); $d++) {

            $time = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time) == $month)
                $list[] = date('Y-m-d', $time);
        }

        $data['laporans'] = [];

        foreach ($list as $key => $item) {
            $pesanan = Pesanan::whereBetween('dipesan_pada', [\Carbon\Carbon::parse($item)->addDays(-1)->format("Y-m-d"), \Carbon\Carbon::parse($item)->addDays(1)->format("Y-m-d")])->sum('total');
            $pengeluaran = Pengeluaran::whereBetween('tanggal', [\Carbon\Carbon::parse($item)->addDays(-1)->format("Y-m-d"), \Carbon\Carbon::parse($item)->addDays(1)->format("Y-m-d")])->sum('jumlah');

            if ($pesanan || $pengeluaran) {

                $data['laporans'][$key]['tanggal'] = $item;
                $data['laporans'][$key]['pesanan'] = $pesanan;
                $data['laporans'][$key]['pengeluaran'] = $pengeluaran;
            }

        }

        return view('laba-rugi.laporan.print', $data);
    }
}
