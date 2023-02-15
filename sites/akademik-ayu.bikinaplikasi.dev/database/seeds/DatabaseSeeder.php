<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            SekolahsTableSeeder::class,
            InformasisTableSeeder::class,
            MapelsTableSeeder::class,
            SoalPilgansTableSeeder::class,
            SoalEssaysTableSeeder::class,
            KelassTableSeeder::class,
            MaterisTableSeeder::class,
            TestsTableSeeder::class,
            TestDetailsTableSeeder::class,
        ]);
    }
}
