<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Project::insert([
            [
                'nama' => 'Beasiswa 1',
                'Keterangan' => 'consequat proident voluptate ullamco consectetur do aliqua velit. Fugiat sit laboris veniam eiusmod ullamco nisi ut eu incididunt enim ex enim excepteur pariatur.'
            ]
        ]);
    }
}
