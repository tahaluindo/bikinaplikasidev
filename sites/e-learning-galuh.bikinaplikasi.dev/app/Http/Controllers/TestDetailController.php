<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\SoalPilgan;
use App\Test;
use App\TestDetail;
use Illuminate\Http\Request;

class TestDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['test_details'] = TestDetail::where('user_id', auth()->user()->id)->paginate(1000);

        if(auth()->user()->level == 'guru') {
            $tests = Test::where('guru_id', auth()->user()->id)->get();
            $test_ids = $tests->pluck('id')->toArray();

            $data['test_details'] = TestDetail::whereIn('test_id', $test_ids)->paginate(1000);
        }

        if(auth()->user()->level == 'siswa') {
            $data['test_details'] = TestDetail::where('user_id', auth()->user()->id)->paginate(1000);
        }

        // kalo ngeliatnya dari test
        if(request()->test_id) {
            $data['test_details'] = TestDetail::where('test_id', request()->test_id)->paginate(1000);
        }

        return view('test_detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test_detail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $test = Test::findOrFail($request->test_id);

        $this->validate($request, [
            'test_id'        => "required|exists:kuiss,id",
            'user_id'        => "required|in:" . auth()->user()->id . "|exists:users,id",
            'test_detail_id' => 'required|exists:kuis_details,id',
        ]);

        // total soal yang harus dikerjakan
        $total_soal = count($test->soal_ids);

        // tambah column dan value benar, salah
        $list_tests = $request->list_tests;

        // cari soal yang tidak dijawab dan buang
        foreach ($list_tests as $index => $list_test) {
            // kalo soalnya gak dijawab maka lanjutkan ke soal berikutnya dan buang soal yang gak dijawab
            if(!isset($list_test['jawaban'])) {
                unset($list_tests[$index]);
                $request->request->add(['list_tests' => $list_tests]);

                continue;
            }
        }

        // jika user melakukan test dengan soal pilgan maka atur benar, salah, dll..
        if (in_array($test->mode, ['Pilgan Normal', 'Pilgan Acak'])) {
            $benar = 0;
            $salah = 0;
            foreach ($list_tests as $index => $list_test) {

                $soal = SoalPilgan::findOrFail($list_test['soal_id']);

                // kalo benar maka tambah jumlah benarnya
                if ($soal->jawaban == $list_test['jawaban']) {
                    ++$benar;
                } else {
                    ++$salah;
                }
            }

            // berikan nilai (kita buat float supaya hasilnya bisa berkoma)
            $nilai      = (float) (100 / $total_soal) * $benar;

            // tambahkan ke inputan untuk disimpan ke database
            $request->request->add(['benar' => $benar]);
            $request->request->add(['salah' => $salah]);
            $request->request->add(['nilai' => $nilai]);
        } else { // kalo jenis soalnya Essay Normal atau Essay Acak buat 0, karena koreksinya manual
            $request->request->add(['benar' => 0]);
            $request->request->add(['salah' => 0]);
            $request->request->add(['nilai' => 0]);
        }

        // set tidak dijawab
        $tidak_dijawab = count($test->soal_ids) - count($list_tests);
        $request->request->add(['tidak_dijawab' => $tidak_dijawab]);

        // set status
        $status = $total_soal == count($request->list_tests) ? "Selesai" : "Belum Selesai";
        $request->request->add(['status' => $status]);
        // dd($request->except(['currentQuestionNumber', 'totalOfQuestion', 'markedQuestions', 'test_detail_id']));

        TestDetail::findOrFail($request->test_detail_id)->update($request->except(['currentQuestionNumber', 'totalOfQuestion', 'markedQuestions', 'test_detail_id']));

        return redirect()->route('test_detail.index')->with('success', 'Berhasil menambah kuis detail');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\TestDetail $test_detail
     *
     * @return \Illuminate\Http\Response
     */
    public function show(TestDetail $test_detail)
    {
        if(!count($test_detail->list_tests)) {
            return back()->with('error', 'Tidak ada data / Siswa belum mengisi jawaban!');
        }
        $data['test_detail'] = $test_detail;

        return view('test_detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TestDetail $test_detail
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(TestDetail $test_detail)
    {
        $data['test_detail'] = $test_detail;

        return view('test_detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TestDetail          $test_detail
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestDetail $test_detail)
    {
        return redirect()->route('test_detail.index')->with('success', 'Berhasil mengupdate kuis Detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TestDetail $test_detail
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestDetail $test_detail)
    {
        $test_detail->delete();

        return redirect()->route('test_detail.index')->with('success', 'Berhasil menghapus Kuis Detail');
    }

    public function timer(TestDetail $test_detail)
    {
        if($test_detail->sisa_waktu <= 0) {
            echo 0;

            exit;
        }

        $test_detail->decrement('sisa_waktu', 1);

        echo $test_detail->sisa_waktu;
    }

    public function batalkan(TestDetail $test_detail)
    {
        $test_detail->update([
            "status" => 'Dibatalkan'
        ]);

        return back()->with('success', "Berhasil membatalkan kuis untuk user id " . auth()->user()->id);
    }
}
