<?php

namespace App\Http\Requests\Tokoku;

use Illuminate\Foundation\Http\FormRequest;
use App\Tokoku\Product;
use App\Tokoku\Supplier;
use App\Tokoku\Transaction;
use App\Tokoku\Periode;

class StoreSoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $periode = Periode::where('active','Y')->get();
        if($periode->count() == 1){
            $periode = $periode->first();
        } else {
            $periode = 0;
        }

        $data['parse']       = Transaction::where('type','SO')->where('periode_id',$periode)->get();
        if($data['parse']->count() == 0){
            $data['product'] = Product::get();
        } else {
            foreach($data['parse'] as $id){
                $ids[] = $id->id;
            }
            $data['product'] = Product::whereNotIn('id',$ids)->get();
        }

        //Product
        foreach($data['product'] as $item){
            $items[] = $item->id;
        }
        $product = implode(',',$items);

        //Supplier
        $data['supplier']  = Supplier::get();
        foreach($data['supplier'] as $item){
            $items_2[] = $item->id;
        }
        $supplier = implode(',',$items_2);
        
        return [
            'product_id'    => 'required|in:'.$product,
            'qty'           => 'required|min:0|numeric',
        ];
    }
}
