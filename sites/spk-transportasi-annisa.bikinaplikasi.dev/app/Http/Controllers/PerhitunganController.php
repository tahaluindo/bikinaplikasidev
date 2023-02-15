<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kelas;
use App\Http\Requests;

use App\Kriteria;
use App\KriteriaDetail;
use App\Perhitungan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['perhitungan'] = Perhitungan::paginate(1000);
        $data['perhitungan_count'] = count(Schema::getColumnListing('perhitungan'));

        return view('perhitungan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('perhitungan.create');
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
            'nama' => "required|max:40|unique:perhitungan,nama",
            'keterangan' => "required",
        ]);

        $requestData = $request->except([]);

        Perhitungan::create($requestData);

        return redirect()->route('perhitungan.index')->with('success', 'Berhasil menambah Perhitungan');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Perhitungan $perhitungan)
    {
        $data['alternatif'] = Alternatif::get();
        ($data['kriteria'] = Kriteria::all()->sortBy('urutan_prioritas')->values());
        $data['perhitungan'] = $perhitungan;

        if ($perhitungan->hasil_hitung) {
            $data['hasil_hitung'] = collect(json_decode($perhitungan->hasil_hitung, true)['hasil_hitung'])->map(function ($item) {

                return collect($item);
            });

            $data['alternatif'] = collect(json_decode($perhitungan->hasil_hitung, true)['alternatif'])->map(function ($item) {

                return json_decode(json_encode($item));
            });
        }

        return view('perhitungan.show', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function hitung(Perhitungan $perhitungan, Request $request)
    {
        Alternatif::where('id', '>', 0)->update(['perhitungan_id' => $perhitungan->id]);

        $kriteria = Kriteria::all()->sortBy('urutan_prioritas')->values();
        $alternatif = Alternatif::where('perhitungan_id', $perhitungan->id)->get();

        if($request->print) {
            $data['hasil_hitung'] = collect(json_decode($perhitungan->hasil_hitung, true)['hasil_hitung'])->map(function ($item) {

                return collect($item);
            });

            $data['alternatif'] = collect(json_decode($perhitungan->hasil_hitung, true)['alternatif'])->map(function ($item) {

                return json_decode(json_encode($item));
            });

            $data['perhitungan'] = $perhitungan;
            $data['kriteria'] = $kriteria;

            return view('perhitungan.laporan.print', $data);
        }

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
        $data['perhitungan'] = $perhitungan;
        $data['kriteria'] = $kriteria;

        if ($request->save) {
            $perhitungan->update([
                'hasil_hitung' => json_encode([
                    'hasil_hitung' => $data['hasil_hitung'],
                    'perhitungan' => $data['perhitungan'],
                    'alternatif' => $data['alternatif'],
                ])
            ]);

            return redirect()->back()->with('success', 'Berhasil menyimpan data');
        }

        return view('perhitungan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public
    function edit(Perhitungan $perhitungan)
    {
        $data['perhitungan'] = $perhitungan;

        return view('perhitungan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public
    function update(Request $request, Perhitungan $perhitungan)
    {
        $this->validate($request, [
            'nama' => "required|max:40|unique:perhitungan,nama,$perhitungan->nama,nama",
            'keterangan' => "required",
        ]);

        $requestData = $request->except([]);

        $perhitungan->update($requestData);

        return redirect()->route('perhitungan.index')->with('success', 'Berhasil mengubah Perhitungan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public
    function destroy(Perhitungan $perhitungan)
    {
        $perhitungan->delete();

        return redirect()->route('perhitungan.index')->with('success', 'Perhitungan berhasil dihapus!');
    }

    public
    function hapus_semua(Request $request)
    {
        $perhitungans = Perhitungan::whereIn('id', json_decode($request->ids, true))->get();

        Perhitungan::whereIn('id', $perhitungans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data perhitungan');
    }
}
