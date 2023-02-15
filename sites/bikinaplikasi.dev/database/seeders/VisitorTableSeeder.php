<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VisitorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('visitor')->delete();
        
        \DB::table('visitor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ip' => '127.0.0.1',
                'cookie_ip' => '127.0.0.1',
                'created_at' => '2021-04-06 20:27:24',
            ),
            1 => 
            array (
                'id' => 2,
                'ip' => '::1',
                'cookie_ip' => '::1',
                'created_at' => '2021-04-16 04:49:16',
            ),
            2 => 
            array (
                'id' => 3,
                'ip' => '114.79.6.94',
                'cookie_ip' => '114.79.6.94',
                'created_at' => '2021-05-02 04:48:14',
            ),
            3 => 
            array (
                'id' => 4,
                'ip' => '114.79.0.189',
                'cookie_ip' => '114.79.0.189',
                'created_at' => '2021-05-02 07:21:20',
            ),
            4 => 
            array (
                'id' => 5,
                'ip' => '114.79.4.49',
                'cookie_ip' => '114.79.4.49',
                'created_at' => '2021-05-02 07:23:12',
            ),
            5 => 
            array (
                'id' => 6,
                'ip' => '115.178.196.164',
                'cookie_ip' => '115.178.196.164',
                'created_at' => '2021-05-02 09:45:00',
            ),
            6 => 
            array (
                'id' => 7,
                'ip' => '44.233.199.117',
                'cookie_ip' => '44.233.199.117',
                'created_at' => '2021-05-02 18:05:39',
            ),
            7 => 
            array (
                'id' => 8,
                'ip' => '5.188.62.214',
                'cookie_ip' => '5.188.62.214',
                'created_at' => '2021-05-02 22:35:18',
            ),
            8 => 
            array (
                'id' => 9,
                'ip' => '115.178.213.173',
                'cookie_ip' => '115.178.213.173',
                'created_at' => '2021-05-03 00:53:04',
            ),
            9 => 
            array (
                'id' => 10,
                'ip' => '66.211.229.28',
                'cookie_ip' => '66.211.229.28',
                'created_at' => '2021-05-03 05:19:05',
            ),
            10 => 
            array (
                'id' => 11,
                'ip' => '198.71.55.250',
                'cookie_ip' => '198.71.55.250',
                'created_at' => '2021-05-03 05:19:05',
            ),
            11 => 
            array (
                'id' => 12,
                'ip' => '115.178.211.129',
                'cookie_ip' => '115.178.211.129',
                'created_at' => '2021-05-03 08:05:36',
            ),
            12 => 
            array (
                'id' => 13,
                'ip' => '77.88.5.103',
                'cookie_ip' => '77.88.5.103',
                'created_at' => '2021-05-03 11:03:11',
            ),
            13 => 
            array (
                'id' => 14,
                'ip' => '92.118.160.13',
                'cookie_ip' => '92.118.160.13',
                'created_at' => '2021-05-03 14:10:09',
            ),
        ));
        
        
    }
}