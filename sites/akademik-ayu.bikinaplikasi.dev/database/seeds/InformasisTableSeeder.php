<?php

use Illuminate\Database\Seeder;

class InformasisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::transaction(function () {
            \DB::table('informasis')->insert([
                'judul'       => 'Informasi 1',
                'deskripsi'  => 'Ini adalah deskripsi informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }
}
