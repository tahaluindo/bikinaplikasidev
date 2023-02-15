<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        //
        $format_idr = function(int $number)
        {
            return 'Rp' . number_format($number, 2, ',', '.');
        };

        View::share('format_idr', $format_idr);

        Schema::defaultStringLength(191);
    }
}
