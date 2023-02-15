<?php

use App\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Kriteria::insert([[
            'aspek_id' => 1,
            'nama' => 'IPK',
            'target' => 3,
            'jenis' => 'Core Factor'
        ], [
            'aspek_id' => 1,
            'nama' => 'Penghasilan Orang Tua',
            'target' => 3,
            'jenis' => 'Core Factor'
        ], [
            'aspek_id' => 1,
            'nama' => 'Tanggungan Orang Tua',
            'target' => 3,
            'jenis' => 'Secondary Factor'
        ], [
            'aspek_id' => 1,
            'nama' => 'Semester',
            'target' => 2,
            'jenis' => 'Secondary Factor'
        ],


        [
            'aspek_id' => 2,
            'nama' => 'Kriteria 1',
            'target' => 1,
            'jenis' => 'Core Factor'
        ], [
            'aspek_id' => 2,
            'nama' => 'Kriteria 2',
            'target' => 2,
            'jenis' => 'Core Factor'
        ], [
            'aspek_id' => 2,
            'nama' => 'Kriteria 3',
            'target' => 3,
            'jenis' => 'Core Factor'
        ], [
            'aspek_id' => 2,
            'nama' => 'Kriteria 4',
            'target' => 4,
            'jenis' => 'Secondary Factor'
        ],


        [
            'aspek_id' => 3,
            'nama' => 'Kriteria 1',
            'target' => 1,
            'jenis' => 'Core Factor'
        ], [
            'aspek_id' => 2,
            'nama' => 'Kriteria 2',
            'target' => 3,
            'jenis' => 'Secondary Factor'
        ], [
            'aspek_id' => 3,
            'nama' => 'Kriteria 3',
            'target' => 3,
            'jenis' => 'Secondary Factor'
        ], [
            'aspek_id' => 3,
            'nama' => 'Kriteria 4',
            'target' => 4,
            'jenis' => 'Secondary Factor'
        ]]);
    }
}
