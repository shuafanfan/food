<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserPostRequest extends Request
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

            //'pic'=>'required',
            //'name'=>'required',
            'email' => 'required',
            'email' => 'regex:/\w+@\w+.["com","cn"]/',
            'phone' => 'required',
            'phone' => 'unique:users',
            'phone' => 'regex:/1[3578]{1}\d{9}/',
            'password' => 'regex:/\d{8}/'

        ];
    }

    /**用户修改资料验证
     * @return array
     */
    public function messages()
    {
        return [
            //'pic.required'=>'头像需要添加',          
            //'name.required'=>'用户名必须添加',          
            'email.regex' => '邮箱格式不正确',
            'phone.required' => '电话必须添加',
            'phone.regex' => '电话格式不正确',
            'phone.unique' => '电话已存在',
            'password.regex' => '密码为8位数字或字母'

        ];
    }
}
