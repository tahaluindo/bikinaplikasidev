<?php

use App\TransaksiLainnya;
use Illuminate\Database\Seeder;

class TransaksiLainnyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransaksiLainnya::insert([
            [
                'nama'  => 'Air Galon',
                'jenis' => 'Pengeluaran',
            ], [
                'nama'  => 'Beban Listrik Mat\'am',
                'jenis' => 'Pengeluaran',
            ], [
                'nama'  => 'Pembelian ATK',
                'jenis' => 'Pengeluaran',
            ],
        ]);
    }
}
