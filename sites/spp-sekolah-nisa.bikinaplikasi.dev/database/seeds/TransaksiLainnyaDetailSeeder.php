<?php

use Illuminate\Database\Seeder;

class TransaksiLainnyaDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransaksiLainnyaDetailSeeder::insert([
            [
                'transaksi_lainnya_id' => 1,
                'nominal_dibayar' => 100000,
                'status' => 'Lunas',
                'tanggal_dibayar' => date('Y-m-d'),
                'catatan' => 'Aliqua in cupidatat Lorem aliqua id.'
            ], [
                'transaksi_lainnya_id' => 2,
                'nominal_dibayar' => 100000,
                'status' => 'Lunas',
                'tanggal_dibayar' => date('Y-m-d'),
                'catatan' => 'Aliqua in cupidatat Lorem aliqua id.'
            ], [
                'transaksi_lainnya_id' => 3,
                'nominal_dibayar' => 100000,
                'status' => 'Lunas',
                'tanggal_dibayar' => date('Y-m-d'),
                'catatan' => 'Aliqua in cupidatat Lorem aliqua id.'
            ]
        ]);
    }
}
