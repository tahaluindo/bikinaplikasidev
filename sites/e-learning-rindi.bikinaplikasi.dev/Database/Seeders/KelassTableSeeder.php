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
                'id' => 1,
                'wali_kelas' => 139,
                'ketua_kelas' => 11,
                'nama' => 'X MIPA 1',
                'ruang' => 'R-1',
                'created_at' => '2020-08-28 12:06:51',
                'updated_at' => '2020-08-28 20:59:35',
            ),
            1 => 
            array (
                'id' => 2,
                'wali_kelas' => 142,
                'ketua_kelas' => NULL,
                'nama' => 'X MIPA 2',
                'ruang' => 'R-2',
                'created_at' => '2020-08-28 12:07:51',
                'updated_at' => '2021-01-27 13:35:42',
            ),
            2 => 
            array (
                'id' => 3,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'X MIPA 3',
                'ruang' => 'R-3',
                'created_at' => '2020-08-28 12:08:40',
                'updated_at' => '2020-08-28 12:08:40',
            ),
            3 => 
            array (
                'id' => 4,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'X IPS 1',
                'ruang' => 'R-4',
                'created_at' => '2020-08-28 12:09:39',
                'updated_at' => '2020-08-28 12:09:39',
            ),
            4 => 
            array (
                'id' => 5,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'X IPS 2',
                'ruang' => 'R-5',
                'created_at' => '2020-08-28 12:10:11',
                'updated_at' => '2020-08-28 12:10:11',
            ),
            5 => 
            array (
                'id' => 6,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'X IPS 3',
                'ruang' => 'R-6',
                'created_at' => '2020-08-28 12:10:37',
                'updated_at' => '2020-08-28 12:10:37',
            ),
            6 => 
            array (
                'id' => 7,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XI MIPA 1',
                'ruang' => 'R-7',
                'created_at' => '2020-08-28 12:11:10',
                'updated_at' => '2020-08-28 12:11:10',
            ),
            7 => 
            array (
                'id' => 8,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XI MIPA 2',
                'ruang' => 'R-8',
                'created_at' => '2020-08-28 12:11:42',
                'updated_at' => '2020-08-28 12:11:42',
            ),
            8 => 
            array (
                'id' => 9,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XI MIPA 3',
                'ruang' => 'R-9',
                'created_at' => '2020-08-28 12:12:20',
                'updated_at' => '2020-08-28 12:12:20',
            ),
            9 => 
            array (
                'id' => 10,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XI MIPA 4',
                'ruang' => 'R-10',
                'created_at' => '2020-08-28 12:13:05',
                'updated_at' => '2020-08-28 12:13:05',
            ),
            10 => 
            array (
                'id' => 11,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XI IPS 1',
                'ruang' => 'R-11',
                'created_at' => '2020-08-28 12:13:49',
                'updated_at' => '2020-08-28 12:13:49',
            ),
            11 => 
            array (
                'id' => 12,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XI IPS 2',
                'ruang' => 'R-12',
                'created_at' => '2020-08-28 12:14:20',
                'updated_at' => '2020-08-28 12:14:20',
            ),
            12 => 
            array (
                'id' => 13,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XI IPS 3',
                'ruang' => 'R-13',
                'created_at' => '2020-08-28 12:14:48',
                'updated_at' => '2020-08-28 12:14:48',
            ),
            13 => 
            array (
                'id' => 14,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XII MIPA 1',
                'ruang' => 'R-14',
                'created_at' => '2020-08-28 12:19:44',
                'updated_at' => '2020-08-28 12:19:44',
            ),
            14 => 
            array (
                'id' => 15,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XII MIPA 2',
                'ruang' => 'R-15',
                'created_at' => '2020-08-28 12:20:21',
                'updated_at' => '2020-08-28 12:20:21',
            ),
            15 => 
            array (
                'id' => 16,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XII MIPA 3',
                'ruang' => 'R-16',
                'created_at' => '2020-08-28 12:20:47',
                'updated_at' => '2020-08-28 12:20:47',
            ),
            16 => 
            array (
                'id' => 17,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XII IPS 1',
                'ruang' => 'R-17',
                'created_at' => '2020-08-28 12:21:19',
                'updated_at' => '2020-08-28 12:21:19',
            ),
            17 => 
            array (
                'id' => 18,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XII IPS 2',
                'ruang' => 'R-18',
                'created_at' => '2020-08-28 12:22:01',
                'updated_at' => '2020-08-28 12:22:01',
            ),
            18 => 
            array (
                'id' => 19,
                'wali_kelas' => NULL,
                'ketua_kelas' => NULL,
                'nama' => 'XII IPS 3',
                'ruang' => 'R-19',
                'created_at' => '2020-08-28 12:22:27',
                'updated_at' => '2020-08-28 12:22:27',
            ),
        ));
        
        
    }
}