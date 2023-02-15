<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_permissions')->delete();
        
        \DB::table('admin_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'All permission',
                'slug' => '*',
                'http_method' => '',
                'http_path' => '*',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'http_method' => 'GET',
                'http_path' => '/',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Login',
                'slug' => 'auth.login',
                'http_method' => '',
                'http_path' => '/auth/login
/auth/logout',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'User setting',
                'slug' => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path' => '/auth/setting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Auth management',
                'slug' => 'auth.management',
                'http_method' => '',
                'http_path' => '/auth/roles
/auth/permissions
/auth/menu
/auth/logs',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Pelanggan',
                'slug' => 'pelanggan',
                'http_method' => 'GET',
                'http_path' => '/
/download
/pembayaran
/akun-pembayaran
/angsuran
/pesanan-detail
/rujukan
/informasi
/saran
/pesanan
/video',
                'created_at' => '2021-03-11 01:15:29',
                'updated_at' => '2021-05-02 14:18:32',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'Pelanggan Create',
                'slug' => 'pelanggan.create',
                'http_method' => 'GET',
                'http_path' => '/pembayaran/create
/akun-pembayaran/create
/saran/create',
                'created_at' => '2021-03-11 14:34:39',
                'updated_at' => '2021-03-11 18:45:07',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'Pelanggan Post',
                'slug' => 'pelanggan.post',
                'http_method' => 'POST',
                'http_path' => '/pembayaran
/akun-pembayaran
/saran
/pesanan',
                'created_at' => '2021-03-11 14:45:07',
                'updated_at' => '2021-03-11 17:49:33',
            ),
            8 => 
            array (
                'id' => 11,
                'name' => 'Pelanggan Edit',
                'slug' => 'pelanggan.edit',
                'http_method' => 'GET,PUT,PATCH',
                'http_path' => '/akun-pembayaran*',
                'created_at' => '2021-03-11 14:52:38',
                'updated_at' => '2021-03-11 14:52:38',
            ),
            9 => 
            array (
                'id' => 12,
                'name' => 'Pelanggan Detail',
                'slug' => 'pelanggan.detail',
                'http_method' => 'GET',
                'http_path' => '/produk/*/
/pesanan/*/
/rujukan/*/
/akun-pembayaran/*/
/pembayaran/*/
/download/*/
/saran/*/',
                'created_at' => '2021-03-11 22:43:42',
                'updated_at' => '2021-03-23 21:53:04',
            ),
            10 => 
            array (
                'id' => 13,
                'name' => 'Pelanggan Edit Granted',
                'slug' => 'pelanggan.edit.granted',
                'http_method' => 'GET',
                'http_path' => '/produk/*/edit
/pesanan/*/edit
/pembayaran/*/edit
/produk/*/edit
/download/*/edit
/saran/*/edit',
                'created_at' => '2021-03-23 21:39:02',
                'updated_at' => '2021-03-23 21:41:43',
            ),
        ));
        
        
    }
}