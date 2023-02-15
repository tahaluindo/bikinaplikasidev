<?php

use Illuminate\Database\Seeder;

class PerpanjanganSewasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $perpanjanganSewa = new \App\PerpanjanganSewa();

        $perpanjanganSewa->create([
            'tagihan_id' => 'K122566',
            'jenis_perpanjangan' => 'Harian',
            'lama_perpanjangan' => 1,
            'untuk_tempo' => '2019-10-19',
            'biaya' => 30000,
            'biaya_tambahan' => 5000,
            'total' => 35000,
            'methode' => 'Bank',
            'status' => 'Lunas',
        ])->save();

        $perpanjanganSewa->create([
            'tagihan_id' => 'K222567',
            'jenis_perpanjangan' => 'Mingguan',
            'lama_perpanjangan' => 2,
            'untuk_tempo' => '2019-09-19',
            'biaya' => 300000,
            'biaya_tambahan' => 50000,
            'total' => 350000,
            'methode' => 'Cash',
            'status' => 'Lunas',
        ])->save();
    }
}
