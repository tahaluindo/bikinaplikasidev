<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Database\Seeders\BukuTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\KelasTableSeeder;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\AnggotaTableSeeder;
use Database\Seeders\SessionTableSeeder;
use Database\Seeders\MigrationsTableSeeder;
use Database\Seeders\PeminjamanTableSeeder;
use Database\Seeders\PengembalianTableSeeder;
use Database\Seeders\DetailPeminjamanTableSeeder;

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
        $this->call(AnggotaTableSeeder::class);
        $this->call(BukuTableSeeder::class);
        $this->call(DetailPeminjamanTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(PeminjamanTableSeeder::class);
        $this->call(PengembalianTableSeeder::class);
        $this->call(UserTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
