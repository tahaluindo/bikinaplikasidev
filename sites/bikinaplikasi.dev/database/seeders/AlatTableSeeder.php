<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlatTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('alat')->delete();
        
        \DB::table('alat')->insert(array (
            0 => 
            array (
                'created_at' => '2021-05-04 10:09:38',
            'deskripsi' => 'Mengetahui tanggal lahir otomatis (khusus mahasiswa/i unama)',
                'id' => 1,
                'link' => 'tanggal-lahir-detector',
                'nama' => 'Tanggal lahir detector',
                'updated_at' => '2021-05-04 10:09:38',
            ),
        ));
        
        
    }
}