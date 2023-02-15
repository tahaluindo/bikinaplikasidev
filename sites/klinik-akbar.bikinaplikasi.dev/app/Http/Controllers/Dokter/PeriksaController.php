<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeriksaController extends Controller
{
    public function all()
    {
        $user = auth()->user()->user->toArray();
        $periksa = \App\Periksa::with('pasien', 'dokter')->latest()->get()->toArray();

        $data = [
            'user' => $user,
            'periksa' => $periksa,
        ];

        return view('dokter.periksa.all', $data);
    }
    public function today()
    {
        $user = auth()->user()->user->toArray();
        $periksa = \App\Periksa::where('dokter_id', $user['id'])->with('pasien')->whereDate('created_at', \Carbon\Carbon::today())->latest()->get()->toArray();

        $data = [
            'user' => $user,
            'periksa' => $periksa,
        ];

        if(request()->rumah_sakit_rujukan && request()->rumah_sakit_rujukan != '') {

            \App\Periksa::findOrFail(request()->periksa_id)->update([
                'rumah_sakit_rujukan' => request()->rumah_sakit_rujukan
            ]);

            return redirect()->back()->with(['type' => 'success', 'pesan' => 'Berhasil menambahkan rumah sakit rujukan']);
        }

        return view('dokter.periksa.today', $data);
    }

    public function periksa($id)
    {
        $periksa = \App\Periksa::where('id', $id);

        if ($periksa->first()->status_periksa < 1) {
            $periksa->update(['status_periksa' => 1]);
        }

        $data = [
            'id' => $id,
            'user' => auth()->user()->user->toArray(),
            'periksa' => $periksa->with('pasien')->first()->toArray(),
            'action' => ['Dokter\PeriksaController@simpan_periksa', $id],
            'method' => 'PUT',
        ];

        return view('dokter.periksa.periksa', $data);
    }

    public function simpan_periksa(Request $request, $id)
    {
        $this->validate($request, [
            'diagnosa' => 'required',
            'obat' => 'required',
        ]);

        $data = [
            'diagnosa' => $request->input('diagnosa'),
            'obat' => $request->input('obat'),
            'status_periksa' => 2,
        ];

        $periksa = \App\Periksa::findOrFail($id)->update($data);

        return redirect('dokter/periksa/' . $id)->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function print($id)
    {

        $periksa = \App\Periksa::where('id', $id)->with('pasien', 'dokter')->first()->toArray();

        $data = [
            'periksa' => $periksa,
        ];

        return view('dokter/periksa/print', $data);
    }
}
