<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_roles')->delete();
        
        \DB::table('admin_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'created_at' => '2021-03-11 00:39:24',
                'updated_at' => '2021-03-11 00:39:24',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Pelanggan',
                'slug' => 'pelanggan',
                'created_at' => '2021-03-11 02:07:09',
                'updated_at' => '2021-03-11 02:07:09',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Dashboard',
                'slug' => 'Dashboard',
                'created_at' => '2021-03-11 15:10:23',
                'updated_at' => '2021-03-11 15:10:23',
            ),
        ));
        
        
    }
}