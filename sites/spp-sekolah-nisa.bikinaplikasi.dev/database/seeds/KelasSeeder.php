<?php

use App\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::insert([
            ['nama' => '1'],
            ['nama' => '2'],
            ['nama' => '3'],
        ]);
    }
}
