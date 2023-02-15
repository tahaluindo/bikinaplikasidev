<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TugassTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tugass')->delete();
        
        \DB::table('tugass')->insert(array (
            0 => 
            array (
                'id' => 1,
                'mapel_id' => 1,
                'nama' => 'Tugas 1',
                'deskripsi' => 'Kerjakan tugas dan tetap di rumah',
                'created_at' => '2020-08-28 21:51:17',
                'updated_at' => '2020-08-28 21:51:17',
            ),
        ));
        
        
    }
}