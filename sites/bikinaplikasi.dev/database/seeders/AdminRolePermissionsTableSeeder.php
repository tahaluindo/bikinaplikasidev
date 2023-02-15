<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminRolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_role_permissions')->delete();
        
        \DB::table('admin_role_permissions')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'role_id' => 3,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'role_id' => 3,
                'permission_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'role_id' => 3,
                'permission_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'role_id' => 3,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'role_id' => 4,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'role_id' => 3,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}