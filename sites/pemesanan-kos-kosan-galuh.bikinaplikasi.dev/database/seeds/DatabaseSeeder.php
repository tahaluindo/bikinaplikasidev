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
        $this->call(AdminTableSeeder::class);
        $this->call(TransaksisTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(KamarsTableSeeder::class);
        $this->call(PenyewasTableSeeder::class);
        $this->call(TagihansTableSeeder::class);
        $this->call(PerpanjanganSewasTableSeeder::class);
    }
}
