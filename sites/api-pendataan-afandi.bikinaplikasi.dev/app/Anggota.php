<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Anggota extends Authenticatable
{
    use Notifiable;

    protected $table = 'anggota';
    protected $guarded = [];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function ranting()
    {
        return $this->belongsTo(Ranting::class);
    }

    public function koja()
    {
        return $this->belongsTo(Koja::class);
    }

    public function anggota_geografis()
    {
        return $this->hasMany(AnggotaGeografis::class);
    }

    public function anggota_pertanian()
    {
        return $this->hasOne(AnggotaPertanian::class);
    }

    public function anggota_usaha()
    {
        return $this->hasOne(AnggotaUsaha::class);
    }

    public function anggota_indikator_usaha()
    {
        return $this->hasOne(AnggotaIndikatorUsaha::class);
    }

    public function anggota_workshop()
    {
        return $this->hasOne(AnggotaWorkshop::class);
    }

    public function anggota_riwayat_kesehatan()
    {
        return $this->hasOne(AnggotaRiwayatKesehatan::class);
    }

    public function anggota_aplikasi_program_list_checkboxs()
    {
        return $this->hasMany(AnggotaAplikasiProgramListCheckbox::class);
    }

    public function index($data)
    {
        $data = json_decode(json_encode($data));

        $anggota = Anggota::with([
            "anggota_pertanian", "anggota_usaha", "anggota_indikator_usaha", "anggota_workshop", "anggota_riwayat_kesehatan",
            "user", "user.keluarga_detail",
            "user.keluarga_detail.keluarga",
            "user.keluarga_detail.keluarga.keluarga_details",
            "user.keluarga_detail.keluarga.keluarga_details.keluarga_detail_pekerjaans",
            "user.keluarga_detail.keluarga.keluarga_details.keluarga_detail_keahlians",
            "user.keluarga_detail.keluarga.keluarga_details.keluarga_detail_pendidikan_terakhir_anak",
            "user.keluarga_detail.keluarga.keluarga_details.keluarga_detail_pendidikan_terakhir_ortu",
            "cabang", "ranting", "koja", "anggota_geografis",
            "anggota_geografis", 'anggota_aplikasi_program_list_checkboxs', 'anggota_aplikasi_program_list_checkboxs.aplikasi_program_list_checkbox'])
            ->where("alamat_asli", "like", "%" . ($data->alamat_asli ?? "") . "%")
            ->where("alamat_domisili", "like", "%" . ($data->alamat_domisili ?? "") . "%")
            ->where("status", "like", "%" . ($data->status ?? "") . "%")
            ->where("gambar", "like", "%" . ($data->gambar ?? "") . "%");

        if (isset($data->user_id)) {
            $anggota->where("user_id", $data->user_id);
        }

        if (isset($data->cabang_id)) {
            $anggota->where("cabang_id", $data->cabang_id);
        }

        if (isset($data->ranting_id)) {
            $anggota->where("ranting_id", $data->ranting_id);
        }

        if (isset($data->koja_id)) {
            $anggota->where("koja_id", $data->koja_id);
        }

        if(isset($data->nama)) {
            $keluarga_detail_niks = KeluargaDetail::where('nama', 'like', '%' . $data->nama . '%')->get()->pluck('nik')->toArray();
            $user_ids = User::whereIn('nik', $keluarga_detail_niks)->get()->pluck('id')->toArray();
            $anggota->whereIn('user_id',  $user_ids);
        }

        return $anggota
            ->limit($data->limit ?? 1)
            ->get()->map(function ($itemAnggota) {
                $itemAnggota->aplikasi_program = AplikasiProgram::get()->map(function ($itemAplikasiProgram) use ($itemAnggota) {
                    if ($itemAplikasiProgram->have_list_pilihan) {
                        $itemAplikasiProgram->selected_ids = AplikasiProgramListCheckbox::whereIn('aplikasi_program_id', [$itemAplikasiProgram->id])
                            ->whereIn('id', $itemAnggota->anggota_aplikasi_program_list_checkboxs->pluck('aplikasi_program_list_checkbox_id')->toArray())
                            ->get()->pluck('id');

                        $itemAplikasiProgram->selected_id = null;
                    } else {
                        $itemAplikasiProgram->selected_ids = [];

                        $itemAplikasiProgram->selected_id = AplikasiProgramListCheckbox::whereIn('aplikasi_program_id', [$itemAplikasiProgram->id])
                            ->whereIn('id', $itemAnggota->anggota_aplikasi_program_list_checkboxs->pluck('aplikasi_program_list_checkbox_id')->toArray())
                            ->get()->first()->id ?? null;
                    }

                    return $itemAplikasiProgram;
                });

                return $itemAnggota;
            });
    }
}