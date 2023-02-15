<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PesananDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pesanan_detail')->delete();
        
        \DB::table('pesanan_detail')->insert(array (
            0 => 
            array (
                'id' => 45,
                'pesanan_id' => 47,
                'produk_id' => 1,
                'jumlah' => 1,
                'harga' => 1300000,
                'total' => 1300000,
            ),
            1 => 
            array (
                'id' => 46,
                'pesanan_id' => 48,
                'produk_id' => 11,
                'jumlah' => 1,
                'harga' => 25000,
                'total' => 25000,
            ),
            2 => 
            array (
                'id' => 47,
                'pesanan_id' => 49,
                'produk_id' => 11,
                'jumlah' => 1,
                'harga' => 25000,
                'total' => 25000,
            ),
            3 => 
            array (
                'id' => 48,
                'pesanan_id' => 50,
                'produk_id' => 11,
                'jumlah' => 1,
                'harga' => 25000,
                'total' => 25000,
            ),
            4 => 
            array (
                'id' => 49,
                'pesanan_id' => 51,
                'produk_id' => 11,
                'jumlah' => 1,
                'harga' => 25000,
                'total' => 25000,
            ),
            5 => 
            array (
                'id' => 50,
                'pesanan_id' => 52,
                'produk_id' => 11,
                'jumlah' => 1,
                'harga' => 25000,
                'total' => 25000,
            ),
            6 => 
            array (
                'id' => 51,
                'pesanan_id' => 53,
                'produk_id' => 11,
                'jumlah' => 1,
                'harga' => 25000,
                'total' => 25000,
            ),
        ));
        
        
    }
}