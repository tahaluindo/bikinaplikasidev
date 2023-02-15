<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(FailedJobsTableSeeder::class);
        $this->call(InformasisTableSeeder::class);
        $this->call(KelassTableSeeder::class);
        $this->call(KomentarsTableSeeder::class);
        $this->call(KuisDetailsTableSeeder::class);
        $this->call(KuissTableSeeder::class);
        $this->call(MapelDetailsTableSeeder::class);
        $this->call(MapelsTableSeeder::class);
        $this->call(MaterisTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(SekolahsTableSeeder::class);
        $this->call(SoalEssaysTableSeeder::class);
        $this->call(SoalPilgansTableSeeder::class);
        $this->call(TugasDetailsTableSeeder::class);
        $this->call(TugassTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
