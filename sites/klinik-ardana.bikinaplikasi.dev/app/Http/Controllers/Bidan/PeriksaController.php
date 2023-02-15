<?php

namespace App\Http\Controllers\Bidan;

use App\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeriksaController extends Controller
{
    public function all()
    {
        $user = auth()->user()->user->toArray();
        $periksa = \App\Periksa::with('pasien', 'bidan')->latest()->get()->toArray();

        $data = [
            'user' => $user,
            'periksa' => $periksa,
        ];

        return view('bidan.periksa.all', $data);
    }
    public function today()
    {
        $user = auth()->user()->user->toArray();
        $periksa = \App\Periksa::where('bidan_id', $user['id'])->with('pasien')->whereDate('created_at', \Carbon\Carbon::today())->latest()->get()->toArray();

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

        return view('bidan.periksa.today', $data);
    }

    public function allCari(Request $request)
    {
        $user = auth()->user()->user->toArray();
        $pasien_ids = Pasien::where('nama', 'Like', '%' . $request->input('cari') . '%')->pluck('id');
        $periksa = \App\Periksa::whereIn('pasien_id', $pasien_ids)->with('pasien', 'bidan')->latest()->get()->toArray();

        $data = [
            'user' => $user,
            'periksa' => $periksa,
        ];

        return view('bidan.periksa.all', $data);
    }
    public function todayCari(Request $request)
    {
        $user = auth()->user()->user->toArray();
        $pasien_ids = Pasien::where('nama', 'Like', '%' . $request->input('cari') . '%')->pluck('id');
        $periksa = \App\Periksa::whereIn('pasien_id', $pasien_ids)->where('bidan_id', $user['id'])->with('pasien')->whereDate('created_at', \Carbon\Carbon::today())->latest()->get()->toArray();

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

        return view('bidan.periksa.today', $data);
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
            'action' => ['Bidan\PeriksaController@simpan_periksa', $id],
            'method' => 'PUT',
        ];

        return view('bidan.periksa.periksa', $data);
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

        return redirect('bidan/periksa/' . $id)->with(['type' => 'success', 'pesan' => 'Berhasil Menambahkan Data!']);
    }

    public function print($id)
    {

        $periksa = \App\Periksa::where('id', $id)->with('pasien', 'bidan')->first()->toArray();

        $data = [
            'periksa' => $periksa,
        ];

        return view('bidan/periksa/print', $data);
    }
}
