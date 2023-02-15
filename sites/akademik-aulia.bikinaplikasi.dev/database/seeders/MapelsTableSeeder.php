<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MapelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mapels')->delete();
        
        \DB::table('mapels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'IPA',
                'kelompok' => 'A',
                'created_at' => '2020-08-28 23:35:09',
                'updated_at' => '2021-01-26 14:38:51',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'IPS',
                'kelompok' => 'A',
                'created_at' => '2020-08-28 23:36:07',
                'updated_at' => '2021-01-26 14:39:19',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Bahasa Indonesia',
                'kelompok' => 'A',
                'created_at' => '2020-08-28 23:38:09',
                'updated_at' => '2020-08-28 23:38:09',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Seni Budaya',
                'kelompok' => 'B',
                'created_at' => '2020-08-29 07:20:59',
                'updated_at' => '2021-01-26 14:45:36',
            ),
            4 => 
            array (
                'id' => 13,
                'nama' => 'Penjas',
                'kelompok' => 'B',
                'created_at' => '2021-01-25 14:27:41',
                'updated_at' => '2021-01-26 14:45:11',
            ),
            5 => 
            array (
                'id' => 14,
                'nama' => 'Bahasa Inggris',
                'kelompok' => 'A',
                'created_at' => '2021-01-26 14:46:14',
                'updated_at' => '2021-01-26 14:46:14',
            ),
            6 => 
            array (
                'id' => 15,
                'nama' => 'Matematika',
                'kelompok' => 'A',
                'created_at' => '2021-01-26 14:46:42',
                'updated_at' => '2021-01-26 14:46:42',
            ),
            7 => 
            array (
                'id' => 17,
                'nama' => 'Mapel Test',
                'kelompok' => 'C',
                'created_at' => '2021-02-05 16:14:14',
                'updated_at' => '2021-02-05 16:14:14',
            ),
        ));
        
        
    }
}