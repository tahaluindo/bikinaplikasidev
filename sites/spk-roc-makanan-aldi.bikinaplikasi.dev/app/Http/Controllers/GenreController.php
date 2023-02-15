<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Http\Requests;

use App\Genre;
use App\Perhitungan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['genre'] = Genre::paginate(1000);
        $data['genre_count'] = count(Schema::getColumnListing('genre'));

        return view('genre.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $data['perhitungans'] = Perhitungan::all();

        return view('genre.create', $data);
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
            'nama' => "required|max:40|unique:genre,nama",
        ]);

        $requestData = $request->except([]);

        Genre::create($requestData);

        return redirect()->route('genre.index')->with('success', 'Berhasil menambah Genre');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Genre $genre)
    {
        $data["item"] = $genre;
        $data["genre"] = $genre;
        $data["genre_detail"] = $genre->genre_details;

        return view('genre.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Genre $genre)
    {
        $data["genre"] = $genre;
        $data[strtolower("Anggotum")] = $genre;
        $data['perhitungans'] = Perhitungan::all();

        return view('genre.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Genre $genre)
    {
        $this->validate($request, [
            'nama' => "required|max:40|unique:genre,nama,$genre->nama,nama",
        ]);

        $requestData = $request->except([]);

        $genre->update($requestData);

        return redirect()->route('genre.index')->with('success', 'Berhasil mengubah Genre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $genres = Genre::whereIn('id', json_decode($request->ids, true))->get();

        Genre::whereIn('id', $genres->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data genre');
    }
}
