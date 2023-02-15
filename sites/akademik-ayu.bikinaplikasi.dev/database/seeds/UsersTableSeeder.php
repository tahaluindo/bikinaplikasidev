<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::transaction(function () {
            \Db::table('users')->insert([[
                'nama'         => "admin",
                'email'        => 'admin@gmail.com',
                'no_hp'        => '082282692489',
                'password'     => \Hash::make("123456"),
                'level'        => "admin",
                'status'       => "aktif",
                'no_identitas' => null,
                'foto'         => "avatar/png/man.png",
                'created_at'   => now(),
                'updated_at'   => now(),
            ], [
                'nama'         => "guru",
                'email'        => 'guru@gmail.com',
                'no_hp'        => "082282692489",
                'password'     => \Hash::make("123456"),
                'level'        => "guru",
                'status'       => "aktif",
                'no_identitas' => null,
                'foto'         => "avatar/png/man1.png",
                'created_at'   => now(),
                'updated_at'   => now(),
            ], [
                'nama'         => "siswa",
                'email'        => "siswa@gmail.com",
                'no_hp'        => "082282692489",
                'password'     => \Hash::make("123456"),
                'level'        => "siswa",
                'status'       => "aktif",
                'no_identitas' => null,
                'foto'         => "avatar/png/woman.png",
                'created_at'   => now(),
                'updated_at'   => now(),
            ]]);
        });
    }
}
