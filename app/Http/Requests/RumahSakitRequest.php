<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RumahSakitRequest extends FormRequest
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
            'rs_nama' => 'required',
            'rs_kondisi' => '',
            'rs_lokasi' => 'required',
            'rs_optimal' => 'nullable'
        ];
    }
}
