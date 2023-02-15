<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sessions')->delete();
        
        \DB::table('sessions')->insert(array (
            0 => 
            array (
                'id' => '0',
                'user_id' => 1,
                'ip_address' => '2342',
                'user_agent' => '4dsfsf',
                'payload' => 'sdfdsf',
                'last_activity' => 0,
            ),
        ));
        
        
    }
}