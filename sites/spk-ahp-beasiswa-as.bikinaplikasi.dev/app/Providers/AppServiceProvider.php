<?php

namespace App\Providers;

use App\Anggota;
use App\Kriteria;
use App\KriteriaDetail;
use App\Kelas;
use App\Perhitungan;
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

//        User::all()->each(function($item) {
//            if((!$item->anggota) && $item->level != 'Admin') {
//                $item->delete();
//                Anggotum::where('user_id', $item->id)->delete();
//            }
//        });die;

        Schema::defaultStringLength(191);

        $data['grafiks'] = [];

        $peminjamans = Perhitungan::all()->map(function ($item) {
            $item->tanggal = date('Y-m-d', strtotime($item->tanggal));

            return $item;
        });

        $notifications = $peminjamans->where('tanggal_pengembalian', date('Y-m-d'))->take(10);

        \view()->share('notifications', $notifications);
    }
}
