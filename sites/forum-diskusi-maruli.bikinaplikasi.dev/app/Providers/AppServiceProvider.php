<?php

namespace App\Providers;

use App\Models\Notifikasi;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        try {
            View::share("notifikasi", Notifikasi::all()->map(function ($item) {
                $item->dari_user_id = $item->dari_user;
                $item->ke_user_id = $item->ke_user;

                $item->dari_user = User::find($item->dari_user);
                $item->ke_user = User::find($item->ke_user);

                return $item;
            }));
        } catch (\Throwable $t) {

        }

    }
}
