<?php

use App\PembayaranSantriBulan;
use Illuminate\Database\Seeder;

class PembayaranSantriBulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PembayaranSantriBulan::insert([
            [
                'pembayaran_santri_id' => 1,
                'nama'                 => 'Januari',
            ], [
                'pembayaran_santri_id' => 1,
                'nama'                 => 'Februari',
            ], [
                'pembayaran_santri_id' => 1,
                'nama'                 => 'Maret',
            ], [
                'pembayaran_santri_id' => 1,
                'nama'                 => 'April',
            ], [
                'pembayaran_santri_id' => 1,
                'nama'                 => 'Mei',
            ], [
                'pembayaran_santri_id' => 1,
                'nama'                 => 'Juni',
            ],
        ]);
    }
}
