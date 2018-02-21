<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class FoodPostRequest extends Request
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

                  
            'name'=>'required|min:1|max:8',
            'info'=>'required|min:1|max:100',
            'price'=>'required|regex:/\d{1,3}/|min:1|max:3',                      
            'pic'=>'required' 
           

        ];
    }

    /**添加菜品验证
     * @return array
     */
    public function messages()
    {
        return [
                                
            'name.required'=>'菜名必须添加',
            'name.min'=>'菜名最少一个字',
            'name.max'=>'菜名最多八个字',
            
            'info.required'=>'介绍必须添加',
            'info.min'=>'介绍最少一个字',
            'info.max'=>'介绍最多一百个字',
            'price.required'=>'介绍必须添加',
            'price.regex'=>'价格0-999元',
            'price.max'=>'价格最少一位数',
            'price.max'=>'价格最多三位数',      
            'pic.required'=>'菜品照片需要添加' 
        ];
    }
}
