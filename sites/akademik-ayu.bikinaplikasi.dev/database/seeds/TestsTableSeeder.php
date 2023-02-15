<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
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
            \DB::table('tests')->insert([[
                'guru_id'         => 1,
                'mapel_id'        => 1,
                'nama'            => "Test Ujian",
                'jumlah_soal'     => 30,
                'jumlah_menit'    => 90,
                'jenis_soal'      => "Latihan",
                'mode'            => 'Acak',
                'tanggal_mulai'   => now(),
                'tanggal_selesai' => now(),
                'created_at'      => now(),
                'updated_at'      => now(),
            ]]);
        });
    }
}
