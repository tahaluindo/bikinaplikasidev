<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaturan;
use App\Http\Controllers\Controller;

class PengaturanController extends Controller
{
    public function visi()
    {
        $data['pengaturan'] = Pengaturan::select('visi')->get()->first();

        return view('pengaturan.visi.index', $data);
    }

    public function visiUpdate(Request $request)
    {
        $request->validate([
            'visi' => 'required|max:255'
        ]);

        Pengaturan::first()->update([
            'visi' => $request->visi
        ]);

        return redirect()->back()->with('success', 'Berhasil mengedit visi');
    }

    public function misi()
    {
        $data['misi'] = implode("-", json_decode(Pengaturan::select('misi')->first()->misi));

        return view('pengaturan.misi.index', $data);
    }

    public function misiUpdate(Request $request)
    {
        $request->validate([
            'misi' => 'required|max:1000'
        ]);

        Pengaturan::first()->update([
            'misi' => json_encode(explode('-', $request->misi))
        ]);

        return redirect()->back()->with('success', 'Berhasil mengedit misi');
    }

    public function kegiatanPanti()
    {
        $data['pengaturan'] = Pengaturan::all();
        $data['kegiatan_panti'] = json_decode(Pengaturan::select('kegiatan_panti')->first()->kegiatan_panti);
        $data['kegiatan_panti_count'] = Pengaturan::count();

        return view('pengaturan.kegiatan-panti.index', $data);
    }

    public function kegiatanPantiCreate()
    {
        $data['pengaturan'] = Pengaturan::all();

        return view('pengaturan.kegiatan-panti.create', $data);
    }

