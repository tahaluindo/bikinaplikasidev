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
                'nama' => 'Biologi',
                'created_at' => '2020-08-28 16:35:09',
                'updated_at' => '2020-08-28 16:35:09',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Fisika',
                'created_at' => '2020-08-28 16:36:07',
                'updated_at' => '2020-08-28 16:36:07',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Bahasa Indonesia',
                'created_at' => '2020-08-28 16:38:09',
                'updated_at' => '2020-08-28 16:38:09',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Seni Budaya',
                'created_at' => '2020-08-29 00:20:59',
                'updated_at' => '2020-08-29 00:20:59',
            ),
        ));
        
        
    }
}