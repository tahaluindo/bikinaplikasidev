<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MaterisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('materis')->delete();
        
        \DB::table('materis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'mapel_detail_ids' => '["6"]',
                'judul' => 'Bahasa',
                'files' => '["file\\/Kelas_10_SMA_Bahasa_Indonesia_Guru_2017.pdf"]',
                'created_at' => '2020-08-28 21:35:05',
                'updated_at' => '2020-08-28 21:35:05',
            ),
            1 => 
            array (
                'id' => 2,
                'mapel_detail_ids' => '["7"]',
                'judul' => 'Bahasa',
                'files' => '["file\\/Kelas_10_SMA_Bahasa_Indonesia_Guru_2017.pdf"]',
                'created_at' => '2020-08-28 21:40:58',
                'updated_at' => '2020-08-28 21:40:58',
            ),
            2 => 
            array (
                'id' => 3,
                'mapel_detail_ids' => '["1"]',
                'judul' => 'Biologi Kelas X',
                'files' => '["file\\/Biologi_1_Kelas_10_Moch_Anshori_Djoko_Martono_2009.pdf"]',
                'created_at' => '2020-08-28 21:44:05',
                'updated_at' => '2020-08-28 21:44:05',
            ),
            3 => 
            array (
                'id' => 4,
                'mapel_detail_ids' => '["1","4"]',
                'judul' => 'metamorfosis',
                'files' => '["file\\/GENPARI.docx"]',
                'created_at' => '2021-01-19 13:23:59',
                'updated_at' => '2021-01-19 13:23:59',
            ),
        ));
        
        
    }
}