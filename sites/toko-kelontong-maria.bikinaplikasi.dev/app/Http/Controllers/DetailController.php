<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TagihanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['detail'] = TagihanDetail::paginate(1000);

        $data['detail_count'] = count(Schema::getColumnListing('detail'));

        return view('detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('detail.create');
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
			'produk' => 'required|exists:produk,id',
			'jumlah' => 'required|min:1',
			'harga' => 'required|min:1',
			'total' => 'required|min:1',
			'metode' => 'required|in:Kas,Kredit'
		]);
        $requestData = $request->all();

        

        TagihanDetail::create($requestData);

        return redirect()->route('detail.index')->with('success', 'Berhasil menambah Detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(TagihanDetail $detail)
    {
        $data["item"] = $detail;
        $data["detail"] = $detail;

        return view('detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(TagihanDetail $detail)
    {
        $data["detail"] = $detail;
        $data[strtolower("Detail")] = $detail;

        return view('detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, TagihanDetail $detail)
    {
        $this->validate($request, [
			'produk' => 'required|exists:produk,id',
			'jumlah' => 'required|min:1',
			'harga' => 'required|min:1',
			'total' => 'required|min:1',
			'metode' => 'required|in:Kas,Kredit'
		]);

        $requestData = $request->all();

        

        $detail->update($requestData);

        return redirect()->route('detail.index')->with('success', 'Berhasil mengubah Detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(TagihanDetail $detail)
    {
        $detail->delete();

        return redirect()->route('detail.index')->with('success', 'Detail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $details = TagihanDetail::whereIn('id', json_decode($request->ids, true))->get();

        TagihanDetail::whereIn('id', $details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data detail');
    }

    public function laporan()
    {

        return view('detail.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new TagihanDetail)->getTable();
        $object = (new TagihanDetail);

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

        $data["details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["details"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("detail.laporan.print", $data);
    }
}