<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SaranTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('saran')->delete();
        
        \DB::table('saran')->insert(array (
            0 => 
            array (
                'id' => 1,
                'admin_user_id' => 11,
                'saran' => 'sdfsdf dsf dsf dsf dsf dsf dsf dsf sdfsd fsdf sdf sdf sdfsd fds',
            ),
        ));
        
        
    }
}