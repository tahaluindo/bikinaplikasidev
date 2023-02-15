<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AngsuranTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('angsuran')->delete();
        
        \DB::table('angsuran')->insert(array (
            0 => 
            array (
                'id' => 110,
                'user_id' => 11,
                'pesanan_id' => 47,
                'angsuran_ke' => 1,
                'method' => 'QRIS',
                'no' => 'ANG0000001',
                'jumlah' => 700000,
                'status' => 'Belum Dibayar',
                'voucher_id' => 1,
                'created_at' => '2021-03-29 00:14:27',
                'updated_at' => '2021-03-29 00:14:27',
            ),
            1 => 
            array (
                'id' => 111,
                'user_id' => 11,
                'pesanan_id' => 47,
                'angsuran_ke' => 2,
                'method' => 'QRIS',
                'no' => 'ANG0000002',
                'jumlah' => 550000,
                'status' => 'Belum Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-03-29 00:14:27',
                'updated_at' => '2021-03-29 00:14:27',
            ),
            2 => 
            array (
                'id' => 112,
                'user_id' => 38,
                'pesanan_id' => 48,
                'angsuran_ke' => 1,
                'method' => 'QRIS',
                'no' => 'ANG0000003',
                'jumlah' => 25000,
                'status' => 'Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 07:50:42',
                'updated_at' => '2021-05-02 07:50:42',
            ),
            3 => 
            array (
                'id' => 113,
                'user_id' => 38,
                'pesanan_id' => 48,
                'angsuran_ke' => 2,
                'method' => 'QRIS',
                'no' => 'ANG0000004',
                'jumlah' => 0,
                'status' => 'Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 07:50:42',
                'updated_at' => '2021-05-02 07:50:42',
            ),
            4 => 
            array (
                'id' => 114,
                'user_id' => 38,
                'pesanan_id' => 49,
                'angsuran_ke' => 1,
                'method' => 'QRIS',
                'no' => 'ANG0000005',
                'jumlah' => 10000,
                'status' => 'Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 08:11:35',
                'updated_at' => '2021-05-02 08:11:35',
            ),
            5 => 
            array (
                'id' => 115,
                'user_id' => 38,
                'pesanan_id' => 49,
                'angsuran_ke' => 2,
                'method' => 'QRIS',
                'no' => 'ANG0000006',
                'jumlah' => 15000,
                'status' => 'Belum Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 08:11:35',
                'updated_at' => '2021-05-02 08:11:35',
            ),
            6 => 
            array (
                'id' => 116,
                'user_id' => 38,
                'pesanan_id' => 50,
                'angsuran_ke' => 1,
                'method' => 'QRIS',
                'no' => 'ANG0000007',
                'jumlah' => 10000,
                'status' => 'Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 08:47:17',
                'updated_at' => '2021-05-02 08:47:17',
            ),
            7 => 
            array (
                'id' => 117,
                'user_id' => 38,
                'pesanan_id' => 50,
                'angsuran_ke' => 2,
                'method' => 'QRIS',
                'no' => 'ANG0000008',
                'jumlah' => 15000,
                'status' => 'Belum Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 08:47:17',
                'updated_at' => '2021-05-02 08:47:17',
            ),
            8 => 
            array (
                'id' => 118,
                'user_id' => 38,
                'pesanan_id' => 51,
                'angsuran_ke' => 1,
                'method' => 'QRIS',
                'no' => 'ANG0000009',
                'jumlah' => 10000,
                'status' => 'Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 08:54:51',
                'updated_at' => '2021-05-02 08:54:51',
            ),
            9 => 
            array (
                'id' => 119,
                'user_id' => 38,
                'pesanan_id' => 51,
                'angsuran_ke' => 2,
                'method' => 'QRIS',
                'no' => 'ANG0000010',
                'jumlah' => 15000,
                'status' => 'Belum Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 08:54:51',
                'updated_at' => '2021-05-02 08:54:51',
            ),
            10 => 
            array (
                'id' => 120,
                'user_id' => 38,
                'pesanan_id' => 52,
                'angsuran_ke' => 1,
                'method' => 'QRIS',
                'no' => 'ANG0000011',
                'jumlah' => 10000,
                'status' => 'Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 08:59:25',
                'updated_at' => '2021-05-02 08:59:25',
            ),
            11 => 
            array (
                'id' => 121,
                'user_id' => 38,
                'pesanan_id' => 52,
                'angsuran_ke' => 2,
                'method' => 'QRIS',
                'no' => 'ANG0000012',
                'jumlah' => 15000,
                'status' => 'Belum Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 08:59:25',
                'updated_at' => '2021-05-02 08:59:25',
            ),
            12 => 
            array (
                'id' => 122,
                'user_id' => 38,
                'pesanan_id' => 53,
                'angsuran_ke' => 1,
                'method' => 'QRIS',
                'no' => 'ANG0000013',
                'jumlah' => 10000,
                'status' => 'Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 09:03:29',
                'updated_at' => '2021-05-02 09:03:29',
            ),
            13 => 
            array (
                'id' => 123,
                'user_id' => 38,
                'pesanan_id' => 53,
                'angsuran_ke' => 2,
                'method' => 'QRIS',
                'no' => 'ANG0000014',
                'jumlah' => 15000,
                'status' => 'Dibayar',
                'voucher_id' => NULL,
                'created_at' => '2021-05-02 09:03:29',
                'updated_at' => '2021-05-02 09:03:29',
            ),
        ));
        
        
    }
}