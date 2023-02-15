<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'kelas_id' => null,
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('password'),
            'level' => 'admin'
        ]);
    }
}