    public function kegiatanPantiStore(Request $request)
    {
        $data['pengaturan'] = Pengaturan::all();
        $kegiatan_panti = collect(json_decode(Pengaturan::select('kegiatan_panti')->first()->kegiatan_panti));

        $requestData = [];

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = $request->file('gambar')->move('uploads', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname();

        }

        $requestData = [
            'id' => uuid_create(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $requestData['gambar']
        ];

        $kegiatan_panti->add($requestData);

        Pengaturan::first()->update([
            'kegiatan_panti' => $kegiatan_panti->toJson()
        ]);

        return redirect('pengaturan/kegiatan-panti')->with('success', 'Berhasil menambah kegiatan panti');
    }

    public function kegiatanPantiEdit($kegiatan_panti, Request $request)
    {
        $data['kegiatan_panti'] = collect(json_decode(Pengaturan::select('kegiatan_panti')->first()->kegiatan_panti))->where('id', $kegiatan_panti)->first();

        return view('pengaturan.kegiatan-panti.edit', $data);
    }

    public function kegiatanPantiUpdate($kegiatan_panti, Request $request)
    {
        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = $request->file('gambar')->move('uploads', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname();

            $kegiatan_panti = collect(json_decode(Pengaturan::select('kegiatan_panti')->first()->kegiatan_panti))->map(function ($item) use ($kegiatan_panti, $requestData, $request) {
                if ($item->id == $kegiatan_panti) {
                    $item = json_decode(json_encode([
                        'id' => $kegiatan_panti,
                        'judul' => $request->judul,
                        'deskripsi' => $request->deskripsi,
                        'gambar' => $requestData['gambar']
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'kegiatan_panti' => $kegiatan_panti->toJson()
            ]);

        } else {
            $kegiatan_panti = collect(json_decode(Pengaturan::select('kegiatan_panti')->first()->kegiatan_panti))->map(function ($item) use ($kegiatan_panti, $request) {
                if ($item->id == $kegiatan_panti) {
                    $item = json_decode(json_encode([
                        'id' => $kegiatan_panti,
                        'judul' => $request->judul,
                        'deskripsi' => $request->deskripsi,
                        'gambar' => $item->gambar
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'kegiatan_panti' => $kegiatan_panti->toJson()
            ]);
        }

        return redirect('pengaturan/kegiatan-panti')->with('success', 'Berhasil mengedit kegiatan panti');
    }

    public function kegiatanPantiDelete($kegiatan_panti, Request $request)
    {
        $kegiatan_panti = collect(json_decode(Pengaturan::select('kegiatan_panti')->first()->kegiatan_panti))->filter(function ($item) use ($kegiatan_panti) {

            return !($item->id == $kegiatan_panti);
        });

        Pengaturan::first()->update([
            'kegiatan_panti' => $kegiatan_panti->toJson()
        ]);

        return redirect('pengaturan/kegiatan-panti')->with('success', 'Berhasil menghapus kegiatan panti');
    }

    public function kegiatanPantiHapusSemua(Request $request)
    {
        foreach (json_decode($request->ids, true) as $id) {
            $kegiatan_panti = collect(json_decode(Pengaturan::select('kegiatan_panti')->first()->kegiatan_panti))->filter(function ($item) use ($id) {

                return !($item->id == $id);
            });

            Pengaturan::first()->update([
                'kegiatan_panti' => $kegiatan_panti->toJson()
            ]);
        }

        return redirect('pengaturan/kegiatan-panti')->with('success', 'Berhasil menghapus kegiatan panti');
    }

    public function profil()
    {
        $data['pengaturan'] = json_decode(Pengaturan::first()->profil);

        return view('pengaturan.profil.index', $data);
    }

    public function profilUpdate(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'akun_facebook' => 'required|max:50',
            'akun_instagram' => 'required|max:50',
            'no_whatsapp' => 'required|max:15',
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $pengaturan = json_decode(Pengaturan::first()->profil);
        $requestData = $request->except(['_method', '_token']);
        $requestData['misi'] = json_encode(explode('-', $request->misi));

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = $request->file('gambar')
                ->move('uploads', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname();
        } else {
            $requestData['gambar'] = $pengaturan->gambar;
        }

        Pengaturan::first()->update([
            'profil' => json_encode($requestData)
        ]);

        return redirect()->back()->with('success', 'Berhasil mengedit profil');
    }

    public function rekeningDonasi()
    {
        $data['rekening_donasi'] = json_decode(Pengaturan::first()->rekening_donasi);

        return view('pengaturan.rekening-donasi.index', $data);
    }

    public function rekeningDonasiCreate()
    {
        $data['pengaturan'] = Pengaturan::all();

        return view('pengaturan.rekening-donasi.create', $data);
    }

    public function rekeningDonasiStore(Request $request)
    {
        $data['pengaturan'] = Pengaturan::all();
        $rekening_donasi = collect(json_decode(Pengaturan::select('rekening_donasi')->first()->rekening_donasi));

        if ($request->bank == "Bri") {
            $requestData['gambar'] = 'images/rekening_bri.png';

        }
        if ($request->bank == "Bni") {
            $requestData['gambar'] = 'images/rekening_bni.png';

        }
        if ($request->bank == "Bca") {
            $requestData['gambar'] = 'images/rekening_bca.png';

        }
        if ($request->bank == "Mandiri") {
            $requestData['gambar'] = 'images/rekening_mandiri.png';

        }

        $requestData = [
            'id' => uuid_create(),
            'bank' => $request->bank,
            'atas_nama' => $request->atas_nama,
            'no_rekening' => $request->no_rekening,
            'gambar' => $requestData['gambar']
        ];

        $rekening_donasi->add($requestData);

        Pengaturan::first()->update([
            'rekening_donasi' => $rekening_donasi->toJson()
        ]);

        return redirect('pengaturan/rekening-donasi')->with('success', 'Berhasil menambah rekening donasi');
    }

    public function rekeningDonasiEdit($rekening_donasi, Request $request)
    {
        $data['rekening_donasi'] = collect(json_decode(Pengaturan::select('rekening_donasi')->first()->rekening_donasi))->where('id', $rekening_donasi)->first();

        return view('pengaturan.rekening-donasi.edit', $data);
    }

    public function rekeningDonasiUpdate($rekening_donasi, Request $request)
    {

        if ($request->bank == "Bri") {
            $requestData['gambar'] = 'images/rekening_bri.png';

        }
        if ($request->bank == "Bni") {
            $requestData['gambar'] = 'images/rekening_bni.png';

        }
        if ($request->bank == "Bca") {
            $requestData['gambar'] = 'images/rekening_bca.png';

        }
        if ($request->bank == "Mandiri") {
            $requestData['gambar'] = 'images/rekening_mandiri.png';

        }

        $rekening_donasi = collect(json_decode(Pengaturan::select('rekening_donasi')->first()->rekening_donasi))->map(function ($item) use ($rekening_donasi, $requestData, $request) {
            if ($item->id == $rekening_donasi) {
                $item = json_decode(json_encode([
                    'id' => $rekening_donasi,
                    'bank' => $request->bank,
                    'atas_nama' => $request->atas_nama,
                    'no_rekening' => $request->no_rekening,
                    'gambar' => $requestData['gambar']
                ]));
            }

            return $item;
        });

        Pengaturan::first()->update([
            'rekening_donasi' => $rekening_donasi->toJson()
        ]);

        Pengaturan::first()->update([
            'rekening_donasi' => $rekening_donasi->toJson()
        ]);

        return redirect('pengaturan/rekening-donasi')->with('success', 'Berhasil mengedit kegiatan panti');
    }

    public function rekeningDonasiDelete($rekening_donasi, Request $request)
    {
        $rekening_donasi = collect(json_decode(Pengaturan::select('rekening_donasi')->first()->rekening_donasi))->filter(function ($item) use ($rekening_donasi) {

            return !($item->id == $rekening_donasi);
        });

        Pengaturan::first()->update([
            'rekening_donasi' => $rekening_donasi->toJson()
        ]);

        return redirect('pengaturan/rekening-donasi')->with('success', 'Berhasil menghapus rekening donasi');
    }

    public function rekeningDonasiHapusSemua(Request $request)
    {
        foreach (json_decode($request->ids, true) as $id) {
            $rekening_donasi = collect(json_decode(Pengaturan::select('rekening_donasi')->first()->rekening_donasi))->filter(function ($item) use ($id) {

                return !($item->id == $id);
            });

            Pengaturan::first()->update([
                'rekening_donasi' => $rekening_donasi->toJson()
            ]);
        }

        return redirect('pengaturan/rekening-donasi')->with('success', 'Berhasil menghapus rekening donasi');
    }
}
