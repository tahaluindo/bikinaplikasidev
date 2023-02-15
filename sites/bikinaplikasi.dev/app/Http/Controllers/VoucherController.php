<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function cek_kode_voucher(Request $request)
    {
        if($voucher = Voucher::where('kode_voucher', $request->kode_voucher)->first()) {
            
            if($voucher->dalam == 'persen') {
                
                $voucher->potongan = $voucher->potongan . '%';
            } else {
                
                $voucher->potongan = toIdr($voucher->potongan);
            }
            
            return response()->json($voucher);
        }
    }
}
