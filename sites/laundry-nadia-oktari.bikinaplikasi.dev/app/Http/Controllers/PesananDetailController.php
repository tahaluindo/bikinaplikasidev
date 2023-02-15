<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PesananDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pesanan_detail'] = PesananDetail::paginate(1000);

        $data['pesanandetail_count'] = count(Schema::getColumnListing('pesanan_detail'));

        return view('pesanan-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pesanan-detail.create');
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
			'pesanan_id' => 'required|exists:pesanan,id',
			'paket_id' => 'required|paket,id',
			'jumlah' => 'required',
			'harga' => 'required',
			'total' => 'required'
		]);
        $requestData = $request->all();

        PesananDetail::create($requestData);

        return redirect()->route('pesanan-detail.index')->with('success', 'Berhasil menambah Pesanan Detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(PesananDetail $pesanan_detail)
    {
        $data["item"] = $pesanan_detail;
        $data["pesanan-detail"] = $pesanan_detail;

        return view('pesanan-detail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(PesananDetail $pesanan_detail)
    {
        $data["pesanan-detail"] = $pesanan_detail;
        $data[strtolower("PesananDetail")] = $pesanan_detail;

        return view('pesanan-detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PesananDetail $pesanan_detail)
    {
        $this->validate($request, [
			'pesanan_id' => 'required|exists:pesanan,id',
			'paket_id' => 'required|paket,id',
			'jumlah' => 'required',
			'harga' => 'required',
			'total' => 'required'
		]);

        $requestData = $request->all();

        

        $pesanan_detail->update($requestData);

        return redirect()->route('pesanan-detail.index')->with('success', 'Berhasil mengubah PesananDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(PesananDetail $pesanan_detail)
    {
        $pesanan_detail->delete();

        return redirect()->route('pesanan-detail.index')->with('success', 'PesananDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pesanan_details = PesananDetail::whereIn('id', json_decode($request->ids, true))->get();

        PesananDetail::whereIn('id', $pesanan_details->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pesanan-detail');
    }

    public function laporan()
    {
        $data['limit'] = PesananDetail::count();

        return view('pesanan-detail.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new PesananDetail)->getTable();
        $object = (new PesananDetail);

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

        $data["pesanan-details"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["pesanan-details"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pesanan-detail.laporan.print", $data);
    }
}