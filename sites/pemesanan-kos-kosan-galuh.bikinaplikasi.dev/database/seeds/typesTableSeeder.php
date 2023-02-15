<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $type = new \App\Type();

        $type->create([
            'nama' => 'Type1',
            'harga_harian' => 20000,
            'harian_tambahan' => 10000,
            'harga_mingguan' => 125000,
            'mingguan_tambahan' => 25000,
            'harga_bulanan' => 500000,
            'bulanan_tambahan' => 100000,
            'harga_tahunan' => 6500000,
            'tahunan_tambahan' => 1200000,
            'fasilitas' => 'Kasur,Kamar Mandi Diluar'
        ])->save();

        $type->create([
            'nama' => 'Type2',
            'harga_harian' => 30000,
            'mingguan_tambahan' => 15000,
            'harga_mingguan' => 150000,
            'mingguan_tambahan' => 30000,
            'harga_bulanan' => 600000,
            'bulanan_tambahan' => 150000
            'harga_tahunan' => 7200000,
            'tahunan_tambahan' => 1800000,
            'fasilitas' => 'Kasur,Kamar Mandi Didalam'
        ])->save();
    }
}
