<?php

use App\User;
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
        $this->call(SekolahSeeder::class);
        $this->call(KelasSeeder::class);

        // membuat user khusus admin
        $this->call(UserSeeder::class);

        // membuat user siswa dummy
        factory(User::class, 250)->create();

        $this->call(PembayaranSantriSeeder::class);
        $this->call(PembayaranSantriBulanSeeder::class);
        $this->call(PembayaranSantriDetailSeeder::class);
        $this->call(TransaksiLainnyaSeeder::class);
    }
}
