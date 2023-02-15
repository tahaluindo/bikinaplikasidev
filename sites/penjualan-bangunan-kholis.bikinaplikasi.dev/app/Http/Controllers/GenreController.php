<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
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
        return view('genre.create');
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
			'nama' => 'required|max:30',
			'no_hp' => 'required|max:15'
		]);
        $requestData = $request->all();

        

        Genre::create($requestData);

        return redirect()->route('genre.index')->with('success', 'Berhasil menambah Genre');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Genre $genre)
    {
        $data["item"] = $genre;
        $data["genre"] = $genre;

        return view('genre.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Genre $genre)
    {
        $data["genre"] = $genre;
        $data[strtolower("Genre")] = $genre;

        return view('genre.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Genre $genre)
    {
        $this->validate($request, [
			'nama' => 'required|max:30',
			'no_hp' => 'required|max:15'
		]);

        $requestData = $request->all();

        

        $genre->update($requestData);

        return redirect()->route('genre.index')->with('success', 'Berhasil mengubah Genre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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

    public function laporan()
    {
        $data['limit'] = Genre::count();

        return view('genre.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Genre)->getTable();
        $object = (new Genre);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["genres"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["genres"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("genre.laporan.print", $data);
    }
}