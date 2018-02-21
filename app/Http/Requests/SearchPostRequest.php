<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SearchPostRequest extends Request
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
        return [

                  
          
            'search'=>'required'
            
           

        ];
    }

    /**主页搜索中间件
     * @return array
     */
    public function messages()
    {
        return [
                                
            'search.required'=>'亲,请输入地址哦',
            
        ];
    }
}
