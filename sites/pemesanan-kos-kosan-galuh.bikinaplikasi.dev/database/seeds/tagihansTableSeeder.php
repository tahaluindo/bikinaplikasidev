<?php

use Illuminate\Database\Seeder;

class TagihansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tagihan = new \App\Tagihan();

        $tagihan->create([
            'invoice_id' => 'K122566',
            'penyewa_id' => 1,
            'terakhir_bayar' => '2019-10-19',
            'jatuh_tempo' => '2019-10-20',
            'status' => 'Aktif',
        ])->save();

        $tagihan->create([
            'invoice_id' => 'K222567',
            'penyewa_id' => 2,
            'terakhir_bayar' => '2019-09-19',
            'jatuh_tempo' => '2019-09-05',
            'status' => 'Tidak Aktif',
        ])->save();
    }
}
