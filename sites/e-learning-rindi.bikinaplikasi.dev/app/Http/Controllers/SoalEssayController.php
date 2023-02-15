<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mapel;
use App\MapelDetail;
use App\SoalEssay;
use App\TestDetail;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use PHPExcel;
use PHPExcel_IOFactory;
use Validator;

class SoalEssayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $data['soal_essays'] = SoalEssay::paginate(1000);

        if (auth()->user()->level == 'guru') {
            $mapel_details          = MapelDetail::where('user_id', auth()->user()->id)->get();
            $mapel_detail_mapel_ids = $mapel_details->pluck('mapel_id')->toArray();

            $data['soal_essays'] = SoalEssay::whereIn('mapel_id', $mapel_detail_mapel_ids)->paginate(1000);
        }

        return view('soal_essay.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $data['mapels'] = Mapel::all();

        if (auth()->user()->level == 'guru') {
            $mapel_details = MapelDetail::where('user_id', auth()->user()->id)->get();
            $mapel_ids     = $mapel_details->pluck('mapel_id')->toArray();

            $data['mapels'] = Mapel::whereIn('id', $mapel_ids)->paginate(1000);
        }

        return view('soal_essay.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'mapel_id' => 'required|exists:mapels,id',
            'jenis'    => 'required|in:Latihan,Ujian',
            'bobot.*'  => 'required|numeric',
            'soal.*'   => 'required',
        ]);

        $data = [];
        foreach ($request->bobot as $index => $bobot) {
            $data['input'][$index]['mapel_id'] = $request->mapel_id;
            $data['input'][$index]['jenis']    = $request->jenis;
            $data['input'][$index]['bobot']    = $bobot;
            $data['input'][$index]['soal']     = $request->soal[$index];
        }

        SoalEssay::insert($data['input']);

        return redirect()->route('soal_essay.index')->with("success", "Berhasil menambah soal essay");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoalEssay  $soal_essay
     * @return Response
     */
    public function show(SoalEssay $soal_essay)
    {
        //
        $data['soal_essay'] = $soal_essay;

        return view('soal_essay.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoalEssay  $soal_essay
     * @return Response
     */
    public function edit(SoalEssay $soal_essay)
    {
        //
        $data['soal_essay'] = $soal_essay;
        $data['mapels']     = Mapel::all();

        if (auth()->user()->level == 'guru') {
            $mapel_details = MapelDetail::where('user_id', auth()->user()->id)->get();
            $mapel_ids     = $mapel_details->pluck('mapel_id')->toArray();

            $data['mapels'] = Mapel::whereIn('id', $mapel_ids)->paginate(1000);
        }

        return view('soal_essay.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\SoalEssay  $soal_essay
     * @return Response
     */
    public function update(Request $request, SoalEssay $soal_essay)
    {
        //
        $this->validate($request, [
            'mapel_id' => 'required|exists:mapels,id',
            'jenis'    => 'required|in:Latihan,Ujian',
            'bobot'    => 'required|numeric',
            'soal'     => 'required',
        ]);

        $soal_essay->update($request->all());

        return redirect()->route('soal_essay.index')->with("success", "Berhasil mengupdate soal essay");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SoalEssay $soal_essay
     * @return Response
     * @throws Exception
     */
    public function destroy(SoalEssay $soal_essay)
    {
        $soal_essay->delete();

        return redirect()->route('soal_essay.index')->with('success', 'Berhasil menghapus soal esay');
    }

    public function hapus_semua(Request $request)
    {
        $soal_essays = SoalEssay::whereIn('id', json_decode($request->ids, true))->get();

        SoalEssay::whereIn('id', $soal_essays->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data soal essay');
    }

    public function import()
    {

        return view('soal_essay.import');
    }

    public function importStore(Request $request)
    {
        $this->validate($request, [
            'file_excel' => 'required|mimes:xlsx,xls',
        ]);

        $file_excel  = $request->file_excel->getPathName();
        $excelReader = PHPExcel_IOFactory::createReaderForFile($file_excel)->load($file_excel)->getSheet(0)->getHighestRow();
        $worksheet   = PHPExcel_IOFactory::createReaderForFile($file_excel)->load($file_excel)->getSheet(0);

        $data['input'] = [];
        for ($row = 2; $row <= $excelReader; $row++) {
            $data['input'][$row - 2]['mapel_id'] = (string) $worksheet->getCell("A{$row}")->getValue();
            $data['input'][$row - 2]['soal']     = (string) $worksheet->getCell("B{$row}")->getValue();
            $data['input'][$row - 2]['jenis']    = (string) $worksheet->getCell("C{$row}")->getValue();
            $data['input'][$row - 2]['bobot']    = (string) $worksheet->getCell("D{$row}")->getValue();
        }

        $validator = Validator::make($data['input'], [
            '*.mapel_id' => 'required|exists:mapels,id',
            '*.soal'     => 'required|min:3',
            '*.jenis'    => 'required|in:Latihan,Ujian',
            '*.bobot'    => 'required',
        ]);

        // Now check validation:
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // cek jika kosong
        if (count($data['input']) == 0) {
            return back()->with('error', 'Tidak ada data yang perlu diimport');
        }

        SoalEssay::insert($data['input']);

        return redirect()->route('soal_essay.index')->with('success', 'Berhasil menginport soal essay');
    }

    public function download_format()
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new PHPExcel();

        // todo: mengambil isi header dari tabel soal_essays
        $soalEssayTable = DB::select(DB::raw('select mapel_id, soal, jenis, bobot from soal_essays limit 1'))[0];

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($soalEssayTable as $header => $soalEssayHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $header);
        endforeach;

        // todo: mengambil isi header dari tabel mapel
        $mapeltable = DB::select(DB::raw('select id, nama from mapels limit 1'))[0];

        // todo: untuk menampilkan data mapel yang tersedia
        $PHPExcel->createSheet(1)->setTitle('mapel');

        // todo: untuk mengisi header data mapel
        $column = "A";
        foreach ($mapeltable as $header => $mapelHeader):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . 1, $header);
        endforeach;

        // todo: untuk mengisi data mapel ke sheet mapel
        $mapels = Mapel::all();

        $column = "A";
        $row    = 2;
        foreach ($mapels as $mapel):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $mapel->id);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $mapel->nama);

            $row++;
            $column = 'A';
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=download_format_soal_essay.xlsx');

        // todo: lakukan penulisan ke file excel
        $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function export()
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new PHPExcel();

        // todo: mengambil isi header dari tabel soal essay
        $soalEssayTable = DB::select(DB::raw('select mapel_id, soal, jenis, bobot from soal_essays limit 1'))[0];

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($soalEssayTable as $header => $soalEssayHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $header);
        endforeach;

        // todo: untuk mengisi data kelas ke sheet kelas
        $soalEssays = SoalEssay::all();

        $column = "A";
        $row    = 2;
        foreach ($soalEssays as $soalEssay):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalEssay->mapel_id);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalEssay->soal);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalEssay->jenis);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalEssay->bobot);

            $row++;
            $column = 'A';
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=export_soal_essay.xlsx');

        // todo: lakukan penulisan ke file excel
        $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function koreksi(Request $request)
    {
        
        $test_detail   = TestDetail::findOrFail($request->test_detail_id);
        $test_koreksis = $test_detail->list_tests;

        $benar         = 0;
        $salah         = 0;
        $nilai         = 0;
        foreach ($test_koreksis as $index => $test_koreksi) {
            if (in_array($test_koreksi['soal_id'], $request->koreksi)) {
                $test_koreksis[$index]['koreksi'] = 'Benar';

                $benar++;
                $nilai += SoalEssay::findOrFail($test_koreksi['soal_id'])->bobot;
            } else {
                $test_koreksis[$index]['koreksi'] = 'Salah';
                $salah++;
            }

            // tidak dijawab
            if ($test_koreksi['jawaban'] == "") {
            }
        }

        $test_detail->update([
            'list_tests'    => $test_koreksis,
            'benar'         => $benar,
            'salah'         => $salah,
            'nilai'         => $nilai,
        ]);

        return redirect("test_detail?test_id=$request->test_id")->with('success', 'Berhasil mengoreksi kuis');
    }
}
