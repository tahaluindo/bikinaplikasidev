<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TugasDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tugas_details')->delete();
        
        \DB::table('tugas_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tugas_id' => 1,
                'user_id' => 10,
                'file' => 'file/buklisma.docx',
                'created_at' => '2020-08-28 21:55:37',
                'updated_at' => '2020-08-28 21:55:37',
            ),
        ));
        
        
    }
}