<?php

use Illuminate\Database\Seeder;

class KamarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kamar = new \App\Kamar();

        $kamar->create([
            'type_id' => 1,
            'nomor' => 1,
            'jumlah_penghuni' => 2,
            'lokasi' => 'Ditalangbanjar',
            'keterangan' => null,
            'status' => 'Terisi',
        ])->save();

        $kamar->create([
            'type_id' => 2,
            'nomor' => 2,
            'jumlah_penghuni' => 1,
            'keterangan' => null,
            'lokasi' => 'Didepan SMA At Taufiq',
            'status' => 'Terisi',
        ])->save();

    }
}
