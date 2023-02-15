<?php

namespace App\Http\Controllers;

use App\User;
use App\Kelas;
use App\Mapel;
use App\Nilai;
use App\Raport;
use App\MapelDetail;
use App\NilaiDetail;

class RaportController extends Controller
{
    public function pilih_semester()
    {
        $data['tahuns']    = Nilai::distinct()->pluck('tahun')->toArray();
        $data['semesters'] = Nilai::distinct()->pluck('semester')->toArray();

        if(auth()->user()->level == 'siswa') {
            $data['tahuns']    = Raport::where([
                'user_id' => auth()->user()->id
            ])->distinct()->pluck('tahun')->toArray();
            $data['semesters'] = Raport::where([
                'user_id' => auth()->user()->id
            ])->distinct()->pluck('semester')->toArray();
        }

        return view('raport.pilih_semester', $data);
    }

    public function index()
    {
        // kalo yg login siswa maka langsung print aja raportnya
        if(auth()->user()->level == 'siswa') {

            return $this->print(Raport::where('user_id', auth()->id())->first());
        }

        // kalo guru dia pilih siapa yang akan diprint
        $kelas = Kelas::where('wali_kelas', auth()->user()->id)->first();

        if (!$kelas) {

            return back()->with('error', 'Ma\'af kamu bukan wali kelas');
        }

        $kelas    = Kelas::findOrFail($kelas->id);
        $users    = User::orderBy('nama')->where('kelas_id', $kelas->id)->get();
        $user_ids = $users->pluck('id')->toArray();

        foreach ($user_ids as $user_id) {
            $raport = Raport::where(['user_id' => $user_id, 'tahun' => request()->tahun, 'semester' => request()->semester])->first();

            // jika data raport belum ada
            if (!$raport) {

                Raport::create(['user_id' => $user_id, 'tahun' => request()->tahun, 'semester' => request()->semester]);
            }
        }

        $raports = Raport::whereIn('user_id', $user_ids)->where('semester', request()->semester)->where('tahun', request()->tahun)->get();

        return view('raport.index', compact(
            'kelas', 'users', 'raports'
        ));
    }

    public function updateStatus(Raport $raport)
    {
        $nilai = Nilai::where([
            'tahun' => $raport->tahun,
            'semester' => $raport->semester
        ])->first();

        $nilai_details = NilaiDetail::where([
            'user_id' => $raport->user_id,
            'nilai_id' => $nilai->id
        ])->first();

        if(!$nilai_details) {

            return back()->with('error', 'Raport belum diisi!');
        }

        $raport->update([
            'status' => request()->status,
        ]);

        return back()->with('success', 'Berhasil memberikan raport');
    }

    function print(Raport $raport)
    {
        $nilais        = Nilai::where(['tahun' => $raport->tahun, 'semester' => $raport->semester])->get();
        $nilai_details = NilaiDetail::where('user_id', $raport->user_id)->whereIn('nilai_id', $nilais->pluck('id')->toArray())->get();
        $mapel_details = MapelDetail::whereIn('id', $nilais->pluck('mapel_detail_id')->toArray())->get();

        $mapelas = Mapel::where('kelompok', 'A')->whereIn('id', $mapel_details->pluck('mapel_id')->toArray())->get();
        $mapelbs = Mapel::where('kelompok', 'B')->whereIn('id', $mapel_details->pluck('mapel_id')->toArray())->get();
        $mapelcs = Mapel::where('kelompok', 'C')->whereIn('id', $mapel_details->pluck('mapel_id')->toArray())->get();

        $mapel_detail_as = $mapel_details->whereIn('mapel_id', $mapelas->pluck('id')->toArray());
        $mapel_detail_bs = $mapel_details->whereIn('mapel_id', $mapelbs->pluck('id')->toArray());
        $mapel_detail_cs = $mapel_details->whereIn('mapel_id', $mapelcs->pluck('id')->toArray());

        $nilaias = $nilais->whereIn('mapel_detail_id', $mapel_detail_as->pluck('id')->toArray());
        $nilaibs = $nilais->whereIn('mapel_detail_id', $mapel_detail_bs->pluck('id')->toArray());
        $nilaics = $nilais->whereIn('mapel_detail_id', $mapel_detail_cs->pluck('id')->toArray());

        $nilai_detail_as = $nilai_details->whereIn('nilai_id', $nilaias->pluck('id')->toArray());
        $nilai_detail_bs = $nilai_details->whereIn('nilai_id', $nilaibs->pluck('id')->toArray());
        $nilai_detail_cs = $nilai_details->whereIn('nilai_id', $nilaics->pluck('id')->toArray());

        // +3 itu untuk tambahan 3 baris kelompok a, b, c
        $mapel_totals = $nilai_detail_as->count() + $nilai_detail_bs->count() + $nilai_detail_cs->count() + 3;

        if($mapel_totals - 3 <= 0) {

            return back()->with('error', 'Nilai Tidak Ada!');
        }

        return view('raport.print2', compact(
            'nilai_detail_as', 'nilai_detail_bs', 'nilai_detail_cs', 'mapel_totals', 'raport'
        ));
    }
}
