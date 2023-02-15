<?php

use App\Bobot;
use Illuminate\Database\Seeder;

class BobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bobot::insert([[
            'selisih'    => 0,
            'nilai'      => 5,
            'keterangan' => 'Tidak ada selisih(kompetensi sesuai dengan yang dibutuhkan)',
        ], [
            'selisih'    => 1,
            'nilai'      => 4.5,
            'keterangan' => 'Kompetensi individu kelebihan 1 tingkat/level',
        ], [
            'selisih'    => -1,
            'nilai'      => 4,
            'keterangan' => 'Kompetensi individu kekurangan 1 tingkat/level',
        ], [
            'selisih'    => 2,
            'nilai'      => 3.5,
            'keterangan' => 'Kompetensi individu kelebihan 2 tingkat/level',
        ], [
            'selisih'    => -2,
            'nilai'      => 3,
            'keterangan' => 'Kompetensi individu kekurangan 2 tingkat/level',
        ], [
            'selisih'    => 3,
            'nilai'      => 2.5,
            'keterangan' => 'Kompetensi individu kelebihan 3 tingkat/level',
        ], [
            'selisih'    => -3,
            'nilai'      => 2,
            'keterangan' => 'Kompetensi individu kelebihan 3 tingkat/level',
        ], [
            'selisih'    => 4,
            'nilai'      => 1.5,
            'keterangan' => 'Kompetensi individu kelebihan 4 tingkat/level',
        ], [
            'selisih'    => -4,
            'nilai'      => 1,
            'keterangan' => 'Kompetensi individu kekurangan 4 tingkat/level',
        ]]);
    }
}
