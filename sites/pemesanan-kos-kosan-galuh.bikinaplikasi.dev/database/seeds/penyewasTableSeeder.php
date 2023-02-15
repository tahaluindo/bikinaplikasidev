<?php

use Illuminate\Database\Seeder;

class PenyewasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $penyewa = new \App\Penyewa();

        $penyewa->create([
            'kamar_id' => 1,
            'type_sewa' => "Harian",
            'nama' => 'Titi Maryanti',
            'no_hp' => '08877821863',
            'status' => 'Ada',
            'foto_identitas' => 'test.jpg'
        ]);

        $penyewa->create([
            'kamar_id' => 2,
            'type_sewa' => "Bulanan",
            'nama' => 'Juni Ahmad',
            'no_hp' => '082284459485',
            'status' => 'Selesai Ngekos',
            'foto_identitas' => 'test.jpg'
        ]);

    }
}
