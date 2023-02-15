<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Dashboard',
                'icon' => 'fa-bar-chart',
                'uri' => '/',
                'permission' => 'pelanggan',
                'created_at' => NULL,
                'updated_at' => '2021-03-11 15:16:10',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 19,
                'title' => 'Admin',
                'icon' => 'fa-tasks',
                'uri' => '',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-05-02 14:21:05',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 20,
                'title' => 'Users',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'permission' => 'auth.login',
                'created_at' => NULL,
                'updated_at' => '2021-05-02 14:21:05',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 21,
                'title' => 'Roles',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-05-02 14:21:05',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 22,
                'title' => 'Permission',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-05-02 14:21:05',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 23,
                'title' => 'Menu',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-05-02 14:21:05',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 24,
                'title' => 'Operation log',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-05-02 14:21:05',
            ),
            7 => 
            array (
                'id' => 10,
                'parent_id' => 0,
                'order' => 2,
                'title' => 'User',
                'icon' => 'fa-table',
                'uri' => 'user',
                'permission' => '*',
                'created_at' => '2021-03-11 02:56:59',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            8 => 
            array (
                'id' => 11,
                'parent_id' => 0,
                'order' => 3,
                'title' => 'Pelanggan',
                'icon' => 'fa-table',
                'uri' => 'pelanggan',
                'permission' => '*',
                'created_at' => '2021-03-11 03:18:50',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            9 => 
            array (
                'id' => 12,
                'parent_id' => 0,
                'order' => 4,
                'title' => 'Karyawan',
                'icon' => 'fa-table',
                'uri' => 'karyawan',
                'permission' => '*',
                'created_at' => '2021-03-11 03:41:29',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            10 => 
            array (
                'id' => 13,
                'parent_id' => 0,
                'order' => 8,
                'title' => 'Rujukan',
                'icon' => 'fa-table',
                'uri' => 'rujukan',
                'permission' => 'pelanggan',
                'created_at' => '2021-03-11 03:53:30',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            11 => 
            array (
                'id' => 14,
                'parent_id' => 0,
                'order' => 17,
                'title' => 'Informasi',
                'icon' => 'fa-table',
                'uri' => 'informasi',
                'permission' => '*',
                'created_at' => '2021-03-11 04:01:46',
                'updated_at' => '2021-05-02 14:21:05',
            ),
            12 => 
            array (
                'id' => 15,
                'parent_id' => 0,
                'order' => 16,
                'title' => 'Saran',
                'icon' => 'fa-table',
                'uri' => 'saran',
                'permission' => 'pelanggan',
                'created_at' => '2021-03-11 04:08:33',
                'updated_at' => '2021-05-02 14:21:05',
            ),
            13 => 
            array (
                'id' => 16,
                'parent_id' => 0,
                'order' => 6,
                'title' => 'Pesanan',
                'icon' => 'fa-table',
                'uri' => 'pesanan',
                'permission' => 'pelanggan',
                'created_at' => '2021-03-11 04:22:16',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            14 => 
            array (
                'id' => 17,
                'parent_id' => 0,
                'order' => 7,
                'title' => 'Pesanan Detail',
                'icon' => 'fa-table',
                'uri' => 'pesanan-detail',
                'permission' => '*',
                'created_at' => '2021-03-11 04:39:52',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            15 => 
            array (
                'id' => 18,
                'parent_id' => 0,
                'order' => 11,
                'title' => 'Angsuran',
                'icon' => 'fa-table',
                'uri' => 'ansuran',
                'permission' => '*',
                'created_at' => '2021-03-11 04:54:22',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            16 => 
            array (
                'id' => 19,
                'parent_id' => 0,
                'order' => 5,
                'title' => 'Produk',
                'icon' => 'fa-table',
                'uri' => 'produk',
                'permission' => '*',
                'created_at' => '2021-03-11 05:06:53',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            17 => 
            array (
                'id' => 20,
                'parent_id' => 0,
                'order' => 12,
                'title' => 'Akun Pembayaran',
                'icon' => 'fa-table',
                'uri' => 'akun-pembayaran',
                'permission' => 'pelanggan',
                'created_at' => '2021-03-11 05:15:31',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            18 => 
            array (
                'id' => 21,
                'parent_id' => 0,
                'order' => 13,
                'title' => 'Pembayaran',
                'icon' => 'fa-table',
                'uri' => 'pembayaran',
                'permission' => 'pelanggan',
                'created_at' => '2021-03-11 05:22:58',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            19 => 
            array (
                'id' => 22,
                'parent_id' => 0,
                'order' => 14,
                'title' => 'Download',
                'icon' => 'fa-table',
                'uri' => 'download',
                'permission' => 'pelanggan',
                'created_at' => '2021-03-11 05:52:14',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            20 => 
            array (
                'id' => 23,
                'parent_id' => 0,
                'order' => 9,
                'title' => 'Notifikasi',
                'icon' => 'fa-table',
                'uri' => 'notifikasi',
                'permission' => '*',
                'created_at' => '2021-03-11 05:54:30',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            21 => 
            array (
                'id' => 24,
                'parent_id' => 0,
                'order' => 10,
                'title' => 'Notifikasi Detail',
                'icon' => 'fa-table',
                'uri' => 'notifikasi-detail',
                'permission' => '*',
                'created_at' => '2021-03-11 06:00:14',
                'updated_at' => '2021-05-02 14:27:04',
            ),
            22 => 
            array (
                'id' => 25,
                'parent_id' => 0,
                'order' => 18,
                'title' => 'Pengaturan',
                'icon' => 'fa-gear',
                'uri' => 'pengaturan',
                'permission' => '*',
                'created_at' => '2021-03-11 06:04:37',
                'updated_at' => '2021-05-02 14:21:05',
            ),
            23 => 
            array (
                'id' => 36,
                'parent_id' => 0,
                'order' => 15,
                'title' => 'Video',
                'icon' => 'fa-table',
                'uri' => 'video',
                'permission' => 'pelanggan',
                'created_at' => '2021-05-02 14:20:22',
                'updated_at' => '2021-05-02 14:27:04',
            ),
        ));
        
        
    }
}