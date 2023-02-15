
<?php

use Illuminate\Database\Seeder;

class SekolahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::transaction(function () {
            \DB::table('sekolahs')->insert([
                'nama'       => 'SMA NEGERI 5 TANJUNG JABUNG TIMUR',
                'no_telp'    => '082282692489',
                'alamat'     => 'jl. h. ibrahim rt 19 no 94',
                'deskripsi'  => 'Sekolah terbaik',
                'visi'       => '1. Visi 1 <br> 2. Visi 2',
                'misi'       => '1. Misi 1 <br> 2. Misi 2',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }
}
