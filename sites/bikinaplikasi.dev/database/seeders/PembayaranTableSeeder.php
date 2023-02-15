<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PembayaranTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pembayaran')->delete();
        
        \DB::table('pembayaran')->insert(array (
            0 => 
            array (
                'id' => 18,
                'user_admin_id' => 37,
                'akun_pembayaran_id' => 7,
                'jumlah' => 100000,
                'status' => 'Menunggu Persetujuan',
                'token' => NULL,
                'created_at' => '2021-05-02 06:04:45',
            ),
        ));
        
        
    }
}