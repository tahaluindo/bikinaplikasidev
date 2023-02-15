<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SumberKodeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sumber_kode')->delete();
        
        \DB::table('sumber_kode')->insert(array (
            0 => 
            array (
                'berbayar' => 'Tidak',
                'created_at' => '2021-05-04 05:39:31',
                'deskripsi' => 'Perpanjangan, denda',
                'id' => 5,
                'link' => 'timothy-bikinaplikasi-dev.zip',
                'nama_program' => 'Perpustakaan',
                'updated_at' => '2021-05-04 05:39:31',
            ),
        ));
        
        
    }
}