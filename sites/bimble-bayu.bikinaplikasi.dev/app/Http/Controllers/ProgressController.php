<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\MapelDetail;
use App\Models\Progress;
use App\Models\Pengaturan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (in_array(auth()->user()->level, ['Siswa', 'Ortu'])) {
            $siswa = auth()->user()->getSiswa();
            $progress_ids = Progress::where([
                'jenjang_id' => $siswa->jenjang_id,
                'kelas_id' => $siswa->kelas_id,
                // 'angkatan' => $siswa->angkatan,
            ])->pluck('id');
            $data['progress'] = Progress::whereIn('id', $progress_ids)->paginate(1000);
        } else {

            $data['progress'] = Progress::paginate(1000);
        }

        $data['progress_count'] = count(Schema::getColumnListing('progress'));

        return view('progress.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $data['angkatan'] = Pengaturan::first()->angkatan_registrasi;
        $data['jenjang'] = Jenjang::pluck('nama', 'id', );
        $data['kelas'] = Kelas::pluck('nama', 'id', );
        
        $data['mapel'] = Mapel::pluck('nama', 'id', );
        
        if(auth()->user()->level == "Guru") {
            // dd(auth()->user());
            ($kelas_ids = MapelDetail::where('guru_id', auth()->user()->guru->id)->pluck('kelas_id'));
            $mapel_ids = MapelDetail::where('guru_id', auth()->user()->guru->id)->pluck('mapel_id');

            $data['kelas'] = Kelas::whereIn('id', $kelas_ids)->pluck('nama', 'id', );
            $data['mapel'] = Mapel::whereIn('id', $mapel_ids)->pluck('nama', 'id', );
        }
        
        return view('progress.create', $data);
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
        $this->validate($request, [
            // 'angkatan' => 'required|max:30',
            'progress' => 'required',
        ]);
        $requestData = $request->all();
        
        if (Progress::where([
            'jenjang_id' => $request->jenjang_id,
            'kelas_id' => $request->kelas_id,
            // 'angkatan' => $request->angkatan,
            'mapel_id' => $request->mapel_id,
            'progress' => $request->progress,
        ])->count()) {
            return redirect()->back()->with('error', 'Data sudah ada');
        }

        Progress::create($requestData);

        return redirect()->route('progress.index')->with('success', 'Berhasil menambah Progress');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Progress $progress)
    {
        $data["item"] = $progress;
        $data["progress"] = $progress;

        return view('progress.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Progress $progress)
    {
        $data["progress"] = $progress;
        $data[strtolower("Progress")] = $progress;
        // $data['angkatan'] = Pengaturan::first()->angkatan_registrasi;
        $data['jenjang'] = Jenjang::pluck('nama', 'id', );
        $data['kelas'] = Kelas::pluck('nama', 'id', );
        $data['mapel'] = Mapel::pluck('nama', 'id', );

        if(auth()->user()->level == "Guru") {
            $kelas_ids = MapelDetail::where('guru_id', auth()->user()->id)->pluck('kelas_id');
            $mapel_ids = MapelDetail::where('guru_id', auth()->user()->id)->pluck('mapel_id');

            $data['kelas'] = Kelas::whereIn('id', $kelas_ids)->pluck('nama', 'id', );
            $data['mapel'] = Mapel::whereIn('id', $mapel_ids)->pluck('nama', 'id', );
        }

        return view('progress.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Progress $progress)
    {
        $this->validate($request, [
            // 'angkatan' => "required",
            'progress' => "required",
        ]);
        
        if (Progress::where([
            'jenjang_id' => $request->jenjang_id,
            'kelas_id' => $request->kelas_id,
            // 'angkatan' => $request->angkatan,
            'progress' => $request->progress,
            'mapel_id' => $request->mapel_id,
        ])->where('id', '!=', $progress->id)->count()) {
            return redirect()->back()->with('error', 'Data sudah ada');
        }

        $requestData = $request->all();

        $progress->update($requestData);

        return redirect()->route('progress.index')->with('success', 'Berhasil mengubah Progress');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Progress $progress)
    {
        $progress->delete();

        return redirect()->route('progress.index')->with('success', 'Progress berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $progresss = Progress::whereIn('id', json_decode($request->ids, true))->get();

        Progress::whereIn('id', $progresss->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data progress');
    }

    public function laporan()
    {

        return view('progress.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Progress)->getTable();
        $object = (new Progress);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["progresss"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["progresss"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("progress.laporan.print", $data);
    }
}