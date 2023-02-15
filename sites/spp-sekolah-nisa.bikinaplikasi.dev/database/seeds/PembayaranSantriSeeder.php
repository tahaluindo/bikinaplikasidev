<?php

use App\PembayaranSantri;
use Illuminate\Database\Seeder;

class PembayaranSantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PembayaranSantri::insert([
            [
                'tahun' => 2018,
                'nominal_spp_default' => 100000,
                'nominal_uang_makan_default'=> 100000,
                'keterangan' => 'SPP Angkatan 2018'
            ], [
                'tahun' => 2019,
                'nominal_spp_default' => 200000,
                'nominal_uang_makan_default'=> 200000,
                'keterangan' => 'SPP Angkatan 2019'
            ], [
                'tahun' => 2020,
                'nominal_spp_default' => 300000,
                'nominal_uang_makan_default'=> 300000,
                'keterangan' => 'SPP Angkatan 2020'
            ]
        ]);
    }
}
