<?php

use App\User;
use App\Alternatif;
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
        factory(User::class, 1)->create();

        $this->call([
            AspekSeeder::class,
            BobotSeeder::class,
            KriteriaSeeder::class,
            KriteriaDetailSeeder::class,
            GapSeeder::class,
            ProjectSeeder::class,
        ]);

        factory(Alternatif::class, 4)->create();

        $this->call([
            AlternatifDetailSeeder::class
        ]);
    }
}
