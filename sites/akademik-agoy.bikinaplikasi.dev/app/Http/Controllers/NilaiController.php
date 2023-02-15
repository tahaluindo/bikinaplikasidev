<?php

namespace App\Http\Controllers;

use App\MapelDetail;
use App\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public $tahuns;

    public function __construct()
    {
        $this->tahuns = range(date("Y") - 5, date("Y"));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['nilais'] = Nilai::all();
        $data['mapels'] = MapelDetail::select('mapel_id')->get()->unique('mapel_id');
        $data['kelass'] = MapelDetail::select('kelas_id')->get()->unique('kelas_id');
        $data['users']  = MapelDetail::select('user_id')->get()->unique('user_id');
        $data['tahuns'] = $this->tahuns;


        if(auth()->user()->level == 'guru') {
            $mapel_detail_ids = MapelDetail::where('user_id', auth()->user()->id)->pluck('id')->toArray();

            $data['nilais'] = Nilai::whereIn('mapel_detail_id', $mapel_detail_ids)->get();
            $data['mapels'] = MapelDetail::whereIn('id', $mapel_detail_ids)->select('mapel_id')->get()->unique('mapel_id');
            $data['kelass'] = MapelDetail::whereIn('id', $mapel_detail_ids)->select('kelas_id')->get()->unique('kelas_id');
            $data['users']  = MapelDetail::whereIn('id', $mapel_detail_ids)->select('user_id')->get()->unique('user_id');
        }

        if (!$request->user_id && !$request->mapel_id && !$request->kelas_id) {
            if(auth()->user()->level == 'guru') {
                $data['nilais'] = Nilai::whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(100);
            } elseif(auth()->user()->level == 'siswa') {
                $mapel_detail_ids = MapelDetail::where('kelas_id', auth()->user()->kelas_id)->pluck('id')->toArray();
                $data['nilais'] = Nilai::whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(100);
            } else { 
                $data['nilais'] = Nilai::paginate(100);
            }

        } elseif ($request->user_id) {
            $user_ids = MapelDetail::where('user_id', $request->user_id)->pluck('user_id')->toArray();

            if ($request->user_id == "semua_user") {
                if(auth()->user()->level == 'guru') {

                    $data['nilais'] = Nilai::whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(100);
                } elseif(auth()->user()->level == 'siswa') {
                    
                    $data['nilais'] = Nilai::whereIn('mapel_detail_id', $mapel_detail_ids)->where('user_id', auth()->user()->id)->paginate(100);
                } else {

                    $data['nilais'] = Nilai::paginate(100);
                }
            } else {
                $data['nilais'] = Nilai::whereIn('user_id', $user_ids)->paginate(100);
            }
        } elseif ($request->kelas_id) {
            $kelas_ids = MapelDetail::where('kelas_id', $request->kelas_id)->pluck('kelas_id')->toArray();

            if ($request->kelas_id == "semua_kelas") {
                if(auth()->user()->level == 'guru') {

                    $data['nilais'] = Nilai::whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(100);
                } elseif(auth()->user()->level == 'siswa') {

                    $data['nilais'] = Nilai::whereIn('mapel_detail_id', $mapel_detail_ids)->where('user_id', auth()->user()->id)->paginate(100);
                } else {

                    $data['nilais'] = Nilai::paginate(100);
                }
            } else {
                $data['nilais'] = Nilai::whereIn('kelas_id', $kelas_ids)->paginate(100);
            }
        } elseif ($request->tahun) {

            if ($request->tahun == "semua_user") {
                if(auth()->user()->level == 'guru') {

                    $data['nilais'] = Nilai::whereIn('mapel_detail_id', $mapel_detail_ids)->paginate(100);
                } else {

                    $data['nilais'] = Nilai::paginate(100);
                }
            } else {
                $data['nilais'] = Nilai::whereIn('tahun', $this->tahuns)->paginate(100);
            }
        }

        return view('nilai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['mapel_details'] = MapelDetail::all();

        if(auth()->user()->level == 'guru') {

            $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get();
        }

        return view('nilai.create', $data);
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
            'mapel_detail_id' => 'required|exists:mapel_details,id',
            'tahun'           => 'required|in:' . implode(",", $this->tahuns),
            'semester'        => 'required|in:1,2',
        ]);

        // pengecekan nilai
        if (
            Nilai::where(['mapel_detail_id' => $request->mapel_detail_id, 'tahun' => $request->tahun])->first()
        ) {
            return redirect()->back()->with('error', "Nilai sudah ada");
        }

        Nilai::create($request->all());

        return redirect()->route('nilai.index')->with("success", "Berhasil menambah nilai");
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
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
        $data['mapel_details'] = MapelDetail::all();
        $data['nilai']         = $nilai;

        if(auth()->user()->level == 'guru') {
            
            $data['mapel_details'] = MapelDetail::where('user_id', auth()->user()->id)->get();
        }

        return view('nilai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
        $this->validate($request, [
            'mapel_detail_id' => 'required|exists:mapel_details,id',
            'tahun'           => 'required|in:' . implode(",", $this->tahuns),
            'semester'        => 'required|in:1,2',
        ]);

        // pengecekan nilai
        $nilai_ids = Nilai::where(['mapel_detail_id' => $request->mapel_detail_id, 'tahun' => $request->tahun])->pluck('id')->toArray();

        if (in_array($nilai->id, $nilai_ids)) {

            return redirect()->back()->with('error', "Nilai sudah ada");
        }

        $nilai->update($request->all());

        return redirect()->route('nilai.index')->with("success", "Berhasil mengupdate nilai");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
        $nilai->delete();

        return redirect()->route('nilai.index')->with("success", "Berhasil menghapus Nilai");
    }
}
