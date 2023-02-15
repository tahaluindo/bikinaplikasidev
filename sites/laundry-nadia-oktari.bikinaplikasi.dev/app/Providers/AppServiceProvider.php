<?php

namespace App\Providers;

use App\Models\Disposisi;
use App\Models\Pesanan;
use App\Models\SuratMasuk;
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

        $tanggal = date('Y-m-d');

        ($pesan_notifs = Pesanan::all()->whereBetween('diambil_pada', [now()->addDays(-1)->toDateTimeString(), now()->addDays(1)->toDateString()])->take(10));
        
        \View::share('pesanan_notifs', $pesan_notifs);

        if (preg_match('/bikinaplikasi\.dev/', \request()->server('HTTP_HOST'))) {
            header("Content-Security-Policy: upgrade-insecure-requests");

            URL::forceScheme('https');
        }

    }
}