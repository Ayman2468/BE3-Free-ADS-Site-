<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class passwordrequest extends FormRequest
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
            //
            'password' => 'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            "password.required" => __('msg.password required'),
            "password.min" => __('msg.password must be at least 8 digits or charaters'),
        ];
    }
}
