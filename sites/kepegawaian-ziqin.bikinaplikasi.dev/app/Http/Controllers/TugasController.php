<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Tugas;
use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use App\Http\Controllers\Controller;

//use App\Models\Absensi;

class tugasController extends Controller
{

    // protected $table = 'session';
    // public $timestamps = false;

    // /**
    // * The database primary key value.
    // *
    // * @var string
    // */
    // protected $primaryKey = 'id';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['tugass'] = tugas::paginate(1000)->reverse();

        return view('tugas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // memilih pegawai yang belum gajian
        // $pegawais = Pegawai::pluck('id')->toArray();
        // $pegawai_ids = tugas::whereIn('pegawai_id', $pegawais)->get();
        // $data['pegawais'] = Pegawai::whereNotIn(['pegawai_id', $pegawai_ids]);
        $riwayat_jabatan_pegawai_ids = RiwayatJabatan::where('status', 'Aktif')->pluck('pegawai_id')->unique()->toArray();
        $data['pegawais'] = Pegawai::whereIn('id', $riwayat_jabatan_pegawai_ids)->get()->map(function($item) {

            $item->total_gaji = $this->getGaji($item);

            return $item;
        });

        return view('tugas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request->all());
        $this->validate($request, [
            'pegawai_id'=> 'required|exists:pegawai,id',  
            'nomor_st' => 'required|unique:tugas,nomor_st',
            'tugas' => 'required',
            'file' => 'required',
            'catatan' => 'required',
        ]);


        // $file = $request->file('file');
 
      	//         // nama file
		// echo 'File Name: '.$file->getClientOriginalName();
		// echo '<br>';
 
      	//         // ekstensi file
		// echo 'File Extension: '.$file->getClientOriginalExtension();
		// echo '<br>';
 
      	//         // real path
		// echo 'File Real Path: '.$file->getRealPath();
		// echo '<br>';
 
      	//         // ukuran file
		// echo 'File Size: '.$file->getSize();
		// echo '<br>';
 
      	//         // tipe mime
		// // echo 'File Mime Type: '.$file->getMimeType();
 
      	//         // isi dengan nama folder tempat kemana file diupload
		// $tujuan_upload = 'public/image';
 
        //         // upload file
		// $file->move($tujuan_upload,$file->getClientOriginalName());
        
        $requestData = $request->all();


        if ($request->hasFile('file')) {
            $requestData['file'] = "uploads/" . time() . $request->file->getClientOriginalName();
            $request->file->move("uploads", $requestData['file']);
        }

       // $requestData['tanggal_kirim'] -> 'datetime';

        Tugas::create($requestData);

        return redirect()->route('tugas.index')->with('success', 'Berhasil menambah tugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit(tugas $tugas)
    {
        $riwayat_jabatan_pegawai_ids = RiwayatJabatan::where('status', 'Aktif')->pluck('pegawai_id')->unique()->toArray();
        $data['pegawais'] = Pegawai::whereIn('id', $riwayat_jabatan_pegawai_ids)->get();
        $data['tugas'] = $tugas;

        return view('tugas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tugas $tugas)
    {
        //dd($request);
        $this->validate($request, [
            'pegawai_id'=> 'required|exists:pegawai,id',  
            'nomor_st' => "required|unique:tugas,nomor_st,$tugas->nomor_st,nomor_st",
            'tugas' => 'required',
            'file' => '',
            'catatan' => 'required',
        ]);

$requestData = $request->all();

       if ($request->hasFile('file')) {
            $requestData['file'] = "uploads/" . $request->file->getClientOriginalName();
            $request->file->move("uploads", $requestData['file']);

            \File::delete($tugas->file);
        }

        

        // pengecekan jabatan aktif atau tidak
        // $riwayat_jabatan = RiwayatJabatan::where(['pegawai_id' => $request->pegawai_id, 'status' => 'Aktif'])->get()->first();
        
        // if(!$riwayat_jabatan) {

        //     return back()->with('error', 'Tidak ada riwayat jabatan yang aktif');
        // }

        // pengecekan sudah digaji atau belum

        // $requestData['gaji'] = $this->getGaji(Pegawai::findOrFail($request->pegawai_id));
        // $requestData['tunjangan'] = $riwayat_jabatan->tunjangan_jabatan;
        // $requestData['bonus'] = $riwayat_jabatan->bonus_jabatan;
        
        $tugas->update($requestData);

        return redirect()->route('tugas.index')->with('success', 'Berhasil mengupdate tugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tugas)
    {
        $tugas->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus tugas');
    }

    public function hapus_semua(Request $request)
    {
        $tugass = tugas::whereIn('id', json_decode($request->ids, true))->get();

        tugas::whereIn('id', $tugass->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data tugas');
    }
    
    public function laporan()
    {
        $data['limit'] = tugas::count();
        $data['files'] = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $data['tahuns'] = range(date('Y') - 5, date('Y'));
        array_unshift($data['tahuns'], '');
        
        return view('tugas.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $this->validate($request, [
            'field' => 'required|in:id,gaji,tunjangan,file,tahun,tanggal,catatan',
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . tugas::count(),
        ]);

        $data['tugass'] = tugas::where('file', 'like', "%$request->file%")
        ->where('created_at', 'like', "%$request->tahun%")
        ->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data['tugass']->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view('tugas.laporan.print', $data);
    }

    public function getGaji(Pegawai $pegawai)
    {
        return RiwayatJabatan::where('pegawai_id', $pegawai->id)->where('gaji_jabatan', '!=', '')->get()->map(function($item) {
            $item->total_jam = \Carbon\Carbon::parse($item->gaji_jabatan)->diffInHours(\Carbon\Carbon::parse($item->gaji_jabatan));

            return $item;
        })->sum('9') * env('APP_GAJI_PER_JAM');
    }

    public function getTotalJam(Pegawai $pegawai)
    {
        
        return $this->getGaji($pegawai) / env('APP_GAJI_PER_JAM');
    }
}
