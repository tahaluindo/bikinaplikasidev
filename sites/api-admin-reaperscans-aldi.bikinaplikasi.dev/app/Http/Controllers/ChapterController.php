<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Komik;
use App\Models\KomikChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\File;
use Throwable;
use ZipArchive;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['chapter'] = KomikChapter::where('komik_id', request()->komik_id)->orderBy('nama')->paginate(10000);

        $data['chapter_count'] = count(Schema::getColumnListing('chapter'));

        return view('chapter.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('chapter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal_release' => 'required',
            'nama' => 'required',
            'gambar' => 'required',
        ]);
        $requestData = $request->all();


        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move("gambar", time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        KomikChapter::create($requestData);

        return redirect()->route('chapter.index')->with('success', 'Berhasil menambah Chapter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(KomikChapter $chapter)
    {
        $data["item"] = $chapter;
        $data["chapter"] = $chapter;

        return view('chapter.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(KomikChapter $chapter)
    {
        $data["chapter"] = $chapter;
        $data[strtolower("Chapter")] = $chapter;

        return view('chapter.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, KomikChapter $chapter)
    {
        $this->validate($request, [
            'tanggal_release' => 'required',
            'nama' => 'required',
        ]);

        $requestData = $request->all();


        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')->move("gambar", time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        $chapter->update($requestData);

        return redirect(route('chapter.index') . "?komik_id=" . $chapter->komik_id)->with('success', 'Berhasil mengubah Chapter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(KomikChapter $chapter)
    {
        $chapter->delete();

        return redirect(route('chapter.index') . "?komik_id=" . $chapter->komik_id)->with('success', 'Chapter berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {

        $chapters = KomikChapter::whereIn('id', json_decode($request->ids, true))->get();

        KomikChapter::whereIn('id', $chapters->pluck('id'))->delete();

        return redirect(route('chapter.index') . "?komik_id=" . $chapters->first()->komik_id)->with('success', 'Berhasil menghapus banyak data chapter');
    }

    public function laporan()
    {
        $data['limit'] = KomikChapter::count();

        return view('chapter.laporan.index', $data);
    }

    public function print(Request $request)
    {

    }

    public function import()
    {

        return view('chapter.import');
    }

    public function importStore(Request $request)
    {

        $komik = Komik::findOrFail($request->komik_id);
        $zip = new ZipArchive;
        $zip->open($request->file('file_zip')->getRealPath());
        $zip->getNameIndex(0);


        try {
            $filesToInsertToDatabase = [];
            for ($i = 0; $i < $zip->count(); $i++) {
                
                // untuk melakukan checking apakah dia folder atau bukan
                $namaGambar = 'gambar/' . rand(10000000, 99999999) . ".png";
                $statName = $zip->statIndex($i)['name'];
                $fileName = basename($statName);
                $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
                $dirname = dirname($statName);
                $checkIfDir = $dirname != ".";
                $checkIfFile = preg_match("/\.png|\.jpg|\.jpeg|\.PNG|\.JPG|\.JPEG/", $statName);

                // ini adalah if untuk mengecek jika dia adalah multiple chapter
                if ($checkIfFile && $checkIfDir) {
                    $chapterName = "$dirname - $fileNameWithoutExtension";

                    if ($komik->komik_chapters->where('nama', $chapterName)->first()) {
                        return redirect()->back()->with('error', "Nama chapter $chapterName tersebut sudah ada!");
                    }

                    $filesToInsertToDatabase[$i]['nama_chapter'] = $chapterName;
                    $filesToInsertToDatabase[$i]['nama_gambar'] = $namaGambar;
                    $filesToInsertToDatabase[$i]['data_gambar'] = $zip->getFromName($statName);

                } else if ($checkIfFile && !$checkIfDir) {
                    $chapterName = "Chapter $fileNameWithoutExtension";
                    if ($komik->komik_chapters->where('nama', $chapterName)->first()) {
                        return redirect()->back()->with('error', "Nama chapter $chapterName tersebut sudah ada!");
                    }

                    $filesToInsertToDatabase[$i]['nama_chapter'] = $chapterName;
                    $filesToInsertToDatabase[$i]['nama_gambar'] = $namaGambar;
                    $filesToInsertToDatabase[$i]['data_gambar'] = $zip->getFromName($statName);
                }
            }
            
            foreach ($filesToInsertToDatabase as $key => $file) {
                file_put_contents($file['nama_gambar'], $file['data_gambar']);

                KomikChapter::create([
                    'komik_id' => $komik->id,
                    'nama' => $file['nama_chapter'],
                    'gambar' => $file['nama_gambar']
                ]);
            }
        } catch (Throwable $t) {
            return redirect()->back()->with('error', $t->getMessage());
        }

        return redirect('chapter?komik_id=' . $komik->id)->with('success', 'Berhasil menambah chapter!');
    }
}