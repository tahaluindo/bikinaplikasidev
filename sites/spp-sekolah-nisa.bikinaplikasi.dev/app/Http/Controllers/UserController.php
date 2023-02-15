<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('level', '!=', 'admin')->where('level', '!=', 'superadmin')->limit(100)->orderBy('id', 'DESC')->get();

        // jika nyari berdasarkan kelas
        if(request()->kelas_id) {
            $users = User::where('level', '!=', 'admin')->where('level', '!=', 'superadmin')->where('kelas_id', request()->kelas_id)->limit(100)->orderBy('id', 'DESC')->get();
        }

        // fiture untuk mencari berdasarkan semua columns
        if (request()->q) {
            $model = new User;
            $table = $model->getTable();
            $query = $model->query();

            // dapatkan semua column berdasarkan teble model
            // dilarang mencari berdasarkan id
            // index 0 = id
            $columns = Arr::except(Schema::getColumnListing($table), [0,4,7,8,9]);
            // dd($columns);

            // \DB::enableQueryLog();
            // buat querynya berdasarkan kata yang diinputkan disemua column
            foreach ($columns as $column) {
                // kalo nyari berdasarkan kelas
                if($column == 'kelas_id') {
                    $kelas_ids = Kelas::where('nama', 'LIKE', '%' . request()->q . '%')->pluck('id')->toArray();
                    // dd($kelas_ids);
                    $query->orWhereIn($column, $kelas_ids);

                    continue;
                }
                $query->orWhere($column, 'LIKE', '%' . request()->q . '%');
            }

            // ambil datanya sebanyak 100 data
            // pastikan yang level admin tidak ikut
            if (1 == auth()->user()->id) {
                $users = $query->limit(100)->orderBy('id', 'DESC')->get()->where('level', '!=', 'superadmin')->where('level', '!=', 'admin');
            } elseif(auth()->user()->level != 'superadmin') {
                $users = $query->limit(100)->orderBy('id', 'DESC')->get()->where('level', '!=', 'admin');
            } else {
                $users = $query->limit(100)->orderBy('id', 'DESC')->get();
            }
        }

        // dd(\DB::getQueryLog());
        $kelass = implode(',', Kelas::pluck('nama')->toArray());
        $kelas_users = Kelas::all();

        return view('user.index', compact('users', 'kelass', 'kelas_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelass = Kelas::orderBy('id', 'DESC')->get();

        return view('user.create', compact('kelass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // antisipasi user yang bukan admin utama tapi maksa nambahin admin
        if ($request->level == 'admin') {
            $this->authorize('viewAny', auth()->user());
        }

        // kalo mau nambahin admin
        if ((!$request->kelas_id) && $request->level == 'admin') {
            $this->validate($request, [
                'nama'     => 'required|min:3|max:30',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required',
            ]);
        } else { // kalo mau nambahin siswa
            $this->validate($request, [
                'kelas_id' => 'required|exists:kelas,id',
                'nama'     => 'required|min:3|max:30',
                'angkatan'     => 'required|integer|digits:4',
            ]);
        }

        $request->request->add(['password' => \Hash::make($request->password)]);

        User::create($request->except(['cetak_kwitansi']));

        return redirect()->route('user.index')->with('success', 'Berhasil menambah user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $kelass = Kelas::orderBy('id', 'DESC')->get();

        return view('user.edit', compact('user', 'kelass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // antisipasi user yang bukan admin utama tapi maksa nambahin admin
        if ($request->level == 'admin') {
            $this->authorize('viewAny', auth()->user());
        }

        // jika superadmin update tanpa password
        if($user->level == 'superadmin' && auth()->user()->level == 'superadmin' && !$request->password) {
            $this->validate($request, [
                'nama'     => 'required|min:3|max:30',
                'email'    => "required|email|unique:users,email,$request->email,email",
            ]);

            $request->request->remove('password');

            goto update;
        }

        // validasi kondisi untuk password diubah atau tidak
        if ($request->password) {
            // superadmin
            if($user->level == 'superadmin' && auth()->user()->level == 'superadmin') {
                $this->validate($request, [
                    'nama'     => 'required|min:3|max:30',
                    'email'    => "required|email|unique:users,email,$request->email,email",
                    'password' => 'required',
                ]);

                $request->request->add(['password' => \Hash::make($request->password)]);

                goto update;
            }

            // kalo user maksa mau ngubah jadi admin
            if (auth()->user()->id == 1) {
                if ((!$request->kelas_id) && $request->level == 'admin') {
                    $this->validate($request, [
                        'nama'     => 'required|min:3|max:30',
                        'email'    => "required|email|unique:users,email,$request->email,email",
                        'password' => 'required',
                    ]);
                } elseif(auth()->user()->id == $user->id) { // kalo mau ngubah siswa
                    $this->validate($request, [
                        'nama'     => 'required|min:3|max:30',
                    ]);
                }

                else { // kalo mau ngubah siswa

                    $this->validate($request, [
                        'kelas_id' => 'required|exists:kelas,id',
                        'nama'     => 'required|min:3|max:30',
                        'angkatan'     => 'required|integer|digits:4',
                    ]);
                }

            } else {
                $this->validate($request, [
                    'nama'     => 'required|min:3|max:30',
                ]);
            }

            // password harus dihash karena defaultnya tidak dihash untuk store dan update
            $request->request->add(['password' => \Hash::make($request->password)]);
        } else {
            // kalo seandainya passwordnya tidak dirubah, harus kita remove
            // karena nilai dari inputannya null dan nanti malah terubah juga d database
            $request->request->remove('password');

            if (auth()->user()->id == 1) {
                if ($request->level == 'admin') {
                    $this->validate($request, [
                        'nama'  => 'required|min:3|max:30',
                        'email' => "required|email|unique:users,email,$request->email,email",
                        'level' => 'required|in:admin',
                    ]);
                } else {
                    $this->validate($request, [
                        'kelas_id' => 'required|exists:kelas,id',
                        'nama'     => 'required|min:3|max:30',
                        'angkatan'     => 'required|integer|digits:4',
                    ]);
                }
            } else {
                $this->validate($request, [
                    'kelas_id' => 'required|exists:kelas,id',
                    'nama'     => 'required|min:3|max:30',
                    'angkatan'     => 'required|integer|digits:4',
                ]);
            }
        }

        update:
        $user->update($request->all());

        return redirect()->route('user.index')->with('success', 'Berhasil mengupdate user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Berhasil menghapus user');
    }

    public function hapus_semua(Request $request)
    {
        $users = User::whereIn('id', json_decode($request->ids, true))->get();

        User::whereIn('id', $users->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data user');
    }

    public function ubah_kelas(Request $request)
    {
        // kalo g ada yang dipilih
        $ids = json_decode($request->ids, true);

        if(!count($ids)) {
            return back()->with('error', 'Tidak ada data yang perlu dihapus!');
        }

        // cek kelas yang tersedia
        $kelas = Kelas::where('nama', $request->kelas)->first();

        if(!$kelas) {
            return back()->with('error', 'Tidak ada kelas yang dimaksudkan!');
        }

        $users = User::whereIn('id', $ids)->get();

        User::whereIn('id', $users->pluck('id'))->update([
            'kelas_id' => $kelas->id
        ]);

        return back()->with('success', 'Berhasil mengubah banyak data kelas user terpilih');
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
            if (auth()->user()->id == 1 || auth()->user()->level == 'superadmin') {
                $users[$row - 2]['email']    = (string) $worksheet->getCell("C{$row}")->getValue();
                $users[$row - 2]['password'] = (string) $worksheet->getCell("D{$row}")->getValue();
                $users[$row - 2]['level']    = (string) $worksheet->getCell("E{$row}")->getValue();
                $users[$row - 2]['angkatan']    = (string) $worksheet->getCell("F{$row}")->getValue();
            }
        }

        // todo: untuk mengisi data user ke sheet user, buang nama yg null / nama yg kosong (gk diinput / dihapus)
        $users = Arr::where($users, function ($user) {

            return $user['nama'] != null || $user['nama'] != "";
        });

        // admin utama yg boleh import semua level, else admin lain cuman siswa
        if (\auth()->user()->id == 1 || auth()->user()->level == 'superadmin') {
            $validator = \Validator::make($users, [
                '*.kelas_id' => 'required_if:*.level,siswa|exists:kelas,id',
                '*.nama'     => 'required|min:3|max:30',
                '*.email'    => 'required_if:*.level,admin|email|min:5|max:30|unique:users,email|distinct',
                '*.level'    => 'required|in:siswa,admin',
                '*.angkatan'    => 'required|integer|digits:4',
            ]);
        } else {
            $validator = \Validator::make($users, [
                '*.kelas_id' => 'required_if:*.level,siswa|exists:kelas,id',
                '*.nama'     => 'required|min:3|max:30',
                '*.angkatan'    => 'required|integer|digits:4',
            ]);
        }

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
            if (auth()->user()->id == 1) {
                if ('admin' == $dataInput['level']) {
                    $users[$index]['kelas_id'] = null;

                    // hash password untuk disimpan ke database
                    $users[$index]['password'] = \Hash::make($users[$index]['password']);
                }

                if ($dataInput['level'] == "siswa") {
                    $users[$index]['email'] = null;
                }
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
        $userTable = Arr::only(\Schema::getColumnListing($model->getTable()), [1, 2]);
        if (auth()->user()->id == 1 || auth()->user()->level == 'superadmin') {

            $userTable = Arr::only(\Schema::getColumnListing($model->getTable()), [1, 2, 3, 4, 5, 6]);
        }

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
        $kelass = Kelas::orderBy('id', 'DESC')->get();

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
        $model = new User();
        $query = $model->query();

        $userTable = Arr::only(\Schema::getColumnListing($model->getTable()), [1, 2]);

        if (auth()->user()->id == 1 || auth()->user()->level == 'superadmin') {
            $userTable = Arr::only(\Schema::getColumnListing($model->getTable()), [1, 2, 3, 5, 6]);
        }

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
        if (auth()->user()->id == 1 || auth()->user()->level == 'superadmin') {
            $users = $query->limit($request->limit)->get();
        } else {
            $users = $query->where('level', '!=', 'admin')->limit($request->limit)->orderBy('id', 'DESC')->get();
        }

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

            if (auth()->user()->id == 1  || auth()->user()->level == 'superadmin') {
                $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->email);
                $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->level);
                $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->angkatan);
            }

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
        $kelass = Kelas::orderBy('id', 'DESC')->get();

        return view('user.import_or_export', compact('kelass'));
    }

    public function kwitansi()
    {
        return view('user.kwitansi');
    }
}
