<?php

namespace App\Http\Controllers\Pengunjung;

use App\Penjualan;
use App\Tokoku\Product;
use App\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function show(Product $product)
    {

        return view('pengunjung.product.show', \compact('product'));
    }

    public function order(Product $product)
    {
        if (!auth()->check()) {
            return back()->with('error', 'Mohon login dulu');
        }

        return view('pengunjung.product.order', \compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        // dd();
        // OrderDetail::create();
        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric|max:' . $product->transaction->total_stock(),
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->with('error', "Total stock kurang dari " . $request->qty)->withInput();
        }

        \DB::transaction(function () use ($request, $product) {
            // cari penjualanny apakah sudah ada atau belum
            $penjualanCek = Penjualan::where('id_pelanggan', auth()->user()->id)->where('status', 'Belum Konfirmasi');

            if (!$penjualanCek->get()->count()) {
                $penjualanCreate = Penjualan::create([
                    'tgl_penjualan' => $request->tgl_penjualan,
                    'id_pelanggan'  => $request->id_pelanggan,
                    'alamat_kirim'  => $request->alamat_kirim,
                ]);

                DetailPenjualan::create([
                    'id_penjualan' => $penjualanCreate->id_penjualan,
                    'id_barang'    => $request->id_barang,
                    'harga_satuan' => $product->price,
                    'qty'          => $request->qty,
                    'harga_total'  => $request->qty * $product->price,
                ]);
            } else {
                DetailPenjualan::create([
                    'id_penjualan' => $penjualanCek->first()->id_penjualan,
                    'id_barang'    => $request->id_barang,
                    'harga_satuan' => $product->price,
                    'qty'          => $request->qty,
                    'harga_total'  => $request->qty * $product->price,
                ]);
            }
        });

        return redirect()->route('keranjang.index')->with('success', 'Berhasil menambah pesanan barang');
    }
}
