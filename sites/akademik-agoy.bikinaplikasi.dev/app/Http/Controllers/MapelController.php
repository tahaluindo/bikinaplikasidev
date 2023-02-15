<?php

namespace App\Http\Controllers;

use App\User;
use App\Kelas;
use App\Mapel;
use App\MapelDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['mapels'] = Mapel::paginate(1000);

        if (auth()->user()->level == 'guru') {
            $mapel_detail_mapel_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('mapel_id')->toArray();
            $data['mapels'] = Mapel::whereIn('id', $mapel_detail_mapel_ids)->paginate(1000);
        } elseif (auth()->user()->level == 'siswa') {
            $mapel_detail_mapel_ids = MapelDetail::where('kelas_id', auth()->user()->kelas_id)->pluck('mapel_id')->toArray();
            $data['mapels'] = Mapel::whereIn('id', $mapel_detail_mapel_ids)->paginate(1000);
        }

        if (request()->q) {
            $data['mapels'] = new Mapel;

            foreach (Schema::getColumnListing('mapels') as $key => $item) {
                $data['mapels'] = $data['mapels']->orwhere($item, 'like', "%$request->q%");
            }

            $data['mapels'] = $data['mapels']->paginate(1000);
        }

        return view('mapel.index', $data);
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
        $data['gurus'] = User::where('level', 'guru')->get();

        return view('mapel.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama' => 'required|min:3|max:30|unique:mapels,nama',
            'kelompok' => 'required|in:A,B,C',
            'kelas_id.*' => 'required|exists:kelass,id',
            'user_id.*' => 'required|exists:users,id',
        ]);

        $data['input'] = $request->except(['kelas_id', 'user_id']);

        \DB::transaction(function () use ($data, $request) {
            $mapelCreate = Mapel::create($data['input']);
            unset($data['input']['_token'], $data['input']['nama'], $data['input']['kelompok'], $data['input']['deskripsi_pengetahuan'], $data['input']['deskripsi_keterampilan']);
            foreach ($request->kelas_id as $index => $kelas_id) {
                $data['input'][$index]['mapel_id'] = $mapelCreate->id;
                $data['input'][$index]['kelas_id'] = $kelas_id;
                $data['input'][$index]['user_id'] = $request->user_id[$index];

            }

            $data['input'] = array_unique($data['input'], false);

            MapelDetail::insert($data['input']);
        });

        return redirect()->route('mapel.index')->with("success", "Berhasil menambah mapel");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Mapel $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
        $data['mapel'] = $mapel;

        return view('mapel.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Mapel $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        //
        $data['mapel'] = $mapel;
        $data['mapel_details'] = Kelas::all();
        $data['kelass'] = Kelas::all();
        $data['users'] = User::where('level', 'guru')->get();

        return view('mapel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Mapel $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        // todo: mengatur pembatalan kelas untuk mata pelajaran
        // jika kita memakai rules $this->validate maka kita buat exists sehingga kelas yang mau dibatalkan akan terdeteksi salah
        // padahal tidak salah, karena kita memang mau membatalkan dengan cara memberi nilai "batalkan" pada inputan kelas_id
        // dibagian ini kita urus dulu masalah kelas yang mau dibatalkan
        // yaitu dengan cara membuang nilai kelas yang mau dibatalkan dari inputan
        // semua nilai yang terkait juga akan kita buang, misal mapel_detail_ids, dan user_id
        // sehingga kita bisa melakukan validasi inputan dengan methode \Validator::make yang ada sesudah foreach ini
        // kita tidak bisa pakai $this->validate karena methode ini meminta $request untuk dicek
        // sedangkan $request memiliki semua nilai termasuk kelas yang mau dibatalkan, nanti malah terdeteksi salah
        // if($validator->fails()) akan mengecek validasi inputan kita (tidak termasuk kelas yang mau dibatalkan karena udah dibuang)
        // jika gagal maka akan kembali ke halaman edit, jika berhasil maka akan lanjut ke proses selanjutnya
        $data['input'] = $request->all();

        foreach ($data['input']['kelas_id'] as $index => $dataInput) {
            if ($dataInput == "batalkan") {
                unset($data['input']['kelas_id'][$index], $data['input']['mapel_detail_ids'][$index], $data['input']['user_id'][$index]);

                continue;
            }
        }

        $validator = \Validator::make($data['input'], [
            'nama' => 'required|min:3|max:30',
            'kelompok' => 'required|in:A,B,C',
            'kelas_id.*' => 'required|exists:kelass,id',
            'user_id.*' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // todo: menghapus kelas yang dibatalkan dari database dan menginput data baru
        // setelah validator berhasil melakukan validasi maka disinilah penghapusan kelas yang mau dibatalkan sebenarnya
        // penghapusan kita lakukan didalam foreach
        // kita tidak menghapus kelas dari database dilangkah atas karena takutnya nanti pada langkah ini terjadi error
        // nah kalau terjadi error dilangkah ini kan seharusnya data sebelumnya memang belum terhapus
        // jadi user tetap bisa melihat data sebelumnya seandainya belum terhapus
        // nah dilangkah ini juga kita melakukan filter data untuk diupdate (data yang dipisahkan dari data yang telah dihapus)
        // takutnya user menginputkan kaya kelas dan guru yang sama sehingga kita harus pakai fungsi array_unique
        // fungsi array unique akan membuang data yang sama
        // diarray unique kita tambah false supaya bisa melakukan unique array multidimensi
        // array_values kita pakai supaya indexnya kembali berurutan dari 0,1,2 dst...
        // biar bisa ngikutin index mapel_detail_ids yang dari 0,1,2 dst... juga
        // karena di mapel_detail_ids itulah kita mengambil id mapel_detailnya untuk dicocokkan apakah sudah ada data sebelumnya atau belum
        // jika id sebelumnya sudah ada maka updateOrCreate() akan mengupdate datanya
        // jika belum ada makan updateOrCreate() akan membuat baru datanya
        // data yang dibuat baru jika idnya == 0 (tidak ada didatabase)
        // id == 0 itu kita set di viewnya, tepatnya ketika user mengklik tombol tambah
        // setlah berhasil tersimpan jangan lupa juga kita update nama mapelnya
        // update hanya nama karena diinputan data  yang bisa diiupdate cuma nama
        $data['input'] = $request->all();

        \DB::transaction(function () use ($data, $request, $mapel) {
            $data['update'] = [];
            foreach ($data['input']['kelas_id'] as $index => $kelas_id) {
                if ($kelas_id == "batalkan") {
                    MapelDetail::where('id', $request->mapel_detail_ids[$index])->delete();

                    continue;
                }

                $mapel_detail_ids[] = $request->mapel_detail_ids[$index];
                $data['update'][$index]['mapel_id'] = $mapel->id;
                $data['update'][$index]['kelas_id'] = $kelas_id;
                $data['update'][$index]['user_id'] = $request->user_id[$index];
            }

            $data['update'] = array_values(array_unique($data['update'], false));

            foreach ($data['update'] as $index => $dataUpdate) {
                MapelDetail::updateOrCreate(
                    ['id' => $mapel_detail_ids[$index]],
                    $dataUpdate
                );
            }

            $mapel->update([
                'nama' => $request->nama,
                'kelompok' => $request->kelompok,
            ]);
        });

        return redirect()->route('mapel.index')->with("success", "Berhasil mengupdate Mapel");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Mapel $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        //
        $mapel->delete();

        return redirect()->route('mapel.index')->with("success", "Berhasil menghapus Mapel");
    }

    public function hapus_semua(Request $request)
    {
        $mapels = Mapel::whereIn('id', json_decode($request->ids, true))->get();

        Mapel::whereIn('id', $mapels->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data mapel');
    }
}
