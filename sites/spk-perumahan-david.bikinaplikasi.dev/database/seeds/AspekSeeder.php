<?php

use App\Aspek;
use Illuminate\Database\Seeder;

class AspekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Aspek::insert([[
            'nama' => 'Aspek 1',
            'persen' => 20
        ], [
            'nama' => 'Aspek 2',
            'persen' => 30
        ], [
            'nama' => 'Aspek 3',
            'persen' => 50
        ]]);
    }
}
