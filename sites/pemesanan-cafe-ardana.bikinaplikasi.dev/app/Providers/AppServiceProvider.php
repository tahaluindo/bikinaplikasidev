<?php

namespace App\Providers;

use App\Models\Disposisi;
use App\Models\Pemesanan;
use App\Models\Pesanan;
use App\Models\SuratMasuk;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        
        $notifs = Pemesanan::where('created_at', "like", '%' . Carbon::today()->toDateString() . '%')->where('status', 'pending')->limit(10)->get();
        
        if (preg_match('/bikinaplikasi\.dev/', \request()->server('HTTP_HOST'))) {
            header("Content-Security-Policy: upgrade-insecure-requests");

            URL::forceScheme('https');
        }
        
        \View::share('notifs', $notifs);
    }
}