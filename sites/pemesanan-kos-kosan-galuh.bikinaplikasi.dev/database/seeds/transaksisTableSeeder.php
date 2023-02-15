<?php

use Illuminate\Database\Seeder;

class TransaksisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $transaksi = new \App\Transaksi();

        $transaksi->create([
            'tggl' => '2019-01-06',
            'total' => 350000,
            'keterangan' => '-',
            'jenis' => 'Pemasukan',
            'methode' => 'Bank'
        ])->save();

        $transaksi->create([
            'tggl' => '2019-01-06',
            'total' => 400000,
            'keterangan' => '-',
            'jenis' => 'Pengeluaran',
            'methode' => 'Cash'
        ])->save();

        $transaksi->create([
            'tggl' => '2019-01-06',
            'total' => 800000,
            'keterangan' => '-',
            'jenis' => 'Pemasukan',
            'methode' => 'Nyicil'
        ])->save();
    }
}
