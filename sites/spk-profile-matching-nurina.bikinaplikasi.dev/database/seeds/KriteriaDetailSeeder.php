<?php

use App\KriteriaDetail;
use Illuminate\Database\Seeder;

class KriteriaDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        KriteriaDetail::insert([
            // aspek 1
            [
                'kriteria_id' => 1,
                'keterangan'  => '< 2,5',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 1,
                'keterangan'  => '> 2,5 dan <= 3',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 1,
                'keterangan'  => '> 3 dan <= 3,5',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 1,
                'keterangan'  => '> 3,5',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 2,
                'keterangan'  => '<= 1.000.000',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 2,
                'keterangan'  => '> 1.000.000 <= 3.000.000',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 2,
                'keterangan'  => '> 3.000.000 <= 5.000.000',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 2,
                'keterangan'  => '>= 5.000.000',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 3,
                'keterangan'  => '1 Orang',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 3,
                'keterangan'  => '2 Orang',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 3,
                'keterangan'  => '3 Orang',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 3,
                'keterangan'  => '> 3 Orang',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 4,
                'keterangan'  => '<= 2, > 8',
                'nilai'       => 0,
            ], [
                'kriteria_id' => 4,
                'keterangan'  => '3',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 4,
                'keterangan'  => '4',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 4,
                'keterangan'  => '5,6',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 4,
                'keterangan'  => '7,8',
                'nilai'       => 4,
            ],

            // aspek 2
            [
                'kriteria_id' => 5,
                'keterangan'  => 'Kriteria Detail 1',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 5,
                'keterangan'  => 'Kriteria Detail 2',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 5,
                'keterangan'  => 'Kriteria Detail 3',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 5,
                'keterangan'  => 'Kriteria Detail 4',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 6,
                'keterangan'  => 'Kriteria Detail 1',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 6,
                'keterangan'  => 'Kriteria Detail 2',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 6,
                'keterangan'  => 'Kriteria Detail 3',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 6,
                'keterangan'  => 'Kriteria Detail 4',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 7,
                'keterangan'  => 'Kriteria Detail 1',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 7,
                'keterangan'  => 'Kriteria Detail 2',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 7,
                'keterangan'  => 'Kriteria Detail 3',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 7,
                'keterangan'  => 'Kriteria Detail 4',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 8,
                'keterangan'  => 'Kriteria Detail 1',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 8,
                'keterangan'  => 'Kriteria Detail 2',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 8,
                'keterangan'  => 'Kriteria Detail 3',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 8,
                'keterangan'  => 'Kriteria Detail 4',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 8,
                'keterangan'  => 'kriteria Detail 5',
                'nilai'       => 5,
            ],

            // aspek 3
            [
                'kriteria_id' => 9,
                'keterangan'  => 'Kriteria Detail 1',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 9,
                'keterangan'  => 'Kriteria Detail 2',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 9,
                'keterangan'  => 'Kriteria Detail 3',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 9,
                'keterangan'  => 'Kriteria Detail 4',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 10,
                'keterangan'  => 'Kriteria Detail 1',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 10,
                'keterangan'  => 'Kriteria Detail 2',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 10,
                'keterangan'  => 'Kriteria Detail 3',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 10,
                'keterangan'  => 'Kriteria Detail 4',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 11,
                'keterangan'  => 'Kriteria Detail 1',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 11,
                'keterangan'  => 'Kriteria Detail 2',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 11,
                'keterangan'  => 'Kriteria Detail 3',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 11,
                'keterangan'  => 'Kriteria Detail 4',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 12,
                'keterangan'  => 'Kriteria Detail 1',
                'nilai'       => 1,
            ], [
                'kriteria_id' => 12,
                'keterangan'  => 'Kriteria Detail 2',
                'nilai'       => 2,
            ], [
                'kriteria_id' => 12,
                'keterangan'  => 'Kriteria Detail 3',
                'nilai'       => 3,
            ], [
                'kriteria_id' => 12,
                'keterangan'  => 'Kriteria Detail 4',
                'nilai'       => 4,
            ], [
                'kriteria_id' => 12,
                'keterangan'  => 'Kriteria Detail 5',
                'nilai'       => 5,
            ],
        ]);
    }
}
