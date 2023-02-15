<?php
namespace App\Providers;

use App\Anggotum;
use App\Buku;
use App\DetailPeminjaman;
use App\Kelas;
use App\Peminjaman;
use App\Pengembalian;
use App\Sekolah;
use App\User;
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
    }
}
