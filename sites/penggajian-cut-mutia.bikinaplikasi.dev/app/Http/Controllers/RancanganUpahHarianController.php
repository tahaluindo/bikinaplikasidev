<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Penggajian;
use App\Models\RancanganUpahHarian;
use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use App\Models\Absensi;

class RancanganUpahHarianController extends Controller
{
    public function index()
    {
        //
        $data['rancangan_upah_harians'] = RancanganUpahHarian::paginate(1000)->reverse();

        return view('rancangan-upah-harian.index', $data);
    }
    
    public function create()
    {
        // memilih karyawan yang belum gajian
        $riwayat_jabatan_karyawan_ids = RiwayatJabatan::where('status', 'Aktif')->pluck('karyawan_id')->unique()->toArray();
        $data['karyawans'] = Karyawan::whereIn('id', $riwayat_jabatan_karyawan_ids)->get();

        return view('rancangan-upah-harian.create', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'karyawan_id'      => 'required|exists:karyawan,id',
            'periode' => 'required'
        ]);

        $requestData = $request->all();

        if($request->satuan == '1.666 Pokok') {

            $requestData['total'] = 1666 * $request->harga_satuan;
        }

        if($request->satuan == '1.700 Pokok') {

            $requestData['total'] = 1700 * $request->harga_satuan;
        }

        RancanganUpahHarian::create($requestData);

        return redirect()->route('rancangan-upah-harian.index')->with('success', 'Berhasil menambah rancangan upah harian');
    }
    
    public function show(Penggajian $rancangan_upah_harian)
    {
        //
    }
    
    public function edit(RancanganUpahHarian $rancangan_upah_harian)
    {
        $riwayat_jabatan_karyawan_ids = RiwayatJabatan::where('status', 'Aktif')->pluck('karyawan_id')->unique()->toArray();
        $data['karyawans'] = Karyawan::whereIn('id', $riwayat_jabatan_karyawan_ids)->get();
        $data['rancangan_upah_harian'] = $rancangan_upah_harian;

        return view('rancangan-upah-harian.edit', $data);
    }
    
    public function update(Request $request, RancanganUpahHarian $rancangan_upah_harian)
    {
        $this->validate($request, [
            
        ]);

        $requestData = $request->all();

        $rancangan_upah_harian->update($requestData);

        return redirect()->route('rancangan-upah-harian.index')->with('success', 'Berhasil mengupdate rancangan upah harian');
    }


    public function destroy(RancanganUpahHarian $rancangan_upah_harian)
    {
        $rancangan_upah_harian->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus rancangan upah harian');
    }

    public function hapus_semua(Request $request)
    {
        $rancangan_upah_harians = Penggajian::whereIn('id', json_decode($request->ids, true))->get();

        Penggajian::whereIn('id', $rancangan_upah_harians->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data rancangan upah harian');
    }

    public function laporan()
    {
        $data['limit'] = RancanganUpahHarian::count();
        $data['periodes'] = ['' => '', 'Jan' => 'Januari', 'Feb' => 'Februari', 'Mar' => 'Maret', 'Apr' => 'April', 'Mei' => 'Mei', 'Jun' => 'Juni', 'Jul' => 'Juli', 'Aug' => 'Agustus', 'Sep' => 'September', 'Okt' => 'Oktober', 'Nov' => 'November', 'Des' => 'Desember'];
        $data['tahuns'] = range(date('Y') - 5, date('Y'));
        array_unshift($data['tahuns'], '');

        return view('rancangan-upah-harian.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $this->validate($request, [
            'field' => 'required|in:id,gaji,bpjs,periode,tahun,tanggal,catatan',
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . RancanganUpahHarian::count(),
        ]);
        
        $periode = $request->periode . "-" . $request->tahun;

        $data['rancangan_upah_harians'] = RancanganUpahHarian::where('periode', 'like', "%$periode%")
            ->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data['rancangan_upah_harians']->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view('rancangan-upah-harian.laporan.print', $data);
    }

    public function getTotalJam(Karyawan $karyawan)
    {

        return $this->getGaji($karyawan) / env('APP_GAJI_PER_JAM');
    }
}
