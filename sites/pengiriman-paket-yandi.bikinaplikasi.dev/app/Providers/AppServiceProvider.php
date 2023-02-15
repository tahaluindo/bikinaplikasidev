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

        try {

            $notifications = Notifikasi::where('dibaca', 0)->whereBetween('created_at', [now()->format('Y-m-d'), now()->addDays(1)->format('Y-m-d')])->get();

            \view()->share('notifications', $notifications);
        } catch (\Throwable $t) {

        }
    }
}
