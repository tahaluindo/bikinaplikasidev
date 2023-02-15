<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\PembayaranSantri;
use App\PembayaranSantriBulan;
use App\PembayaranSantriDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class PembayaranSantriDetailController extends Controller
{
    private $statuss = [
        'Lunas', 'Belum Lunas', 'Bebas SPP', 'Bebas Makan', 'Santri Baru', 'Santri Keluar', 'Bebas SPP dan Uang Makan'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PembayaranSantri $pembayaranSantri)
    {
        $pembayaran_santri_details = $pembayaranSantri->pembayaran_santri_details->take(100)->reverse();

        // fiture untuk mencari berdasarkan semua columns
        if (request()->q) {
            $model = new PembayaranSantriDetail;
            $table = $model->getTable();
            $query = $model->query();

            // dapatkan semua column berdasarkan teble model
            // dilarang mencari berdasarkan id
            // index 0 = id
            $columns = Arr::except(Schema::getColumnListing($table), [0]);

            // buat querynya berdasarkan kata yang diinputkan disemua column
            foreach ($columns as $column) {

                $query->orWhere($column, 'LIKE', '%' . request()->q . '%');
            }

            // tambahkan berdasarkan relasi juga
            $query->where('pembayaran_santri_id', $pembayaranSantri->id);

            // jika user mencari berdasarkan nama user
            $user_ids = User::where('nama', 'like', '%' . request()->q . '%')->pluck('id')->toArray();
            $query->orWhereIn('user_id', $user_ids);

            // jika user mencari berdasarkan bulan
            $pembayaran_santri_bulan_ids = PembayaranSantriBulan::where('nama', 'like', '%' . request()->q . '%')->pluck('id')->toArray();
            $query->orWhereIn('pembayaran_santri_bulan_id', $pembayaran_santri_bulan_ids);

            // ambil datanya sebanyak 100 data
            $pembayaran_santri_details = $query->limit(100)->get();
        }

        return view('pembayaran_santri_detail.index', compact('pembayaran_santri_details', 'pembayaranSantri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PembayaranSantri $pembayaranSantri)
    {
        $pembayaran_santri_bulans = PembayaranSantriBulan::where('pembayaran_santri_id', $pembayaranSantri->id)->orderBy('id', 'DESC')->get();
        $statuss                  = $this->statuss;

        if (!$pembayaran_santri_bulans->count()) {
            return back()->with('error', 'Tidak ada bulan yang ditambahkan');
        }

        return view('pembayaran_santri_detail.create', compact('pembayaranSantri', 'pembayaran_santri_bulans', 'statuss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembayaranSantri $pembayaranSantri, Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'user_id'                    => 'required|exists:users,id',
            'pembayaran_santri_bulans.*' => 'required|exists:pembayaran_santri_bulans,id',
            'nominal_spp_dibayar'        => 'required|integer|max:8000000|min:0',
            'nominal_uang_makan_dibayar' => 'required|integer|max:8000000|min:0',
            'nominal_belum_dibayar'      => 'required|integer|max:8000000|min:0',
            'status'                     => "required|in:" . implode(',', $this->statuss),
            'tanggal_bayar'              => 'required|date',
            'catatan'                    => 'max:255',
        ]);

        // cek jika bulan tidak ada maka katakan bahwa bulan harus dipilih
        if (!count($request->pembayaran_santri_bulans ?? [])) {
            return back()->with('error', 'Bulan pembayaran wajib dipilih!');
        }

        // jika user menekan tombol cetak kwitansi
        if ($request->cetak_kwitansi) {
            $data['no']   = rand(1000, 9999);
            $data['nama'] = User::findOrFail($request->user_id)->nama;

            $bulans             = implode(', ', PembayaranSantriBulan::whereIn('id', $request->pembayaran_santri_bulans)->pluck('nama')->toArray());
            $data['pembayaran'] = "Pembayaran spp dan uang makan bulan " . $bulans;
            $data['kota']       = "Jambi";
            $data['tanggal']    = date('d F Y');
            $data['nominal']    = ($request->nominal_spp_dibayar + $request->nominal_uang_makan_dibayar - $request->nominal_belum_dibayar) * count($request->pembayaran_santri_bulans);
            $data['potongan']   = $request->potongan;
            $data['spp']        = ($request->nominal_spp_dibayar - $request->nominal_belum_dibayar) * count($request->pembayaran_santri_bulans);
            $data['uang_makan'] = $request->nominal_uang_makan_dibayar * count($request->pembayaran_santri_bulans);
            $data['catatan'] = $request->catatan;

            return view('pembayaran_santri_detail.kwitansi', $data);
        }

        // tambahkan pembayaran santri idnya untuk pembayaran yg mana gitu
        $request->request->add(['pembayaran_santri_id' => $pembayaranSantri->id]);

        // tambahkan untuk setiap bulan
        foreach ($request->pembayaran_santri_bulans as $pembayaran_santri_bulan_id) {
            $request->request->add(['pembayaran_santri_bulan_id' => $pembayaran_santri_bulan_id]);
            $pembayaran_santri_bulan = PembayaranSantriBulan::findOrFail($pembayaran_santri_bulan_id);

            // tapi sebelumnya cek dulu semua data pembayaran belum lunasnya
            $cek_data_pembayaran_belum_lunas = PembayaranSantriDetail::where([
                'pembayaran_santri_id' => $pembayaranSantri->id,
                'user_id' => $request->user_id,
                'status' => 'Belum Lunas'
            ])->get();

            if($cek_data_pembayaran_belum_lunas->count()) {
                $cek_data_pembayaran_belum_lunas_bulans = PembayaranSantriBulan::whereIn('id', $cek_data_pembayaran_belum_lunas->pluck('pembayaran_santri_bulan_id')->toArray())->pluck("nama")->toArray();
                $cek_data_pembayaran_belum_lunas_bulans = implode(',', $cek_data_pembayaran_belum_lunas_bulans);

                return back()->with('error', "Mohon lunasi pembayaran bulan {$cek_data_pembayaran_belum_lunas_bulans}!")->withInput($request->all());
            }

            // cek apakah ada data pembayaran di bulan yg sama kalo ada kasih tau udah ada dan gak boleh nambah lagi
            $cek_data_pembayaran = PembayaranSantriDetail::where([
                'pembayaran_santri_id' => $pembayaranSantri->id,
                'user_id' => $request->user_id,
                'pembayaran_santri_bulan_id' => $pembayaran_santri_bulan_id
            ])->get();

            // kalo gak ada data yg belum lunas barulah cek apakah ada data yg sama atau tidak
            if($cek_data_pembayaran->count()) {

                return back()->with('error', "Data pembayaran bulan {$pembayaran_santri_bulan->nama} sudah ada!")->withInput($request->all());
            }

            PembayaranSantriDetail::create($request->except(['pembayaran_santri_bulans', 'tags']));
        }

        return redirect()->route('pembayaran_santri_detail.index', ['pembayaran_santri' => $pembayaranSantri->id])->with('success', 'Berhasil menambah pembayaran santri detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PembayaranSantriDetail  $pembayaranSantriDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PembayaranSantriDetail $pembayaranSantriDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PembayaranSantriDetail  $pembayaranSantriDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranSantri $pembayaranSantri, PembayaranSantriDetail $pembayaranSantriDetail)
    {
        $pembayaran_santri_bulans = PembayaranSantriBulan::where('pembayaran_santri_id', $pembayaranSantri->id)->get();

        $pembayaran_santri_bulan_ids = PembayaranSantriDetail::where([
            'pembayaran_santri_id' => $pembayaranSantri->id,
            'user_id'              => $pembayaranSantriDetail->user_id,
        ])->pluck('pembayaran_santri_bulan_id')->toArray();

        $statuss = $this->statuss;

        return view('pembayaran_santri_detail.edit', compact(
            'pembayaranSantri',
            'pembayaran_santri_bulans',
            'statuss',
            'pembayaranSantriDetail',
            'pembayaran_santri_bulan_ids'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PembayaranSantriDetail  $pembayaranSantriDetail
     * @return \Illuminate\Http\Response
     */
    public function update(PembayaranSantri $pembayaranSantri, Request $request, PembayaranSantriDetail $pembayaranSantriDetail)
    {
        $this->validate($request, [
            'user_id'                    => 'required|exists:users,id',
            'pembayaran_santri_bulans'   => 'required',
            'pembayaran_santri_bulans.*' => 'required|exists:pembayaran_santri_bulans,id',
            'nominal_spp_dibayar'        => 'required|integer|max:8000000|min:0',
            'nominal_uang_makan_dibayar' => 'required|integer|max:8000000|min:0',
            'nominal_belum_dibayar'      => 'required|integer|max:8000000|min:-8000000',
            'status'                     => "required|in:" . implode(',', $this->statuss),
            'tanggal_bayar'              => 'required|date',
            'catatan'                    => 'max:255',
        ]);

        // cek jika bulan tidak ada maka katakan bahwa bulan harus dipilih
        if (!count($request->pembayaran_santri_bulans ?? [])) {
            return back()->with('error', 'Bulan pembayaran wajib dipilih!');
        }

        // jika user menekan tombol cetak kwitansi
        if ($request->cetak_kwitansi) {
            $data['no']   = rand(1000, 9999);
            $data['nama'] = User::findOrFail($request->user_id)->nama;

            $bulans             = implode(', ', PembayaranSantriBulan::whereIn('id', $request->pembayaran_santri_bulans)->pluck('nama')->toArray());
            $data['pembayaran'] = "Pembayaran spp dan uang makan bulan " . $bulans;
            $data['kota']       = "Jambi";
            $data['tanggal']    = date('d F Y');

            // bedakan yg lunas memang lunas dengan yg lunas tapi karena tunggakan
            if($request->status == 'Lunas' &&  $request->nominal_belum_dibayar < 0) {

                $data['spp']        = ($request->nominal_spp_dibayar) * count($request->pembayaran_santri_bulans);
                $data['uang_makan'] = $request->nominal_uang_makan_dibayar * count($request->pembayaran_santri_bulans);
                $data['nominal']    = ($request->nominal_spp_dibayar + $request->nominal_uang_makan_dibayar) * count($request->pembayaran_santri_bulans);
            } else {

                $data['spp']        = ($request->nominal_spp_dibayar - $request->nominal_belum_dibayar) * count($request->pembayaran_santri_bulans);
                $data['uang_makan'] = $request->nominal_uang_makan_dibayar * count($request->pembayaran_santri_bulans);
                $data['nominal']    = ($request->nominal_spp_dibayar + $request->nominal_uang_makan_dibayar - $request->nominal_belum_dibayar) * count($request->pembayaran_santri_bulans);
            }

            $data['potongan']   = $request->potongan;
            $data['catatan'] = $request->catatan;

            return view('pembayaran_santri_detail.kwitansi', $data);
        }

        // tambahkan pembayaran santri idnya untuk pembayaran yg mana gitu
        $request->request->add(['pembayaran_santri_id' => $pembayaranSantri->id]);

        // hapus dulu data sebelumnya lalu kemudian buat baru, biar gampang
        PembayaranSantriDetail::where([
            'pembayaran_santri_id' => $pembayaranSantri->id,
            'user_id'              => $pembayaranSantriDetail->user->id,
        ])->delete();

        // tambahkan untuk setiap bulan
        foreach ($request->pembayaran_santri_bulans ?? [] as $pembayaran_santri_bulan_id) {
            $request->request->add(['pembayaran_santri_bulan_id' => $pembayaran_santri_bulan_id]);

            if($request->status == "Belum Lunas") {

                $request->request->add(['nominal_belum_dibayar' => abs($request->nominal_belum_dibayar)]);
            } else {

                $request->request->add(['pembayaran_santri_bulan_id' => $pembayaran_santri_bulan_id]);
            }

            PembayaranSantriDetail::create($request->except(['pembayaran_santri_bulans', 'tags']));
        }

        return redirect()->route('pembayaran_santri_detail.index', ['pembayaran_santri' => $pembayaranSantri->id])->with('success', 'Berhasil menambah pembayaran santri detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PembayaranSantriDetail  $pembayaranSantriDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembayaranSantri $pembayaranSantri, PembayaranSantriDetail $pembayaranSantriDetail)
    {
        $pembayaranSantriDetail->delete();

        return redirect()->route('pembayaran_santri_detail.index', ['pembayaran_santri' => $pembayaranSantri->id])->with('success', 'Berhasil menghapus pembayaran santri detail');
    }

    public function get_users()
    {
        $users = User::limit(10)->where('level', '!=', 'admin')->where('nama', 'like', '%' . request()->term . '%')->with('kelas')->orderBy('id', 'DESC')->get();

        return response()->json($users);
    }

    public function hapus_semua(Request $request)
    {
        $pembayaran_santri_details = PembayaranSantriDetail::whereIn('id', json_decode($request->ids, true))->get();

        PembayaranSantriDetail::whereIn('id', $pembayaran_santri_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pembayaran santri detail');
    }

    public function lunaskan(PembayaranSantri $pembayaranSantri, PembayaranSantriDetail $pembayaranSantriDetail)
    {
        $pembayaran_santri_bulans = PembayaranSantriBulan::where('pembayaran_santri_id', $pembayaranSantri->id)->get();

        $pembayaran_santri_bulan_ids = PembayaranSantriDetail::where([
            'pembayaran_santri_id' => $pembayaranSantri->id,
            'user_id'              => $pembayaranSantriDetail->user_id,
        ])->pluck('pembayaran_santri_bulan_id')->toArray();

        $statuss = $this->statuss;

        return view('pembayaran_santri_detail.pelunasan', compact(
            'pembayaranSantri',
            'pembayaran_santri_bulans',
            'statuss',
            'pembayaranSantriDetail',
            'pembayaran_santri_bulan_ids'
        ));

    }

    public function lunaskanUpdate(Request $request, PembayaranSantri $pembayaranSantri, PembayaranSantriDetail $pembayaranSantriDetail)
    {
        $this->validate($request, [
            'user_id'                    => 'required|exists:users,id',
            'pembayaran_santri_bulans.*' => 'required|exists:pembayaran_santri_bulans,id',
            'nominal_belum_dibayar'      => 'required|integer|max:8000000|min:0',
            'tanggal_bayar'              => 'required|date',
        ]);

        if($request->cetak_kwitansi) {
            $data['no']   = rand(1000, 9999);
            $data['nama'] = User::findOrFail($request->user_id)->nama;

            $bulans             = implode(', ', PembayaranSantriBulan::whereIn('id', $request->pembayaran_santri_bulans)->pluck('nama')->toArray());
            $data['pembayaran'] = "Pelunasan spp dan uang makan bulan " . $bulans;
            $data['kota']       = "Jambi";
            $data['tanggal']    = date('d F Y');
            $data['nominal']    = $request->nominal_belum_dibayar * count($request->pembayaran_santri_bulans);
            $data['catatan']    = $request->catatan;

            return view('pembayaran_santri_detail.kwitansi_pelunasan', $data);
        }

        PembayaranSantriDetail::where([
            'pembayaran_santri_id' => $pembayaranSantri->id,
            'user_id' => $pembayaranSantriDetail->user_id
        ])->whereIn('pembayaran_santri_bulan_id', $request->pembayaran_santri_bulans)->update([
            'nominal_belum_dibayar' => $pembayaranSantriDetail->nominal_belum_dibayar * -1,
            'status' => 'Lunas'
        ]);

        return redirect()->route('pembayaran_santri_detail.index', ['pembayaran_santri' => $pembayaranSantri->id])->with('success', 'Berhasil melunaskan pembayaran santri detail');
    }
}
