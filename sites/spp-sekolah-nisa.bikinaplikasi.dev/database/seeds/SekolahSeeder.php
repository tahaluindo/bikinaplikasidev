<?php

use App\Sekolah;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sekolah::create([
            'nama'      => 'Pondok Pesantren Al-Qosim',
            'deskripsi' => 'Lorem do qui labore non commodo elit nostrud quis deserunt qui veniam ad labore.',
            'logo'      => 'img/logo.png',
            'alamat'    => 'alamat Pondok Pesantren Al-Qosim',
            'no_telp'   => '082282692489',
        ]);
    }
}
