<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InformasisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('informasis')->delete();
        
        \DB::table('informasis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'judul' => 'info',
                'deskripsi' => '<p>tetap gunakan masker</p>',
                'foto' => '["foto\\/background2.png"]',
                'created_at' => '2020-08-28 21:07:03',
                'updated_at' => '2020-11-26 05:11:20',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'judul' => 'absen',
                'deskripsi' => '<p>Yang hadir hari ini, absen di bawah</p>',
                'foto' => '["foto\\/background.png"]',
                'created_at' => '2020-08-28 21:17:36',
                'updated_at' => '2020-11-26 05:12:14',
            ),
        ));
        
        
    }
}