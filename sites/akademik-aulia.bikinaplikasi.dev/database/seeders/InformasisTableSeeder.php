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
                'id' => 11,
                'user_id' => 1,
                'judul' => 'Jadwal ulangan',
                'deskripsi' => '<p>Ulangan dilaksanakan minggu depan</p>',
                'foto' => '["foto\\/capture_20200319105631.png"]',
                'created_at' => '2021-01-26 16:46:12',
                'updated_at' => '2021-02-05 13:44:15',
            ),
            1 => 
            array (
                'id' => 14,
                'user_id' => 1,
                'judul' => 'Informasi 2',
                'deskripsi' => '<p>jlkjlsdfsd fsdf sdf sd</p>',
                'foto' => '["foto\\/avatar.png"]',
                'created_at' => '2021-02-05 16:00:41',
                'updated_at' => '2021-02-05 16:00:41',
            ),
        ));
        
        
    }
}