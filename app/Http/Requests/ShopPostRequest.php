<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShopPostRequest extends Request
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


            'phone' => 'required|unique:shop|regex:/1[3578]{1}\d{9}/',
            'password' => 'required',
            'password' => 'regex:/\d{8}/',
            'shopname' => 'required|unique:shop|min:1|max:8',
            'pos' => 'required',
            'pic' => 'required'


        ];
    }

    /**添加店家的验证
     * @return array
     */
    public function messages()
    {
        return [

            'phone.required' => '电话必须添加',
            'phone.regex' => '电话格式不正确',
            'phone.unique' => '电话已存在',
            'password.regex' => '密码为8位数字或字母',
            'password.required' => '密码必须添加',
            'shopname.required' => '店名必须添加',
            'shopname.unique' => '店名已存在',
            'pos.required' => '店家位置必须添加',
            'pic.required' => '店家照片需要添加'
        ];
    }
}
