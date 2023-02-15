<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AkunPembayaranTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('akun_pembayaran')->delete();
        
        \DB::table('akun_pembayaran')->insert(array (
            0 => 
            array (
                'id' => 7,
                'user_admin_id' => 37,
                'jenis' => '',
                'nama_akun' => 'ramdan riawan',
                'no_akun' => '082282692489',
            ),
        ));
        
        
    }
}