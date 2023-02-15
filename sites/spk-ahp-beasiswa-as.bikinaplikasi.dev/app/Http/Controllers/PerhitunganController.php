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
        ($data['kriteria'] = Kriteria::all()->sortBy('urutan_prioritas')->values());
        $data['perhitungan'] = $perhitungan;
        $data['alternatif'] = Alternatif::where('perhitungan_id', $perhitungan->id)->get();

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



        $data['kriteria'] = Kriteria::all();
        $data['alternatif'] = Alternatif::where('perhitungan_id', $perhitungan->id)->get();

        $dataHasilHitung = [];
        foreach ($request->matriks_konsistensi as $key1 => $item) {
            $dataHitung = collect($item['nilai'])->chunk(count($request->matriks_konsistensi))->values()
                ->map(function ($item) {
                    return $item->values();
                })
                ->toArray();

            for ($a = 0; $a < count($dataHitung) - 1; $a++) {
                for ($b = 0; $b < count($request->matriks_konsistensi); $b++) {
                    if ($dataHitung[$a][$b] == "auto") {
                        $dataHitung[$a][$b] = (float)number_format(1 / $dataHitung[$b][$a], 4);
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
            $principle_eign_value = 0;

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

            foreach ($dataHitung as $key => $itemDataHitung) {
                if (reset($itemDataHitung) == 'auto_principle_eign_value') {

                    // untuk menghitung auto consistency index
                    $auto_consistency_index = ($principleEigenValue - (count($dataHitung) - 2)) / (count($dataHitung) - 3);

                    $dataHitung[$key][0] = $principleEigenValue;
                    $dataHitung[$key][1] = $auto_consistency_index;

                    // untuk menghitung consistency ratio
                    $dataHitung[$key][2] = $auto_consistency_index / 0.58;
                }
            }

            $dataHasilHitung[] = $dataHitung;
        }

        // untuk menghitung hasil alternatif
        $alternatif = Alternatif::all()->map(function ($alternatif) use ($dataHasilHitung, $dataHitung) {
            $nilai_kriteria = [];
            foreach ($alternatif->alternatif_details as $alternatif_detail) {

                $nilai_kriteria[] = ($dataHasilHitung[$alternatif_detail->kriteria_detail->kriteria->urutan_prioritas][$alternatif_detail->kriteria_detail->urutan_prioritas - 1][count($dataHitung) - 2]) * (
                    ($dataHasilHitung[0][$alternatif_detail->kriteria_detail->kriteria->urutan_prioritas - 1][count($dataHitung) - 2])
                    );
            }

            $alternatif->nilai_kriteria = $nilai_kriteria;
            $alternatif->nilai_kriteria_total = array_sum($nilai_kriteria);

            return $alternatif;
        });

        $data['hasil_hitung'] = $dataHasilHitung;
        $data['perhitungan'] = $perhitungan;
        $data['alternatif'] = $alternatif;

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
