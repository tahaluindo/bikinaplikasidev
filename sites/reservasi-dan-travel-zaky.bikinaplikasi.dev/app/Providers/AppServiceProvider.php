<?php

namespace App\Providers;

use App\LokasiTujuan;
use App\Notifikasi;
use App\Rekening;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $notifications = Notifikasi::where('dibaca', 0)->get();
        $lokasi_tujuans = LokasiTujuan::all()->take(9);
        $rekenings = Rekening::where('status', 'Tersedia')->get();

        \view()->share('notifications', $notifications);
        \view()->share('lokasi_tujuans', $lokasi_tujuans);
        \view()->share('rekenings', $rekenings);
    }
}
