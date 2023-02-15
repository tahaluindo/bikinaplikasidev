<?php

use Illuminate\Database\Seeder;

class SoalPilgansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::transaction(function () {
            \DB::table('soal_pilgans')->insert([
                'mapel_id'   => 1,
                'soal'       => "Ini soal 1",
                'opsi_a'     => 'Ini adalah opsi a',
                'opsi_b'     => 'Ini adalah opsi b',
                'opsi_c'     => 'Ini adalah opsi c',
                'opsi_d'     => 'Ini adalah opsi d',
                'jawaban'    => 'A',
                'jenis'      => 'Latihan',
                'gambar'     => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }
}
