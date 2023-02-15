<?php

use App\PembayaranSantriDetail;
use Illuminate\Database\Seeder;

class PembayaranSantriDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PembayaranSantriDetail::insert([
            // user 1
            [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 1,
                'pembayaran_santri_bulan_id' => 1,
                'nominal_spp_dibayar'        => 100000,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Lunas',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ], [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 1,
                'pembayaran_santri_bulan_id' => 2,
                'nominal_spp_dibayar'        => 100000,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Lunas',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ], [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 1,
                'pembayaran_santri_bulan_id' => 3,
                'nominal_spp_dibayar'        => 100000,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Lunas',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ], [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 1,
                'pembayaran_santri_bulan_id' => 4,
                'nominal_spp_dibayar'        => 100000,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Lunas',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ], [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 1,
                'pembayaran_santri_bulan_id' => 5,
                'nominal_spp_dibayar'        => 100000,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Lunas',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ], [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 1,
                'pembayaran_santri_bulan_id' => 6,
                'nominal_spp_dibayar'        => 100000,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Lunas',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ],

            // user 2
            [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 2,
                'pembayaran_santri_bulan_id' => 1,
                'nominal_spp_dibayar'        => 100000,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Lunas',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ], [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 2,
                'pembayaran_santri_bulan_id' => 2,
                'nominal_spp_dibayar'        => 0,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Bebas Makan',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ], [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 2,
                'pembayaran_santri_bulan_id' => 3,
                'nominal_spp_dibayar'        => 0,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Bebas SPP',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ], [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 2,
                'pembayaran_santri_bulan_id' => 4,
                'nominal_spp_dibayar'        => 100000,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Lunas',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ], [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 2,
                'pembayaran_santri_bulan_id' => 5,
                'nominal_spp_dibayar'        => 100000,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Lunas',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ], [
                'pembayaran_santri_id'       => 1,
                'user_id'                    => 1,
                'pembayaran_santri_bulan_id' => 6,
                'nominal_spp_dibayar'        => 100000,
                'nominal_uang_makan_dibayar' => 100000,
                'nominal_belum_dibayar'      => 0,
                'status'                     => 'Lunas',
                'tanggal_bayar'              => date('Y-m-d'),
                'catatan'                    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            ],
        ]);
    }
}
