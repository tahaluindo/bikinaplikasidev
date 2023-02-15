<?php

use Illuminate\Database\Seeder;

class TestDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::transaction(function () {
            \DB::table('test_details')->insert([[
                'test_id'       => 1,
                'user_id'       => 1,
                'list_tests'    => json_encode([[
                    'soal_id' => 1,
                    'jawaban' => 'A',
                ]]),
                'benar'         => 1,
                'salah'         => 0,
                'tidak_dijawab' => 0,
                'nilai'         => 100,
                'status'        => 'Dilaksanakan',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]]);
        });
    }
}
