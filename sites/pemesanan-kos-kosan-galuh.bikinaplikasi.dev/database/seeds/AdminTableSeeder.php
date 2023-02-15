<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new \App\User();

        $user->create([
            'name' => 'admin',
            'no_hp' => '082282692489',
            'email' => 'ramdanriawan3@gmail.com',
            'password' => \Hash::make('admin')
        ])->save();
    }
}
