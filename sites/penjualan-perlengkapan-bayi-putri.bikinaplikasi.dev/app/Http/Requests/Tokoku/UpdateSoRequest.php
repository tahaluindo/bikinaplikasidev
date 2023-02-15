<?php

namespace App\Http\Requests\Tokoku;

use Illuminate\Foundation\Http\FormRequest;

use App\Tokoku\Supplier;

class UpdateSoRequest extends FormRequest
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
        //Supplier
        $data['supplier']  = Supplier::get();
        foreach($data['supplier'] as $item){
            $items_2[] = $item->id;
        }
        $supplier = implode(',',$items_2);
        
        return [
            'qty'           => 'required|min:0|numeric',
        ];
    }
}
