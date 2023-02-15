<?php

namespace App\Http\Controllers;

use App\PembayaranInfaq;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class PembayaranInfaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran_infaqs = PembayaranInfaq::limit(100)->get();

        if (request()->q) {
            $model   = new PembayaranInfaq;
            $table   = $model->getTable();
            $query   = $model->query();

            // dapatkan semua column berdasarkan teble model
            // dilarang mencari berdasarkan id
            // index 0 = id
            $columns = Arr::except(Schema::getColumnListing($table), [0]);

            // buat querynya berdasarkan kata yang diinputkan disemua column
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . request()->q . '%');
            }

            // ambil datanya sebanyak 100 data
            $pembayaran_infaqs = $query->limit(100)->get();
        }

        return view('pembayaran_infaq.index', compact(
            'pembayaran_infaqs'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembayaran_infaq.create');
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
            'tahun'   => 'required|integer|max:9999',
            'nominal' => 'required|integer|max:8000000',
        ]);

        PembayaranInfaq::create($request->all());

        return redirect()->route('pembayaran_infaq.index')->with('success', 'Berhasil menambah pembayaran infaq');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PembayaranInfaq  $pembayaranInfaq
     * @return \Illuminate\Http\Response
     */

    public function show(PembayaranInfaq $pembayaranInfaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PembayaranInfaq  $pembayaranInfaq
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranInfaq $pembayaranInfaq)
    {
        return view('pembayaran_infaq.edit', compact(
            'pembayaranInfaq'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PembayaranInfaq  $pembayaranInfaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembayaranInfaq $pembayaranInfaq)
    {

        $this->validate($request, [
            'tahun'   => 'required|integer|max:9999',
            'nominal' => 'required|integer|max:8000000',
        ]);

        $pembayaranInfaq->update($request->all());

        return redirect()->route('pembayaran_infaq.index')->with('success', 'Berhasil mengupdate pembayaran infaq');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PembayaranInfaq  $pembayaranInfaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembayaranInfaq $pembayaranInfaq)
    {
        $pembayaranInfaq->delete();

        return redirect()->route('pembayaran_infaq.index')->with('success', 'Berhasil menghapus pembayaran infaq');
    }

    public function hapus_semua(Request $request)
    {
        $pembayaran_infaqs = PembayaranInfaq::whereIn('id', json_decode($request->ids, true))->get();

        PembayaranInfaq::whereIn('id', $pembayaran_infaqs->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pembayaran infaq');
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
        $users = [];
        for ($row = 2; $row <= $excelReader; $row++) {
            $users[$row - 2]['kelas_id'] = (string) $worksheet->getCell("A{$row}")->getValue();
            $users[$row - 2]['nama']     = (string) $worksheet->getCell("B{$row}")->getValue();
            $users[$row - 2]['email']    = (string) $worksheet->getCell("C{$row}")->getValue();
            $users[$row - 2]['level']    = (string) $worksheet->getCell("D{$row}")->getValue();
        }
        // todo: untuk mengisi data user ke sheet user, buang nama yg null / nama yg kosong (gk diinput / dihapus)
        $users = Arr::where($users, function ($user) {

            return $user['nama'] != null || $user['nama'] != "";
        });

        $validator = \Validator::make($users, [
            '*.kelas_id' => 'required_if:*.level,siswa|exists:kelas,id',
            '*.nama'     => 'required|min:3|max:30',
            '*.email'    => 'required|email|min:5|max:30|unique:users,email|distinct',
            '*.level'    => 'required|in:siswa,admin',
        ]);

        // Cek validasinya
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // cek jika kosong
        if (count($users) == 0) {
            return back()->with('error', 'Tidak ada data yang perlu diimport');
        }

        // filter dan buang data khusus level tertentu
        foreach ($users as $index => $dataInput) {
            if ($dataInput['level'] == "admin") {
                $users[$index]['kelas_id'] = null;

                // hash password untuk disimpan ke database
                $users[$index]['password'] = \Hash::make($users[$index]['password']);
            }

            if ($dataInput['level'] == "siswa") {
                $users[$index]['email'] = null;
            }
        }

        User::insert($users);

        return redirect()->route('user.index')->with('success', 'Berhasil mengimport user');
    }

    public function download_format_import_excel()
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();

        // todo: mengambil isi header dari tabel users, kecuali column 0 = id,7 = created_at, 8 = updated_at,6=remember_token
        $model     = new User();
        $userTable = Arr::only(\Schema::getColumnListing($model->getTable()), [1, 2, 3]);

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($userTable as $header => $userHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $userHeader);
        endforeach;

        // todo: mengambil isi header dari tabel kelas
        $model      = new Kelas();
        $kelastable = \Schema::getColumnListing($model->getTable());

        // todo: untuk menampilkan data kelas yang tersedia
        $PHPExcel->createSheet(1)->setTitle('kelas');

        // todo: untuk mengisi header data kelas
        $column = "A";
        foreach ($kelastable as $header => $kelasHeader):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . 1, $kelasHeader);
        endforeach;

        // todo: untuk mengisi data kelas ke sheet kelas
        $kelass = Kelas::all();

        $column = "A";
        $row    = 2;
        foreach ($kelass as $kelas):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $kelas->id);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $kelas->nama);

            $row++;
            $column = 'A';
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=download_format_import.xlsx');

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function export_excel(Request $request)
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();

        // todo: mengambil isi header dari tabel users, cuman column kelas_id,nama,email
        $model     = new User();
        $query     = $model->query();
        $userTable = Arr::only(\Schema::getColumnListing($model->getTable()), [1, 2, 3, 5]);

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($userTable as $header => $userHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $userHeader);
        endforeach;

        // todo: untuk mengisi data user ke sheet user
        $filters = Arr::where($request->except(['_token', 'limit']), function ($value) {
            return $value != null;
        });

        foreach ($filters as $key => $filter) {

            $query->where($key, $filter);
        }

        // ambil data users sebanyak limit yang telah ditentukan dan jangan ikutkan admin juga
        $query->where('level', '!=', 'admin');
        $users = $query->limit($request->limit)->get();

        // kalo datanya gak ada langsung balikin, gak perlu download
        if (!$users->count()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }

        // isi ke excel
        $column = "A";
        $row    = 2;
        foreach ($users as $user):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->kelas_id);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->nama);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->email);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->level);

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
        $kelass = Kelas::all();

        return view('user.import_or_export', compact('kelass'));
    }
}
