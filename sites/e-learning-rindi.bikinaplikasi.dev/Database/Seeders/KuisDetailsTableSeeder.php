<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KuisDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kuis_details')->delete();
        
        \DB::table('kuis_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'test_id' => 1,
                'user_id' => 10,
                'list_tests' => '[{"soal_id":"1","jawaban":"A"},{"soal_id":"2","jawaban":"B"}]',
                'benar' => '2',
                'salah' => '0',
                'tidak_dijawab' => '0',
                'nilai' => 100.0,
                'status' => 'Selesai',
                'sisa_waktu' => 10,
                'created_at' => '2020-08-29 00:40:19',
                'updated_at' => '2020-08-29 00:40:38',
            ),
            1 => 
            array (
                'id' => 2,
                'test_id' => 1,
                'user_id' => 12,
                'list_tests' => '[{"soal_id":"1","jawaban":"A"},{"soal_id":"2","jawaban":"B"}]',
                'benar' => '2',
                'salah' => '0',
                'tidak_dijawab' => '0',
                'nilai' => 100.0,
                'status' => 'Selesai',
                'sisa_waktu' => 4,
                'created_at' => '2020-09-04 13:02:29',
                'updated_at' => '2020-09-04 13:10:32',
            ),
            2 => 
            array (
                'id' => 3,
                'test_id' => 3,
                'user_id' => 10,
                'list_tests' => '[{"soal_id":"1","jawaban":"A"},{"soal_id":"2","jawaban":"A"},{"soal_id":"3","jawaban":"C"},{"soal_id":"4","jawaban":"C"}]',
                'benar' => '2',
                'salah' => '2',
                'tidak_dijawab' => '0',
                'nilai' => 50.0,
                'status' => 'Selesai',
                'sisa_waktu' => 50,
                'created_at' => '2020-09-16 07:24:20',
                'updated_at' => '2020-09-16 07:25:48',
            ),
            3 => 
            array (
                'id' => 4,
                'test_id' => 6,
                'user_id' => 10,
                'list_tests' => '[{"soal_id":"16","jawaban":"sadadsa"}]',
                'benar' => '0',
                'salah' => '0',
                'tidak_dijawab' => '0',
                'nilai' => 0.0,
                'status' => 'Selesai',
                'sisa_waktu' => 22,
                'created_at' => '2020-09-16 07:32:25',
                'updated_at' => '2020-09-16 07:33:07',
            ),
            4 => 
            array (
                'id' => 5,
                'test_id' => 7,
                'user_id' => 10,
                'list_tests' => '[{"soal_id":"10","jawaban":"manusia bernafas melalui hidung"},{"soal_id":"11","jawaban":"zz"}]',
                'benar' => '0',
                'salah' => '0',
                'tidak_dijawab' => '0',
                'nilai' => 0.0,
                'status' => 'Dibatalkan',
                'sisa_waktu' => 5,
                'created_at' => '2021-01-06 07:33:16',
                'updated_at' => '2021-01-21 02:04:22',
            ),
        ));
        
        
    }
}