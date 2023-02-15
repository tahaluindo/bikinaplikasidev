<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\Pengaturan;
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
        $data['siswa'] = Siswa::paginate(1000);

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
        $data['jurusan'] = Jurusan::all();

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
            $this->validate($request, [
                'jurusan_id' => 'required|max:30|exists:jurusan,id',
                'nama' => 'required|max:30',
                'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
                'alamat' => 'required|max:255',
                'no_hp' => 'required|max:15|unique:siswa,no_hp',
                'berkas' => 'required|file'
            ]);
        }

        if ($request->from_register != "Ya") {
            $this->validate($request, [
                'jurusan_id' => 'required|max:30',
                'nama' => 'required|max:30',
                'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
                'alamat' => 'required|max:255',
                'no_hp' => 'required|max:15|unique:siswa,no_hp',
                'berkas' => 'required|file',
                'status' => 'required|in:Baru Mendaftar,Pendaftaran Diterima,Ditolak'
            ]);
        }

        $requestData = $request->except(['from_register']);

        if ($request->hasFile('berkas')) {
            $requestData['berkas'] = str_replace("\\", "/", $request->file('berkas')->move("gambar", uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('berkas')->getClientOriginalExtension()));
        }

        $pengaturan = Pengaturan::first();
        if (date('Y-m-d') > $pengaturan->batas_akhir_registrasi) {

            return redirect()->back()->with("error", "Ma'af, pendaftaran terakhir " . $pengaturan->batas_akhir_registrasi);
        }

        if (date('Y-m-d') < $pengaturan->batas_awal_registrasi) {

            return redirect()->back()->with("error", "Ma'af, pendaftaran akan dimulai pada: " . $pengaturan->batas_awal_registrasi);
        }

        $siswa = Siswa::orderBy('id', 'DESC')->first();
        $jurusan = Jurusan::findOrFail($request->jurusan_id);
        $requestData['nomor_registrasi'] = $jurusan->nama . preg_replace("/[A-Za-z]/", "", ++$siswa->nomor_registrasi);
        $requestData['angkatan'] = $pengaturan->angkatan_registrasi;
        $siswaCreate = Siswa::create($requestData);

        if ($request->from_register == "Ya") {

            return redirect('/')->with('success', 'Berhasil registrasi, nomor: ' . $siswaCreate->nomor_registrasi);
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
        $data['jurusan'] = Jurusan::all();

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
            'jurusan_id' => 'required|max:30',
            'nama' => 'required|max:30',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'alamat' => 'required|max:255',
            'no_hp' => "required|max:15|unique:siswa,no_hp,$siswa->no_hp,no_hp",
            'status' => 'required|in:Baru Mendaftar,Pendaftaran Diterima,Ditolak'
        ]);

        $requestData = $request->all();
        $jurusan = Jurusan::findOrFail($request->jurusan_id);
        $requestData['nomor_registrasi'] = $jurusan->nama . preg_replace("/[A-Za-z]/", "", $siswa->nomor_registrasi);

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
        $siswa->delete();

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
            ->whereBetween('created_at', [$request->tanggal_awal_pendaftaran, $request->tanggal_akhir_pendaftaran])
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