<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\AlternatifDetail;
use App\Aspek;
use App\Http\Controllers\Controller;
use App\Kriteria;
use App\Project;
use App\ProjectDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Lokasi;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['projects'] = Project::paginate(100);

        if (auth()->user()->level == "Siswa") {
            // $alternatif_ids = Alternatif::where('user_id', auth()->user()->id)->pluck('project_id')->toArray();

            // $data['projects'] = Project::whereIn('id', $alternatif_ids)->paginate(100);

            $alternatif_ids = Alternatif::where('user_id', auth()->user()->id)->pluck('project_id')->toArray();

            $data['projects']               = Project::paginate(100);
            $data['alternatif_project_ids'] = Alternatif::where('user_id', auth()->user()->id)->pluck('project_id')->toArray();
        }

        return view('project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $aspek_detail_aspek_ids = Kriteria::distinct()->pluck('aspek_id')->toArray();
        $data['aspeks']         = Aspek::whereIn('id', $aspek_detail_aspek_ids)->get();
        $data['lokasis'] = Lokasi::all();

        return view('project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama'                            => 'required|min:3|max:50',

            'keterangan'                      => 'required|min:3|max:255',
            'aspek_ids'                       => 'required|min:1',
            'lokasi_id'                       => 'required',
        ]);

        $project_create = Project::create($request->except(['aspek_ids']));

        foreach ($request->aspek_ids as $aspek_id) {
            ProjectDetail::create([
                'project_id' => $project_create->id,
                'aspek_id'   => $aspek_id,
            ]);
        }

        return redirect()->route('project.index')->with("success", "Berhasil menambah pemilih rumah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        $data['project'] = $project;

        return view('project.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $data['project']        = $project;
        $aspek_detail_aspek_ids = Kriteria::distinct()->pluck('aspek_id')->toArray();
        $data['aspeks']         = Aspek::whereIn('id', $aspek_detail_aspek_ids)->get();
        $data['lokasis'] = Lokasi::all();

        return view('project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $this->validate($request, [
            'nama'                            => 'required|min:3|max:50',

            'keterangan'                      => 'required|min:3|max:255',
            'aspek_ids'                       => 'required|min:1',
            'lokasi_id'                       => 'required',
        ]);

        $project->update($request->except(['aspek_ids']));

        // buang data project detail sebelumnya dan kemudian buat ulang.
        ProjectDetail::where('project_id', $project->id)->delete();

        foreach ($request->aspek_ids as $aspek_id) {
            ProjectDetail::create([
                'project_id' => $project->id,
                'aspek_id'   => $aspek_id,
            ]);
        }

        return redirect()->route('project.index')->with("success", "Berhasil mengupdate pemilih rumah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();

        return redirect()->route('project.index')->with("success", "Berhasil menghapus pemilih rumah");
    }

    public function hapus_semua(Request $request)
    {
        $projects = Project::whereIn('id', json_decode($request->ids, true))->get();

        Project::whereIn('id', $projects->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data project');
    }

    public function register(Project $project)
    {
        // deteksi apakah user sudah pernah daftar beasiswa atau belum
        $alternatif_project_ids = Alternatif::where('user_id', auth()->user()->id)->pluck('project_id')->toArray();
        $project_ids            = Project::whereIn('id', $alternatif_project_ids)->where('tanggal_mulai_daftar', '<=', date('Y-m-d'))->get();

        if ($project_ids->count()) {
            return redirect()->back()->with('error', 'Kamu sudah teregistrasi di beasiswa lain yang berjalan.');
        }

        \DB::transaction(function () use ($project) {
            $alternatif               = collect(auth()->user()->alternatif)->except(['id', 'project_id', 'status'])->toArray();
            $alternatif['project_id'] = $project->id;
            $alternatif['status']     = "Belum Disetujui";

            $alternatifCreate = Alternatif::create($alternatif);

            foreach (auth()->user()->alternatif->alternatif_details as $alternatif_detail) {
                $alternatif_detail                  = collect($alternatif_detail)->only(['kriteria_detail_id'])->toArray();
                $alternatif_detail['alternatif_id'] = $alternatifCreate->id;

                AlternatifDetail::create($alternatif_detail);
            }
        });

        return redirect()->back()->with('success', 'Berhasil meregistrasi alternatif ke Data Permilih Rumah ini');
    }
}
