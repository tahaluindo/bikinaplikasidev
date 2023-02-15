<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KuissTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kuiss')->delete();
        
        \DB::table('kuiss')->insert(array (
            0 => 
            array (
                'id' => 1,
                'guru_id' => 139,
                'mapel_detail_ids' => '["12"]',
                'soal_ids' => '["1","2"]',
                'nama' => 'Latihan',
                'jumlah_soal' => 2,
                'jumlah_menit' => 10,
                'jenis_soal' => 'Latihan',
                'mode' => 'Pilgan Normal',
                'tanggal_mulai' => '2020-08-29 07:40:00',
                'tanggal_selesai' => '2020-09-18 07:47:00',
                'created_at' => '2020-08-29 00:32:09',
                'updated_at' => '2020-08-29 00:32:09',
            ),
            1 => 
            array (
                'id' => 3,
                'guru_id' => 140,
                'mapel_detail_ids' => '["13"]',
                'soal_ids' => '[1,2,3,4]',
                'nama' => 'Tes Kuis',
                'jumlah_soal' => 4,
                'jumlah_menit' => 50,
                'jenis_soal' => 'Latihan',
                'mode' => 'Pilgan Acak',
                'tanggal_mulai' => '2020-09-16 06:00:00',
                'tanggal_selesai' => '2020-09-17 12:00:00',
                'created_at' => '2020-09-16 07:20:12',
                'updated_at' => '2020-09-16 07:20:12',
            ),
            2 => 
            array (
                'id' => 4,
                'guru_id' => 140,
                'mapel_detail_ids' => '["7"]',
                'soal_ids' => '["5"]',
                'nama' => 'Tes',
                'jumlah_soal' => 1,
                'jumlah_menit' => 30,
                'jenis_soal' => 'Ujian',
                'mode' => 'Pilgan Normal',
                'tanggal_mulai' => '2020-09-16 06:00:00',
                'tanggal_selesai' => '2020-09-17 12:00:00',
                'created_at' => '2020-09-16 07:21:46',
                'updated_at' => '2020-09-16 07:23:05',
            ),
            3 => 
            array (
                'id' => 5,
                'guru_id' => 140,
                'mapel_detail_ids' => '["7"]',
                'soal_ids' => '["15"]',
                'nama' => 'John',
                'jumlah_soal' => 1,
                'jumlah_menit' => 50,
                'jenis_soal' => 'Ujian',
                'mode' => 'Essay Normal',
                'tanggal_mulai' => '2020-09-16 07:00:00',
                'tanggal_selesai' => '2020-09-17 12:00:00',
                'created_at' => '2020-09-16 07:23:41',
                'updated_at' => '2020-09-16 07:23:41',
            ),
            4 => 
            array (
                'id' => 6,
                'guru_id' => 140,
                'mapel_detail_ids' => '["13"]',
                'soal_ids' => '[16]',
                'nama' => 'Andi Saputra',
                'jumlah_soal' => 1,
                'jumlah_menit' => 22,
                'jenis_soal' => 'Ujian',
                'mode' => 'Essay Acak',
                'tanggal_mulai' => '2020-09-15 12:00:00',
                'tanggal_selesai' => '2020-09-17 12:00:00',
                'created_at' => '2020-09-16 07:28:11',
                'updated_at' => '2020-09-16 07:28:11',
            ),
            5 => 
            array (
                'id' => 7,
                'guru_id' => 139,
                'mapel_detail_ids' => '["1"]',
                'soal_ids' => '["10","11"]',
                'nama' => 'Kuis 1',
                'jumlah_soal' => 2,
                'jumlah_menit' => 5,
                'jenis_soal' => 'Ujian',
                'mode' => 'Essay Normal',
                'tanggal_mulai' => '2021-01-05 12:00:00',
                'tanggal_selesai' => '2021-01-08 12:00:00',
                'created_at' => '2021-01-06 07:32:52',
                'updated_at' => '2021-01-06 07:32:52',
            ),
        ));
        
        
    }
}