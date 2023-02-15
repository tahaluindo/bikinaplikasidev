<?php

use Illuminate\Database\Seeder;

class MaterisTableSeeder extends Seeder
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
            \DB::table('materis')->insert([[
                'kelas_id'   => 1,
                'mapel_id'   => 1,
                'user_id'    => 1,
                'file'       => 'documents/1.docx',
                'video'      => 'videos/1.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
        });
    }
}
