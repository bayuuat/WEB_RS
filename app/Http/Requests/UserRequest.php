<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_nama' => 'required|string|max:50',
            'user_email' => 'required|email|unique:tbl_user',
            'user_ttl' => 'required|date',
            'roles' => 'string|in:ADMIN,USER',
            'user_asalrs' => 'required|string',
            'user_kode' => 'string|unique:tbl_user',
            'user_password'=>'required',
            'user_telp'=>'required'
        ];
    }
}
