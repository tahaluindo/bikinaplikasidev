<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\TransaksiLainnya;
use App\TransaksiLainnyaDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class TransaksiLainnyaController extends Controller
{
    private $statuss = [
        'Lunas', 'Belum Lunas',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi_lainnyas = TransaksiLainnya::orderBy('id', 'DESC')->paginate(100);

        if (request()->q) {
            $model = new TransaksiLainnya;
            $table = $model->getTable();
            $query = $model->query();

            // dapatkan semua column berdasarkan teble model
            // dilarang mencari berdasarkan id
            // index 0 = id
            $columns = Arr::except(Schema::getColumnListing($table), [0]);

            // buat querynya berdasarkan kata yang diinputkan disemua column
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . request()->q . '%');
            }

            // ambil datanya sebanyak 100 data
            $transaksi_lainnyas = $query->limit(100)->orderBy('id', 'DESC')->get();
        }

        return view('transaksi_lainnya.index', compact('transaksi_lainnyas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('transaksi_lainnya.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'  => 'required|min:3|max:30',
            'jenis' => 'required|in:Pengeluaran,Pemasukan',
        ]);

        TransaksiLainnya::create($request->all());

        return redirect()->route('transaksi_lainnya.index')->with('success', 'Berhasil menambah transaksi lainnya');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiLainnya  $transaksiLainnya
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiLainnya $transaksiLainnya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiLainnya  $transaksiLainnya
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiLainnya $transaksiLainnya)
    {

        return view('transaksi_lainnya.edit', compact('transaksiLainnya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiLainnya  $transaksiLainnya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiLainnya $transaksiLainnya)
    {
        $this->validate($request, [
            'nama'  => 'required|min:3|max:30',
            'jenis' => 'required|in:Pengeluaran,Pemasukan',
        ]);

        $transaksiLainnya->update($request->all());

        return redirect()->route('transaksi_lainnya.index')->with('success', 'Berhasil mengupdate transaksi lainnya');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiLainnya  $transaksiLainnya
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiLainnya $transaksiLainnya)
    {
        $transaksiLainnya->delete();

        return redirect()->route('transaksi_lainnya.index')->with('success', 'Berhasil menghapus transaksi lainnya');
    }

    public function hapus_semua(Request $request)
    {
        $transaksi_lainnyas = TransaksiLainnya::whereIn('id', json_decode($request->ids, true))->get();

        TransaksiLainnya::whereIn('id', $transaksi_lainnyas->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data transaksiLainnya');
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file_excel' => 'required|mimes:xlsx,xls',
        ]);

        $file_excel  = $request->file_excel->getPathName();
        $worksheet   = \PHPExcel_IOFactory::createReaderForFile($file_excel)->load($file_excel)->getSheet(0);
        $excelReader = $worksheet->getHighestRow();

        // ambil nilai dari file excel dan simpan ke dalam variable
        $transaksi_lainnya_details = [];
        for ($row = 2; $row <= $excelReader; $row++) {
            $transaksi_lainnya_details[$row - 2]['transaksi_lainnya_id'] = (string) $worksheet->getCell("A{$row}")->getValue();
            $transaksi_lainnya_details[$row - 2]['nominal_dibayar']      = (string) $worksheet->getCell("B{$row}")->getValue();
            $transaksi_lainnya_details[$row - 2]['status']               = (string) $worksheet->getCell("C{$row}")->getValue();
            $transaksi_lainnya_details[$row - 2]['tanggal_bayar']        = (string) $worksheet->getCell("D{$row}")->getValue();
            $transaksi_lainnya_details[$row - 2]['catatan']              = (string) $worksheet->getCell("E{$row}")->getValue();
        }
        // todo: untuk mengisi data transaksi_lainnya_detail ke sheet transaksi_lainnya_detail, buang nama yg null / nama yg kosong (gk diinput / dihapus)
        $transaksi_lainnya_details = Arr::where($transaksi_lainnya_details, function ($transaksi_lainnya_detail) {

            return $transaksi_lainnya_detail['transaksi_lainnya_id'] != null || $transaksi_lainnya_detail['transaksi_lainnya_id'] != "";
        });

        $validator = \Validator::make($transaksi_lainnya_details, [
            '*.transaksi_lainnya_id' => 'required|exists:transaksi_lainnyas,id',
            '*.nominal_dibayar'      => 'required|integer|max:8000000',
            '*.status'               => 'required|in:' . implode(',', $this->statuss),
            '*.tanggal_bayar'        => 'required|date'
        ]);

        // Cek validasinya
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // cek jika kosong
        if (count($transaksi_lainnya_details) == 0) {
            return back()->with('error', 'Tidak ada data yang perlu diimport');
        }

        TransaksiLainnyaDetail::insert($transaksi_lainnya_details);

        return redirect()->route('transaksi_lainnya.index')->with('success', 'Berhasil mengimport transaksi_lainnya_detail');
    }

    public function download_format_import_excel()
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();

        // todo: mengambil isi header dari tabel transaksi_lainnya_detail
        $model                       = new TransaksiLainnyaDetail();
        $query                       = $model->query();
        $transaksiLainnyaDetailTable = Arr::except(\Schema::getColumnListing($model->getTable()), [0, 6, 7]);

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($transaksiLainnyaDetailTable as $header => $transaksiLainnyaDetailHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $transaksiLainnyaDetailHeader);
        endforeach;

        // todo: mengambil isi header dari tabel transaksi lainnya
        $model                 = new TransaksiLainnya();
        $transaksiLainnyaTable = \Schema::getColumnListing($model->getTable());

        // todo: untuk menampilkan data transaksi lainnya yang tersedia
        $PHPExcel->createSheet(1)->setTitle('transaksi_lainnya');

        // todo: untuk mengisi header data transaksi_lainnya
        $column = "A";
        foreach ($transaksiLainnyaTable as $header => $transaksi_lainnyaHeader):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . 1, $transaksi_lainnyaHeader);
        endforeach;

        // todo: untuk mengisi data transaksi lainnya
        $transaksi_lainnyas = TransaksiLainnya::orderBy('id', 'DESC')->get();

        $column = "A";
        $row    = 2;
        foreach ($transaksi_lainnyas as $transaksi_lainnya):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $transaksi_lainnya->id);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $transaksi_lainnya->nama);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $transaksi_lainnya->jenis);

            $row++;
            $column = 'A';
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=download_format_import.xlsx");

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function export_excel(Request $request)
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();

        // todo: mengambil isi header dari tabel transaksi_lainnya_detail
        $model                       = new TransaksiLainnyaDetail();
        $query                       = $model->query();
        $transaksiLainnyaDetailTable = Arr::except(\Schema::getColumnListing($model->getTable()), [0, 6, 7]);

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($transaksiLainnyaDetailTable as $header => $transaksiLainnyaDetailHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $transaksiLainnyaDetailHeader);
        endforeach;

        // todo: untuk mengisi data transaksiLainnyaDetail ke sheet transaksiLainnyaDetail
        $filters = Arr::where($request->except(['_token', 'limit']), function ($value) {

            // kalo cuman ada 1 dan tidak ada yg difilter
            return !(count($value) == 1 && is_null($value[0]));

        });

        foreach ($filters as $key => $filter) {
            if ($key == 'transaksi_lainnya_ids') {

                $query->whereIn('transaksi_lainnya_id', $filter);

                continue;
            }

            if ($key == 'status') {

                $query->whereIn('status', $filter);

                continue;
            }
        }
        // ambil data transaksi_lainnya_details sebanyak limit yang telah ditentukan dan jangan ikutkan admin juga
        $transaksi_lainnya_details = $query->limit($request->limit)->get();

        // kalo datanya gak ada langsung balikin, gak perlu download
        if (!$transaksi_lainnya_details->count()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }

        // isi ke excel
        $column = "A";
        $row    = 2;
        foreach ($transaksi_lainnya_details as $transaksi_lainnya_detail):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $transaksi_lainnya_detail->transaksi_lainnya_id);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $transaksi_lainnya_detail->nominal_dibayar);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $transaksi_lainnya_detail->status);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $transaksi_lainnya_detail->tanggal_bayar);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $transaksi_lainnya_detail->catatan);

            $row++;
            $column = 'A';
        endforeach;

        // todo: mengambil isi header dari tabel transaksi lainnya
        $model                 = new TransaksiLainnya();
        $transaksiLainnyaTable = \Schema::getColumnListing($model->getTable());

        // todo: untuk menampilkan data transaksi lainnya yang tersedia
        $PHPExcel->createSheet(1)->setTitle('transaksi_lainnya');

        // todo: untuk mengisi header data transaksi_lainnya
        $column = "A";
        foreach ($transaksiLainnyaTable as $header => $transaksi_lainnyaHeader):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . 1, $transaksi_lainnyaHeader);
        endforeach;

        // todo: untuk mengisi data transaksi lainnya
        $transaksi_lainnyas = TransaksiLainnya::orderBy('id', 'DESC')->get();

        $column = "A";
        $row    = 2;
        foreach ($transaksi_lainnyas as $transaksi_lainnya):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $transaksi_lainnya->id);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $transaksi_lainnya->nama);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $transaksi_lainnya->jenis);

            $row++;
            $column = 'A';
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=export_user.xlsx");

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function import_or_export()
    {
        $transaksi_lainnyas = TransaksiLainnya::distinct()->orderBy('id', 'DESC')->get();
        $statuss            = $this->statuss;

        return view('transaksi_lainnya.import_or_export', compact('transaksi_lainnyas', 'statuss'));
    }
}
