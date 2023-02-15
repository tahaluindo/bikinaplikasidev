<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PasswordResetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('password_resets')->delete();
        
        \DB::table('password_resets')->insert(array (
            0 => 
            array (
                'email' => 'ramdanriawan3@gmail.com',
                'token' => 'eyJpdiI6IkltQjRHTHpnSXo0c3p3Z1dCcUJaYXc9PSIsInZhbHVlIjoiYVp2aDRDdHhEajJlcmdOb3hiYzdqSlYxYm9ESXFXcjByV3IxUGI0cittQlVuYko5cFgrK3pRVzBoLzhDa2p5N1ZLczdZSVRUdzRDRHpJalNNRFJjd25BTjNQTk1XQUx4Z3B0V3JoaVZTQjRQbXBZd2VBYmFESlFTTXg2TnlBMGkiLCJtYWMiOiJlOTQwODRkYWNhNTgyZDA2NDYwN2JhNjJmNmVhMzQ2ZjA4ZGM0MzAxMmRiNDdjYjEzMjUxMjBkOWRlOWM1YzdhIn0=',
                'password_baru' => '$2y$10$NTeYdLTWuT2lG8HLCs/egO3Dde6Uj0qFHq7/O7lzs2SF7jYDYBmi2',
                'created_at' => '2021-05-02 15:25:24',
                'updated_at' => '2021-05-02 15:25:24',
                'expired_at' => '2021-05-02 16:25:24',
            ),
        ));
        
        
    }
}