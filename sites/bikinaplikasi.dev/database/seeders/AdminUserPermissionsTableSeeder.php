<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUserPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_user_permissions')->delete();
        
        \DB::table('admin_user_permissions')->insert(array (
            0 => 
            array (
                'user_id' => 11,
                'permission_id' => 6,
                'created_at' => '2021-03-22 23:54:57',
                'updated_at' => '2021-03-22 23:54:57',
            ),
            1 => 
            array (
                'user_id' => 15,
                'permission_id' => 6,
                'created_at' => '2021-03-27 00:59:23',
                'updated_at' => '2021-03-27 00:59:23',
            ),
            2 => 
            array (
                'user_id' => 16,
                'permission_id' => 6,
                'created_at' => '2021-04-08 19:26:24',
                'updated_at' => '2021-04-08 19:26:24',
            ),
            3 => 
            array (
                'user_id' => 17,
                'permission_id' => 6,
                'created_at' => '2021-04-08 19:29:28',
                'updated_at' => '2021-04-08 19:29:28',
            ),
            4 => 
            array (
                'user_id' => 19,
                'permission_id' => 6,
                'created_at' => '2021-04-08 20:09:36',
                'updated_at' => '2021-04-08 20:09:36',
            ),
            5 => 
            array (
                'user_id' => 20,
                'permission_id' => 6,
                'created_at' => '2021-04-08 20:10:16',
                'updated_at' => '2021-04-08 20:10:16',
            ),
            6 => 
            array (
                'user_id' => 21,
                'permission_id' => 6,
                'created_at' => '2021-04-08 20:23:00',
                'updated_at' => '2021-04-08 20:23:00',
            ),
            7 => 
            array (
                'user_id' => 22,
                'permission_id' => 6,
                'created_at' => '2021-04-08 20:35:05',
                'updated_at' => '2021-04-08 20:35:05',
            ),
            8 => 
            array (
                'user_id' => 23,
                'permission_id' => 6,
                'created_at' => '2021-04-08 20:39:47',
                'updated_at' => '2021-04-08 20:39:47',
            ),
            9 => 
            array (
                'user_id' => 24,
                'permission_id' => 6,
                'created_at' => '2021-04-08 20:46:11',
                'updated_at' => '2021-04-08 20:46:11',
            ),
            10 => 
            array (
                'user_id' => 25,
                'permission_id' => 6,
                'created_at' => '2021-04-08 20:47:50',
                'updated_at' => '2021-04-08 20:47:50',
            ),
            11 => 
            array (
                'user_id' => 30,
                'permission_id' => 6,
                'created_at' => '2021-04-08 21:00:57',
                'updated_at' => '2021-04-08 21:00:57',
            ),
            12 => 
            array (
                'user_id' => 31,
                'permission_id' => 6,
                'created_at' => '2021-04-08 21:03:31',
                'updated_at' => '2021-04-08 21:03:31',
            ),
            13 => 
            array (
                'user_id' => 37,
                'permission_id' => 6,
                'created_at' => '2021-05-02 07:03:35',
                'updated_at' => '2021-05-02 07:03:35',
            ),
            14 => 
            array (
                'user_id' => 38,
                'permission_id' => 6,
                'created_at' => '2021-05-02 07:42:08',
                'updated_at' => '2021-05-02 07:42:08',
            ),
        ));
        
        
    }
}