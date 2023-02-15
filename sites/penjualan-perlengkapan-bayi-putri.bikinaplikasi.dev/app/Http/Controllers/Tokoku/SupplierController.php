<?php

namespace App\Http\Controllers\Tokoku;

use App\Tokoku\Product;
use App\Tokoku\Supplier;
use App\Tokoku\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tokoku\StoreWhRequest;

class SupplierController extends Controller
{
    private $home, $current;

    public function __construct()
    {
        $this->middleware('auth');
        $this->home = route('home');
        $this->current = route('whIndex');
    }

    public function index(){
        $data['parse'] = Supplier::orderBy('created_at', 'desc')->get();
        $no = 1;
        return view('tokoku.supplier.index',compact('data','no'));
    }

    public function create(){
        return view('tokoku.supplier.create');
    }

    public function store(StoreWhRequest $request){
        $data           = new Supplier;
        $data->name     = $request->input('name');
        $data->save();

        return redirect($this->current)->with('status', 'Berhasil Menambah Supplier');
    }

    public function edit($id){
        $data   = Supplier::find($id);
        if($data == null){
            return redirect($this->current);
        }
        return view('tokoku.supplier.edit',compact('data'));
    }

    public function update(StoreWhRequest $request, $id){
        $x = Supplier::find($id);
        $array_update = [
            'name'    => $request->input('name'),
        ];                
        $x->update($array_update);
        return redirect($this->current)->with('status', 'Berhasil Mengupdate Produk');
    }

    public function delete(Request $request){
        $id     = $request->input('id');
        
        $x   = Supplier::find($id);
        if($x != null){
            $x->delete();
        }

        $productWhere = Product::where('supplier_id', $id);
        $product_ids = $productWhere->get()->pluck('id')->toArray();

        Transaction::whereIn('product_id', $product_ids)->delete();
        $productWhere->delete();

        return redirect($this->current)->with('status', 'Berhasil Menghapus Supplier');
    }
}
