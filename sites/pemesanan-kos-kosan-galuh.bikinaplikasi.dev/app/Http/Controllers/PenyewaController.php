<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Penyewa;
use App\Kamar;
use App\Tagihan;
use App\Http\Controllers\TagihanController;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['datas'] = Penyewa::orderBy('id', 'desc')->limit(50)->get();
        $data['kamars'] = Kamar::orderBy('id', 'desc')->limit(50)->get();

        return view('penyewa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['datas'] = Penyewa::orderBy('id', 'desc')->paginate(10);
        $penyewa_kamar_id = Penyewa::pluck('kamar_id');
        $data['kamars'] = Kamar::where('status', '=', 'Kosong')->get();

        return view('penyewa.create', $data);
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
            'kamar_id' => ['required', 'max:50', 'min:1', 'exists:kamars,id' ],
            'type_sewa' => ['required', 'max:50', 'min:1' ],
            'nama' => ['required', 'max:50', 'min:1', 'string' ],
            'jumlah_penghuni' => ['required', 'min:1', 'max:3'],
            'no_hp' => ['required', 'min:1', 'numeric', 'digits_between:5,13', 'unique:penyewas,no_hp' ],
            'foto_identitas' => ['required', 'image', 'max:5000']
        ]);

        // pindahkan gambar ke folder DEFAULT img produk yang ada di public
        $foto_identitas_destination = env('APP_IMG_FOLDER') . "/" . time() . "_" . $request->foto_identitas->getClientOriginalName();

        $request->foto_identitas->move(env('APP_IMG_FOLDER'), $foto_identitas_destination);

        $penyewa_baru = Penyewa::create([
            'kamar_id' => $request->kamar_id,
            'type_sewa' => $request->type_sewa,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'foto_identitas' => $foto_identitas_destination
        ]);

        $penyewa_baru->save();

        $kamar = Kamar::find($request->kamar_id);

        $kamar->update([
            'jumlah_penghuni' => $request->jumlah_penghuni,
            'status' => 'Terisi'
        ]);

        if($request->tambah_tagihan_langsung == "on")
        {
            $tagihan = new TagihanController();
            $tagihan_id = $tagihan->getTagihanId($penyewa_baru->id);

            Tagihan::create([
                'invoice_id' => $tagihan_id,
                'penyewa_id' => $penyewa_baru->id,
                'terakhir_bayar' => null,
                'jatuh_tempo' => date('Y-m-d\Th:i:s'),
                'status' => 'Tidak Aktif',
            ]);

            return redirect()->route('perpanjanganSewaRenew', ['tagihan_id' => $tagihan_id])->with('success', 'Berhasil menambah penyewa & tagihan');
        }

        return back()->with('success', 'Berhasil menambah penyewa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function show(Penyewa $penyewa)
    {
        //
        $data['data'] = $penyewa;

        return view('penyewa.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyewa $penyewa)
    {
        //
        $data['data'] = $penyewa;
        $data['kamars'] = Kamar::where('status', '=', 'Kosong')->orWhere('id', '=', $penyewa->kamar_id)->get();

        return view('penyewa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyewa $penyewa)
    {
        //
        $this->validate($request, [
            'kamar_id' => ['required', 'max:50', 'min:1', 'exists:kamars,id' ],
            'type_sewa' => ['required', 'max:50', 'min:1' ],
            'nama' => ['required', 'max:50', 'min:1', 'string' ],
            'jumlah_penghuni' => ['required', 'min:1', 'max:3'],
            'no_hp' => ['required', 'min:1', 'numeric', 'digits_between:5,15' ],
            'foto_identitas' => ['image', 'max:5000']
        ]);

        $data = [
            'kamar_id' => $request->kamar_id,
            'type_sewa' => $request->type_sewa,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
        ];

        if (isset($request->foto_identitas))
        {
            // pindahkan gambar ke folder DEFAULT img produk yang ada di public
            $foto_identitas_destination = env('APP_IMG_FOLDER') . "/" . time() . "_" . $request->foto_identitas->getClientOriginalName();

            $request->foto_identitas->move(env('APP_IMG_FOLDER'), $foto_identitas_destination);

            $data['foto_identitas'] = $foto_identitas_destination;

            File::delete($penyewa->foto_identitas);
        }else
        {
            unset($data['foto_identitas']);
        }

        $penyewa_baru = Penyewa::findOrFail($penyewa->id)->update($data);

        $kamarBaru = Kamar::find($request->kamar_id);
        $kamarLama = Kamar::find($penyewa->kamar_id);

        // cek apakah user mengganti kamarnya atau tidak
        if ( $request->kamar_id == $kamarLama->id)
        {
            $kamarLama->update([
                'jumlah_penghuni' => $request->jumlah_penghuni,
            ]);
        }
        elseif($request->kamar_id == $kamarBaru->id)
        {
            //jika user mengganti kamarnya
            $kamarLama->update([
                'jumlah_penghuni' => 0,
                'status' => 'Kosong'
            ]);

            $kamarBaru->update([
                'jumlah_penghuni' => $request->jumlah_penghuni,
                'status' => 'Terisi'
            ]);
        }

        return back()->with('success', 'Berhasil mengupdate penyewa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyewa $penyewa)
    {
        //
        File::delete($penyewa->foto_identitas);
        Penyewa::findOrFail($penyewa->id)->delete();

        if($penyewa->kamar_id)
        {
            Kamar::find($penyewa->kamar_id)->update([
                'status' => 'Kosong',
                'jumlah_penghuni' => 0
            ]);
        }

        return back()->with('success', "Berhasil menghapus penyewa $penyewa->nama");
    }


    public function registerFromBooking(Request $request)
    {
        //
        $this->validate($request, [
            'kamar_id' => ['required', 'max:50', 'min:1', 'exists:kamars,id' ],
            'type_sewa' => ['required', 'max:50', 'min:1' ],
            'nama' => ['required', 'max:50', 'min:1', 'string' ],
            'jumlah_penghuni' => ['required', 'min:1', 'max:3'],
            'no_hp' => ['required', 'min:1', 'numeric', 'digits_between:5,13', 'unique:penyewas,no_hp' ],
            'foto_identitas' => ['required', 'image', 'max:5000']
        ]);

        // pindahkan gambar ke folder DEFAULT img produk yang ada di public
        $foto_identitas_destination = env('APP_IMG_FOLDER') . "/" . time() . "_" . $request->foto_identitas->getClientOriginalName();

        $request->foto_identitas->move(env('APP_IMG_FOLDER'), $foto_identitas_destination);

        $penyewa_baru = Penyewa::create([
            'kamar_id' => $request->kamar_id,
            'type_sewa' => $request->type_sewa,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'foto_identitas' => $foto_identitas_destination
        ]);

        $penyewa_baru->save();

        $kamar = Kamar::find($request->kamar_id);

        $kamar->update([
            'jumlah_penghuni' => $request->jumlah_penghuni,
            'status' => 'Terisi'
        ]);

        if($request->tambah_tagihan_langsung == "on")
        {
            $tagihan = new TagihanController();
            $tagihan_id = $tagihan->getTagihanId($penyewa_baru->id);

            Tagihan::create([
                'invoice_id' => $tagihan_id,
                'penyewa_id' => $penyewa_baru->id,
                'terakhir_bayar' => null,
                'jatuh_tempo' => date('Y-m-d\Th:i:s'),
                'status' => 'Tidak Aktif',
            ]);

            return redirect()->route('perpanjanganSewaRenew', ['tagihan_id' => $tagihan_id])->with('success', 'Berhasil menambah penyewa & tagihan');
        }

        return back()->with('success', 'Berhasil melakukan booking');
    }
}
