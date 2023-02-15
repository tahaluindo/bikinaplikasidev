<?php

use App\Gap;
use Illuminate\Database\Seeder;

class GapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Gap::insert([
            [
                'kriteria_id' => 1,
                'nilai' => 3,
            ], [
                'kriteria_id' => 2,
                'nilai' => 3,
            ], [
                'kriteria_id' => 3,
                'nilai' => 3,
            ], [
                'kriteria_id' => 1,
                'nilai' => 2,
            ],
        ]);
    }
}
