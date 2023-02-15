<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PesananTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pesanan')->delete();
        
        \DB::table('pesanan')->insert(array (
            0 => 
            array (
                'id' => 47,
                'user_id' => 11,
                'no' => 'PES0000001',
                'status' => 'Belum Lunas',
                'created_at' => '2021-03-29 00:14:27',
                'updated_at' => '2021-03-29 00:14:27',
            ),
            1 => 
            array (
                'id' => 48,
                'user_id' => 38,
                'no' => 'PES0000002',
                'status' => 'Selesai',
                'created_at' => '2021-05-02 07:50:42',
                'updated_at' => '2021-05-02 07:50:42',
            ),
            2 => 
            array (
                'id' => 49,
                'user_id' => 38,
                'no' => 'PES0000003',
                'status' => 'Selesai',
                'created_at' => '2021-05-02 08:11:35',
                'updated_at' => '2021-05-02 08:11:35',
            ),
            3 => 
            array (
                'id' => 50,
                'user_id' => 38,
                'no' => 'PES0000004',
                'status' => 'Selesai',
                'created_at' => '2021-05-02 08:47:17',
                'updated_at' => '2021-05-02 08:47:17',
            ),
            4 => 
            array (
                'id' => 51,
                'user_id' => 38,
                'no' => 'PES0000005',
                'status' => 'Selesai',
                'created_at' => '2021-05-02 08:54:51',
                'updated_at' => '2021-05-02 08:54:51',
            ),
            5 => 
            array (
                'id' => 52,
                'user_id' => 38,
                'no' => 'PES0000006',
                'status' => 'Selesai',
                'created_at' => '2021-05-02 08:59:25',
                'updated_at' => '2021-05-02 08:59:25',
            ),
            6 => 
            array (
                'id' => 53,
                'user_id' => 38,
                'no' => 'PES0000007',
                'status' => 'Selesai',
                'created_at' => '2021-05-02 09:03:29',
                'updated_at' => '2021-05-02 09:03:29',
            ),
        ));
        
        
    }
}