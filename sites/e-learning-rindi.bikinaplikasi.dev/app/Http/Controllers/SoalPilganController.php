<?php

namespace App\Http\Controllers;

use PHPExcel;
use App\Mapel;
use App\SoalPilgan;
use App\MapelDetail;
use PHPExcel_IOFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SoalPilganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['soal_pilgans'] = SoalPilgan::paginate(1000);

        if(auth()->user()->level == 'guru') {
            $mapel_details = MapelDetail::where('user_id', auth()->user()->id)->get();
            $mapel_detail_mapel_ids = $mapel_details->pluck('mapel_id')->toArray();

            $data['soal_pilgans'] = SoalPilgan::whereIn('mapel_id', $mapel_detail_mapel_ids)->paginate(1000);
        }

        return view('soal_pilgan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['mapels'] = Mapel::all();

        if(auth()->user()->level == 'guru') {
            $mapel_details = MapelDetail::where('user_id', auth()->user()->id)->get();
            $mapel_ids = $mapel_details->pluck('mapel_id')->toArray();

            $data['mapels'] = Mapel::whereIn('id', $mapel_ids)->paginate(1000);
        }

        return view('soal_pilgan.create', $data);
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

        $this->validate($request, [
            'mapel_id' => 'required|exists:mapels,id',
            'jenis'    => 'required|in:Latihan,Ujian',
            'soal'     => 'required|min:3|unique:soal_pilgans,soal',
            'opsi_a'   => 'required',
            'opsi_b'   => 'required',
            'opsi_c'   => '',
            'opsi_d'   => '',
            'jawaban'  => 'required',
        ]);

        SoalPilgan::create($request->all());

        return redirect()->route('soal_pilgan.index')->with('success', 'Berhasil menambah soal pilgan');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SoalPilgan $soal_pilgan
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SoalPilgan $soal_pilgan)
    {
        $data['soal_pilgan'] = $soal_pilgan;

        return view('soal_pilgan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SoalPilgan $soal_pilgan
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SoalPilgan $soal_pilgan)
    {
        $data['soal_pilgan'] = $soal_pilgan;
        $data['mapels']      = Mapel::all();

        if(auth()->user()->level == 'guru') {
            $mapel_details = MapelDetail::where('user_id', auth()->user()->id)->get();
            $mapel_ids = $mapel_details->pluck('mapel_id')->toArray();

            $data['mapels'] = Mapel::whereIn('id', $mapel_ids)->paginate(1000);
        }

        return view('soal_pilgan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SoalPilgan          $soal_pilgan
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoalPilgan $soal_pilgan)
    {
        $this->validate($request, [
            'mapel_id' => 'required|exists:mapels,id',
            'jenis'    => 'required|in:Latihan,Ujian',
            'soal'     => "required|min:3",
            'opsi_a'   => 'required',
            'opsi_b'   => 'required',
            'opsi_c'   => '',
            'opsi_d'   => '',
            'jawaban'  => 'required',
        ]);

        $soal_pilgan->update($request->all());

        return redirect()->route('soal_pilgan.index')->with('success', 'Berhasil mengupdate Soal Pilgan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SoalPilgan $soal_pilgan
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoalPilgan $soal_pilgan)
    {
        $soal_pilgan->delete();

        return redirect()->route('soal_pilgan.index')->with('success', 'Berhasil menghapus pilgan');
    }

    public function hapus_semua(Request $request)
    {
        $soal_pilgans = SoalPilgan::whereIn('id', json_decode($request->ids, true))->get();

        SoalPilgan::whereIn('id', $soal_pilgans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data soal pilgan');
    }

    public function import()
    {

        return view('soal_pilgan.import');
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
            $data['input'][$row - 2]['opsi_a']   = (string) $worksheet->getCell("D{$row}")->getValue();
            $data['input'][$row - 2]['opsi_b']   = (string) $worksheet->getCell("E{$row}")->getValue();
            $data['input'][$row - 2]['opsi_c']   = (string) $worksheet->getCell("F{$row}")->getValue();
            $data['input'][$row - 2]['opsi_d']   = (string) $worksheet->getCell("G{$row}")->getValue();
            $data['input'][$row - 2]['jawaban']  = (string) $worksheet->getCell("H{$row}")->getValue();
        }

        $validator = Validator::make($data['input'], [
            '*.mapel_id' => 'required|exists:mapels,id',
            '*.soal'     => 'required|min:3',
            '*.jenis'    => 'required|in:Latihan,Ujian',
            '*.opsi_a'   => 'required',
            '*.opsi_b'   => 'required',
            '*.opsi_c'   => '',
            '*.opsi_d'   => '',
        ]);

        // Now check validation:
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // cek jika kosong
        if (count($data['input']) == 0) {
            return back()->with('error', 'Tidak ada data yang perlu diimport');
        }

        SoalPilgan::insert($data['input']);

        return redirect()->route('soal_pilgan.index')->with('success', 'Berhasil menginport soal pilgan');
    }

    public function download_format()
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new PHPExcel();

        // todo: mengambil isi header dari tabel soal_pilgan
        $soalEssayTable = ['mapel_id', 'soal', 'jenis', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'jawaban'];

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($soalEssayTable as $header => $soalEssayHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $soalEssayHeader);
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
        header('Content-Disposition: attachment;filename=download_format_soal_pilgan.xlsx');

        // todo: lakukan penulisan ke file excel
        $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function export()
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new PHPExcel();

        // todo: mengambil isi header dari tabel soal essay
        $soalPilganTable = DB::select(DB::raw('select mapel_id, soal, jenis, opsi_a, opsi_b, opsi_c, opsi_d, jawaban from soal_pilgans limit 1'))[0];

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($soalPilganTable as $header => $soalPilganHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $header);
        endforeach;

        // todo: untuk mengisi data kelas ke sheet kelas
        $soalPilgans = SoalPilgan::all();

        $column = "A";
        $row    = 2;
        foreach ($soalPilgans as $soalPilgan):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalPilgan->mapel_id);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalPilgan->soal);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalPilgan->jenis);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalPilgan->opsi_a);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalPilgan->opsi_b);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalPilgan->opsi_c);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalPilgan->opsi_d);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $soalPilgan->jawaban);

            $row++;
            $column = 'A';
        endforeach;

        // aktifkan sheet pertama
        $PHPExcel->setActiveSheetIndex(0);

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=export_soal_pilgan.xlsx');

        // todo: lakukan penulisan ke file excel
        $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}
