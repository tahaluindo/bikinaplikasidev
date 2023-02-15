<?php

namespace App\Http\Controllers;

use App\DetailPenjualan;
use App\Http\Controllers\Controller;
use App\Penjualan;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $data['keranjang'] = Penjualan::where('id_pelanggan', auth()->user()->id)->where('status', 'Belum Konfirmasi')->with('detail_penjualans')->first();

        if (!$data['keranjang']) {
            return redirect('')->with('success', 'Tidak ada barang dikeranjang');

            if (!$data['keranjang']->detail_penjualans->count()) {
                return redirect('')->with('success', 'Tidak ada barang dikeranjang');
            }
        }

        return view("keranjang.index", $data);
    }

    public function delete(DetailPenjualan $detail_penjualan)
    {
        $detail_penjualan->delete();
        $detail_penjualan->penjualan->delete();

        return back()->with('success', 'Berhasil menghapus barang');
    }

    public function checkoutStore(Request $request, Penjualan $penjualan)
    {
        $this->validate($request, [
            'berat'          => 'required|numeric',
            'ongkir_value'   => 'required|numeric',
            'bukti_transfer' => 'required|image',
            'alamat_kirim'   => 'required',
        ]);

        if (!$request->ongkir_value) {
            return redirect()->back()->with('error', 'Mohon inputkan tujuan anda!');
        }

        $bukti_transfer = "bukti_transfer/" . $request->bukti_transfer->getClientOriginalName();
        $penjualan->update([
            'status'         => 'Sudah Konfirmasi',
            'alamat_kirim'   => $request->alamat_kirim,
            'bukti_transfer' => $bukti_transfer,
            'total_berat'    => $request->berat,
            'ongkir'         => $request->ongkir_value,
        ]);

        $request->bukti_transfer->move("bukti_transfer", $bukti_transfer);

        return redirect('')->with('success', 'Berhasil melakukan checkout');
    }
}
