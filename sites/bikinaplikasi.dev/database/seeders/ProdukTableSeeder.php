<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdukTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produk')->delete();
        
        \DB::table('produk')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Program KP',
                'harga' => 1300000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 150000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Hanya program saja',
                'status' => 'Aktif',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Program SKRIPSI',
                'harga' => 1500000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 150000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Hanya program saja',
                'status' => 'Aktif',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Program Custom',
                'harga' => NULL,
                'harga_promo' => NULL,
                'bonus_rujukan' => NULL,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
            'deskripsi' => 'Hosting (Biasa) + Domain .com 1 tahun + perbaikan selama 1 bulan.',
                'status' => 'Tidak Aktif',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Program KP + Bab 456',
                'harga' => 2000000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 150000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Program + Laporan, kirimkan bab 1 yg accnya biar d baca dari sana.',
                'status' => 'Aktif',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'Program SKRIPSI + Bab 456',
                'harga' => 2500000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 150000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Program + Laporan, kirimkan bab 1 accnya biar d baca dari sana.',
                'status' => 'Aktif',
            ),
            5 => 
            array (
                'id' => 6,
            'nama' => 'Full Program + Laporan (Skripsi)',
                'harga' => 3000000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Program + Laporan, dari awal proposal sampai akhir jurnal dibuatin.',
                'status' => 'Aktif',
            ),
            6 => 
            array (
                'id' => 7,
            'nama' => 'Full Program + Laporan (KP)',
                'harga' => 2500000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Program + Laporan, dari awal proposal sampai akhir dibuatin.',
                'status' => 'Aktif',
            ),
            7 => 
            array (
                'id' => 8,
                'nama' => 'Full Skripsi Analisis',
                'harga' => 3000000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Laporan, dari awal proposal sampai akhir dibuatin.',
                'status' => 'Aktif',
            ),
            8 => 
            array (
                'id' => 9,
                'nama' => 'Full KP Analisis',
                'harga' => 2500000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Laporan, dari awal proposal sampai akhir dibuatin.',
                'status' => 'Aktif',
            ),
            9 => 
            array (
                'id' => 10,
                'nama' => 'Full Skripsi Data Mining',
                'harga' => 3000000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Laporan, dari awal proposal sampai akhir dibuatin.',
                'status' => 'Aktif',
            ),
            10 => 
            array (
                'id' => 11,
                'nama' => 'Test',
                'harga' => 25000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 10000,
                'deskripsi' => 'Laporan, dari awal proposal sampai akhir dibuatin.',
                'status' => 'Tidak Aktif',
            ),
            11 => 
            array (
                'id' => 12,
                'nama' => 'Full KP Data Mining',
                'harga' => 2500000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Laporan, dari awal proposal sampai akhir dibuatin.',
                'status' => 'Aktif',
            ),
            12 => 
            array (
                'id' => 13,
                'nama' => 'Program KP Android',
                'harga' => 1800000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Hanya program saja',
                'status' => 'Aktif',
            ),
            13 => 
            array (
                'id' => 14,
                'nama' => 'Program SKRIPSI Android',
                'harga' => 2000000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Hanya program saja',
                'status' => 'Aktif',
            ),
            14 => 
            array (
                'id' => 15,
                'nama' => 'Program SKRIPSI Android + Bab 456',
                'harga' => 3000000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Program + Laporan, kirimkan bab 1 accnya',
                'status' => 'Aktif',
            ),
            15 => 
            array (
                'id' => 16,
                'nama' => 'Program KP Android + Bab 456',
                'harga' => 2300000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Program + Laporan, kirimkan bab 1 accnya',
                'status' => 'Aktif',
            ),
            16 => 
            array (
                'id' => 17,
                'nama' => 'Full Program SKRIPSI Android',
                'harga' => 3500000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Program + Laporan + Jurnal',
                'status' => 'Aktif',
            ),
            17 => 
            array (
                'id' => 18,
                'nama' => 'Full Program KP Android',
                'harga' => 3000000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Program + Laporan',
                'status' => 'Aktif',
            ),
            18 => 
            array (
                'id' => 19,
            'nama' => 'Hosting (6 bulan) + Domain .site 1 Thn',
                'harga' => 350000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 0,
                'jumlah_angsuran' => 1,
                'dp' => 300000,
                'deskripsi' => 'Hosting dan domain biasa',
                'status' => 'Aktif',
            ),
            19 => 
            array (
                'id' => 20,
            'nama' => 'Hosting (1 Thn) + Domain .site 1 Thn',
                'harga' => 700000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 0,
                'jumlah_angsuran' => 1,
                'dp' => 300000,
                'deskripsi' => 'Hosting dan domain biasa',
                'status' => 'Aktif',
            ),
            20 => 
            array (
                'id' => 21,
                'nama' => 'Service program yang udah jadi',
                'harga' => 750000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 0,
                'jumlah_angsuran' => 2,
                'dp' => 325000,
                'deskripsi' => 'Program harus karya sendiri, karena nanti akan ada pertanyaan penting.',
                'status' => 'Aktif',
            ),
            21 => 
            array (
                'id' => 22,
                'nama' => 'Website Custom',
                'harga' => 3000000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Program website custom sesuai keinginan sendiri, mohon chat admin dulu.',
                'status' => 'Aktif',
            ),
            22 => 
            array (
                'id' => 23,
                'nama' => 'Android Custom',
                'harga' => 3500000,
                'harga_promo' => NULL,
                'bonus_rujukan' => 300000,
                'jumlah_angsuran' => 2,
                'dp' => 750000,
                'deskripsi' => 'Program custom sesuai keinginan sendiri, mohon chat admin dulu.',
                'status' => 'Aktif',
            ),
        ));
        
        
    }
}