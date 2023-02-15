<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kelas')->delete();
        
        \DB::table('kelas')->insert(array (
            0 => 
            array (
                'id' => 2,
                'nama' => 'XI',
            ),
            1 => 
            array (
                'id' => 7,
                'nama' => 'XII',
            ),
        ));
        
        
    }
}