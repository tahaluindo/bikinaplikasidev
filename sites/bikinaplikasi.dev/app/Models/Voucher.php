<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'voucher';
    protected $guarded = [];
    
    public static function getPotongan($kode_voucher, $harga)
    {
        if ($voucher = Voucher::where('kode_voucher', $kode_voucher)->first())
        {
            if($voucher->dalam == 'persen') {
                
                return ($voucher->potongan / 100) * $harga;
            }
            
            return $voucher->potongan;
        }
            
        return 0;
    }
    
    public static function getHarga($kode_voucher, $harga)
    {
        
        return $harga - self::getPotongan($kode_voucher, $harga);
    }
}
