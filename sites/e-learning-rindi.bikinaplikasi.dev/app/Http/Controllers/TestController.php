<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\MapelDetail;
use App\SoalEssay;
use App\SoalPilgan;
use App\Test;
use App\TestDetail;
use Illuminate\Http\Request;

class TestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // die(date('Y-m-d h:i:s'));
        //
        $data['tests'] = Test::paginate(1000);

        if (auth()->user()->level == 'guru') {

            $data['tests'] = Test::where('guru_id', auth()->user()->id)->paginate(1000);
        }

        if (auth()->user()->level == "siswa") {
            $mapel_details    = MapelDetail::where('kelas_id', auth()->user()->kelas_id)->get();
            $mapel_detail_ids = $mapel_details->pluck('id')->toArray();

            $model = new Test();
            $table = $model->getTable();
            $query = $model->query();
            foreach ($mapel_detail_ids as $mapel_detail_id) {

                $query->orWhere('mapel_detail_ids', 'like', "%$mapel_detail_id%");
            }

            $data['tests'] = $query->paginate(1000);
        }

        return view('test.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get()->unique('mapel_id');
        
        if (!$data['mapel_details']->count()) {
            return back()->with('error', 'Tidak ada mata pelajaran dan kelas!');
        }
        
        // filter yang udah ada soalnya aja, atau minimal ada salah satu dari pilgan atau essay
        $data['mapel_details'] = $data['mapel_details']->filter(function($item) {

            if(SoalPilgan::where('mapel_id', $item->mapel_id)->first() && 
            SoalEssay::where('mapel_id', $item->mapel_id)->first()) {

                return true;
            }
        });
        
        if (!$data['mapel_details']->count()) {
            return back()->with('error', 'Tidak ada mata pelajaran yang memiliki soal!');
        }

        return view('test.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['soal_ids' => json_decode($request->soal_ids), 'guru_id' => auth()->user()->id]);

        // validasi untuk mengubah table untuk validasi ketika user memilih soal essay ataupun soal pilgan
        if (in_array($request->mode, ['Essay Acak', 'Essay Normal'])) {
            $table = 'soal_essays';
        } else {
            $table = 'soal_pilgans';
        }

        $this->validate($request, [
            'mapel_detail_ids.*' => 'required|exists:mapel_details,id',
            'nama'               => 'required|min:3|max:50',
            'jumlah_soal'        => 'required|min:1',
            'jumlah_menit'       => 'required|min:1',
            'jenis_soal'         => 'required|in:Latihan,Ujian',
            'mode'               => 'required|in:Essay Acak,Essay Normal,Pilgan Acak,Pilgan Normal',
            'tanggal_mulai'      => 'required|lte:tanggal_selesai',
            'tanggal_selesai'    => 'required|gte:tanggal_mulai',
        ]);

        // bikin ids nya jika user memilih mode acak
        $mapel_ids = MapelDetail::whereIn('id', $request->mapel_detail_ids)->pluck('mapel_id')->toArray();

        if ($request->mode == 'Pilgan Acak') {
            try {
                $soal_pilgan_ids = SoalPilgan::where('jenis', $request->jenis_soal)->whereIn('mapel_id', $mapel_ids)->pluck('id')->random($request->jumlah_soal);
                $request->request->add(['soal_ids' => $soal_pilgan_ids->toArray()]);

                $this->validate($request, [
                    'soal_ids' => "required|size:$request->jumlah_soal|exists:$table,id",
                ]);
            } catch (\Throwable $th) {
                return back()->with('error', "Soal yang ada didatabase kurang dari $request->jumlah_soal!")->withInput($request->all());
            }
        } elseif ($request->mode == 'Essay Acak') {
            try {
                $soal_essay_ids = SoalEssay::where('jenis', $request->jenis_soal)->whereIn('mapel_id', $mapel_ids)->pluck('id')->random($request->jumlah_soal);
                $request->request->add(['soal_ids' => $soal_essay_ids->toArray()]);

                $this->validate($request, [
                    'soal_ids' => "required|size:$request->jumlah_soal|exists:$table,id",
                ]);
            } catch (\Throwable $th) {
                return back()->with('error', "Soal yang ada didatabase kurang dari $request->jumlah_soal!")->withInput($request->all());
            }
        }

        // lakukan validasi jika user memilih mode normal dan
        if ($request->jumlah_soal != count($request->soal_ids) && in_array($request->mode, ['Essay Normal', 'Pilgan Normal'])) {
            return back()->with('error', "Jumlah soal yang dipilih tidak sama!")->withInput($request->all());
        }

        // todo: setelah divalidasi balikin lagi ke string array soal_idsnya
        $request->request->add(['soal_ids' => json_encode($request->soal_ids)]);

        Test::create($request->all());

        return redirect()->route('test.index')->with("success", "Berhasil menambah kuis");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
        $data['test']  = $test;
        $data['soals'] = [];

        // cek kalo usernya sudah pernah ikut kuis, kalo belum selesai tetap bisa lanjutkan
        // kalo sudah selesai bilang sudah mengikuti kuis ini
        $test_details = $test->test_details->where('user_id', auth()->user()->id);
        $test_detail  = $test_details->first();

        // pilih soal yang akan dikerjakan berdasarkan kuisnya soal pilgan atau essay
        if (in_array($test->mode, ['Pilgan Acak', 'Pilgan Normal'])) {
            $data['soals'] = SoalPilgan::whereIn('id', $test->soal_ids)->get();
        } else {
            $data['soals'] = SoalEssay::whereIn('id', $test->soal_ids)->get();
        }
        
        if (!$test_detail) {
            goto mulai_baru;
        }

        // cek kalo kuisnya udah berakhir
        if ($test->tanggal_selesai < date('Y-m-d h:i:s')) {
            return back()->with('error', "Test telah berakhir!");
        }

        // cek kalo waktunya sudah habis
        if ($test_detail->sisa_waktu <= 0) {
            return back()->with('error', "Waktumu telah habis!");
        }

        if (count($test_details) && $test_detail->status != "Belum Selesai") {
            return back()->with('error', "Kamu sudah mengikuti kuis ini!");
        }

        mulai_baru:
        // langsung isi ke tabel kuis_detail, kalo udah ada g perlu diisi
        $test_detail        = $test->test_details->where('user_id', auth()->user()->id)->first();
        $test_detail_create = TestDetail::firstOrNew([
            'id'            => $test_detail->id ?? 0,
            'test_id'       => $test->id,
            'user_id'       => auth()->user()->id,
            'list_tests'    => "[]",
            'benar'         => 0,
            'salah'         => 0,
            'tidak_dijawab' => 0,
            'nilai'         => 0,
            'status'        => "Belum Selesai",
            'sisa_waktu'    => $test->jumlah_menit,
        ]);

        // buat baru jika tidak ada
        if (!$test_detail) {
            $test_detail_create->save();
            $data['test_detail'] = $test_detail_create;
        } else {
            $data['test_detail'] = $test_detail;
        }

        // oper variable kuis_detail ke view kuis untuk nanti di update
        // dd($data);
        
        return view('test.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
        $data['test']          = $test;
        $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get()->unique('mapel_id');

        if (!$data['mapel_details']->count()) {
            return back()->with('error', 'Tidak ada mata pelajaran dan kelas!');
        }

        return view('test.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
        $request->request->add(['soal_ids' => json_decode($request->soal_ids), 'guru_id' => auth()->user()->id]);

        // validasi untuk mengubah table untuk validasi ketika user memilih soal essay ataupun soal pilgan
        if (in_array($request->mode, ['Essay Acak', 'Essay Normal'])) {
            $table = 'soal_essays';
        } else {
            $table = 'soal_pilgans';
        }

        $this->validate($request, [
            'mapel_detail_ids.*' => 'required|exists:mapel_details,id',
            'nama'               => 'required|min:3|max:50',
            'jumlah_soal'        => 'required|min:1',
            'jumlah_menit'       => 'required|min:1',
            'jenis_soal'         => 'required|in:Latihan,Ujian',
            'mode'               => 'required|in:Essay Acak,Essay Normal,Pilgan Acak,Pilgan Normal',
            'tanggal_mulai'      => 'required|lte:tanggal_selesai',
            'tanggal_selesai'    => 'required|gte:tanggal_mulai',
        ]);

        // bikin ids nya jika user memilih mode acak
        $mapel_ids = MapelDetail::whereIn('id', $request->mapel_detail_ids)->pluck('mapel_id')->toArray();

        if ($request->mode == 'Pilgan Acak') {
            try {
                $soal_pilgan_ids = SoalPilgan::where('jenis', $request->jenis_soal)->whereIn('mapel_id', $mapel_ids)->pluck('id')->random($request->jumlah_soal);
                $request->request->add(['soal_ids' => $soal_pilgan_ids->toArray()]);

                $this->validate($request, [
                    'soal_ids' => "required|size:$request->jumlah_soal|exists:$table,id",
                ]);
            } catch (\Throwable $th) {
                return back()->with('error', "Soal yang ada didatabase kurang dari $request->jumlah_soal!")->withInput($request->all());
            }
        } elseif ($request->mode == 'Essay Acak') {
            try {
                $soal_essay_ids = SoalEssay::where('jenis', $request->jenis_soal)->whereIn('mapel_id', $mapel_ids)->pluck('id')->random($request->jumlah_soal);
                $request->request->add(['soal_ids' => $soal_essay_ids->toArray()]);

                $this->validate($request, [
                    'soal_ids' => "required|size:$request->jumlah_soal|exists:$table,id",
                ]);
            } catch (\Throwable $th) {
                return back()->with('error', "Soal yang ada didatabase kurang dari $request->jumlah_soal!")->withInput($request->all());
            }
        }

        // lakukan validasi jika user memilih mode normal dan
        if ($request->jumlah_soal != count($request->soal_ids) && in_array($request->mode, ['Essay Normal', 'Pilgan Normal'])) {
            return back()->with('error', "Jumlah soal yang dipilih tidak sama!")->withInput($request->all());
        }

        // todo: setelah divalidasi balikin lagi ke string array soal_idsnya
        $request->request->add(['soal_ids' => json_encode($request->soal_ids)]);

        $test->update($request->all());

        return redirect()->route('test.index')->with("success", "Berhasil mengupdate kuis");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
        $test->delete();

        return redirect()->route('test.index')->with("success", "Berhasil menghapus kuis");
    }

    public function hapus_semua(Request $request)
    {
        $tests = Test::whereIn('id', json_decode($request->ids, true))->get();

        Test::whereIn('id', $tests->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data kuis');
    }
}
