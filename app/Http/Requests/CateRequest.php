<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CateRequest extends FormRequest
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

        $rules= [
            'name'=>'required|unique:cates,name',
            'parent_id'=>'required',
            'order'=>'required|integer|min:1'
        ];
        if($request->route()->cate!=null){
            $rules['name'] = 'required|unique:cates,name,' . $request->route()->cate->id;
        }

        return $rules;
    }
}
