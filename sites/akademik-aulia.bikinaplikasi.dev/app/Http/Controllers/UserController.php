<?php

namespace App\Http\Controllers;

use App\User;
use App\Kelas;
use App\Mapel;
use App\MapelDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['kelass'] = Kelas::get();
        $data['mapels'] = Mapel::all();

        if (!$request->user) {
            $data['users'] = User::paginate(1000);
        } else {
            if ($request->user == "semua_guru") {
                $data['users'] = User::where('level', 'guru')->paginate(1000);
            } elseif ($request->user == "semua_siswa") {
                $data['users'] = User::where('level', 'siswa')->paginate(1000);
            } elseif ($request->user == "guru" && $request->mapel_id) {
                $data['user']          = User::where('level', 'guru')->pluck('id');
                $data['mapel_details'] = MapelDetail::where('mapel_id', $request->mapel_id)->whereIn('user_id', $data['user'])->pluck('user_id');
                $data['users']         = User::whereIn('id', $data['mapel_details'])->paginate(1000);
            } elseif ($request->user == "siswa" && $request->kelas_id) {
                $data['users'] = User::where('level', 'siswa')->where('kelas_id', $request->kelas_id)->paginate(1000);
            }
        }

        if(request()->q) {
            $data['users'] = new User;

            foreach (Schema::getColumnListing('users') as $key => $item) {
                $data['users'] = $data['users']->orwhere($item, 'like', "%$request->q%");
            }

            $data['users'] = $data['users']->paginate(1000);
        }

        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['kelass'] = Kelas::all();

        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // todo: variable ini akan menampung semua nilai form
        $data['input'] = $request->all();

        // todo: jika tu menambahkan siswa baru
        if (auth()->user()->level == "tu" && $request->level == 'siswa'):
            $this->validate($request, [
                'kelas_id'     => 'required|exists:kelass,id',
                'nama'         => 'required|min:3|max:30',
                'email'        => 'required|email|min:5|max:30',
                'no_hp'        => 'required|digits_between:11,15',
                'password'     => 'required|min:6|max:15',
                'status'       => 'required|in:aktif,tidak aktif',
                'no_identitas' => 'required',
                'foto'         => 'required',
            ]);

            // todo: jika tu menambahkan guru baru
        elseif (auth()->user()->level == "tu" && $request->level == 'guru'):
            $this->validate($request, [
                'nama'         => 'required|min:3|max:30',
                'email'        => 'required|email|min:5|max:30',
                'no_hp'        => 'required|digits_between:11,15',
                'password'     => 'required|min:6|max:15',
                'status'       => 'required|in:aktif,tidak aktif',
                'no_identitas' => 'required',
                'foto'         => 'required',
            ]);

            // todo: disini kita buang data yang tidak perlu diupdate ketika tu menjadikannya sebagai guru
            unset($data['input']['kelas_id']);
        endif;

        // todo: untuk menginput foto profile user
        $data['input']['foto'] = "foto/" . $request->foto->getClientOriginalName();
        $request->foto->move("foto", $data['input']['foto']);

        // todo: simpan semua data yang sudah ditambah
        User::create($data['input']);

        return redirect()->route('user.index')->with("success", "Berhasil menambah user");
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
        $data['user']   = $user;
        $data['kelass'] = Kelas::all();

        return view('user.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $data['user'] = $user;

        return view('user.edit', $data);
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
        // todo: variable ini akan menampung semua nilai form
        $data['input'] = $request->all();

        // todo: validasi tu mengedit profilenya sendiri
        if (auth()->user()->level == "tu" && $user->level == "tu"):
            $this->validate($request, [
                'nama'     => 'required|min:2|max:30',
                'email'    => 'required|email|min:5|max:30',
                'password' => 'required|min:6|max:15',
            ]);

            // todo: validasi guru mengedit profilenya sendiri
        elseif (auth()->user()->level == "guru" && $user->level == "guru"):
            $this->validate($request, [
                'nama'         => 'required|min:2|max:30',
                'email'        => 'required|email|min:5|max:30',
                'no_hp'        => 'required|digits_between:11,15',
                'password'     => 'required|min:6|max:15',
                // 'level'        => 'required|in:guru',
                'no_identitas' => 'required',
            ]);

            // todo: validasi siswa mengedit profilenya sendiri
        elseif (auth()->user()->level == "siswa" && $user->level == "siswa"):
            $this->validate($request, [
                'nama'         => 're   quired|min:3|max:30',
                'email'        => 'required|email|min:5|max:30',
                'no_hp'        => 'required|digits_between:11,15',
                'password'     => 'required|min:6|max:15',
                // 'level'        => 'required|in:siswa',
                'no_identitas' => 'required',
            ]);

            // todo: validasi guru mengedit siswa
        elseif (auth()->user()->level == "guru" && $user->level == "siswa"):
            $this->validate($request, [
                'nama'         => 'required|min:2|max:30',
                'email'        => 'required|email|min:5|max:30',
                'no_hp'        => 'required|digits_between:11,15',
                'password'     => 'required|min:6|max:15',
                // 'level'        => 'required|in:siswa',
                // 'status'       => 'required|in:aktif,tidak aktif',
                'no_identitas' => 'required',
            ]);

            // todo: validasi tu mengedit siswa
        elseif (auth()->user()->level == "tu" && $request->level == 'siswa'):
            $this->validate($request, [
                'kelas_id'     => 'required|exists:kelass,id',
                'nama'         => 'required|min:2|max:30',
                'email'        => 'required|email|min:5|max:30',
                'no_hp'        => 'required|digits_between:11,15',
                'password'     => 'required|min:6|max:15',
                'status'       => 'required|in:aktif,tidak aktif',
                'no_identitas' => 'required',
            ]);
            // todo: validasi tu mengedit guru
        elseif (auth()->user()->level == "tu" && $request->level == 'guru'):
            $this->validate($request, [
                'nama'         => 'required|min:2|max:30',
                'email'        => 'required|email|min:5|max:30',
                'no_hp'        => 'required|digits_between:11,15',
                'password'     => 'required|min:6|max:15',
                'status'       => 'required|in:aktif,tidak aktif',
                'no_identitas' => 'required',
            ]);

            // disini kita buang data yang tidak perlu diupdate ketika tu menjadikannya sebagai guru
            unset($data['input']['kelas_id']);
            $user->update(['kelas_id' => null]);
        endif;

        // todo: kalo seandainya user mengganti foto profile
        if ($request->foto):
            $data['input']['foto'] = "foto/" . $request->foto->getClientOriginalName();
            $request->foto->move("foto", $data['input']['foto']);
        endif;

        // todo: simpan semua data yang sudah dirubah
        $user->update($data['input']);

        // kalo user atau guru merubah profilenya sendiri
        if(in_array(auth()->user()->level, ['guru', 'siswa'])) {
            return redirect()->route('user.show', auth()->user()->id)->with("success", "Berhasil mengupdate Profile");
        }

        return redirect()->route('user.index')->with("success", "Berhasil mengupdate User");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return redirect()->route('user.index')->with("success", "Berhasil menghapus User");
    }

    public function import()
    {

        return view('user.import');
    }

    public function importStore(Request $request)
    {
        $this->validate($request, [
            'file_excel' => 'required|mimes:xlsx,xls',
        ]);

        $file_excel  = $request->file_excel->getPathName();
        $excelReader = \PHPExcel_IOFactory::createReaderForFile($file_excel)->load($file_excel)->getSheet(0)->getHighestRow();
        $worksheet   = \PHPExcel_IOFactory::createReaderForFile($file_excel)->load($file_excel)->getSheet(0);

        $data['input'] = [];
        for ($row = 2; $row <= $excelReader; $row++) {
            $data['input'][$row - 2]['kelas_id']     = (string) $worksheet->getCell("A{$row}")->getValue();
            $data['input'][$row - 2]['nama']         = (string) $worksheet->getCell("B{$row}")->getValue();
            $data['input'][$row - 2]['email']        = (string) $worksheet->getCell("C{$row}")->getValue();
            $data['input'][$row - 2]['no_hp']        = (string) $worksheet->getCell("D{$row}")->getValue();
            $data['input'][$row - 2]['password']     = (string) $worksheet->getCell("E{$row}")->getValue();
            $data['input'][$row - 2]['level']        = (string) $worksheet->getCell("F{$row}")->getValue();
            $data['input'][$row - 2]['status']       = (string) $worksheet->getCell("G{$row}")->getValue();
            $data['input'][$row - 2]['no_identitas'] = (string) $worksheet->getCell("H{$row}")->getValue();
            $data['input'][$row - 2]['foto']         = (string) $worksheet->getCell("I{$row}")->getValue();
        }

        // dd($data['input']);

        $validator = \Validator::make($data['input'], [
            '*.kelas_id'     => 'required_if:*.level,siswa|exists:kelass,id',
            '*.nama'         => 'required|min:2|max:50',
            '*.email'        => 'required|email|min:5|max:50|unique:users,email|distinct',
            '*.no_hp'        => 'required|digits_between:11,15|unique:users,no_hp',
            '*.password'     => 'required|min:3|max:15',
            '*.level'        => 'required|in:siswa,guru',
            '*.status'       => 'required|in:aktif,tidak aktif',
            '*.no_identitas' => '',
        ]);

        //Now check validation:
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // cek jika kosong
        if (count($data['input']) == 0) {
            return back()->with('error', 'Tidak ada data yang perlu diimport');
        }

        foreach ($data['input'] as $index => $dataInput) {
            if ($dataInput['level'] == "guru") {
                $data['input'][$index]['kelas_id'] = null;
            }

            $data['input'][$index]['password'] = \Hash::make($data['input'][$index]['password']);
        }

        User::insert($data['input']);

        return redirect()->route('user.index')->with('success', 'Berhasil mengimport user');
    }

    public function download_format()
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();

        // todo: mengambil isi header dari tabel users
        $userTable = \DB::select(\DB::raw('select kelas_id, nama, email, no_hp, password, level, status, no_identitas, foto from users limit 1'))[0];

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($userTable as $header => $userHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $header);
        endforeach;

        // todo: mengambil isi header dari tabel kelas
        $kelastable = \DB::select(\DB::raw('select id, wali_kelas, ketua_kelas, nama, ruang from kelass limit 1'))[0];

        // todo: untuk menampilkan data kelas yang tersedia
        $PHPExcel->createSheet(1)->setTitle('kelas');

        // todo: untuk mengisi header data kelas
        $column = "A";
        foreach ($kelastable as $header => $kelasHeader):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . 1, $header);
        endforeach;

        // todo: untuk mengisi data kelas ke sheet kelas
        $kelass = Kelas::all();

        $column = "A";
        $row    = 2;
        foreach ($kelass as $kelas):
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $kelas->id);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $kelas->wali_kelas()->nama ?? "");
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $kelas->ketua_kelas()->nama ?? "");
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $kelas->nama);
            $PHPExcel->setActiveSheetIndex(1)->setCellValue($column++ . $row, $kelas->ruang);

            $row++;
            $column = 'A';
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=download_format_user.xlsx');

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function export()
    {
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();

        // todo: mengambil isi header dari tabel users
        $userTable = \DB::select(\DB::raw('select kelas_id, nama, email, no_hp, level, status, no_identitas, foto from users limit 1'))[0];

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($userTable as $header => $userHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $header);
        endforeach;

        // todo: untuk mengisi data kelas ke sheet kelas
        $users = User::all();

        $column = "A";
        $row    = 2;
        foreach ($users as $user):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->kelas_id);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->nama);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->email);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->no_hp);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->level);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->status);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->no_identitas);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->foto);

            $row++;
            $column = 'A';
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=export_user.xlsx');

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function aktifkan(User $user)
    {
        $user->update(['status' => 'aktif']);

        return back()->with('success', 'Berhasil mengaktifkan user');
    }

    public function aktifkan_semua(Request $request)
    {
        $users = User::whereIn('id', json_decode($request->ids, true))->get();

        User::whereIn('id', $users->pluck('id'))->update(['status' => 'aktif']);

        return back()->with('success', 'Berhasil mengaktifkan banyak data user');
    }

    public function nonaktifkan(User $user)
    {
        $user->update(['status' => 'tidak aktif']);

        return back()->with('success', 'Berhasil menonaktifkan user');
    }

    public function hapus_semua(Request $request)
    {
        $users = User::whereIn('id', json_decode($request->ids, true))->get();

        User::whereIn('id', $users->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data user');
    }

    public function naik_kelas(Request $request)
    {
        // kalo gak ada yang dipilih maka balikkan
        if(!count(json_decode($request->ids, true))) {
            return back()->with('error', 'Tidak ada siswa yang dipilih');
        }

        $data['kelass'] = Kelas::all();

        return view('user.naik_kelas', $data);
    }

    public function naik_kelas_store(Request $request)
    {
        $this->validate($request, [
            'kelas_id' => 'required|exists:kelass,id',
        ]);
// dd('kewo');
        // dd($request->all());
        $users = User::whereIn('id', json_decode($request->ids, true))->get();

        User::whereIn('id', $users->pluck('id'))->update([
            'kelas_id' => $request->kelas_id,
        ]);

        $to = route('user.index') . '?user=siswa&kelas_id=' . $users->first()->kelas_id;

        return redirect()->to($to)->with('success', 'Berhasil mengupdate kelas user');
    }
}
