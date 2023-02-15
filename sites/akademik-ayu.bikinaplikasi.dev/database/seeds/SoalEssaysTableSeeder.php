<?php

use Illuminate\Database\Seeder;

class SoalEssaysTableSeeder extends Seeder
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
            \DB::table('soal_essays')->insert([
                'mapel_id' => 1,
                'soal'     => "Ini soal 1",
                'gambar'   => null,
                'jenis'    => 'Latihan',
                'bobot'    => 1,
            ]);
        });
    }
}
