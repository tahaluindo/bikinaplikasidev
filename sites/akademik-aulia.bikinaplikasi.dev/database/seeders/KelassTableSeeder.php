<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KelassTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kelass')->delete();
        
        \DB::table('kelass')->insert(array (
            0 => 
            array (
                'id' => 4,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VII.1',
                'ruang' => 'R-6',
                'created_at' => '2020-08-28 19:11:42',
                'updated_at' => '2021-01-26 11:58:02',
            ),
            1 => 
            array (
                'id' => 5,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VII.2',
                'ruang' => 'R-7',
                'created_at' => '2020-08-28 19:11:42',
                'updated_at' => '2021-01-26 11:58:02',
            ),
            2 => 
            array (
                'id' => 6,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VII.3',
                'ruang' => 'R-8',
                'created_at' => '2020-08-28 19:12:20',
                'updated_at' => '2021-01-26 11:58:13',
            ),
            3 => 
            array (
                'id' => 7,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VII.4',
                'ruang' => 'R-9',
                'created_at' => '2020-08-28 19:13:49',
                'updated_at' => '2021-01-26 11:58:32',
            ),
            4 => 
            array (
                'id' => 8,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VII.4',
                'ruang' => 'R-10',
                'created_at' => '2020-08-28 19:11:42',
                'updated_at' => '2021-01-26 11:58:02',
            ),
            5 => 
            array (
                'id' => 9,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VII.5',
                'ruang' => 'R-11',
                'created_at' => '2020-08-28 19:12:20',
                'updated_at' => '2021-01-26 11:58:13',
            ),
            6 => 
            array (
                'id' => 11,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VII.6',
                'ruang' => 'R-12',
                'created_at' => '2020-08-28 19:13:49',
                'updated_at' => '2021-01-26 11:58:32',
            ),
            7 => 
            array (
                'id' => 12,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VIII.1',
                'ruang' => 'R-13',
                'created_at' => '2020-08-28 19:14:20',
                'updated_at' => '2021-01-26 11:58:44',
            ),
            8 => 
            array (
                'id' => 13,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VII.2',
                'ruang' => 'R-14',
                'created_at' => '2020-08-28 19:14:48',
                'updated_at' => '2021-01-26 11:58:52',
            ),
            9 => 
            array (
                'id' => 14,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VIII.2',
                'ruang' => 'R-15',
                'created_at' => '2020-08-28 19:19:44',
                'updated_at' => '2021-01-26 11:59:02',
            ),
            10 => 
            array (
                'id' => 15,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VIII.3',
                'ruang' => 'R-16',
                'created_at' => '2020-08-28 19:20:21',
                'updated_at' => '2021-01-26 11:59:39',
            ),
            11 => 
            array (
                'id' => 16,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VIII.4',
                'ruang' => 'R-17',
                'created_at' => '2020-08-28 19:20:47',
                'updated_at' => '2021-01-26 11:59:20',
            ),
            12 => 
            array (
                'id' => 17,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VIII.5',
                'ruang' => 'R-18',
                'created_at' => '2020-08-28 19:21:19',
                'updated_at' => '2021-01-26 11:59:51',
            ),
            13 => 
            array (
                'id' => 18,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'VIII.6',
                'ruang' => 'R-19',
                'created_at' => '2020-08-28 19:22:01',
                'updated_at' => '2021-01-26 12:00:01',
            ),
            14 => 
            array (
                'id' => 19,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'IX.1',
                'ruang' => 'R-1',
                'created_at' => '2020-08-28 19:22:27',
                'updated_at' => '2021-01-26 11:51:48',
            ),
            15 => 
            array (
                'id' => 24,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'IX.2',
                'ruang' => 'R-2',
                'created_at' => '2021-01-26 11:50:07',
                'updated_at' => '2021-01-26 11:52:00',
            ),
            16 => 
            array (
                'id' => 25,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'IX.3',
                'ruang' => 'R-3',
                'created_at' => '2021-01-26 11:51:13',
                'updated_at' => '2021-01-26 11:52:11',
            ),
            17 => 
            array (
                'id' => 26,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'IX.4',
                'ruang' => 'R-4',
                'created_at' => '2021-01-26 11:52:32',
                'updated_at' => '2021-01-26 11:52:32',
            ),
            18 => 
            array (
                'id' => 27,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'IX.5',
                'ruang' => 'R-5',
                'created_at' => '2021-01-26 11:54:22',
                'updated_at' => '2021-01-26 11:55:24',
            ),
            19 => 
            array (
                'id' => 28,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'IX.6',
                'ruang' => 'R-6',
                'created_at' => '2021-01-26 11:55:46',
                'updated_at' => '2021-01-26 11:55:46',
            ),
        ));
        
        
    }
}