<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductsRequest extends FormRequest
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
    public function rules(Request $request)
    {

        $rule= [
            'code' => 'required|unique:products,code',
            'name' => 'required',
            'quantity' => 'required|integer|min:0',
            'original_price' => 'required|integer|min:0',
            'sale_price' => 'required|integer|min:0',
            'cate_id'=>'required',
            'images.*'=>'image',
            'content'=>'required',
            'image'=>'image'
        ];
        if($request->route()->product!=null){
            $rule['code'] = 'required|unique:products,code,' . $request->route()->product->id;
        }

        return $rule;


    }
}
