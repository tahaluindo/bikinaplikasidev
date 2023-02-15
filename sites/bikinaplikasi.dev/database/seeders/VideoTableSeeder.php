<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VideoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('video')->delete();
        
        \DB::table('video')->insert(array (
            0 => 
            array (
                'id' => 6,
                'judul' => 'Cara menjalankan program website laravel / codeigniter',
                'deskripsi' => '-',
                'link' => 'Cara%20menjalankan%20program%20website.mp4',
                'created_at' => '2021-05-03 12:05:44',
                'updated_at' => '2021-05-03 12:05:44',
            ),
        ));
        
        
    }
}