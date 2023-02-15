<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        $data = [
            'user' => auth()->user()->user->toArray(),
            'pasien' => \App\Pasien::all()->toArray(),
            'action' => 'Pegawai\PasienController@simpan',
            'method' => 'POST',
        ];

        return view('pegawai.pasien.index', $data);
    }

    public function simpan(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'tlpn' => 'required'
            ]
        );

        
        // $tanggal_lahir = $request->input('tanggal_lahir');
        // $tanggal_lahir = explode('/', $tanggal_lahir);
        // dd($tanggal_lahir);
        // $tanggal_lahir = $tanggal_lahir[2] . '-' . $tanggal_lahir[1] . '-' . $tanggal_lahir[0];

        // $request->merge(['tanggal_lahir' => $tanggal_lahir]);
        \App\Pasien::create($request->only('nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'tlpn', 'alergi_obat', 'riwayat_penyakit', 'bpjs'));


        return redirect('pegawai/pasien')->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function ubah($id)
    {
        $pasien = \App\Pasien::findOrFail($id)->toArray();

        $data =
            [
                'id' => $id,
                'user' => auth()->user()->user->toArray(),
                'obj' => $pasien,
                'action' => ['Pegawai\PasienController@update', $id],
                'method' => 'PUT',
            ];

        return view('pegawai.pasien.form', $data);
    }

    public function periksa($id)
    {
        $pasien = \App\Pasien::find($id)->toArray();
        $periksa = \App\Periksa::where('pasien_id', $pasien['id'])->with('pegawai', 'dokter')->latest()->get()->toArray();

        $data = [
            'id' => $id,
            'user' => auth()->user()->user->toArray(),
            'pasien' => $pasien,
            'periksa' => $periksa,
            'action' => ['Pegawai\PasienController@simpan_periksa', $id],
            'method' => 'POST',
        ];

        return view('pegawai.pasien.periksa.index', $data);
    }

    public function simpan_periksa(Request $request, $id)
    {


        // cek poli dan umur pasien
        $pasien = \App\Pasien::find($id);

        if($request->poli == 'Poli Lansia' && \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($pasien->tanggal_lahir)) <= 60) {

            return redirect()->back()->with(['type' => 'error', 'pesan' => 'Poli lansia hanya untuk 60 thn ke atas']);
        }

        if($request->poli == 'Poli Anak' && \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($pasien->tanggal_lahir)) >= 12) {

            return redirect()->back()->with(['type' => 'error', 'pesan' => 'Poli anak hanya untuk 12 thn ke bawah']);
        }


        $this->validate(
            $request,
            [
                'dokter_id' => 'required',
                'pasien_id' => 'required',
                'gejala' => 'required'
            ]
        );

        $data = [
            'dokter_id' => $request->input('dokter_id'),
            'pasien_id' => $request->input('pasien_id'),
            'pegawai_id' => auth()->user()->user->id,
            'gejala' => $request->input('gejala'),
            'status_periksa' => 0,
            'obat' => '',
            'poli' => $request->input('poli'),
        ];

        \App\Periksa::create($data);

        return redirect('pegawai/pasien/' . $id . '/periksa')->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function ubah_periksa($id1, $id2)
    {
        $periksa = \App\Periksa::findOrFail($id2)->toArray();

        $data =
            [
                'id1' => $id1,
                'user' => auth()->user()->user->toArray(),
                'obj' => $periksa,
                'action' => ['Pegawai\PasienController@update_periksa', $id1, $id2],
                'method' => 'PUT',
            ];
        return view('pegawai.pasien.periksa.form', $data);
    }

    public function hapus_periksa($id1, $id2)
    {
        $periksa = \App\Periksa::findOrFail($id2);
        $periksa->delete();
        return redirect('pegawai/pasien/' . $id1 . '/periksa')->with(['type' => 'success', 'pesan' => 'Berhasil Hapus Data!']);

    }

    public function update_periksa(Request $request, $id1, $id2)
    {
        $this->validate(
            $request,
            [
                'dokter_id' => 'required',
                'gejala' => 'required'
            ]
        );

        $data = [
            'dokter_id' => $request->input('dokter_id'),
            'gejala' => $request->input('gejala'),
             'poli' => $request->input('poli'),
        ];

        \App\Periksa::findOrFail($id2)->update($data);

        return redirect('pegawai/pasien/' . $id1 . '/periksa')->with(['type' => 'success', 'pesan' => 'Berhasil Mengubah Data!']);
    }

    public function update(Request $request, Pasien $pasien) 
    {
        $pasien->update($request->all());

        return redirect()->back()->with(['type' => 'success', 'pesan' => 'Berhasil Mengubah Data!']);
    }


    public function cari(Request $request)
    {
        if (is_null($request->input('cari'))) {
            return redirect('pegawai/pasien');
        }

        $data = [
            'user' => auth()->user()->user->toArray(),
            'pasien' => \App\Pasien::where('nama', 'Like', '%' . $request->input('cari') . '%')->get()->toArray(),
            'cari' => $request->input('cari'),
            'obj' => null,
            'judul' => 'Tambah Data',
            'action' => 'Pegawai\PasienController@simpan',
            'method' => 'POST',
        ];

        return view('pegawai.pasien.index', $data);
    }
}
