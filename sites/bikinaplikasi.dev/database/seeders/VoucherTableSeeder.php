<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VoucherTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('voucher')->delete();
        
        \DB::table('voucher')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kode_voucher' => 'DISKON50K',
                'potongan' => 50000,
                'dipakai' => NULL,
                'limit' => 1,
                'dalam' => 'rupiah',
                'khusus_user' => NULL,
                'khusus_produk' => NULL,
                'expired_at' => '2021-04-28 21:47:57',
                'created_at' => '2021-03-28 21:47:57',
                'updated_at' => '2021-03-28 21:47:57',
            ),
        ));
        
        
    }
}