<?php

namespace App\Http\Controllers;

use App\Penjualan;

use App\Http\Requests;
use App\Tokoku\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenjualanController extends Controller
{
    public function index()
    {
        $data['penjualans'] = Penjualan::all();
        
        return view("tokoku.penjualan.index", $data);
    }

    public function inputResi(Penjualan $penjualan)
    {
        return view('tokoku.penjualan.create', compact('penjualan'));
    }

    public function inputResiStore(Request $request, Penjualan $penjualan)
    {
        $this->validate($request, [
            'no_resi' => 'required|unique:penjualan,no_resi'
        ]);

        $penjualan->update([
            'no_resi' => $request->no_resi
        ]);

        return redirect()->route('penjualan.admin.index')->with('success', 'Berhasil mengupdate resi');
    }

    public function selesaikanPesanan(Penjualan $penjualan)
    {
        foreach($penjualan->detail_penjualans as $detail_penjualan) {
            Transaction::where('product_id', $detail_penjualan->product->id)->where('type', 'SO')->first()
            ->decrement('qty', $detail_penjualan->qty);
        }

        $penjualan->update([
            'status' => 'Selesai'
        ]);

        return redirect()->back()->with('success', 'Berhasil menyelesaikan pesanan');
    }
}
