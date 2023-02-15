<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SoalPilgansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('soal_pilgans')->delete();
        
        \DB::table('soal_pilgans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'mapel_id' => 4,
                'soal' => '<p>Kualitas karya seni rupa ditentukan oleh?</p>',
                'opsi_a' => '<p>bahan</p>',
                'opsi_b' => '<p>media</p>',
                'opsi_c' => '<p>judul</p>',
                'opsi_d' => '<p>teknik</p>',
                'jawaban' => 'C',
                'jenis' => 'Latihan',
                'gambar' => NULL,
                'created_at' => '2020-08-29 00:16:27',
                'updated_at' => '2021-02-10 22:12:09',
            ),
            1 => 
            array (
                'id' => 2,
                'mapel_id' => 4,
                'soal' => '<p>cara pembuatan karya dengan menggunakan alat putar terutama yang,berwujud silindris adalah merupakan teknik</p>',
                'opsi_a' => '<p>Cor</p>',
                'opsi_b' => '<p>Butsir</p>',
                'opsi_c' => '<p>Pilin</p>',
                'opsi_d' => '<p>Putar</p>',
                'jawaban' => 'D',
                'jenis' => 'Latihan',
                'gambar' => NULL,
                'created_at' => '2020-08-29 00:25:13',
                'updated_at' => '2021-02-10 22:12:09',
            ),
            2 => 
            array (
                'id' => 3,
                'mapel_id' => 4,
                'soal' => '<p>. Berikut ini unsur seni rupa adalah</p>',
                'opsi_a' => '<p>Garis</p>',
                'opsi_b' => '<p>Warna</p>',
                'opsi_c' => '<p>Tekstur</p>',
                'opsi_d' => '<p>Irama</p>',
                'jawaban' => 'A',
                'jenis' => 'Latihan',
                'gambar' => NULL,
                'created_at' => '2020-08-29 00:26:28',
                'updated_at' => '2021-02-10 22:12:10',
            ),
            3 => 
            array (
                'id' => 4,
                'mapel_id' => 4,
                'soal' => '<p>. Pengertian komposisi dalarn scni rupa adalah</p>',
                'opsi_a' => '<p>Harmonis</p>',
                'opsi_b' => '<p>Urutan</p>',
                'opsi_c' => '<p>Pengatur</p>',
                'opsi_d' => '<p>Susunan</p>',
                'jawaban' => 'C',
                'jenis' => 'Latihan',
                'gambar' => NULL,
                'created_at' => '2020-08-29 00:28:23',
                'updated_at' => '2021-02-10 22:12:11',
            ),
            4 => 
            array (
                'id' => 5,
                'mapel_id' => 3,
                'soal' => '<p>asd</p>',
                'opsi_a' => '<p>a</p>',
                'opsi_b' => '<p>b</p>',
                'opsi_c' => '<p>v</p>',
                'opsi_d' => '<p>c</p>',
                'jawaban' => 'D',
                'jenis' => 'Ujian',
                'gambar' => NULL,
                'created_at' => '2020-09-16 07:20:52',
                'updated_at' => '2021-02-10 22:12:11',
            ),
            5 => 
            array (
                'id' => 6,
                'mapel_id' => 1,
                'soal' => '<p><img alt="" src="http://galuh.bikinaplikasi.dev/public/upload/5dbfff829ebe6.jpg" style="height:100px; width:150px" /></p>

<p>gambar apakah ini?</p>',
                'opsi_a' => '<p>beruang</p>',
                'opsi_b' => '<p>badak</p>',
                'opsi_c' => '<p>kucing</p>',
                'opsi_d' => '<p>biawak</p>',
                'jawaban' => 'A',
                'jenis' => 'Latihan',
                'gambar' => NULL,
                'created_at' => '2021-01-19 13:22:40',
                'updated_at' => '2021-02-10 22:12:12',
            ),
        ));
        
        
    }
}