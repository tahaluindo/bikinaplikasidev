<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'class' => 'badge bg-success',
                'id' => 1,
                'name' => 'SI',
            ),
            1 => 
            array (
                'class' => 'badge bg-danger',
                'id' => 2,
                'name' => 'TI',
            ),
        ));
        
        
    }
}