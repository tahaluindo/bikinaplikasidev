<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenjang;
use App\Models\Siswa;
use App\Models\Pengaturan;
use App\Models\SiswaMapel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(in_array(auth()->user()->level, ['Admin'])) {
            
            $data['siswa'] = Siswa::paginate(1000);
        }
        
        if(in_array(auth()->user()->level, ['Siswa', 'Ortu'])) {
            $user_ids = User::where('email', auth()->user()->email)->pluck('id');
            
            $data['siswa'] = Siswa::whereIn('user_id', $user_ids)->paginate(1000);
        }
        
        
        if(in_array(auth()->user()->level, ['Guru'])) {
            $kelas_ids = auth()->user()->guru->mapel_details->pluck('kelas_id');
            $siswa_mapel_ids = auth()->user()->guru->mapel_details->pluck('id');
            $siswa_ids = SiswaMapel::whereIn('mapel_detail_id', $siswa_mapel_ids)->pluck('siswa_id');
            
            $data['siswa'] = Siswa::whereIn('id', $siswa_ids)->whereIn('kelas_id', $kelas_ids)->paginate(1000);
        }

        $data['siswa_count'] = count(Schema::getColumnListing('siswa'));

        return view('siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['jenjang'] = Jenjang::all();

        return view('siswa.create', $data);
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
        
        if ($request->from_register == "Ya") {
            // dd($request->all());

            $this->validate($request, [
                'jenjang_id' => 'required|max:30|exists:jenjang,id',
                'kelas_id' => 'required|max:30|exists:kelas,id',
                'email' => 'required|max:50|unique:user,email',
                'nama' => 'required|max:30',
                'tanggal_lahir' => 'required|max:30',
                'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
                'agama' => 'required',
                'alamat' => 'required|max:255',
                'no_hp' => 'required|max:15|unique:siswa,no_hp',
                'jam_kelas' => 'required|max:255',
                'hari_kelas' => 'required|max:255',
            ]);
        }

        if ($request->from_register != "Ya") {
            $this->validate($request, [
                'jenjang_id' => 'required|max:30',
                'kelas_id' => 'required|max:30|exists:kelas,id',
                'nama' => 'required|max:30',
                'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
                'alamat' => 'required|max:255',
                'no_hp' => 'required|max:15|unique:siswa,no_hp',
                'berkas' => 'required|file',
                'status' => 'required|in:Baru Mendaftar,Pendaftaran Diterima,Ditolak',
                'jam_kelas' => 'required|max:255',
                'hari_kelas' => 'required|max:255',
            ]);
        }

        $requestData = $request->except(['from_register']);

        if ($request->hasFile('berkas')) {
            $requestData['berkas'] = str_replace("\\", "/", $request->file('berkas')->move("gambar", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('berkas')->getClientOriginalExtension()));
        }

        // $pengaturan = Pengaturan::first();
        // if (date('Y-m-d') > $pengaturan->batas_akhir_registrasi) {

        //     return redirect()->back()->with("error", "Ma'af, pendaftaran terakhir " . $pengaturan->batas_akhir_registrasi);
        // }

        // if (date('Y-m-d') < $pengaturan->batas_awal_registrasi) {

        //     return redirect()->back()->with("error", "Ma'af, pendaftaran akan dimulai pada: " . $pengaturan->batas_awal_registrasi);
        // }

        // $userCreate = User::create([
        //     'name' => $request->nama,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'level' => 'Ortu'
        // ]);

        $userCreate = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'level' => 'Siswa'
        ]);

        $requestData['user_id'] = $userCreate->id;


        unset($requestData['email'], $requestData['password'], $requestData['mapel_pilihans']);

        $siswa = Siswa::orderBy('id', 'DESC')->first();
        $jenjang = Jenjang::findOrFail($request->jenjang_id);
        $requestData['nomor_registrasi'] = $jenjang->nama . preg_replace("/[A-Za-z]/", "", $siswa ? ++$siswa->nomor_registrasi : "{$jenjang->nama}" . date("Y") . "00001");
        // $requestData['angkatan'] = $pengaturan->angkatan_registrasi;

        $siswaCreate = Siswa::create($requestData);

        foreach ($request->mapel_pilihans as $key => $itemMapelPilihan) {
            SiswaMapel::create([
                'siswa_id' => $siswaCreate->id,
                'mapel_detail_id' => $itemMapelPilihan
            ]);
        }

        if ($request->from_register == "Ya") {

            return redirect('/register')->with('success', 'Berhasil registrasi, Kamu bisa login menggunakan email dan password yang telah dibuat.');
            // return redirect('/register')->with('success', 'Berhasil registrasi, gunakan nomor: ' . $siswaCreate->nomor_registrasi . ' untuk mengecek status registrasimu <br>Kamu bisa login menggunakan email dan siswa sebagai password bila diterima, untuk orang tua bisa login menggunakan email dan password ortu sebagai password untuk mengecek aktivitas anak yang mendaftar.');
        }

        return redirect()->route('siswa.index')->with('success', 'Berhasil menambah Siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Siswa $siswa)
    {
        $data["item"] = $siswa;
        $data["siswa"] = $siswa;

        return view('siswa.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Siswa $siswa)
    {
        $data["siswa"] = $siswa;
        $data[strtolower("Siswa")] = $siswa;
        $data['jenjang'] = Jenjang::all();

        return view('siswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            // 'status' => 'required|in:Baru Mendaftar,Pendaftaran Diterima,Ditolak'
        ]);

        $requestData = $request->all();

        if ($request->hasFile('berkas')) {
            $requestData['berkas'] = str_replace("\\", "/", $request->file('berkas')->move("gambar", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('berkas')->getClientOriginalExtension()));
        }


        $siswa->update($requestData);

        return redirect()->route('siswa.index')->with('success', 'Berhasil mengubah Siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Siswa $siswa)
    {
        try {
            $siswa->user->delete();
            $siswa->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $siswas = Siswa::whereIn('id', json_decode($request->ids, true))->get();

        Siswa::whereIn('id', $siswas->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data siswa');
    }

    public function laporan()
    {
        $data['limit'] = Siswa::count();

        return view('siswa.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Siswa)->getTable();
        $object = (new Siswa);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["siswas"] = $object
            ->orderBy($request->field, $request->order)
            ->where('status', $request->status)
            // ->whereBetween('created_at', [$request->tanggal_awal_pendaftaran, $request->tanggal_akhir_pendaftaran])
            ->limit($request->limit)
            ->get();

        if (!$data["siswas"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        if ($request->print_grafik) {
            $data['siswas'] = $data['siswas']->map(function ($item) {
                $item->tahun = date('Y', strtotime($item->created_at));

                return $item;
            });

            return view("siswa.laporan.print-grafik", $data);
        }

        return view("siswa.laporan.print", $data);
    }
}