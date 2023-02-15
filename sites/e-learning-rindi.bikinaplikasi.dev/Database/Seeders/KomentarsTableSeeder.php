<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomentarsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('komentars')->delete();
        
        \DB::table('komentars')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 10,
                'informasi_id' => 1,
                'isi' => 'siap pak',
                'created_at' => '2020-08-28 21:57:16',
                'updated_at' => '2020-08-28 21:57:16',
            ),
        ));
        
        
    }
}