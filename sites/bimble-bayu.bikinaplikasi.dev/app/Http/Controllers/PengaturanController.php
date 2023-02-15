<?php

namespace App\Http\Controllers;


use App\Models\Pengaturan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function heroSection()
    {
        $data['pengaturan'] = Pengaturan::all();
        $data['hero_section'] = json_decode(Pengaturan::select('hero_section')->first()->hero_section);
        $data['hero_section_count'] = Pengaturan::count();

        return view('pengaturan.hero-section.index', $data);
    }

    public function heroSectionCreate()
    {
        $data['pengaturan'] = Pengaturan::all();

        return view('pengaturan.hero-section.create', $data);
    }

    public function heroSectionStore(Request $request)
    {
        $data['pengaturan'] = Pengaturan::all();
        $hero_section = collect(json_decode(Pengaturan::select('hero_section')->first()->hero_section));

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move('gambar', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname());

        }

        $requestData = [
            'id' => uuid_create(),
            'judul' => $request->judul,
            'gambar' => $requestData['gambar']
        ];

        $hero_section->add($requestData);

        Pengaturan::first()->update([
            'hero_section' => $hero_section->toJson()
        ]);

        return redirect('pengaturan/hero-section')->with('success', 'Berhasil menambah hero section');
    }

    public function heroSectionEdit($hero_section, Request $request)
    {
        $data['hero_section'] = collect(json_decode(Pengaturan::select('hero_section')->first()->hero_section))->where('id', $hero_section)->first();

        return view('pengaturan.hero-section.edit', $data);
    }

    public function heroSectionUpdate($hero_section, Request $request)
    {
        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move('gambar', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname());

            $hero_section = collect(json_decode(Pengaturan::select('hero_section')->first()->hero_section))->map(function ($item) use ($hero_section, $requestData, $request) {
                if ($item->id == $hero_section) {
                    $item = json_decode(json_encode([
                        'id' => $hero_section,
                        'judul' => $request->judul,
                        'gambar' => $requestData['gambar']
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'hero_section' => $hero_section->toJson()
            ]);

        } else {
            $hero_section = collect(json_decode(Pengaturan::select('hero_section')->first()->hero_section))->map(function ($item) use ($hero_section, $request) {
                if ($item->id == $hero_section) {
                    $item = json_decode(json_encode([
                        'id' => $hero_section,
                        'judul' => $request->judul,
                        'gambar' => $item->gambar
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'hero_section' => $hero_section->toJson()
            ]);
        }

        return redirect('pengaturan/hero-section')->with('success', 'Berhasil mengedit hero section');
    }

    public function heroSectionDelete($hero_section, Request $request)
    {
        $hero_section = collect(json_decode(Pengaturan::select('hero_section')->first()->hero_section))->filter(function ($item) use ($hero_section) {

            return !($item->id == $hero_section);
        });

        Pengaturan::first()->update([
            'hero_section' => $hero_section->toJson()
        ]);

        return redirect('pengaturan/hero-section')->with('success', 'Berhasil menghapus hero section');
    }

    public function heroSectionHapusSemua(Request $request)
    {
        foreach (json_decode($request->ids, true) as $id) {
            $hero_section = collect(json_decode(Pengaturan::select('hero_section')->first()->hero_section))->filter(function ($item) use ($id) {

                return !($item->id == $id);
            });

            Pengaturan::first()->update([
                'hero_section' => $hero_section->toJson()
            ]);
        }

        return redirect('pengaturan/hero-section')->with('success', 'Berhasil menghapus hero section');
    }

    public function tentang()
    {
        $data['tentang'] = Pengaturan::first()->tentang;

        return view('pengaturan.tentang.index', $data);
    }

    public function tentangUpdate(Request $request)
    {
        $request->validate([
            'tentang' => 'required|max:500'
        ]);

        $pengaturan = Pengaturan::first()->tentang;

        Pengaturan::first()->update([
            'tentang' => $request->tentang
        ]);

        return redirect()->back()->with('success', 'Berhasil mengedit tentang');
    }


    public function batasAkhirRegistrasi()
    {
        // $data['batas_akhir_registrasi'] = Pengaturan::first()->batas_akhir_registrasi;

        // return view('pengaturan.batas-akhir-registrasi.index', $data);
    }

    public function batasAkhirRegistrasiUpdate(Request $request)
    {
        // $request->validate([
        //     'batas_akhir_registrasi' => 'required|max:255',
        //     'batas_akhir_registrasi' => 'required|max:255'
        // ]);

        // $pengaturan = Pengaturan::first()->batas_akhir_registrasi;
        // $requestData = $request->except(['_method', '_token']);

        // Pengaturan::first()->update([
        //     'batas_awal_registrasi' => $request->batas_awal_registrasi,
        //     'batas_akhir_registrasi' => $request->batas_akhir_registrasi
        // ]);

        return redirect()->back()->with('success', 'Berhasil mengedit batas akhir registrasi');
    }

    // prestasi
    public function prestasi()
    {
        $data['pengaturan'] = Pengaturan::all();
        $data['prestasi'] = json_decode(Pengaturan::select('prestasi')->first()->prestasi);
        $data['prestasi_count'] = Pengaturan::count();

        return view('pengaturan.prestasi.index', $data);
    }

    public function prestasiCreate()
    {
        $data['pengaturan'] = Pengaturan::all();

        return view('pengaturan.prestasi.create', $data);
    }

    public function prestasiStore(Request $request)
    {
        $data['pengaturan'] = Pengaturan::all();
        $prestasi = collect(json_decode(Pengaturan::select('prestasi')->first()->prestasi));

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move('gambar', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname());

        }

        $requestData = [
            'id' => uuid_create(),
            'judul' => $request->judul,
            'gambar' => $requestData['gambar']
        ];

        $prestasi->add($requestData);

        Pengaturan::first()->update([
            'prestasi' => $prestasi->toJson()
        ]);

        return redirect('pengaturan/prestasi')->with('success', 'Berhasil menambah prestasi');
    }

    public function prestasiEdit($prestasi, Request $request)
    {
        $data['prestasi'] = collect(json_decode(Pengaturan::select('prestasi')->first()->prestasi))->where('id', $prestasi)->first();

        return view('pengaturan.prestasi.edit', $data);
    }

    public function prestasiUpdate($prestasi, Request $request)
    {
        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move('gambar', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname());

            $prestasi = collect(json_decode(Pengaturan::select('prestasi')->first()->prestasi))->map(function ($item) use ($prestasi, $requestData, $request) {
                if ($item->id == $prestasi) {
                    $item = json_decode(json_encode([
                        'id' => $prestasi,
                        'judul' => $request->judul,
                        'gambar' => $requestData['gambar']
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'prestasi' => $prestasi->toJson()
            ]);

        } else {
            $prestasi = collect(json_decode(Pengaturan::select('prestasi')->first()->prestasi))->map(function ($item) use ($prestasi, $request) {
                if ($item->id == $prestasi) {
                    $item = json_decode(json_encode([
                        'id' => $prestasi,
                        'judul' => $request->judul,
                        'gambar' => $item->gambar
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'prestasi' => $prestasi->toJson()
            ]);
        }

        return redirect('pengaturan/prestasi')->with('success', 'Berhasil mengedit prestasi');
    }

    public function prestasiDelete($prestasi, Request $request)
    {
        $prestasi = collect(json_decode(Pengaturan::select('prestasi')->first()->prestasi))->filter(function ($item) use ($prestasi) {

            return !($item->id == $prestasi);
        });

        Pengaturan::first()->update([
            'prestasi' => $prestasi->toJson()
        ]);

        return redirect('pengaturan/prestasi')->with('success', 'Berhasil menghapus prestasi');
    }

    public function prestasiHapusSemua(Request $request)
    {
        foreach (json_decode($request->ids, true) as $id) {
            $prestasi = collect(json_decode(Pengaturan::select('prestasi')->first()->prestasi))->filter(function ($item) use ($id) {

                return !($item->id == $id);
            });

            Pengaturan::first()->update([
                'prestasi' => $prestasi->toJson()
            ]);
        }

        return redirect('pengaturan/prestasi')->with('success', 'Berhasil menghapus prestasi');
    }


    // review
    public function review()
    {
        $data['pengaturan'] = Pengaturan::all();
        $data['review'] = json_decode(Pengaturan::select('review')->first()->review, true);
        $data['review_count'] = Pengaturan::count();
        
        foreach($data['review'] as $key => $item) {
            $data['review'][$key]['siswa'] = Siswa::find($item['siswa_id']); 
        }
        
        $data['review'] = json_decode(json_encode($data['review']));

        return view('pengaturan.review.index', $data);
    }

    public function reviewCreate()
    {
        $data['pengaturan'] = Pengaturan::all();
        $data['siswa'] = Siswa::pluck('nama', 'id');

        return view('pengaturan.review.create', $data);
    }

    public function reviewStore(Request $request)
    {
        $data['pengaturan'] = Pengaturan::all();
        $review = collect(json_decode(Pengaturan::select('review')->first()->review));

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move('gambar', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname());

        }

        $requestData = [
            'id' => uuid_create(),
            'siswa_id' => $request->siswa_id,
            'isi' => $request->isi,
            'gambar' => $requestData['gambar']
        ];

        $review->add($requestData);

        Pengaturan::first()->update([
            'review' => $review->toJson()
        ]);

        return redirect('pengaturan/review')->with('success', 'Berhasil menambah review');
    }

    public function reviewEdit($review, Request $request)
    {
        $data['review'] = collect(json_decode(Pengaturan::select('review')->first()->review))->where('id', $review)->first();
        $data['siswa'] = Siswa::pluck('nama', 'id');
        
        return view('pengaturan.review.edit', $data);
    }

    public function reviewUpdate($review, Request $request)
    {
        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move('gambar', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname());

            $review = collect(json_decode(Pengaturan::select('review')->first()->review))->map(function ($item) use ($review, $requestData, $request) {
                if ($item->id == $review) {
                    $item = json_decode(json_encode([
                        'id' => $review,
                        'siswa_id' => $request->siswa_id,
                        'isi' => $request->isi,
                        'gambar' => $requestData['gambar']
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'review' => $review->toJson()
            ]);

        } else {
            $review = collect(json_decode(Pengaturan::select('review')->first()->review))->map(function ($item) use ($review, $request) {
                if ($item->id == $review) {
                    $item = json_decode(json_encode([
                        'id' => $review,
                        'siswa_id' => $request->siswa_id,
                        'isi' => $request->isi,
                        'gambar' => $item->gambar
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'review' => $review->toJson()
            ]);
        }

        return redirect('pengaturan/review')->with('success', 'Berhasil mengedit review');
    }

    public function reviewDelete($review, Request $request)
    {
        $review = collect(json_decode(Pengaturan::select('review')->first()->review))->filter(function ($item) use ($review) {

            return !($item->id == $review);
        });

        Pengaturan::first()->update([
            'review' => $review->toJson()
        ]);

        return redirect('pengaturan/review')->with('success', 'Berhasil menghapus review');
    }

    public function reviewHapusSemua(Request $request)
    {
        foreach (json_decode($request->ids, true) as $id) {
            $review = collect(json_decode(Pengaturan::select('review')->first()->review))->filter(function ($item) use ($id) {

                return !($item->id == $id);
            });

            Pengaturan::first()->update([
                'review' => $review->toJson()
            ]);
        }

        return redirect('pengaturan/review')->with('success', 'Berhasil menghapus review');
    }

    // logo
    public function logo()
    {
        $data['pengaturan'] = Pengaturan::all();
        $data['logo'] = json_decode(Pengaturan::select('logo')->first()->logo);
        $data['logo_count'] = Pengaturan::count();

        return view('pengaturan.logo.index', $data);
    }

    public function logoEdit($logo, Request $request)
    {
        $data['logo'] = json_decode(Pengaturan::select('logo')->first()->logo);

        return view('pengaturan.logo.edit', $data);
    }

    public function logoUpdate($logo, Request $request)
    {
        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move('gambar', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname());

            $logo = collect(json_decode(Pengaturan::select('logo')->first()->logo))->map(function ($item) use ($logo, $requestData, $request) {
                
                if ($item == $logo) {
                    $item = json_decode(json_encode([
                        'id' => $item,
                        'gambar' => $requestData['gambar']
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'logo' => json_encode($logo['id'])
            ]);

        }

        return redirect('pengaturan/logo')->with('success', 'Berhasil mengedit logo');
    }
        
    // angkatan registrasi
    public function angkatanRegistrasi()
    {
        $data['angkatan_registrasi'] = Pengaturan::first()->angkatan_registrasi;

        return view('pengaturan.angkatan-registrasi.index', $data);
    }

    public function angkatanRegistrasiUpdate(Request $request)
    {
        $request->validate([
            'angkatan_registrasi' => 'required|max:255'
        ]);

        $pengaturan = Pengaturan::first()->angkatan_registrasi;
        $requestData = $request->except(['_method', '_token']);

        Pengaturan::first()->update([
            'angkatan_registrasi' => $request->angkatan_registrasi
        ]);

        return redirect()->back()->with('success', 'Berhasil mengedit batas akhir registrasi');
    }
    
    // logo kerjasama
    public function logoKerjasama()
    {
        $data['pengaturan'] = Pengaturan::all();
        $data['logo_kerjasama'] = json_decode(Pengaturan::select('logo_kerjasama')->first()->logo_kerjasama);
        $data['logo_kerjasama_count'] = Pengaturan::count();

        return view('pengaturan.logo-kerjasama.index', $data);
    }

    public function logoKerjasamaCreate()
    {
        $data['pengaturan'] = Pengaturan::all();

        return view('pengaturan.logo-kerjasama.create', $data);
    }

    public function logoKerjasamaStore(Request $request)
    {
        $data['pengaturan'] = Pengaturan::all();
        $logo_kerjasama = collect(json_decode(Pengaturan::select('logo_kerjasama')->first()->logo_kerjasama));

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move('gambar', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname());

        }

        $requestData = [
            'id' => uuid_create(),
            'gambar' => $requestData['gambar']
        ];

        $logo_kerjasama->add($requestData);

        Pengaturan::first()->update([
            'logo_kerjasama' => $logo_kerjasama->toJson()
        ]);

        return redirect('pengaturan/logo-kerjasama')->with('success', 'Berhasil menambah logo kerjasama');
    }

    public function logoKerjasamaEdit($logo_kerjasama, Request $request)
    {
        $data['logo_kerjasama'] = collect(json_decode(Pengaturan::select('logo_kerjasama')->first()->logo_kerjasama))->where('id', $logo_kerjasama)->first();

        return view('pengaturan.logo-kerjasama.edit', $data);
    }

    public function logoKerjasamaUpdate($logo_kerjasama, Request $request)
    {
        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move('gambar', uuid_create() . "." . $request->file('gambar')->getClientOriginalExtension())->getPathname());

            $logo_kerjasama = collect(json_decode(Pengaturan::select('logo_kerjasama')->first()->logo_kerjasama))->map(function ($item) use ($logo_kerjasama, $requestData, $request) {
                if ($item->id == $logo_kerjasama) {
                    $item = json_decode(json_encode([
                        'id' => $logo_kerjasama,
                        'gambar' => $requestData['gambar']
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'logo_kerjasama' => $logo_kerjasama->toJson()
            ]);

        } else {
            $logo_kerjasama = collect(json_decode(Pengaturan::select('logo_kerjasama')->first()->logo_kerjasama))->map(function ($item) use ($logo_kerjasama, $request) {
                if ($item->id == $logo_kerjasama) {
                    $item = json_decode(json_encode([
                        'id' => $logo_kerjasama,
                        'gambar' => $item->gambar
                    ]));
                }

                return $item;
            });

            Pengaturan::first()->update([
                'logo_kerjasama' => $logo_kerjasama->toJson()
            ]);
        }

        return redirect('pengaturan/logo-kerjasama')->with('success', 'Berhasil mengedit logo kerjasama');
    }

    public function logoKerjasamaDelete($logo_kerjasama, Request $request)
    {
        $logo_kerjasama = collect(json_decode(Pengaturan::select('logo_kerjasama')->first()->logo_kerjasama))->filter(function ($item) use ($logo_kerjasama) {

            return !($item->id == $logo_kerjasama);
        });

        Pengaturan::first()->update([
            'logo_kerjasama' => $logo_kerjasama->toJson()
        ]);

        return redirect('pengaturan/logo-kerjasama')->with('success', 'Berhasil menghapus logo kerjasama');
    }

    public function logoKerjasamaHapusSemua(Request $request)
    {
        foreach (json_decode($request->ids, true) as $id) {
            $logo_kerjasama = collect(json_decode(Pengaturan::select('logo_kerjasama')->first()->logo_kerjasama))->filter(function ($item) use ($id) {

                return !($item->id == $id);
            });

            Pengaturan::first()->update([
                'logo_kerjasama' => $logo_kerjasama->toJson()
            ]);
        }

        return redirect('pengaturan/logo-kerjasama')->with('success', 'Berhasil menghapus logo kerjasama');
    }
}