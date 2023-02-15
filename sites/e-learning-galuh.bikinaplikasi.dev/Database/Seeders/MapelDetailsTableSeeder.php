<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MapelDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mapel_details')->delete();
        
        \DB::table('mapel_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'mapel_id' => 1,
                'kelas_id' => 1,
                'user_id' => 139,
            ),
            1 => 
            array (
                'id' => 2,
                'mapel_id' => 1,
                'kelas_id' => 2,
                'user_id' => 142,
            ),
            2 => 
            array (
                'id' => 3,
                'mapel_id' => 1,
                'kelas_id' => 3,
                'user_id' => 143,
            ),
            3 => 
            array (
                'id' => 4,
                'mapel_id' => 2,
                'kelas_id' => 1,
                'user_id' => 139,
            ),
            4 => 
            array (
                'id' => 5,
                'mapel_id' => 2,
                'kelas_id' => 1,
                'user_id' => 144,
            ),
            5 => 
            array (
                'id' => 6,
                'mapel_id' => 3,
                'kelas_id' => 1,
                'user_id' => 139,
            ),
            6 => 
            array (
                'id' => 7,
                'mapel_id' => 3,
                'kelas_id' => 2,
                'user_id' => 140,
            ),
            7 => 
            array (
                'id' => 8,
                'mapel_id' => 3,
                'kelas_id' => 3,
                'user_id' => 139,
            ),
            8 => 
            array (
                'id' => 9,
                'mapel_id' => 3,
                'kelas_id' => 4,
                'user_id' => 147,
            ),
            9 => 
            array (
                'id' => 10,
                'mapel_id' => 3,
                'kelas_id' => 5,
                'user_id' => 144,
            ),
            10 => 
            array (
                'id' => 11,
                'mapel_id' => 3,
                'kelas_id' => 6,
                'user_id' => 148,
            ),
            11 => 
            array (
                'id' => 12,
                'mapel_id' => 4,
                'kelas_id' => 1,
                'user_id' => 139,
            ),
            12 => 
            array (
                'id' => 13,
                'mapel_id' => 4,
                'kelas_id' => 2,
                'user_id' => 140,
            ),
            13 => 
            array (
                'id' => 14,
                'mapel_id' => 4,
                'kelas_id' => 3,
                'user_id' => 142,
            ),
            14 => 
            array (
                'id' => 15,
                'mapel_id' => 4,
                'kelas_id' => 4,
                'user_id' => 143,
            ),
            15 => 
            array (
                'id' => 16,
                'mapel_id' => 4,
                'kelas_id' => 5,
                'user_id' => 144,
            ),
        ));
        
        
    }
}