<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\AlternatifDetail;
use App\Aspek;
use App\Http\Controllers\Controller;
use App\Kelas;
use App\Project;
use App\ProjectDetail;
use App\User;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Project $project)
    {
        //
        if ($request->alternatif_id) {
            $data['alternatifs'] = Alternatif::where(['project_id' => $project->id, 'id' => $request->alternatif_id])->paginate(100);
        } else {
            $data['alternatifs'] = Alternatif::where(['project_id' => $project->id])->paginate(100);

        }
        $data['project'] = $project;

        return view('alternatif.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        //
        $data['project']          = $project;
        $project_detail_aspek_ids = ProjectDetail::where('project_id', $project->id)->pluck('aspek_id')->toArray();
        $data['aspeks']           = Aspek::whereIn('id', $project_detail_aspek_ids)->get();

        return view('alternatif.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        //
        $this->validate($request, [
            'nama'                  => 'required|min:1|max:30',
            'no_identitas'          => 'required|min:1|max:999999999999999|unique:alternatifs,no_identitas',
            'alamat'          => 'required|min:10|max:255',
            'no_telp'          => 'required|integer|digits_between:10,15|unique:alternatifs,no_telp',
        ]);

        $request->request->add(['project_id' => $project->id]);

        $alternatif_create = Alternatif::create($request->except([
            'kriteria_detail_ids', 'from', 'email', 'password', 'password_confirmation',
        ]));

        foreach ($request->kriteria_detail_ids as $kriteria_detail_id) {
            AlternatifDetail::create([
                'alternatif_id'      => $alternatif_create->id,
                'kriteria_detail_id' => $kriteria_detail_id,
            ]);
        }

        // jika dari register user biasa
        if ($request->from) {
            return back()->with("success", "Berhasil meregistrasi alternatif");
        }

        return redirect()->route('alternatif.index', ['project' => $project->id])->with("success", "Berhasil menambah alternatif");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Alternatif $alternatif)
    {
        //
        $data['alternatif'] = $alternatif;
        $data['project']    = $project;

        return view('alternatif.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Alternatif $alternatif)
    {
        //
        $data['alternatif']       = $alternatif;
        $data['project']          = $project;
        $project_detail_aspek_ids = ProjectDetail::where('project_id', $project->id)->pluck('aspek_id')->toArray();
        $data['aspeks']           = Aspek::whereIn('id', $project_detail_aspek_ids)->get();

        return view('alternatif.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Alternatif $alternatif)
    {
        //
        $this->validate($request, [
            'nama'                  => 'required|min:1|max:30',

            'no_identitas'          => "required|min:1|max:999999999999999|unique:alternatifs,no_identitas,$alternatif->no_identitas,no_identitas",
            'kriteria_detail_ids.*' => 'required|exists:kriteria_details,id',
            'alamat'          => 'required|min:10|max:255',

            'kriteria_detail_ids.*' => 'required|exists:kriteria_details,id',
            'no_telp'          => "required|integer|digits_between:10,15|unique:alternatifs,no_telp,$alternatif->no_telp,no_telp",
        ]);

        $request->request->add(['project_id' => $project->id]);

        $alternatif->update($request->except(['kriteria_detail_ids', 'email', 'password', 'password_confirmation', 'from']));

        // buang semua data alternatif detail lalu buat ulang
        AlternatifDetail::where('alternatif_id', $alternatif->id)->delete();

        foreach ($request->kriteria_detail_ids as $kriteria_detail_id) {
            AlternatifDetail::create([
                'alternatif_id'      => $alternatif->id,
                'kriteria_detail_id' => $kriteria_detail_id,
            ]);
        }

        $input = $request->only(['nama', 'password']);

        // todo: jika user mengupdate foto profilenya
        if ($request->foto) {
            $input['foto'] = "foto/" . $request->foto->getClientOriginalName();
            $request->foto->move("foto", $input['foto']);
        }

        // kalo user siswa yang edit
        if (auth()->user()->level == "Siswa") {
            return redirect()->route('user.show', auth()->user()->id)->with("success", "Berhasil Mengupdate Profile");
        }

        return redirect()->route('alternatif.index', ['project' => $project->id])->with("success", "Berhasil mengupdate Alternatif");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Alternatif $alternatif)
    {
        //
        $alternatif->delete();

        return redirect()->route('alternatif.index', ['project' => $project->id])->with("success", "Berhasil menghapus alternatif");
    }

    public function hapus_semua(Request $request)
    {
        $alternatifs = Alternatif::whereIn('id', json_decode($request->ids, true))->get();

        Alternatif::whereIn('id', $alternatifs->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data alternatif');
    }

    public function register(Project $project)
    {
        //
        $data['project']          = $project;
        $project_detail_aspek_ids = ProjectDetail::where('project_id', $project->id)->pluck('aspek_id')->toArray();
        $data['aspeks']           = Aspek::whereIn('id', $project_detail_aspek_ids)->get();

        return view('alternatif.register', $data);
    }

    public function setujui(Project $project, Alternatif $alternatif)
    {
        $alternatif->update([
            'status' => 'Disetujui',
        ]);

        return back()->with('Berhasil menyetujui');
    }

    public function batalkan(Project $project, Alternatif $alternatif)
    {
        $alternatif->update([
            'status' => 'Dibatalkan',
        ]);

        return back()->with('Berhasil membatalkan');
    }
}
