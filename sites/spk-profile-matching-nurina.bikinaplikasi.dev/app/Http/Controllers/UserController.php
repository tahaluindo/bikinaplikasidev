<?php

namespace App\Http\Controllers;

use App\User;
use App\Aspek;
use App\Kelas;
use App\Project;
use App\ProjectDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['user'] = User::paginate(100);

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

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        // cek jika usernya tidak ditemukan
        if(!$user->alternatif) {
            return back()->with('error', 'User tidak memiliki data alternatif');
        }

        $data['user'] = $user;
        $data['alternatif'] = $user->alternatif;

        $project = Project::find($user->alternatif->project->id);

        $project_detail_aspek_ids = ProjectDetail::where('project_id', $project->id)->pluck('aspek_id')->toArray();
        $data['aspeks']           = Aspek::whereIn('id', $project_detail_aspek_ids)->get();
        $data['kelass']           = Kelas::all();
        $data['project']           = $user->alternatif->project;
        $data['alternatif']           = $user->alternatif;

        return view('user.profile_table', $data);
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
        if(auth()->user()->level == "Admin") {
            $data['user'] = $user;
            $data['alternatif'] = $user->alternatif;

            return view('user.show', $data);
        } else {
            $project = Project::find($user->alternatif->project->id);

            $project_detail_aspek_ids = ProjectDetail::where('project_id', $project->id)->pluck('aspek_id')->toArray();
            $data['user'] = $user;
            $data['alternatif'] = $user->alternatif;
            $data['aspeks']           = Aspek::whereIn('id', $project_detail_aspek_ids)->get();
            $data['kelass']           = Kelas::all();
            $data['project']           = $user->alternatif->project;
            $data['alternatif']           = $user->alternatif;

            return view('user.show', $data);
        }

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
        // cek tanggal akhir perubahan profile yang dimiliki user
        if(strtotime($user->alternatif->project->tanggal_akhir_perubahan_profile) < strtotime(date('Y-m-d'))) {
            return back()->with('error', 'Tanggal perubahan profile telah berakhir.');
        }

        // todo: variable ini akan menampung semua nilai form
        $input = $request->all();

        // todo: jika admin menambahkan siswa baru
        $this->validate($request, [
            'nama'         => 'required|min:3|max:30',
            'email'        => 'required|email|min:5|max:30',
            'password'     => 'required|min:5|max:15'
        ]);

        // todo: jika user mengupdate foto profilenya
        if($request->foto) {
            $input['foto'] = "foto/" . $request->foto->getClientOriginalName();
            $request->foto->move("foto", $input['foto']);
        }

        // todo: simpan semua data yang sudah ditambah
        $user->update($input);

        return redirect()->route('user.show', $user->id)->with("success", "Berhasil mengupdate User");
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
}
