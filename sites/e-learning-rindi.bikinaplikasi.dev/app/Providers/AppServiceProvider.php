<?php

namespace App\Providers;

use App\Absensi;
use App\AbsensiDetail;
use App\MapelDetail;
use App\Test;
use App\Tugas;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;

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
        view()->composer('*', function ($view) {
            try {
                if (auth()->user()->level == 'siswa') {

                    $jumlah_absen_yang_belum = Absensi::with(['mapel_detail', 'absensi_details'])
                        ->where('tanggal', date("Y-m-d"))
                        ->get()
                        ->where('mapel_detail.kelas_id', auth()->user()->kelas_id)
                        ->filter(function ($item) {
                            return $item->absensi_details->where('user_id', auth()->user()->id)->where('status', 'Tidak Hadir')->count();
                        })
                        ->count();


                    $mapel_details = MapelDetail::where('kelas_id', auth()->user()->kelas_id)->get();
                    $mapel_detail_ids = $mapel_details->pluck('id')->toArray();

                    $model = new Test();
                    $table = $model->getTable();
                    $query = $model->query();
                    foreach ($mapel_detail_ids as $mapel_detail_id) {

                        $query->orWhere('mapel_detail_ids', 'like', "%$mapel_detail_id%");
                    }
                    
                    $jumlah_kuis_yang_belum = $query
                        ->where('tanggal_selesai', '>=', date("Y-m-d"))
                        ->get()
                        ->filter(function ($item) {
                            return $item->test_details->where('user_id', auth()->user()->id)->where('status', 'Belum Selesai')->count();
                        })
                        ->count();


                    $mapel_ids = MapelDetail::where('kelas_id', auth()->user()->kelas->id)->pluck('mapel_id')->toArray();
                    $jumlah_tugas_yang_belum = Tugas::whereIn('mapel_id', $mapel_ids)
                        ->with(['tugas_details'])
                        ->get()
                        ->filter(function ($item) {
                            return $item->tugas_details->where('user_id', '==', auth()->user()->id)->count() == 0;
                        })
                        ->count();

                    \View::share('jumlah_absen_yang_belum', $jumlah_absen_yang_belum);
                    \View::share('jumlah_kuis_yang_belum', $jumlah_kuis_yang_belum);
                    \View::share('jumlah_tugas_yang_belum', $jumlah_tugas_yang_belum);
                }
            } catch (\Throwable $t) {

            }
        });


        Builder::defaultStringLength(191); // Update defaultStringLength
    }

    /**
     * Fungsi untuk mengatur level user
     */
    public function __destruct()
    {

    }
}
