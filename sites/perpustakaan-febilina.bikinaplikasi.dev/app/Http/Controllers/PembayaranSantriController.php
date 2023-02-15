<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\PembayaranSantri;
use App\PembayaranSantriBulan;
use App\PembayaranSantriDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class PembayaranSantriController extends Controller
{
    private $pembayaran_santri_bulans = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
    ];

    private $statuss = [
        'Lunas', 'Belum Lunas', 'Bebas SPP', 'Bebas Makan', 'Santri Baru', 'Santri Keluar', 'Bebas SPP dan Uang Makan'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran_santris = PembayaranSantri::orderBy('id', 'DESC')->paginate(100);

        if (request()->q) {

            $model = new PembayaranSantri;
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
            $pembayaran_santris = $query->limit(100)->orderBy('id', 'DESC')->get();
        }

        return view('pembayaran_santri.index', compact('pembayaran_santris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembayaran_santri_bulans = $this->pembayaran_santri_bulans;

        return view('pembayaran_santri.create', compact('pembayaran_santri_bulans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // todo: pastikan bulan yg dipilih ada di dalam bulan yg disediakan
        $pembayaran_santri_bulans = implode(",", $this->pembayaran_santri_bulans);

        // kalo bulannya gak dipilih makan beritahukan bahwa wajib pilih bulan
        if(!$request->pembayaran_santri_bulans) {
            return back()->with('error', 'Bulan wajib dipilih');
        }

        $this->validate($request, [
            'pembayaran_santri_bulans.*' => "required|in:$pembayaran_santri_bulans",
            'tahun'                      => 'required|max:9999',
            'nominal_spp_default'        => 'required|integer|max:8000000',
            'nominal_uang_makan_default' => 'required|integer|max:8000000',
            'keterangan'                 => 'required',
        ]);

        $pembayaran_santri_create = PembayaranSantri::create($request->except('pembayaran_santri_bulans'));

        // todo: masukkan setiap data bulan yg dipilih
        foreach ($request->pembayaran_santri_bulans as $pembayaran_santri_bulan) {

            PembayaranSantriBulan::create([
                'pembayaran_santri_id' => $pembayaran_santri_create->id,
                'nama'                 => $pembayaran_santri_bulan,
            ]);
        }

        return redirect()->route('pembayaran_santri.index')->with('success', 'Berhasil menambah pembayaran santri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PembayaranSantri  $pembayaranSantri
     * @return \Illuminate\Http\Response
     */
    public function show(PembayaranSantri $pembayaranSantri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PembayaranSantri  $pembayaranSantri
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranSantri $pembayaranSantri)
    {
        $data['pembayaran_santri_bulans']          = $this->pembayaran_santri_bulans;
        $data['pembayaran_santri_bulan_selecteds'] = PembayaranSantriBulan::where('pembayaran_santri_id', $pembayaranSantri->id)->orderBy('id', 'DESC')->pluck('nama')->toArray();
        $data['pembayaranSantri']                  = $pembayaranSantri;

        return view('pembayaran_santri.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PembayaranSantri  $pembayaranSantri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembayaranSantri $pembayaranSantri)
    {
        // todo: pastikan bulan yg dipilih ada di dalam bulan yg disediakan
        $pembayaran_santri_bulans = implode(",", $this->pembayaran_santri_bulans);

        // kalo bulannya gak dipilih makan beritahukan bahwa wajib pilih bulan
        if(!$request->pembayaran_santri_bulans) {
            return back()->with('error', 'Bulan wajib dipilih');
        }

        $this->validate($request, [
            'pembayaran_santri_bulans.*' => "required|in:$pembayaran_santri_bulans",
            'tahun'                      => 'required|max:9999',
            'nominal_spp_default'        => 'required|integer|max:8000000',
            'nominal_uang_makan_default' => 'required|integer|max:8000000',
            'keterangan'                 => 'required',
        ]);

        $pembayaranSantri->update($request->except('pembayaran_santri_bulans'));

        // hapus pembayaran_santri_bulan sebelumnya dan buat baru
        PembayaranSantriBulan::where('pembayaran_santri_id', $pembayaranSantri->id)->delete();

        // todo: masukkan setiap data bulan yg dipilih
        foreach ($request->pembayaran_santri_bulans as $pembayaran_santri_bulan) {

            PembayaranSantriBulan::create([
                'pembayaran_santri_id' => $pembayaranSantri->id,
                'nama'                 => $pembayaran_santri_bulan,
            ]);
        }

        return redirect()->route('pembayaran_santri.index')->with('success', 'Berhasil mengupdate pembayaran santri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PembayaranSantri  $pembayaranSantri
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembayaranSantri $pembayaranSantri)
    {
        $pembayaranSantri->delete();

        return redirect()->route('pembayaran_santri.index')->with('success', 'Berhasil menghapus pembayaran santri');
    }

    public function hapus_semua(Request $request)
    {
        $pembayaran_santris = PembayaranSantri::whereIn('id', json_decode($request->ids, true))->get();

        PembayaranSantri::whereIn('id', $pembayaran_santris->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data user');
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
        $pembayaran_santri_details = [];
        for ($row = 2; $row <= $excelReader; $row++) {
            $pembayaran_santri_details[$row - 2]['pembayaran_santri_id']       = (string) $worksheet->getCell("A{$row}")->getValue();
            $pembayaran_santri_details[$row - 2]['user_id']                    = (string) $worksheet->getCell("B{$row}")->getValue();
            $pembayaran_santri_details[$row - 2]['pembayaran_santri_bulan_id'] = (string) $worksheet->getCell("C{$row}")->getValue();
            $pembayaran_santri_details[$row - 2]['nominal_spp_dibayar']        = (string) $worksheet->getCell("D{$row}")->getValue();
            $pembayaran_santri_details[$row - 2]['nominal_uang_makan_dibayar'] = (string) $worksheet->getCell("E{$row}")->getValue();
            $pembayaran_santri_details[$row - 2]['nominal_belum_dibayar']      = (string) $worksheet->getCell("F{$row}")->getValue();
            $pembayaran_santri_details[$row - 2]['status']                     = (string) $worksheet->getCell("G{$row}")->getValue();
            $pembayaran_santri_details[$row - 2]['tanggal_bayar']              = (string) $worksheet->getCell("H{$row}")->getValue();
            $pembayaran_santri_details[$row - 2]['catatan']                    = (string) $worksheet->getCell("I{$row}")->getValue();
        }

        // todo: untuk mengisi data user ke sheet user, buang pembayaran_santri_id yg null / pembayaran_santri_id yg kosong (gk diinput / dihapus)
        $pembayaran_santri_details = Arr::where($pembayaran_santri_details, function ($pembayaran_santri_detail) {

            return $pembayaran_santri_detail['pembayaran_santri_id'] != null || $pembayaran_santri_detail['pembayaran_santri_id'] != "";
        });

        $validator = \Validator::make($pembayaran_santri_details, [
            '*.pembayaran_santri_id'       => 'required|exists:pembayaran_santris,id',
            '*.user_id'                    => 'required|exists:users,id',
            '*.pembayaran_santri_bulan_id' => 'required|exists:pembayaran_santri_bulans,id',
            '*.nominal_spp_dibayar'        => 'required|integer|max:8000000',
            '*.nominal_uang_makan_dibayar' => 'required|integer|max:8000000',
            '*.nominal_belum_dibayar'      => 'required|integer|max:8000000',
            '*.status'                     => 'required|in:' . implode(',', $this->statuss),
            '*.tanggal_bayar'              => 'required|date',
        ]);

        // Cek validasinya
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // cek jika kosong
        if (count($pembayaran_santri_details) == 0) {
            return back()->with('error', 'Tidak ada data yang perlu diimport');
        }

        PembayaranSantriDetail::insert($pembayaran_santri_details);

        return redirect()->route('pembayaran_santri.index')->with('success', 'Berhasil mengimport Pembayaran Santri');
    }

    public function download_format_import_excel()
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();

        // todo: mengambil isi header dari tabel pembayaran_santri_details
        $model                       = new PembayaranSantriDetail();
        $pembayaranSantriDetailTable = Arr::except(\Schema::getColumnListing($model->getTable()), [0, 10, 11]);

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($pembayaranSantriDetailTable as $header => $pembayaranSantriDetailHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $pembayaranSantriDetailHeader);
        endforeach;

        // todo: mengambil isi header dari tabel pembayaran santri
        $model                 = new PembayaranSantri();
        $pembayaranSantriTable = \Schema::getColumnListing($model->getTable());

        // todo: untuk menampilkan data pembayaran santri yang tersedia
        $PHPExcel->createSheet(1)->setTitle('pembayaran_santri');

        // todo: untuk mengisi header data pembayaran_santri
        $column = "A";
        foreach ($pembayaranSantriTable as $header => $pembayaranSantriHeader):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . 1, $pembayaranSantriHeader);
        endforeach;

        // todo: untuk mengisi data kelas ke sheet kelas
        $pembayaran_santris = PembayaranSantri::all();

        $column = "A";
        $row    = 2;
        foreach ($pembayaran_santris as $pembayaran_santri):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $pembayaran_santri->id);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $pembayaran_santri->tahun);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $pembayaran_santri->nominal_spp_default);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $pembayaran_santri->nominal_uang_makan_default);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $pembayaran_santri->keterangan);

            $row++;
            $column = 'A';
        endforeach;

        // todo: mengambil isi header dari tabel user santri
        $model     = new User();
        $userTable = Arr::only(\Schema::getColumnListing($model->getTable()), [0, 1, 2, 3]);

        // todo: untuk menampilkan data user santri yang tersedia
        $PHPExcel->createSheet(2)->setTitle('user');

        // todo: untuk mengisi header data user
        $column = "A";
        foreach ($userTable as $header => $userHeader):
            $PHPExcel->setActiveSheetIndex(2)->setCellValue($column++ . 1, $userHeader);
        endforeach;

        // todo: untuk mengisi data kelas ke sheet kelas
        $users = User::where('level', '!=', 'admin')->get();

        $column = "A";
        $row    = 2;
        foreach ($users as $user):
            $PHPExcel->setActiveSheetIndex(2)->setCellValue($column++ . $row, $user->id);
            $PHPExcel->setActiveSheetIndex(2)->setCellValue($column++ . $row, $user->kelas_id);
            $PHPExcel->setActiveSheetIndex(2)->setCellValue($column++ . $row, $user->nama);
            $PHPExcel->setActiveSheetIndex(2)->setCellValue($column++ . $row, $user->email);

            $row++;
            $column = 'A';
        endforeach;

        // todo: mengambil isi header dari tabel pembayaran santri
        $model                      = new PembayaranSantriBulan();
        $pembayaranSantriBulanTable = \Schema::getColumnListing($model->getTable());

        // todo: untuk menampilkan data pembayaran santri yang tersedia
        $PHPExcel->createSheet(3)->setTitle('pembayaran_santri_bulans');

        // todo: untuk mengisi header data pembayaran_santri
        $column = "A";
        foreach ($pembayaranSantriBulanTable as $header => $pembayaranSantriBulanHeader):
            $PHPExcel->setActiveSheetIndex(3)->setCellValue($column++ . 1, $pembayaranSantriBulanHeader);
        endforeach;
        // todo: untuk mengisi data kelas ke sheet kelas
        $pembayaran_santri_bulans = PembayaranSantriBulan::all();

        $column = "A";
        $row    = 2;
        foreach ($pembayaran_santri_bulans as $pembayaran_santri_bulan):
            $PHPExcel->setActiveSheetIndex(3)->setCellValue($column++ . $row, $pembayaran_santri_bulan->id);
            $PHPExcel->setActiveSheetIndex(3)->setCellValue($column++ . $row, $pembayaran_santri_bulan->pembayaran_santri_id);
            $PHPExcel->setActiveSheetIndex(3)->setCellValue($column++ . $row, $pembayaran_santri_bulan->nama);

            $row++;
            $column = 'A';
        endforeach;

        // todo: mengambil isi header dari tabel pembayaran santri
        $model      = new Kelas();
        $kelasTable = \Schema::getColumnListing($model->getTable());

        // todo: untuk menampilkan data pembayaran santri yang tersedia
        $PHPExcel->createSheet(4)->setTitle('kelass');

        // todo: untuk mengisi header data pembayaran_santri
        $column = "A";
        foreach ($kelasTable as $header => $kelasHeader):
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . 1, $kelasHeader);
        endforeach;
        // todo: untuk mengisi data kelas ke sheet kelas
        $kelass = Kelas::all();

        $column = "A";
        $row    = 2;
        foreach ($kelass as $kelas):
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $kelas->id);
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $kelas->nama);

            $row++;
            $column = 'A';
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=download_format_import_pembayaran_santri.xlsx');

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function export_excel(Request $request)
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();

        // todo: mengambil isi header dari tabel users, cuman column kelas_id,nama,email
        $model                       = new PembayaranSantriDetail();
        $query                       = $model->query();
        $pembayaranSantriDetailTable = Arr::except(\Schema::getColumnListing($model->getTable()), [0, 10, 11]);

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($pembayaranSantriDetailTable as $header => $pembayaranSantriDetailHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $pembayaranSantriDetailHeader);
        endforeach;

        // todo: untuk mengisi data user ke sheet user
        $filters = Arr::where($request->except(['_token', 'limit']), function ($key) {
            // kalo seandainya user tidak mencentang SEMUA
            if ($key[0]) {
                return true;
            }

            // hanya ambil filter yg lebih dari 1, kalo seandainya user juga mencentang SEMUA
            return count($key) > 1 && $key[0] === null;
        });

        foreach ($filters as $key => $filter) {

            // khussus filter untuk pembayaran santri bulan
            if ($key == "pembayaran_santri_bulans") {
                $pembayaran_santri_bulan_ids = PembayaranSantriBulan::whereIn('nama', $request->pembayaran_santri_bulans)
                    ->pluck('id')->toArray();

                $query->whereIn("pembayaran_santri_bulan_id", $pembayaran_santri_bulan_ids);

                continue;
            }

            // khussus filter untuk tahun
            if ($key == "tahuns") {
                $tahuns = PembayaranSantri::whereIn('tahun', $request->tahuns)
                    ->pluck('id')->toArray();

                $query->whereIn("pembayaran_santri_id", $tahuns);

                continue;
            }

            // khusus filter untuk user berdasarkan kelas
            if ($key == "kelas_ids") {
                $user_ids = User::whereIn('kelas_id', $request->kelas_ids)
                    ->pluck('id')->toArray();

                $query->whereIn("user_id", $user_ids);

                continue;
            }

            // khusus filter status
            if ($key == "statuss") {
                $query->whereIn("status", $request->statuss);

                continue;
            }

            // selebihnya filter hanya berdasarkan key dan value aj
            $query->where($key, $filter);
        }

        // ambil data users sebanyak limit yang telah ditentukan dan jangan ikutkan admin juga
        $pembayaran_santri_details = $query->limit($request->limit)->get();

        // kalo datanya gak ada langsung balikin, gak perlu download
        if (!$pembayaran_santri_details->count()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }

        // isi ke excel
        $column = "A";
        $row    = 2;
        foreach ($pembayaran_santri_details as $pembayaran_santri_detail):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->pembayaran_santri_id);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->user_id);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->pembayaran_santri_bulan_id);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_spp_dibayar);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_uang_makan_dibayar);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_belum_dibayar);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->status);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->tanggal_bayar);
            // $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $pembayaran_santri_detail->catatan);

            $row++;
            $column = 'A';
        endforeach;

        // buat lagi sheet untuk informasi relasinya
        // todo: untuk menampilkan data pembayaran_santri yang tersedia
        $PHPExcel->createSheet(1)->setTitle('pembayaran_santri');

        // todo: khusus pembayaran santri
        $model                 = new PembayaranSantri();
        $pembayaranSantriTable = \Schema::getColumnListing($model->getTable());

        // todo: untuk mengisi header data pembayaran santri
        $column = "A";
        foreach ($pembayaranSantriTable as $header => $pembayaranSantriHeader):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . 1, $pembayaranSantriHeader);
        endforeach;

        // todo: untuk mengisi data tahun ke sheet tahun
        $pembayaran_santris = PembayaranSantri::get();

        if ($request->tahuns) {
            $pembayaran_santris = PembayaranSantri::whereIn('tahun', $request->tahuns)->get();
        }

        $column = "A";
        $row    = 2;
        foreach ($pembayaran_santris as $pembayaran_santri):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $pembayaran_santri->id);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $pembayaran_santri->tahun);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $pembayaran_santri->nominal_spp_default);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $pembayaran_santri->nominal_uang_makan_default);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $pembayaran_santri->keterangan);

            $row++;
            $column = 'A';
        endforeach;

        // todo: untuk menampilkan data users yang tersedia
        $PHPExcel->createSheet(1)->setTitle('users');

        // todo: khusus pembayaran santri
        $model     = new User();
        $userTable = Arr::only(\Schema::getColumnListing($model->getTable()), [0, 1, 2, 3]);

        // todo: untuk mengisi header data pembayaran santri
        $column = "A";
        foreach ($userTable as $header => $userHeader):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . 1, $userHeader);
        endforeach;

        // todo: untuk mengisi data user ke sheet user
        $users = User::where('level', '=', 'siswa')->get();

        $column = "A";
        $row    = 2;
        foreach ($users as $user):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $user->id);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $user->kelas_id);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $user->nama);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $user->email);

            $row++;
            $column = 'A';
        endforeach;

        // todo: untuk menampilkan data bulans yang tersedia
        $PHPExcel->createSheet(2)->setTitle('bulans');

        // todo: khusus bulan
        $model      = new PembayaranSantriBulan();
        $bulanTable = \Schema::getColumnListing($model->getTable());

        // todo: untuk mengisi header data bulan
        $column = "A";
        foreach ($bulanTable as $header => $bulanHeader):
            $PHPExcel->setActiveSheetIndex(2)->setCellValue($column++ . 1, $bulanHeader);
        endforeach;

        // todo: untuk mengisi data pembayaran santri
        $pembayaran_santri_bulans = PembayaranSantriBulan::get();
        if ($request->pembayaran_santri_bulans) {
            $pembayaran_santri_ids = $pembayaran_santris->whereIn('tahun', $request->tahuns)->pluck('id');

            $pembayaran_santri_bulans = PembayaranSantriBulan::whereIn('pembayaran_santri_id', $pembayaran_santri_ids)->get();
        }

        $column = "A";
        $row    = 2;
        foreach ($pembayaran_santri_bulans as $pembayaran_santri_bulan):
            $PHPExcel->setActiveSheetIndex(2)->setCellValue($column++ . $row, $pembayaran_santri_bulan->id);
            $PHPExcel->setActiveSheetIndex(2)->setCellValue($column++ . $row, $pembayaran_santri_bulan->pembayaran_santri_id);
            $PHPExcel->setActiveSheetIndex(2)->setCellValue($column++ . $row, $pembayaran_santri_bulan->nama);

            $row++;
            $column = 'A';
        endforeach;

        // todo: untuk menampilkan data kelass yang tersedia
        $PHPExcel->createSheet(3)->setTitle('kelas');

        // todo: khusus pembayaran santri
        $model      = new Kelas();
        $kelasTable = \Schema::getColumnListing($model->getTable());

        // todo: untuk mengisi header data pembayaran santri
        $column = "A";
        foreach ($kelasTable as $header => $kelasHeader):
            $PHPExcel->setActiveSheetIndex(3)->setCellValue($column++ . 1, $kelasHeader);
        endforeach;

        // todo: untuk mengisi data kelas ke sheet kelas
        $kelass = Kelas::get();

        if ($request->kelas_ids) {
            $kelass = Kelas::whereIn('id', $request->kelas_ids)->get();
        }

        $column = "A";
        $row    = 2;
        foreach ($kelass as $kelas):
            $PHPExcel->setActiveSheetIndex(3)->setCellValue($column++ . $row, $kelas->id);
            $PHPExcel->setActiveSheetIndex(3)->setCellValue($column++ . $row, $kelas->nama);

            $row++;
            $column = 'A';
        endforeach;
        // todo: untuk menampilkan data sebenarnya (tanpa relasi)
        $PHPExcel->createSheet(4)->setTitle('tanpa relasi');

        // todo: khusus pembayaran santri
        $model                    = new PembayaranSantriDetail();
        $pembayaranSantriTable    = Arr::except(\Schema::getColumnListing($model->getTable()), [0, 10, 11]);
        $pembayaranSantriTable[1] = 'tahun';
        $pembayaranSantriTable[2] = 'user';
        $pembayaranSantriTable[3] = 'kelas';
        $pembayaranSantriTable[4] = 'bulan';

        // todo: untuk mengisi header data pembayaran santri
        $column = "A";
        foreach ($pembayaranSantriTable as $header => $pembayaranSantriHeader):
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . 1, $pembayaranSantriHeader);
        endforeach;

        // isi ke excel
        $column = "A";
        $row    = 2;
        foreach ($pembayaran_santri_details as $pembayaran_santri_detail):
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $pembayaran_santri_detail->pembayaran_santri->tahun);
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $pembayaran_santri_detail->user->nama);
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $pembayaran_santri_detail->user->kelas->nama);
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $pembayaran_santri_detail->pembayaran_santri_bulan->nama);
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_spp_dibayar);
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_uang_makan_dibayar);
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $pembayaran_santri_detail->nominal_belum_dibayar);
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $pembayaran_santri_detail->status);
            $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $pembayaran_santri_detail->tanggal_bayar);
            // $PHPExcel->setActiveSheetIndex(4)->setCellValue($column++ . $row, $pembayaran_santri_detail->catatan);

            $row++;
            $column = 'A';
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=export_pembayaran_santri_detail.xlsx");

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function import_or_export()
    {
        $kelass = Kelas::all();
        $tahuns = PembayaranSantri::distinct()->pluck('tahun');
        // dd($tahuns);
        $pembayaran_santri_bulans = $this->pembayaran_santri_bulans;
        $statuss                  = $this->statuss;

        return view('pembayaran_santri.import_or_export', compact(
            'kelass',
            'pembayaran_santri_bulans',
            'tahuns',
            'statuss'
        ));
    }
}
