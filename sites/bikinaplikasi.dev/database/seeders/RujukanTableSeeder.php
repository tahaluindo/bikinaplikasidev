<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RujukanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rujukan')->delete();
        
        \DB::table('rujukan')->insert(array (
            0 => 
            array (
                'id' => 11,
                'user_admin_id' => 14,
                'user_admin_id_r' => 32,
                'created_at' => '2021-04-08 21:18:26',
                'updated_at' => '2021-04-08 21:18:26',
            ),
            1 => 
            array (
                'id' => 12,
                'user_admin_id' => 14,
                'user_admin_id_r' => 33,
                'created_at' => '2021-04-09 20:05:56',
                'updated_at' => '2021-04-09 20:05:56',
            ),
            2 => 
            array (
                'id' => 13,
                'user_admin_id' => 37,
                'user_admin_id_r' => 38,
                'created_at' => '2021-05-02 07:42:08',
                'updated_at' => '2021-05-02 07:42:08',
            ),
        ));
        
        
    }
}