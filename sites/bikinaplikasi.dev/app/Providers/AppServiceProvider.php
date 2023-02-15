<?php

namespace App\Providers;

use App\Models\Disposisi;
use App\Models\Pembayaran;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

header("Access-Control-Allow-Origin: *");

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

//        set_time_limit(0);
//        \App\Models\User::all()->each(function ($item) {
//            $item->update([
//                'password' => strtolower($item->level)
//            ]);
//
//        });
//dd('');

        if (preg_match('/bikinaplikasi\.dev/', \request()->server('HTTP_HOST'))) {
            header("Content-Security-Policy: upgrade-insecure-requests");

            URL::forceScheme('https');
        }

        Schema::defaultstringLength(191);

    }
}
