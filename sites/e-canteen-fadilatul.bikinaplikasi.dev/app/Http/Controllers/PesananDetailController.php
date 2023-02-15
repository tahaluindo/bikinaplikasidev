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
        $data['pesanandetail'] = PesananDetail::where('pesanan_id', $request->pesanan_id)->paginate(1000);

        $data['pesanandetail_count'] = count(Schema::getColumnListing('pesanandetail'));

        return view('pesanandetail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pesanandetail.create');
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
        
        $requestData = $request->all();

        

        PesananDetail::create($requestData);

        return redirect()->route('pesanandetail.index')->with('success', 'Berhasil menambah PesananDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(PesananDetail $pesanandetail)
    {
        $data["item"] = $pesanandetail;
        $data["pesanandetail"] = $pesanandetail;

        return view('pesanandetail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(PesananDetail $pesanandetail)
    {
        $data["pesanandetail"] = $pesanandetail;
        $data[strtolower("PesananDetail")] = $pesanandetail;

        return view('pesanandetail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PesananDetail $pesanandetail)
    {
        

        $requestData = $request->all();

        

        $pesanandetail->update($requestData);

        return redirect()->route('pesanandetail.index')->with('success', 'Berhasil mengubah PesananDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(PesananDetail $pesanandetail)
    {
        $pesanandetail->delete();

        return redirect()->route('pesanandetail.index')->with('success', 'PesananDetail berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pesanandetails = PesananDetail::whereIn('id', json_decode($request->ids, true))->get();

        PesananDetail::whereIn('id', $pesanandetails->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pesanan-detail');
    }

    public function laporan()
    {

        return view('pesanandetail.laporan.index');
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

        return view("pesanandetail.laporan.print", $data);
    }
}