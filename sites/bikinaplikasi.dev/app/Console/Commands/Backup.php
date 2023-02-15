<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use \ZipArchive;

class Backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup database melalui db iseed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('max_execution_time', 1000000);
        ini_set('memory_limit', '512M');
        
        Artisan::call("db:seeding");

        $zip = new ZipArchive();
        if ($zip->open('public/db-backup.zip', ZipArchive::CREATE) === TRUE) {
            $zip->addGlob('database/seeders/*');
            $zip->close();
        }
        
        $disk = Storage::disk('s3');
        if(!$disk->put('backups/db-backup.zip', fopen(public_path('db-backup.zip'), 'r'))) {
            
            die('Gagal memindahkan file backup');
        }

        return 0;
    }
}
