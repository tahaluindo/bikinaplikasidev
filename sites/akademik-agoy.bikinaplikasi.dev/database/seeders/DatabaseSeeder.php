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
        $this->call(InformasisTableSeeder::class);
        $this->call(MapelDetailsTableSeeder::class);
        $this->call(JadwalsTableSeeder::class);
        $this->call(SekolahsTableSeeder::class);
        $this->call(KelassTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(KomentarsTableSeeder::class);
        $this->call(MapelsTableSeeder::class);
        $this->call(NilaisTableSeeder::class);
        $this->call(NilaiDetailsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(RaportsTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
