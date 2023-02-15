<?php

namespace App\Http\Controllers\Tokoku;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tokoku\StoreTrRequest;
use App\Tokoku\Periode;
use App\Tokoku\Transaction;
use App\Tokoku\Supplier;
use App\Tokoku\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;

class TrController extends Controller
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

    public function index()
    {
        $data['parse'] = Transaction::where('periode_id', $this->periode->id)->where('type', '!=', 'SO')->orderBy('date', 'desc')->limit(1000)->get();
        $no            = 1;
        return view('tokoku.transaction.index', compact('data', 'no'));
    }

    public function create()
    {
        $data['product'] = Transaction::where('type', 'SO')->where('periode_id', $this->periode->id)->get();
        $data['now']     = Carbon::now()->format('Y-m-d');
        return view('tokoku.transaction.create', compact('data'));
    }

    public function store(Request $request)
    {
        //dd($request->input('product_id'));
        $key1 = 0;
        $key2 = 0;
        $key3 = 0;
        $key4 = 0;
        if ($request->input('type') == 'S') {
            foreach ($request->input('product_id') as $row) {
                $wh = Transaction::where('product_id', $request->input('product_id.' . $key1++))->where('periode_id', $this->periode->id)->where('type', 'SO')->first();
                if ($wh == null) {
                    return redirect(route($this->current))->with('error', 'Ada Kesalahan !, Barang mungkin belum di Perhitungan Fisik untuk periode ini');
                }
                $charges[] = [
                    'date'         => $request->input('date'),
                    'type'         => $request->input('type'),
                    'product_id'   => $request->input('product_id.' . $key2++),
                    'qty'          => $request->input('qty.' . $key3++) * -1,
                    // 'price'        => $request->input('price.' . $key4++),
                    'price'        => 0,
                    'periode_id'   => $this->periode->id,
                    'catatan'      => $request->catatan,
                ];
            }
        } elseif ($request->input('type') == 'B') {
            foreach ($request->input('product_id') as $row) {
                $wh = Transaction::where('product_id', $request->input('product_id.' . $key1++))->where('periode_id', $this->periode->id)->where('type', 'SO')->first();
                if ($wh == null) {
                    return redirect(route($this->current))->with('error', 'Ada Kesalahan !, Barang mungkin belum di Perhitungan Fisik untuk periode ini');
                }
                $charges[] = [
                    'date'         => $request->input('date'),
                    'type'         => $request->input('type'),
                    'product_id'   => $request->input('product_id.' . $key2++),
                    'qty'          => $request->input('qty.' . $key3++),
                    // 'price'        => $request->input('price.' . $key4++),
                    'price'        => $request->input('price.' . $key4++),
                    'periode_id'   => $this->periode->id,
                    'catatan'      => $request->catatan,
                ];
            }
        } elseif ($request->input('type') == 'return_penjualan') {
            foreach ($request->input('product_id') as $row) {
                $wh = Transaction::where('product_id', $request->input('product_id.' . $key1++))->where('periode_id', $this->periode->id)->where('type', 'SO')->first();
                if ($wh == null) {
                    return redirect(route($this->current))->with('error', 'Ada Kesalahan !, Barang mungkin belum di Perhitungan Fisik untuk periode ini');
                }
                $charges[] = [
                    'date'         => $request->input('date'),
                    'type'         => $request->input('type'),
                    'product_id'   => $request->input('product_id.' . $key2++),
                    'qty'          => $request->input('qty.' . $key3++),
                    'price'        => 0,
                    'periode_id'   => $this->periode->id,
                    'catatan'      => $request->catatan,
                ];
            }
        }  elseif ($request->input('type') == 'retur_barang') {
            foreach ($request->input('product_id') as $row) {
                $wh = Transaction::where('product_id', $request->input('product_id.' . $key1++))->where('periode_id', $this->periode->id)->where('type', 'SO')->first();
                if ($wh == null) {
                    return redirect(route($this->current))->with('error', 'Ada Kesalahan !, Barang mungkin belum di Perhitungan Fisik untuk periode ini');
                }
                $charges[] = [
                    'date'         => $request->input('date'),
                    'type'         => $request->input('type'),
                    'product_id'   => $request->input('product_id.' . $key2++),
                    'qty'          => $request->input('qty.' . $key3++) * -1,
                    'price'        => $request->input('price.' . $key4++),
                    'periode_id'   => $this->periode->id,
                    'catatan'      => $request->catatan,
                ];
            }
        }
        
        else {
            
            return redirect($this->current);
        }

        Transaction::insert($charges);
        return redirect($this->current)->with('status', 'Berhasil Menambah Transaksi');
    }
    
    public function edit(Transaction $transaction)
    {
        $data['product'] = Transaction::where('type', 'SO')->where('id', $transaction->id)->get();
        $data['now']     = Carbon::now()->format('Y-m-d');
        $data['transaction'] = $transaction;

        return view('tokoku.trans@action.edit', $data);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $x = Transaction::find($id);
        if ($x != null) {
            $x->delete();
        }
        return redirect($this->current)->with('status', 'Berhasil Menghapus Transaksi');
    }
}
