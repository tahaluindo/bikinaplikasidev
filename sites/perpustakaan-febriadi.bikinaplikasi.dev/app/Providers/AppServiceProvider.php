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

//        $user = User::whereIn('level', ['Siswa', 'Guru'])->get()->pluck('id')->toArray();
//        Anggotum::whereNotIn('user_id', $user)->delete();
//
//        $anggota = Anggotum::get()->pluck('user_id')->toArray();
//        User::whereNotIn('id', $anggota)->whereIn('level', ['Siswa', 'Guru'])->delete();

        $data['grafiks'] = [];

        $peminjamans_notif = Peminjaman::all()->map(function ($item) {
            $item->tanggal = date('Y-m-d', strtotime($item->tanggal));

            return $item;
        });

        $notifications = $peminjamans_notif->where('tanggal_pengembalian', date('Y-m-d'))->take(10);

        \view()->share('peminjamans_notif', $peminjamans_notif);
        \view()->share('notifications', $notifications);
    }
}
