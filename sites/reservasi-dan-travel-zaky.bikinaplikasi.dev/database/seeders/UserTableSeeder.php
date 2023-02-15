<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user')->delete();
        
        \DB::table('user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin 01',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$3sVkZDhr515oV9oW2zd34.P9vlmBJ4NKh46Dqwa.JldwAb7fIYpiK',
                'level' => 'Admin',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Petugas',
                'email' => 'petugas@gmail.com',
                'password' => '$2y$10$uTzi/kKW4pxz00ZMKtJe.eX8J9lXEvNM3KuGuOyGFAVhhYFE3xBpe',
                'level' => 'Petugas',
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Petugas 02',
                'email' => 'petugas02@gmail.com',
                'password' => '$2y$10$6EsMYOD4ohUToFH/yXRU6.bnx0F4X3qIRp2alKJfuQW8qMbNDtmdW',
                'level' => 'Petugas',
            ),
        ));
        
        
    }
}