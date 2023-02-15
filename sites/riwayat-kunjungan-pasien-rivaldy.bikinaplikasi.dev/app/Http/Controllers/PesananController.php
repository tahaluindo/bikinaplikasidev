<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['pesanan'] = Pesanan::orderBy('id', 'Desc')->paginate(1000);

        $data['pesanan_count'] = count(Schema::getColumnListing('pesanan'));

        if(in_array(auth()->user()->level, ['Penjual'])) {

            $data['pesanan'] = Pesanan::where('penjual_id', auth()->user()->penjual->id)->paginate(1000);
        }

        return view('pesanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pesanan.create');
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
        
        
        \DB::transaction(function() use($request) {
                
                        $penjual_ids = [];
                        foreach ($request->menus as $key => $item) {
                            
                            if($item == 'Batalkan') {
                
                                continue;
                            }

                $menu = Menu::findOrFail($item);
    
                if(!in_array($menu->penjual_id, $penjual_ids)) {
                    $pesananCreate = Pesanan::create([
                        'penjual_id' => $menu->penjual_id,
                        'meja_id' => $request->meja_id,
                        'atas_nama' => $request->atas_nama,
                        'catatan' => $request->catatan
                    ]);
                }
    
                PesananDetail::create([
                    'pesanan_id' => $pesananCreate->id,
                    'menu_id' => $menu->id,
                    'jumlah' => $request->jumlahs[$key],
                    'harga' => $menu->harga,
                    'total' => $menu->harga * $request->jumlahs[$key]
                ]);
    
                $penjual_ids[] = $menu->penjual_id;
            }
            });

        return redirect('/')->with('success', 'Berhasil menambah Pesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Pesanan $pesanan)
    {
        $data["item"] = $pesanan;
        $data["pesanan"] = $pesanan;

        return view('pesanan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Pesanan $pesanan)
    {
        $data["pesanan"] = $pesanan;
        $data[strtolower("Pesanan")] = $pesanan;

        return view('pesanan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $this->validate($request, [
			'penjual_id' => 'required|exists:penjual,id',
			'meja_id' => 'required|exists:meja,id',
			'atas_nama' => 'required'
		]);

        $requestData = $request->all();

        

        $pesanan->update($requestData);

        return redirect()->route('pesanan.index')->with('success', 'Berhasil mengubah Pesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $pesanans = Pesanan::whereIn('id', json_decode($request->ids, true))->get();

        Pesanan::whereIn('id', $pesanans->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data pesanan');
    }

    public function laporan()
    {

        return view('pesanan.laporan.index');
    }

    public function print(Request $request)
    {
        $table = (new Pesanan)->getTable();
        $object = (new Pesanan);

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

        $data["pesanans"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if(!$data["pesanans"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        return view("pesanan.laporan.print", $data);
    }

    public function hitung_pesanan(Request $request)
    {
        $harga = 0;
        foreach ($request->menus as $key => $item) {
            
            if($item == 'Batalkan') {
                
                continue;
            }

            $menu = Menu::findOrFail($item);

            $harga += $menu->harga * $request->jumlahs[$key];
        }

        return toIdr($harga);
    }

    public function proses(Pesanan $pesanan)
    {
        $pesanan->update([
            'status' => 'Diproses'
        ]);

        return redirect()->back()->with('success', 'Berhasil memproses pesanan');
    }

    public function selesai(Pesanan $pesanan)
    {
        $pesanan->update([
            'status' => 'Dibayar'
        ]);

        return redirect()->back()->with('success', 'Berhasil menyelesaikan pesanan');
    }

    public function batalkan(Pesanan $pesanan)
    {
        $pesanan->update([
            'status' => 'Dibatalkan'
        ]);

        return redirect()->back()->with('success', 'Berhasil membatalkan pesanan');
    }

}