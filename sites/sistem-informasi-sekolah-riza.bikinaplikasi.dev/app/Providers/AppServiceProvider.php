<?php

namespace App\Providers;

use App\Models\Disposisi;
use App\Models\Pengaturan;
use App\Models\Pesanan;
use App\Models\SuratMasuk;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultstringLength(191);
        
        $notifs = Siswa::where('created_at', "like", '%' . Carbon::today()->toDateString() . '%')->where('status', 'Baru Mendaftar')->limit(10)->get();
        
        $logoGambar = json_decode(Pengaturan::first()->logo)->gambar;
        
        \View::share('notifs', $notifs);
        \View::share('logoGambar', $logoGambar);
    }
}
