<?php

use Illuminate\Database\Seeder;

class KelassTableSeeder extends Seeder
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
            \DB::table('kelass')->insert([
                'wali_kelas' => 1,
                'ketua_kelas' => 1,
                'nama' => "X",
                'ruang' => "B25",
            ]);
        });
    }
}
