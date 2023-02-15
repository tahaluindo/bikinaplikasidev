<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use App\Models\Penggajian;
use App\Models\RancanganUpahHarian;
use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use App\Models\Absensi;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['penggajians'] = Penggajian::paginate(1000)->reverse();

        return view('penggajian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $riwayat_jabatan_karyawan_ids = RiwayatJabatan::where('status', 'Aktif')->pluck('karyawan_id')->unique()->toArray();
        $data['karyawans'] = Karyawan::whereIn('id', $riwayat_jabatan_karyawan_ids)->get();

        return view('penggajian.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'karyawan_id' => 'required',
            'bpjs' => 'required',
            'bonus' => 'required',
            'hutang' => 'required',
            'periode' => 'required',
            'tahun' => 'required',
            'tanggal' => 'required',
        ]);

        $dataInput = $request->except(['_token']);
        $dataInput['gaji_pokok'] = RiwayatJabatan::where([
            'status' => 'aktif',
            'karyawan_id' => $request->karyawan_id
        ])->first()->gaji_pokok;

        Penggajian::create($dataInput);

        return redirect()->route('penggajian.index')->with('success', 'Berhasil menambah penggajian');
    }

    public function show(RancanganUpahHarian $penggajian)
    {
        //
    }

    public function edit(Penggajian $penggajian)
    {

        $data['penggajian'] = $penggajian;
        $data['karyawans'] = Karyawan::all();

        return view('penggajian.edit', $data);
    }

    public function update(Request $request, Penggajian $penggajian)
    {
        $this->validate($request, [
            'karyawan_id' => 'required',
            'bpjs' => 'required',
            'bonus' => 'required',
            'hutang' => 'required',
            'periode' => 'required',
            'tahun' => 'required',
            'tanggal' => 'required',
        ]);

        $dataInput = $request->except(['_token']);
        $dataInput['gaji_pokok'] = RiwayatJabatan::where([
            'status' => 'aktif',
            'karyawan_id' => $request->karyawan_id
        ])->first()->gaji_pokok;

        $penggajian->update($dataInput);

        return redirect()->route('penggajian.index')->with('success', 'Berhasil mengupdate penggajian');
    }

    public function destroy(RancanganUpahHarian $penggajian)
    {
        $penggajian->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus penggajian');
    }

    public function hapus_semua(Request $request)
    {
        $penggajians = RancanganUpahHarian::whereIn('id', json_decode($request->ids, true))->get();

        RancanganUpahHarian::whereIn('id', $penggajians->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data penggajian');
    }

    public function laporan()
    {
        $data['limit'] = RancanganUpahHarian::count();
        $data['periodes'] = ['' => '', 'Jan' => 'Januari', 'Feb' => 'Februari', 'Mar' => 'Maret', 'Apr' => 'April', 'Mei' => 'Mei', 'Jun' => 'Juni', 'Jul' => 'Juli', 'Aug' => 'Agustus', 'Sep' => 'September', 'Okt' => 'Oktober', 'Nov' => 'November', 'Des' => 'Desember'];
        $data['tahuns'] = range(date('Y') - 5, date('Y'));
        array_unshift($data['tahuns'], '');

        return view('penggajian.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $this->validate($request, [
            'field' => 'required|in:id,gaji,bpjs,periode,tahun,tanggal,catatan',
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . Penggajian::count(),
        ]);

        $periode = $request->periode . "-" . $request->tahun;

        $data['penggajians'] = Penggajian::where('tanggal', 'like', "%$periode%")
            ->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data['penggajians']->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view('penggajian.laporan.print', $data);
    }

    public function getGaji(Karyawan $karyawan)
    {
        return Absensi::where('karyawan_id', $karyawan->id)->where('jam_masuk', '!=', '')->where('jam_keluar', '!=', '')->get()->map(function ($item) {
                $item->total_jam = \Carbon\Carbon::parse($item->jam_keluar)->diffInHours(\Carbon\Carbon::parse($item->jam_masuk));

                return $item;
            })->sum('total_jam') * env('APP_GAJI_PER_JAM');
    }

    public function getTotalJam(Karyawan $karyawan)
    {

        return $this->getGaji($karyawan) / env('APP_GAJI_PER_JAM');
    }


    public function slipGaji(Penggajian $penggajian)
    {
        $data['penggajian'] = $penggajian;

        $periode = substr($penggajian->periode, 0, 3) . "-" . $penggajian->tahun;
        $data['periode'] = $periode;

        $total_hari_cuti = 0;
        ($cuti = Cuti::where('karyawan_id', $penggajian->karyawan_id)->where('tanggal_mulai', 'like', "%$periode%")->get());
        foreach ($cuti as $item) {

            $total_hari_cuti += (new \Carbon\Carbon)->parse(date('Y-m-d', strtotime($item->tanggal_mulai)))->diffInDays(date('Y-m-d', strtotime($item->tanggal_selesai)));
        }

        $data['cuti'] = $cuti;
        $data['total_hari_cuti'] = $total_hari_cuti;
        
        
        ($data['rancangan_upah_harian'] = RancanganUpahHarian::where('karyawan_id', $penggajian->karyawan_id)->where("periode", "like", "%" . date("M", strtotime($penggajian->periode)) . "-" . $penggajian->tahun . "%")->get());

        return view('penggajian.slip-gaji', $data);
    }
}
