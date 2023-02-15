<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminRoleUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_role_users')->delete();
        
        \DB::table('admin_role_users')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'role_id' => 3,
                'user_id' => 11,
                'created_at' => '2021-03-22 23:54:57',
                'updated_at' => '2021-03-22 23:54:57',
            ),
            2 => 
            array (
                'role_id' => 3,
                'user_id' => 15,
                'created_at' => '2021-03-27 00:59:23',
                'updated_at' => '2021-03-27 00:59:23',
            ),
            3 => 
            array (
                'role_id' => 3,
                'user_id' => 16,
                'created_at' => '2021-04-08 19:26:24',
                'updated_at' => '2021-04-08 19:26:24',
            ),
            4 => 
            array (
                'role_id' => 3,
                'user_id' => 17,
                'created_at' => '2021-04-08 19:29:28',
                'updated_at' => '2021-04-08 19:29:28',
            ),
            5 => 
            array (
                'role_id' => 3,
                'user_id' => 19,
                'created_at' => '2021-04-08 20:09:36',
                'updated_at' => '2021-04-08 20:09:36',
            ),
            6 => 
            array (
                'role_id' => 3,
                'user_id' => 20,
                'created_at' => '2021-04-08 20:10:16',
                'updated_at' => '2021-04-08 20:10:16',
            ),
            7 => 
            array (
                'role_id' => 3,
                'user_id' => 21,
                'created_at' => '2021-04-08 20:23:00',
                'updated_at' => '2021-04-08 20:23:00',
            ),
            8 => 
            array (
                'role_id' => 3,
                'user_id' => 22,
                'created_at' => '2021-04-08 20:35:05',
                'updated_at' => '2021-04-08 20:35:05',
            ),
            9 => 
            array (
                'role_id' => 3,
                'user_id' => 23,
                'created_at' => '2021-04-08 20:39:47',
                'updated_at' => '2021-04-08 20:39:47',
            ),
            10 => 
            array (
                'role_id' => 3,
                'user_id' => 24,
                'created_at' => '2021-04-08 20:46:11',
                'updated_at' => '2021-04-08 20:46:11',
            ),
            11 => 
            array (
                'role_id' => 3,
                'user_id' => 25,
                'created_at' => '2021-04-08 20:47:50',
                'updated_at' => '2021-04-08 20:47:50',
            ),
            12 => 
            array (
                'role_id' => 3,
                'user_id' => 30,
                'created_at' => '2021-04-08 21:00:57',
                'updated_at' => '2021-04-08 21:00:57',
            ),
            13 => 
            array (
                'role_id' => 3,
                'user_id' => 31,
                'created_at' => '2021-04-08 21:03:31',
                'updated_at' => '2021-04-08 21:03:31',
            ),
            14 => 
            array (
                'role_id' => 3,
                'user_id' => 37,
                'created_at' => '2021-05-02 07:03:35',
                'updated_at' => '2021-05-02 07:03:35',
            ),
            15 => 
            array (
                'role_id' => 3,
                'user_id' => 38,
                'created_at' => '2021-05-02 07:42:08',
                'updated_at' => '2021-05-02 07:42:08',
            ),
        ));
        
        
    }
}