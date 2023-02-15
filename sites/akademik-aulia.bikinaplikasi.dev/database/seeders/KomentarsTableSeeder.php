<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomentarsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('komentars')->delete();
        
        
        
    }
}