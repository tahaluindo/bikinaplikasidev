<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('akun')->insert([
        //     'user_type' => 'App\Dokter',
        //     'user_id' => 1,
        //     'username' => 'dokter1',
        //     'password' => Hash::make('dokter1')
        // ]);

        // DB::table('akun')->insert([
        //     'user_type' => 'App\Admin',
        //     'user_id' => 1,
        //     'username' => 'admin',
        //     'password' => Hash::make('admin')
        // ]);

        // DB::table('admin')->insert([
        //     'nama' => 'Admin',
        // ]);

        // DB::table('pegawai')->insert([
        //     'kode_pegawai' => 'P-1',
        //     'nama' => 'Alamuna',
        //     'jenis_kelamin' => 'p',
        //     'alamat' => 'jambi',
        //     'tlpn' => '081234567890',
        // ]);

        DB::table('akun')->insert([
            'user_type' => 'App\Admin',
            'user_id' => 1,
            'username' => 'admin',
            'password' => Hash::make('admin')
        ]);

        DB::table('admin')->insert([
            'nama' => 'Admin',
        ]);
    }
}
