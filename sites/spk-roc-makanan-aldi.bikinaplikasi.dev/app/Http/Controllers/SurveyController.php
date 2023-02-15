<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kelas;
use App\Http\Requests;

use App\Kriteria;
use App\Survey;
use App\Perhitungan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user_ids = User::all()->pluck('id')->toArray();

        if (auth()->user()->level == 'Admin') {

            $data['survey'] = Survey::whereIn('user_id', $user_ids)->paginate(1000);
        } else {

            $data['survey'] = Survey::where('user_id', auth()->user()->id)->paginate(1000);
        }
        $data['survey_count'] = count(Schema::getColumnListing('survey'));

        return view('survey.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['kriteria'] = Kriteria::all();
        $data['alternatif'] = Alternatif::all();

        return view('survey.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'kriteria_id.*' => 'required|distinct',
            'alternatif_id.*.*.*' => 'required|distinct'
        ]);

        $kriteria = kriteria::all();
        $dataRanking = [];

        foreach ($kriteria as $keyKriteria1 => $itemKriteria1) {
            foreach ($kriteria as $keyKriteria2 => $itemKriteria2) {
                if ($keyKriteria2 < $kriteria->count() - $keyKriteria1) {

                    $dataRanking[] = $request->kriteria_id[$itemKriteria2->id];
                }
            }

            $dataRanking[] = 'auto_priority';

            for ($c = 0; $c <= $keyKriteria1; $c++) {
                if ($keyKriteria1 != count($kriteria) - 1) {

                    $dataRanking[] = null;
                } else {
                    $dataRanking[] = 'auto_sum';
                }
            }

        }

        $dataRanking[] = 'auto_sum_priority';
        $dataRanking[] = 'auto_principle_eign_value';
        $dataRanking[] = 'auto_consistency_index';
        $dataRanking[] = 'auto_consistency_ratio';

        $data['matriks_konsistensi'][]['nilai'] = $dataRanking;

        #1
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        foreach ($kriteria as $keyKriteria => $itemKriteria) {
            $dataRanking = [];

            foreach ($alternatif as $keyAlternatif => $itemAlternatif) {
                foreach ($alternatif as $keyAlternatif2 => $itemAlternatif2) {
                    if ($keyAlternatif2 < count($alternatif) - $keyAlternatif) {

                        $dataRanking[] = $request->alternatif_id[$itemKriteria->id][$itemAlternatif2->id];
                    }
                }

                $dataRanking[] = 'auto_priority';

                for ($c = 0; $c <= $keyAlternatif; $c++) {
                    if ($keyAlternatif != count($alternatif) - 1) {

                        $dataRanking[] = null;
                    } else {
                        $dataRanking[] = 'auto_sum';
                    }
                }

            }


            $dataRanking[] = 'auto_sum_priority';
            $dataRanking[] = 'auto_principle_eign_value';
            $dataRanking[] = 'auto_consistency_index';
            $dataRanking[] = 'auto_consistency_ratio';

            $data['matriks_konsistensi'][$keyKriteria + 1]['nilai'] = $dataRanking;

        }

        $request->request->add($data);
        $request->request->remove('_token');
        $request->request->remove('kriteria_id');
        $request->request->remove('alternatif_id');

        $data = $this->hitung($request);

        Survey::create([
            'user_id' => auth()->user()->id,
            'hasil_hitung' => json_encode($data)
        ]);

        return redirect()->route('survey.index')->with('success', 'Berhasil menambah Survey');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Survey $survey)
    {
        $data['alternatif'] = collect(json_decode($survey->hasil_hitung)->alternatif)->sortByDesc('nilai_kriteria_total');

        return view('survey.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Survey $survey)
    {
        $data['survey'] = $survey;

        return view('survey.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Survey $survey)
    {
        $this->validate($request, [
            'nama' => "required|max:40|unique:survey,nama,$survey->nama,nama",
            'urutan_prioritas' => "required",
        ]);

        $requestData = $request->except([]);

        $survey->update($requestData);

        return redirect()->route('survey.index')->with('success', 'Berhasil mengubah Survey');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();

        return redirect()->route('survey.index')->with('success', 'Survey berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $surveys = Survey::whereIn('id', json_decode($request->ids, true))->get();

        Survey::whereIn('id', $surveys->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data survey');
    }


    public function hitung(Request $request)
    {

        $kriteria = Kriteria::all()->sortBy('urutan_prioritas')->values();
        $alternatif = Alternatif::get();

        foreach ($request->matriks_konsistensi as $key1 => $item) {
            if ($key1 == 0) {
                $dataHitung = collect($item['nilai'])->chunk($kriteria->count() + 1)->values()
                    ->map(function ($item) {
                        return $item->values();
                    })
                    ->toArray();

            } else {
                $dataHitung = collect($item['nilai'])->chunk($alternatif->count() + 1)->values()
                    ->map(function ($item) {
                        return $item->values();
                    })
                    ->toArray();

            }

            for ($a = 0; $a < count($dataHitung) - 1; $a++) {
                for ($b = 0; $b < count($dataHitung[$a]); $b++) {
                    if (($dataHitung[$a][$b] < 1 || $dataHitung[$a][$b] == null) && !is_string($dataHitung[$a][$b])) {
                        try {

                            $dataHitung[$a][$b] = (float)number_format(1 / $dataHitung[$b][$a], 4);
                        } catch (\Throwable $t) {
                            dd($dataHitung[$b][$a]);
                        }
                    }

                    if ($dataHitung[$a][$b] == "auto_sum") {
                        $dataHitung[$a][$b] = 0;
                        for ($c = 0; $c < count($dataHitung) - 2; $c++) {

                            try {
                                $dataHitung[$a][$b] += $dataHitung[$c][$b];
                            } catch (\Exception $e) {

                            }
                        }
                    }
                }
            }

            // untuk menghitung priority vector
            foreach ($dataHitung as $key1 => $itemData) {
                foreach ($itemData as $key2 => $itemData2) {
                    if ($itemData2 == 'auto_priority') {
                        $dataHitung[$key1][$key2] = 0;
                        for ($a = 0; $a < count($dataHitung) - 2; $a++) {
                            $dataHitung[$key1][$key2] += $dataHitung[$key1][$a] / $dataHitung[count($dataHitung) - 2][$a];
                        }

                        $dataHitung[$key1][$key2] = (float)number_format(1 / (count($dataHitung) - 2) * $dataHitung[$key1][$key2], 4);
                    }
                }

            }

            // untuk menghitung autosum priority
            $total_priority = 0;
            foreach ($dataHitung as $key1 => $itemData) {
                try {
                    if (is_numeric($itemData[count($itemData) - 1])) {

                        $total_priority += $itemData[count($itemData) - 1];
                    }
                } catch (\Throwable $e) {

                }

                foreach ($itemData as $key2 => $itemData2) {
                    try {
                        if ($itemData2 == 'auto_sum_priority') {
                            $dataHitung[$key1][$key2] = $total_priority;
                        }

                    } catch (\Throwable $e) {

                    }
                }
            }

            // untuk menghitung autosum principle eign value
            $priority_vector = [];
            $dataHitungPriorityVector = $dataHitung;
            array_pop($dataHitungPriorityVector);
            array_pop($dataHitungPriorityVector);
            foreach ($dataHitungPriorityVector as $itemDataHitung) {
                $priority_vector[] = end($itemDataHitung);
            }

            $dataHitungJumlah = array_reverse($dataHitung);
            array_shift($dataHitungJumlah);

            $dataHitungJumlah = reset($dataHitungJumlah);
            array_pop($dataHitungJumlah);

            $principleEigenValue = 0;
            foreach ($dataHitungJumlah as $key => $itemDataHitungJumlah) {

                $principleEigenValue += $itemDataHitungJumlah * $priority_vector[$key];
            }

            foreach ($dataHitung as $key3 => $itemDataHitung) {

                // untuk menghitung auto consistency indexData
                $auto_consistency_index = ($principleEigenValue / (count($dataHitung) - 2) - (count($dataHitung) - 2)) / (count($dataHitung) - 3);

                if (reset($itemDataHitung) == 'auto_principle_eign_value') {
                    $dataHitung[$key3][0] = $principleEigenValue;
                    $dataHitung[$key3][1] = $auto_consistency_index;
                    // untuk menghitung consistency ratio
                    $nilaiIr = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51];
                    $dataHitung[$key3][2] = $auto_consistency_index / $nilaiIr[(count($dataHitung[$key3 - 2]) - 2)];
                }
            }

            $dataHasilHitung[] = $dataHitung;
        }

        // untuk menghitung hasil alternatif
        $GLOBALS['indexData'] = 1;
        $GLOBALS['indexAlternatif'] = 0;
        $alternatif = Alternatif::all()->sortBy('urutan_prioritas')->values()->map(function ($alternatif) use ($dataHasilHitung, $dataHitung, $kriteria) {
            $nilai_kriteria = [];
            foreach ($kriteria->sortBy('urutan_prioritas')->values() as $key => $itemKriteria) {

                $nilai_kriteria[] = $dataHasilHitung[$GLOBALS['indexData']][$GLOBALS['indexAlternatif']][count($dataHasilHitung[$GLOBALS['indexData']]) - 2]
                    * $dataHasilHitung[0][$key][count($dataHasilHitung[0][$key]) - 1];

//                if ($alternatif->nama == 'InDriver') {
//                    dump($dataHasilHitung[$GLOBALS['indexData']]);
//                    dump($dataHasilHitung[0][$key][count($dataHasilHitung[0][$key]) - 1]);
//                }

                $GLOBALS['indexData']++;
            }

            $GLOBALS['indexData'] = 1;

            $alternatif->nilai_kriteria = $nilai_kriteria;
            $alternatif->nilai_kriteria_total = array_sum($nilai_kriteria);

            $GLOBALS['indexAlternatif']++;

            if ($alternatif->nama == 'InDriver') {
//                dd($alternatif);
            }

            return $alternatif;
        });

        $data['hasil_hitung'] = $dataHasilHitung;
        $data['alternatif'] = $alternatif;
        $data['kriteria'] = $kriteria;

        return $data;
    }
}
