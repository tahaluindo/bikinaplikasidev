<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Http\Requests;

use App\Anggota;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['anggota'] = Anggota::paginate(1000);
        $data['anggota_count'] = count(Schema::getColumnListing('anggota'));

        if (request()->q) {
            $data['anggota'] = new Anggota;

            foreach (Schema::getColumnListing('anggota') as $key => $item) {
                $data['anggota'] = $data['anggota']->orwhere($item, 'like', "%$request->q%");
            }

            $data['anggota'] = $data['anggota']->paginate(1000);
        }

        if (request()->level) {
            $data['user'] = User::where(['level' => $request->level])->paginate(1000)->pluck('id');

            $data['anggota'] = $data['anggota']->whereIn('user_id', $data['user']);
        }

        return view('anggota.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_identitas' => 'required|max:20|unique:anggota,no_identitas',
            'nama' => "required|max:30|unique:anggota,nama",
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'alamat' => 'required|max:100',
            'no_telepon' => 'required|max:15',
            'status' => 'required|in:Aktif,Tidak Aktif'
        ]);
        $requestData = $request->except(['level', 'simpan_dan_cetak']);
        $requestData['dibuat'] = date('d-M-Y');

        $email = strtolower(preg_replace('/[^a-zA-Z]/', '', $request->nama)) . "@gmail.com";

        if (User::where('email', $email)->first()) {
            return redirect()->back()->with('error', 'Akun sudah ada!');
        }

        $userCreate = User::create([
            'name' => $request->nama,
            'email' => strtolower(preg_replace('/[^a-zA-Z]/', '', $request->nama)) . "@gmail.com",
            'password' => "siswa",
            'level' => $request->level
        ]);

        $requestData['user_id'] = $userCreate->id;
        $anggotaCreate = Anggota::create($requestData);

        if ($request->simpan_dan_cetak) {

            return redirect('/anggota/' . $anggotaCreate->id . '/cetak');
        }

        return redirect()->route('anggota.index')->with('success', 'Berhasil menambah Anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Anggota $anggota)
    {
        $data["item"] = $anggota;
        $data["anggota"] = $anggota;

        return view('anggota.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Anggota $anggota)
    {
        $data["anggota"] = $anggota;
        $data[strtolower("Anggotum")] = $anggota;

        return view('anggota.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Anggota $anggota)
    {
        $this->validate($request, [
            'no_identitas' => "required|max:20|unique:anggota,no_identitas,$anggota->no_identitas,no_identitas",
            'nama' => "required|max:30|unique:anggota,nama,$anggota->nama,nama",
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'alamat' => 'required|max:100',
            'no_telepon' => 'required|max:15',
            'status' => 'required|in:Aktif,Tidak Aktif'
        ]);

        $requestData = $request->except(['level', 'simpan_dan_cetak']);

        $email = strtolower(preg_replace('/[^a-zA-Z]/', '', $request->nama)) . "@gmail.com";

        if (User::where('email', $email)->first() && (User::where('email', $email)->first()->id != $anggota->user_id)) {
            return redirect()->back()->with('error', 'Akun sudah ada!');
        }

        $userCreate = User::findOrFail($anggota->user_id)->update([
            'name' => $request->nama,
            'email' => $email,
            'level' => $request->level
        ]);

        $anggota->update($requestData);

        if ($request->simpan_dan_cetak) {

            return redirect('/anggota/' . $anggota->id . '/cetak');
        }

        return redirect()->route('anggota.index')->with('success', 'Berhasil mengubah Anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        $anggota->user->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $anggotas = Anggota::whereIn('id', json_decode($request->ids, true))->get();

        Anggota::whereIn('id', $anggotas->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data anggota');
    }

    public function laporan()
    {
        $data['anggotas'] = Anggota::limit(1000)->get();

        return view('anggota.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Anggota)->getTable();
        $object = (new Anggota);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }
//
//        $this->validate($request, [
//            'field' => 'required|in:' . implode(',', $fields),
//            'order' => 'required|in:ASC,DESC'
//        ]);

        $tanggal_awal = $request->tanggal_awal ? $request->tanggal_awal : (Anggota::get()->first()->created_at ?? date('Y-m-d'));
        $tanggal_akhir = $request->tanggal_akhir ? $request->tanggal_akhir : (Anggota::get()->last()->created_at ?? date('Y-m-d'));


        $data["anggotas"] = $object
//            ->orderBy($request->field, $request->order)
            ->where('jenis_kelamin', 'like', "%$request->jenis_kelamin%")
            ->Where('status', 'like', "$request->status%")
            ->WhereBetween('created_at', [$tanggal_awal, $tanggal_akhir])
            ->get();

        if (!$data["anggotas"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;


        return view("anggota.laporan.print", $data);
    }

    public function cetak(Anggota $anggota)
    {
        $data['anggota'] = $anggota;

        return view('anggota.cetak', $data);
    }
}
