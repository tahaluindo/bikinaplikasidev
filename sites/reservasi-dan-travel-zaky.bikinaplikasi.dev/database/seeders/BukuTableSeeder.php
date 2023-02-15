<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BukuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('buku')->delete();
        
        \DB::table('buku')->insert(array (
            0 => 
            array (
                'id' => 4,
                'kode_buku' => '6',
                'judul' => 'Adobe Photoshop',
                'penulis' => 'Bambang',
                'penerbit' => 'Cakra Media',
                'tahun' => 2020,
                'kota' => 'palembang',
                'stok' => 219,
                'ditambahkan' => '20-Des-2020',
            ),
            1 => 
            array (
                'id' => 5,
                'kode_buku' => '6',
                'judul' => 'Adobe Ilustrator',
                'penulis' => 'Bambang',
                'penerbit' => 'Cakra Media',
                'tahun' => 2019,
                'kota' => 'Palembang',
                'stok' => 113,
                'ditambahkan' => '20-Dec-2020',
            ),
        ));
        
        
    }
}