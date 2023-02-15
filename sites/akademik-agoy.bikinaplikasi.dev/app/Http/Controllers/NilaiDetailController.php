<?php

namespace App\Http\Controllers;

use App\MapelDetail;
use App\Nilai;
use App\NilaiDetail;
use App\User;
use Illuminate\Http\Request;

class NilaiDetailController extends Controller
{
    public $predikat_kl_3s = ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'D-'];
    public $predikat_kl_4s = ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'D-'];
//    public $dalam_mapel_kl_1_kl_2s = ['SB', 'B', 'C', 'K'];
    public $antar_mapel_kl_1_kl_2s = ['LOREM', 'IPSUM', 'DOLOR', 'SIATMET'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['nilai'] = Nilai::findOrFail(request()->nilai_id);
        $data['nilai_details'] = NilaiDetail::where('nilai_id', request()->nilai_id)->get();

        if (auth()->user()->level == 'siswa') {

            $data['nilai_details'] = NilaiDetail::where('nilai_id', request()->nilai_id)->where('user_id', auth()->user()->id)->get();
        }

        return view('nilai_detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nilai = $data['nilai'] = Nilai::findOrFail(request()->nilai_id);
        $data['predikat_kl_3s'] = $this->predikat_kl_3s;
        $data['predikat_kl_4s'] = $this->predikat_kl_4s;
        $data['antar_mapel_kl_1_kl_2s'] = $this->antar_mapel_kl_1_kl_2s;

        $mapel_detail = $data['mapel_detail'] = MapelDetail::findOrFail($nilai->mapel_detail_id);

        $nilai_detail_user_ids = NilaiDetail::where('nilai_id', $nilai->id)->pluck('user_id')->toArray();
        $data['users'] = User::where('kelas_id', $mapel_detail->kelas_id)->whereNotIn('id', $nilai_detail_user_ids)->get();

        return view('nilai_detail.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nilai_id' => 'required|exists:nilais,id',
            'user_id' => 'required|exists:users,id',
            'tugas' => 'required|between:1,4',
            'ulangan_harian' => 'required|between:1,4',
            'mid_semester' => 'required|between:1,4',
            'uas' => 'required|between:1,4',
            'deskripsi_pengetahuan' => 'required',
            'keterampilan' => 'required|between:1,4',
            'deskripsi_keterampilan' => 'required',
        ]);

        $inputData = $request->except(['_token']);

        // nilai
        $inputData['rata_rata_pengetahuan'] = ($request->tugas + $request->ulangan_harian + $request->mid_semester + $request->uas) / 4;
        $inputData['predikat_pengetahuan'] = $this->getPredikat(($request->tugas + $request->ulangan_harian + $request->mid_semester + $request->uas) / 4);
        $inputData['predikat_keterampilan'] = $this->getPredikat($request->keterampilan);

        NilaiDetail::create($inputData);

        return redirect(url("nilai_detail?nilai_id=" . $request->nilai_id))->with("success", "Berhasil menambah nilai_detail");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\NilaiDetail $nilaiDetail
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiDetail $nilaiDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\NilaiDetail $nilaiDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiDetail $nilaiDetail)
    {
        $data['nilai_detail'] = $nilaiDetail;
        $nilai = $data['nilai'] = Nilai::findOrFail(request()->nilai_id);
        $data['predikat_kl_3s'] = $this->predikat_kl_3s;
        $data['predikat_kl_4s'] = $this->predikat_kl_4s;
//        $data['dalam_mapel_kl_1_kl_2s'] = $this->dalam_mapel_kl_1_kl_2s;
        $data['antar_mapel_kl_1_kl_2s'] = $this->antar_mapel_kl_1_kl_2s;

        $mapel_detail = $data['mapel_detail'] = MapelDetail::findOrFail($nilai->mapel_detail_id);
        $data['users'] = User::where('kelas_id', $mapel_detail->kelas_id)->get();

        // if(!$data['users']->count()) {

        //     return back()->with('error', 'tidak ada siswa di data nilai tersebut!');
        // }

        return view('nilai_detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\NilaiDetail $nilaiDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NilaiDetail $nilaiDetail)
    {
        //
        $this->validate($request, [
            'nilai_id' => 'required|exists:nilais,id',
            'user_id' => 'required|exists:users,id',
            'tugas' => 'required|between:1,4',
            'ulangan_harian' => 'required|between:1,4',
            'mid_semester' => 'required|between:1,4',
            'uas' => 'required|between:1,4',
            'deskripsi_pengetahuan' => 'required',
            'keterampilan' => 'required|between:1,4',
            'deskripsi_keterampilan' => 'required',
        ]);

        $inputData = $request->except(['_token']);

        // nilai
        $inputData['rata_rata_pengetahuan'] = ($request->tugas + $request->ulangan_harian + $request->mid_semester + $request->uas) / 4;
        $inputData['predikat_pengetahuan'] = $this->getPredikat(($request->tugas + $request->ulangan_harian + $request->mid_semester + $request->uas) / 4);
        $inputData['predikat_keterampilan'] = $this->getPredikat($request->keterampilan);


        $nilaiDetail->update($inputData);

        return redirect(url("nilai_detail?nilai_id=" . $request->nilai_id))->with("success", "Berhasil mengupdate nilai_detail");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\NilaiDetail $nilaiDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiDetail $nilaiDetail)
    {
        //
        $nilaiDetail->delete();

        return redirect(url("nilai_detail?nilai_id=" . request()->nilai_id))->with("success", "Berhasil menghapus Nilai Detail");
    }

    public function getPredikat(float $angkaKl): string
    {
        if ($angkaKl > 0.00 && $angkaKl < 65) {

            return 'D';
        } elseif ($angkaKl >= 65 && $angkaKl < 77) {

            return 'C';
        } elseif ($angkaKl >= 77 && $angkaKl < 89) {

            return 'B';
        } elseif ($angkaKl >= 89) {

            return 'A';
        } else {
            die("Nilai Tidak Ada dirange 1 - 100!");
        }
    }
}
