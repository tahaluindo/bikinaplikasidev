<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Ebook;
use App\Models\EbookKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EbookController extends Controller
{
    public function checkUser()
    {
        if (in_array(auth()->user()->level, ['Admin'])) {

        } else {
            die('Tidak ada hak akses!');
        }
    }

    public function index(Request $request)
    {
        $this->checkUser();
        $ebook = new Ebook();

        if ($request->limit) {

            $ebook = $ebook->with(['ebook_disukais', 'ebook_komentars', 'ebook_kategori'])->withCount(['ebook_disukais', 'ebook_komentars'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $ebook = DB::select("select * from ebook where $request->where");
        } else {
            $ebook = $ebook->with(['ebook_disukais', 'ebook_komentars', 'ebook_kategori'])->withCount(['ebook_disukais', 'ebook_komentars'])->get();
        }

        return view('ebook.index', [
            'ebook' => $ebook,
            'ebook_count' => $ebook->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        return view('ebook.create', [
            'ebook_kategori' => EbookKategori::pluck('nama', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'ebook_kategori_id' => 'required',
            'gambar' => 'required',
            'judul' => 'required|unique:ebook,judul',
            'filePdf' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }
        
        if ($request->hasFile('filePdf')) {
            $requestData['filePdf'] = str_replace("\\", "/", $request->file('filePdf')
                ->move('uploads', time() . "." . $request->file('filePdf')->getClientOriginalExtension()));
        }

        $ebookCreate = Ebook::create($requestData);

        return redirect()->route('ebook.index')->with('success', 'Berhasil menambah ebook');
    }

    public function show($ebook)
    {
        $this->checkUser();
        $data["ebook"] = $ebook;
        $data[strtolower("Ebook")] = $ebook;
        $data['ebook_kategori'] = EbookKategori::pluck('nama', 'id');

        return view('ebook.edit', $data);
    }

    public function edit(Ebook $ebook)
    {
        $this->checkUser();
        $data["ebook"] = $ebook;
        $data[strtolower("Ebook")] = $ebook;
        $data['ebook_kategori'] = EbookKategori::pluck('nama', 'id');

        return view('ebook.edit', $data);
    }

    public function update(Request $request, Ebook $ebook)
    {
        $this->checkUser();
        $requestData = $request->all();

        $this->validate($request, [
            'ebook_kategori_id' => 'required',
            'judul' => "required|unique:berita,judul,$request->judul,judul",
        ]);

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));

            \File::delete($ebook->gambar);
        }
                        
        if ($request->hasFile('filePdf')) {
            $requestData['filePdf'] = str_replace("\\", "/", $request->file('filePdf')
                ->move('uploads', time() . "." . $request->file('filePdf')->getClientOriginalExtension()));
        }

        $ebookCreate = $ebook->update($requestData);

        return redirect()->route('ebook.index')->with('success', 'Berhasil mengubah ebook');
    }

    public function destroy(Ebook $ebook)
    {
        $this->checkUser();
        $ebook->delete();

        return redirect()->route('ebook.index')->with('success', 'Berhasil mengubah ebook');
    }
}