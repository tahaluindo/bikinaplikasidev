<?php

namespace App\Http\Controllers\Tokoku;

use App\Penjualan;

use App\Http\Requests;
use App\Tokoku\Measure;
use App\Tokoku\Periode;
use App\Tokoku\Product;
use App\Tokoku\Supplier;
use App\Tokoku\Transaction;
use App\DetailPenjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LaporanController extends Controller
{
    private $home, $current, $periode;

    public function __construct()
    {
        $this->middleware('auth');
        $this->home    = route('home');
        $this->current = route('trIndex');
        $periode       = Periode::where('active', 'Y')->get();
        if ($periode->count() == 1) {
            $this->periode = $periode->first();
        } else {
            Redirect::to('/periode')->send();
        }
    }
    
    public function penjualanCreate()
    {
        return view('tokoku.laporan.penjualan.create');
    }
    
    public function penjualanOnlineCreate()
    {
        return view('tokoku.laporan.penjualan_online.create');
    }
    
    public function penjualanReturnCreate()
    {
        
        return view('tokoku.laporan.penjualan_return.create');
    }
    
    public function pembelianCreate()
    {
        $data['measure'] = Measure::all();
        $data['supplier'] = Supplier::orderBy('name')->get();
        
        return view('tokoku.laporan.pembelian.create', compact('data'));
    }
    
    public function pembelianReturnCreate()
    {
        $data['measure'] = Measure::all();
        $data['supplier'] = Supplier::orderBy('name')->get();

        return view('tokoku.laporan.pembelian_retur.create', compact('data'));
    }

    public function barangCreate()
    {
        $data['supplier'] = Supplier::orderBy('name')->get();

        return view('tokoku.laporan.barang.create', compact('data'));
    }
    
    public function penjualan(Request $request)
    {
        $data['parse'] = Transaction::where('type', '!=', 'SO')
        ->where('type', 'S')
        ->whereBetween('date', [$request->tanggal_awal, $request->tanggal_akhir])
        ->orderBy('date', 'desc')
        ->limit(1000)->get();

        $no            = 1;
        
        if(!$data['parse']->count()) {
            return 'Data tidak ada!';
        }

        return view('tokoku.laporan.penjualan.index', compact('data', 'no'));
    }
    
    public function penjualanOnline(Request $request)
    {
        $penjualan_ids = Penjualan::whereBetween('tgl_penjualan', [$request->tanggal_awal, $request->tanggal_akhir])->orderBy('id_penjualan', 'desc')->pluck('id_penjualan')->toArray();
        $data['parse'] = DetailPenjualan::whereIn('id_penjualan', $penjualan_ids)->orderBy('id', 'desc')->get();

        $no            = 1;
        
        if(!$data['parse']->count()) {
            return 'Data tidak ada!';
        }

        return view('tokoku.laporan.penjualan_online.index', compact('data', 'no'));
    }
    
    public function penjualanReturn(Request $request)
    {
        $data['parse'] = Transaction::where('type', '!=', 'SO')
        ->where('type', 'return_penjualan')
        ->whereBetween('date', [$request->tanggal_awal, $request->tanggal_akhir])
        ->orderBy('date', 'desc')
        ->limit(1000)->get();

        $no            = 1;
        
        if(!$data['parse']->count()) {
            return 'Data tidak ada!';
        }

        return view('tokoku.laporan.penjualan_return.index', compact('data', 'no'));
    }
    
    public function pembelian(Request $request)
    {
        $product_ids = Product::where('supplier_id', $request->supplier_id)->pluck('id');

        $data['parse'] = Transaction::where('periode_id', $this->periode->id)
        ->where('type', '!=', 'SO')
        ->where('type', 'B')
        ->whereIn('product_id', $product_ids)
        ->whereBetween('date', [$request->tanggal_awal, $request->tanggal_akhir])
        ->orderBy('date', 'desc')
        ->limit(1000)->get();

        $no            = 1;

        if(!$data['parse']->count()) {
            return 'Data tidak ada!';
        }

        return view('tokoku.laporan.pembelian.index', compact('data', 'no'));
    }
    
    public function pembelianReturn(Request $request)
    {
        $product_ids = Product::where('supplier_id', $request->supplier_id)->pluck('id');

        $data['parse'] = Transaction::where('periode_id', $this->periode->id)
        ->where('type', '!=', 'SO')
        ->where('type', 'retur_barang')
        ->whereIn('product_id', $product_ids)
        ->whereBetween('date', [$request->tanggal_awal, $request->tanggal_akhir])
        ->orderBy('date', 'desc')
        ->limit(1000)->get();

        $no            = 1;

        if(!$data['parse']->count()) {
            return 'Data tidak ada!';
        }

        return view('tokoku.laporan.pembelian_retur.index', compact('data', 'no'));
    }

    public function barang(Request $request)
    {
        $product_ids = Product::where('supplier_id', $request->supplier_id)->pluck('id');

        $data['periode']    = $this->periode;
        $x = Transaction::where('periode_id', $this->periode->id)->where('type','SO')->whereIn('product_id', $product_ids)->get();
        $data['parse'] = $x->groupBy('product_id');
        $data['supplier'] = Supplier::get();
        $no = 1;

        if(!$data['parse']->count()) {
            return 'Data tidak ada!';
        }

        return view('tokoku.laporan.barang.index',compact('data','no'));
    }
}
