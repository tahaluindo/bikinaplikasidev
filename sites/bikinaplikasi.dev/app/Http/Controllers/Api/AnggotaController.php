<?php

namespace App\Http\Controllers\Api;

use App\AnggotaGeografis;
use App\AnggotaIndikatorUsaha;
use App\AnggotaPertanian;
use App\AnggotaRiwayatKesehatan;
use App\AnggotaUsaha;
use App\AnggotaWorkshop;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use App\Keluarga;
use App\KeluargaDetail;
use App\KeluargaDetailKeahlian;
use App\KeluargaDetailPekerjaan;
use App\KeluargaDetailPendidikanTerakhirAnak;
use App\KeluargaDetailPendidikanTerakhirOrtu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        return response()->json((new \App\Anggota)->index($request->all()));
    }

    public function store(Request $request)
    {
        $data = json_decode($request->all()["data"]);

        $validator = Validator::make(json_decode($request->all()["data"], true), [
            "user.password" => "required|min:6",

            "anggota.cabang" => "required",
            "anggota.ranting" => "required",
            "anggota.koja" => "required",
            "anggota.alamat_asli" => "required|max:255|min:20",
            "anggota.alamat_domisili" => "required|max:255|min:20",
            "anggota.gambar" => "required",

            "anggota_geografis.*.geografis_id" => "required",
            "anggota_geografis.*.jawaban" => "required",

            "keluarga.nkk" => "required|min:16|unique:keluarga,nkk|digits_between:16,16",

            "keluarga_detail.*.nik" => "required|min:16|unique:keluarga_detail,nik|distinct|digits_between:16,16",
            "keluarga_detail.*.nama" => "required|min:3|max:50",
            "keluarga_detail.*.jenis_kelamin" => "required",
            "keluarga_detail.*.tempat_lahir" => "required|min:5|max:50",
            "keluarga_detail.*.tgl_lahir" => "required|date",
            "keluarga_detail.*.status_dalam_keluarga" => "required",
            "keluarga_detail.*.status_perkawinan" => "required",
            "keluarga_detail.*.pekerjaan" => "required",
            "keluarga_detail.*.keahlian" => "required",

            "keluarga_detail.*.nama_sekolah_atau_kampus" => "required|min:10|max:50",
            "keluarga_detail.*.tingkat" => "required",
            "keluarga_detail.*.nisn" => "required_if:keluarga_detail.*.status_dalam_keluarga,in:Anak|unique:keluarga_detail_pendidikan_terakhir_anak,nisn|digits_between:10,12|integer",
            "keluarga_detail.*.jurusan" => "required_if:keluarga_detail.*.status_dalam_keluarga,in:Ayah,Ibu",
            "keluarga_detail.*.tahun_masuk" => "required_if:keluarga_detail.*.status_dalam_keluarga,in:Anak|digits_between:4,4",
            "keluarga_detail.*.tahun_lulus" => "required|digits_between:4,4",

            "anggota_pertanian.luas_lahan" => "required|integer|max:100000",
            "anggota_pertanian.kegiatan_panti" => "required",
            "anggota_pertanian.jenis_tanaman" => "required",
            "anggota_pertanian.jenis_tanah" => "required",
            "anggota_pertanian.menggunakan_ptsa" => "required",

            "anggota_usaha.badan_hukum" => "required",
            "anggota_usaha.tahun_berdiri" => "required|digits_between:4,4",
            "anggota_usaha.tdp" => "required",
            "anggota_usaha.siup" => "required",
            "anggota_usaha.npwp" => "required",
            "anggota_usaha.jenis_produk" => "required",
            "anggota_usaha.daerah_pemasaran" => "required",
            "anggota_usaha.alat_produksi" => "required",
            "anggota_usaha.bahan_baku_pokok" => "required",
            "anggota_usaha.sektor_usaha" => "required",

            "anggota_indikator_usaha.tahun" => "required|digits_between:4,4",
            "anggota_indikator_usaha.modal_sendiri" => "required|integer|digits_between:5,11",
            "anggota_indikator_usaha.asset" => "required|digits_between:5,11",
            "anggota_indikator_usaha.volume_usaha" => "required|digits_between:5,11",

            "anggota_workshop.nama" => "required",
            "anggota_workshop.penyelenggara" => "required",
            "anggota_workshop.tahun" => "required|digits_between:4,4",

            "anggota_riwayat_kesehatan.berat_badan" => "required|integer|max:300|min:20",
            "anggota_riwayat_kesehatan.tinggi_badan" => "required|integer|max:300|min:20",
            "anggota_riwayat_kesehatan.golongan_darah" => "required",
            "anggota_riwayat_kesehatan.riwayat_penyakit_sekarang" => "required",
            "anggota_riwayat_kesehatan.riwayat_penyakit_dahulu" => "required",
            "anggota_riwayat_kesehatan.riwayat_penyakit_keluarga" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "Error",
                "error" => $validator->errors()->toArray()
            ], 422);
        }
        \DB::transaction(function () use ($data, $request) {

            $user = User::create([
                "nik" => $data->keluarga_detail[0]->nik,
                "password" => \Hash::make($data->user->password),
            ]);

            if($request->hasFile("gambar")) {
                $gambar =
                    str_replace("api/", "",
                        str_replace("\\", "/", $request->file('gambar')->move('api/images', Str::random(40) . ".png")));
            }

            $anggota = Anggota::create([
                "user_id" => $user->id,
                "cabang_id" => $data->anggota->cabang,
                "ranting_id" => $data->anggota->ranting,
                "koja_id" => $data->anggota->koja,
                "alamat_asli" => $data->anggota->alamat_asli,
                "alamat_domisili" => $data->anggota->alamat_domisili,
                "gambar" => $gambar,
            ]);

            foreach ($data->anggota_geografis as $item) {
                $anggotaGeografis = AnggotaGeografis::create([
                    "anggota_id" => $anggota->id,
                    "geografis_id" => $item->geografis_id,
                    "jawaban" => $item->jawaban,
                ]);
            }

            $keluarga = Keluarga::create([
                "nkk" => $data->keluarga->nkk,
            ]);

            foreach ($data->keluarga_detail as $item) {
                $keluargaDetail = KeluargaDetail::create([
                    "keluarga_id" => $keluarga->id,
                    "nik" => $item->nik,
                    "nama" => $item->nama,
                    "jenis_kelamin" => $item->jenis_kelamin,
                    "tempat_lahir" => $item->tempat_lahir,
                    "tgl_lahir" => $item->tgl_lahir,
                    "status_dalam_keluarga" => $item->status_dalam_keluarga,
                    "status_perkawinan" => $item->status_perkawinan,
                ]);

                if ($item->status_dalam_keluarga == "Anak") {
                    $keluargaDetailPendidikanTerakhirAnak = KeluargaDetailPendidikanTerakhirAnak::create([
                        "keluarga_detail_id" => $keluargaDetail->id,
                        "nama_sekolah_atau_kampus" => $item->nama_sekolah_atau_kampus,
                        "tingkat" => $item->tingkat,
                        "nisn" => $item->nisn,
                        "tahun_masuk" => $item->tahun_masuk,
                        "tahun_lulus" => $item->tahun_lulus,
                    ]);
                }

                if ($item->status_dalam_keluarga == "Ayah" || $item->status_dalam_keluarga == "Ibu") {
                    $keluargaDetailPendidikanTerakhirOrtu = KeluargaDetailPendidikanTerakhirOrtu::create([
                        "keluarga_detail_id" => $keluargaDetail->id,
                        "nama_sekolah_atau_kampus" => $item->nama_sekolah_atau_kampus,
                        "tingkat" => $item->tingkat,
                        "jurusan" => $item->jurusan,
                        "tahun_lulus" => $item->tahun_lulus,
                    ]);
                }

                foreach ($item->pekerjaan as $itemPekerjaan) {
                    $keluargaDetailPekerjaan = KeluargaDetailPekerjaan::create([
                        "keluarga_detail_id" => $keluargaDetail->id,
                        "pekerjaan_id" => $itemPekerjaan,
                    ]);
                }


                foreach ($item->keahlian as $itemKeahlian) {
                    $keluargaDetailKeahlian = KeluargaDetailKeahlian::create([
                        "keluarga_detail_id" => $keluargaDetail->id,
                        "keahlian_detail_id" => $itemKeahlian
                    ]);
                }
            }

            $anggotaPertanian = AnggotaPertanian::create([
                "anggota_id" => $anggota->id,
                "luas_lahan" => $data->anggota_pertanian->luas_lahan,
                "kegiatan_panti" => $data->anggota_pertanian->kegiatan_panti,
                "jenis_tanah" => $data->anggota_pertanian->jenis_tanah,
                "jenis_tanaman" => $data->anggota_pertanian->jenis_tanaman,
                "menggunakan_ptsa" => $data->anggota_pertanian->menggunakan_ptsa,
            ]);

            $anggotaUsaha = AnggotaUsaha::create([
                "anggota_id" => $anggota->id,
                "badan_hukum" => $data->anggota_usaha->badan_hukum,
                "tahun_berdiri" => $data->anggota_usaha->tahun_berdiri,
                "tdp" => $data->anggota_usaha->tdp,
                "siup" => $data->anggota_usaha->siup,
                "npwp" => $data->anggota_usaha->npwp,
                "jenis_produk" => $data->anggota_usaha->jenis_produk,
                "daerah_pemasaran" => $data->anggota_usaha->daerah_pemasaran,
                "alat_produksi" => $data->anggota_usaha->alat_produksi,
                "bahan_baku_pokok" => $data->anggota_usaha->bahan_baku_pokok,
                "sektor_usaha" => $data->anggota_usaha->sektor_usaha,
            ]);

            $anggotaIndikatorUsaha = AnggotaIndikatorUsaha::create([
                "anggota_id" => $anggota->id,
                "tahun" => $data->anggota_indikator_usaha->tahun,
                "modal_sendiri" => $data->anggota_indikator_usaha->modal_sendiri,
                "asset" => $data->anggota_indikator_usaha->asset,
                "volume_usaha" => $data->anggota_indikator_usaha->volume_usaha,
            ]);

            $anggotaWorkshop = AnggotaWorkshop::create([
                "anggota_id" => $anggota->id,
                "nama" => $data->anggota_workshop->nama,
                "penyelenggara" => $data->anggota_workshop->penyelenggara,
                "tahun" => $data->anggota_workshop->tahun,
            ]);

            $anggotaRiwayatKesehatan = AnggotaRiwayatKesehatan::create([
                "anggota_id" => $anggota->id,
                "berat_badan" => $data->anggota_riwayat_kesehatan->berat_badan,
                "tinggi_badan" => $data->anggota_riwayat_kesehatan->tinggi_badan,
                "golongan_darah" => $data->anggota_riwayat_kesehatan->golongan_darah,
                "riwayat_penyakit_sekarang" => $data->anggota_riwayat_kesehatan->riwayat_penyakit_sekarang,
                "riwayat_penyakit_dahulu" => $data->anggota_riwayat_kesehatan->riwayat_penyakit_dahulu,
                "riwayat_penyakit_keluarga" => $data->anggota_riwayat_kesehatan->riwayat_penyakit_keluarga,
            ]);
        });

        return response()->json([
            "status" => "Success",
        ]);
    }

    public function show(Anggota $anggota)
    {
        return response()->json([
            "status" => "Success",
            "anggota" => Anggota::where("id", $anggota->id)->first()
        ]);
    }

    public function update(Request $request, Anggota $anggota)
    {
        $data = json_decode($request->all()["data"]);

        file_put_contents("errors.json", json_encode(json_decode($request->all()["data"])));

        $validator = Validator::make(json_decode($request->all()["data"], true), [
            "user.password" => "min:6",

            "anggota.cabang_id" => "required",
            "anggota.ranting_id" => "required",
            "anggota.koja_id" => "required",
            "anggota.alamat_asli" => "required|max:255|min:20",
            "anggota.alamat_domisili" => "required|max:255|min:20",
            "anggota.gambar" => "required",

            "anggota_geografis.*.geografis_id" => "required",
            "anggota_geografis.*.jawaban" => "required",

            "keluarga.nkk" => "required|min:16|unique:keluarga,nkk,{$data->keluarga->nkk},nkk",

            "keluarga_detail.*.nik" => "required|min:16|distinct",
            "keluarga_detail.*.nama" => "required|min:3|max:50",
            "keluarga_detail.*.jenis_kelamin" => "required",
            "keluarga_detail.*.tempat_lahir" => "required|min:5|max:50",
            "keluarga_detail.*.tgl_lahir" => "required|date",
            "keluarga_detail.*.status_dalam_keluarga" => "required",
            "keluarga_detail.*.status_perkawinan" => "required",
            "keluarga_detail.*.pekerjaan" => "required",
            "keluarga_detail.*.keahlian" => "required",

            "keluarga_detail.*.nama_sekolah_atau_kampus" => "required|min:10|max:50",
            "keluarga_detail.*.tingkat" => "required",
            "keluarga_detail.*.nisn" => "required_if:keluarga_detail.*.status_dalam_keluarga,in:Anak|distinct",
            "keluarga_detail.*.jurusan" => "required_if:keluarga_detail.*.status_dalam_keluarga,in:Ayah,Ibu",
            "keluarga_detail.*.tahun_masuk" => "required_if:keluarga_detail.*.status_dalam_keluarga,in:Anak|digits_between:4,4",
            "keluarga_detail.*.tahun_lulus" => "required|digits_between:4,4",

            "anggota_pertanian.luas_lahan" => "required",
            "anggota_pertanian.kegiatan_panti" => "required",
            "anggota_pertanian.jenis_tanaman" => "required",
            "anggota_pertanian.jenis_tanah" => "required",
            "anggota_pertanian.menggunakan_ptsa" => "required",

            "anggota_usaha.badan_hukum" => "required",
            "anggota_usaha.tahun_berdiri" => "required|digits_between:4,4",
            "anggota_usaha.tdp" => "required",
            "anggota_usaha.siup" => "required",
            "anggota_usaha.npwp" => "required",
            "anggota_usaha.jenis_produk" => "required",
            "anggota_usaha.daerah_pemasaran" => "required",
            "anggota_usaha.alat_produksi" => "required",
            "anggota_usaha.bahan_baku_pokok" => "required",
            "anggota_usaha.sektor_usaha" => "required",

            "anggota_indikator_usaha.tahun" => "required|digits_between:4,4",
            "anggota_indikator_usaha.modal_sendiri" => "required",
            "anggota_indikator_usaha.asset" => "required",
            "anggota_indikator_usaha.volume_usaha" => "required",

            "anggota_workshop.nama" => "required",
            "anggota_workshop.penyelenggara" => "required",
            "anggota_workshop.tahun" => "required|digits_between:4,4",

            "anggota_riwayat_kesehatan.berat_badan" => "required|integer|max:300|min:20",
            "anggota_riwayat_kesehatan.tinggi_badan" => "required|integer|max:300|min:20",
            "anggota_riwayat_kesehatan.golongan_darah" => "required",
            "anggota_riwayat_kesehatan.riwayat_penyakit_sekarang" => "required",
            "anggota_riwayat_kesehatan.riwayat_penyakit_dahulu" => "required",
            "anggota_riwayat_kesehatan.riwayat_penyakit_keluarga" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "Error",
                "error" => $validator->errors()->toArray()
            ], 422);
        }

        \DB::transaction(function () use ($data, $request, $anggota) {
            if (isset($data->user->password)) {
                $user = $anggota->user->update([
                    "nik" => $data->keluarga_detail[0]->nik,
                    "password" => \Hash::make($data->user->password),
                ]);
            } else {
                $user = $anggota->user->update([
                    "nik" => $data->keluarga_detail[0]->nik,
                ]);
            }

            $gambar = $anggota->gambar;
            if($request->hasFile("gambar")) {
                $gambar =
                    str_replace("api/", "",
                        str_replace("\\", "/", $request->file('gambar')->move('api/images', Str::random(40) . ".png")));
            }

            $anggota->update([
                "user_id" => $data->user->id,
                "koja_id" => $data->anggota->koja_id,
                "cabang_id" => $data->anggota->cabang_id,
                "ranting_id" => $data->anggota->ranting_id,
                "alamat_asli" => $data->anggota->alamat_asli,
                "alamat_domisili" => $data->anggota->alamat_domisili,
                "gambar" => $gambar,
            ]);

            foreach ($data->anggota_geografis as $item) {
                $anggotaGeografis = AnggotaGeografis::create([
                    "anggota_id" => $anggota->id,
                    "geografis_id" => $item->geografis_id,
                    "jawaban" => $item->jawaban,
                ]);
            }

            Keluarga::where('nkk', $data->keluarga->nkk)->update([
                "nkk" => $data->keluarga->nkk,
            ]);

            foreach ($data->keluarga_detail as $item) {
                $keluargaDetail = KeluargaDetail::where('id', $item->id)->update([
                    "nik" => $item->nik,
                    "nama" => $item->nama,
                    "jenis_kelamin" => $item->jenis_kelamin,
                    "tempat_lahir" => $item->tempat_lahir,
                    "tgl_lahir" => $item->tgl_lahir,
                    "status_dalam_keluarga" => $item->status_dalam_keluarga,
                    "status_perkawinan" => $item->status_perkawinan,
                ]);

                if ($item->status_dalam_keluarga == "Anak") {
                    KeluargaDetailPendidikanTerakhirAnak::where('keluarga_detail_id', $item->id)->update([
                        "keluarga_detail_id" => $item->id,
                        "nama_sekolah_atau_kampus" => $item->nama_sekolah_atau_kampus,
                        "tingkat" => $item->tingkat,
                        "nisn" => $item->nisn,
                        "tahun_masuk" => $item->tahun_masuk,
                        "tahun_lulus" => $item->tahun_lulus,
                    ]);
                }

                if ($item->status_dalam_keluarga == "Ayah" || $item->status_dalam_keluarga == "Ibu") {
                    $keluargaDetailPendidikanTerakhirOrtu = KeluargaDetailPendidikanTerakhirOrtu::where('keluarga_detail_id', $item->id)->update([
                        "keluarga_detail_id" => $item->id,
                        "nama_sekolah_atau_kampus" => $item->nama_sekolah_atau_kampus,
                        "tingkat" => $item->tingkat,
                        "jurusan" => $item->jurusan,
                        "tahun_lulus" => $item->tahun_lulus,
                    ]);
                }

                foreach ($item->pekerjaan as $itemPekerjaan) {
                    $keluargaDetailPekerjaan = KeluargaDetailPekerjaan::where('keluarga_detail_id', $item->id)->update([
                        "keluarga_detail_id" => $item->id,
                        "pekerjaan_id" => $itemPekerjaan,
                    ]);
                }


                foreach ($item->keahlian as $itemKeahlian) {
                    $keluargaDetailKeahlian = KeluargaDetailKeahlian::where('keluarga_detail_id', $item->id)->update([
                        "keluarga_detail_id" => $item->id,
                        "keahlian_detail_id" => $itemKeahlian
                    ]);
                }
            }

            $anggotaPertanian = AnggotaPertanian::where('anggota_id', $anggota->id)->update([
                "anggota_id" => $anggota->id,
                "luas_lahan" => $data->anggota_pertanian->luas_lahan,
                "kegiatan_panti" => $data->anggota_pertanian->kegiatan_panti,
                "jenis_tanah" => $data->anggota_pertanian->jenis_tanah,
                "jenis_tanaman" => $data->anggota_pertanian->jenis_tanaman,
                "menggunakan_ptsa" => $data->anggota_pertanian->menggunakan_ptsa,
            ]);

            $anggotaUsaha = AnggotaUsaha::where('anggota_id', $anggota->id)->update([
                "anggota_id" => $anggota->id,
                "badan_hukum" => $data->anggota_usaha->badan_hukum,
                "tahun_berdiri" => $data->anggota_usaha->tahun_berdiri,
                "tdp" => $data->anggota_usaha->tdp,
                "siup" => $data->anggota_usaha->siup,
                "npwp" => $data->anggota_usaha->npwp,
                "jenis_produk" => $data->anggota_usaha->jenis_produk,
                "daerah_pemasaran" => $data->anggota_usaha->daerah_pemasaran,
                "alat_produksi" => $data->anggota_usaha->alat_produksi,
                "bahan_baku_pokok" => $data->anggota_usaha->bahan_baku_pokok,
                "sektor_usaha" => $data->anggota_usaha->sektor_usaha,
            ]);

            $anggotaIndikatorUsaha = AnggotaIndikatorUsaha::where('anggota_id', $anggota->id)->update([
                "anggota_id" => $anggota->id,
                "tahun" => $data->anggota_indikator_usaha->tahun,
                "modal_sendiri" => $data->anggota_indikator_usaha->modal_sendiri,
                "asset" => $data->anggota_indikator_usaha->asset,
                "volume_usaha" => $data->anggota_indikator_usaha->volume_usaha,
            ]);

            $anggotaWorkshop = AnggotaWorkshop::create([
                "anggota_id" => $anggota->id,
                "nama" => $data->anggota_workshop->nama,
                "penyelenggara" => $data->anggota_workshop->penyelenggara,
                "tahun" => $data->anggota_workshop->tahun,
            ]);

            $anggotaRiwayatKesehatan = AnggotaRiwayatKesehatan::where('anggota_id', $anggota->id)->update([
                "anggota_id" => $anggota->id,
                "berat_badan" => $data->anggota_riwayat_kesehatan->berat_badan,
                "tinggi_badan" => $data->anggota_riwayat_kesehatan->tinggi_badan,
                "golongan_darah" => $data->anggota_riwayat_kesehatan->golongan_darah,
                "riwayat_penyakit_sekarang" => $data->anggota_riwayat_kesehatan->riwayat_penyakit_sekarang,
                "riwayat_penyakit_dahulu" => $data->anggota_riwayat_kesehatan->riwayat_penyakit_dahulu,
                "riwayat_penyakit_keluarga" => $data->anggota_riwayat_kesehatan->riwayat_penyakit_keluarga,
            ]);
        });

        return response()->json([
            "status" => "Success",
        ]);
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return response()->json([
            "status" => "Success",
        ], 200);
    }
}
