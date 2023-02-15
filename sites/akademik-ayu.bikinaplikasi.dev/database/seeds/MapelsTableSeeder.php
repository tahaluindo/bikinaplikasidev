<?php

use Illuminate\Database\Seeder;

class MapelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::transaction(function () {
            \DB::table('mapels')->insert([[
                'nama' => 'Matematika',
            ], [
                'nama' => 'Bahasa Inggris',
            ], [
                'nama' => 'Bahasa Indonesia',
            ]]);
        });
    }
}
