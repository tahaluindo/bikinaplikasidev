<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NilaisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nilais')->delete();
        
        
        
    }
}