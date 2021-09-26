<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminrequest extends FormRequest
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
        $adminid = request('id');
        return [
            //
            'email' => "required|max:100|unique:admins,email,$adminid|email",
            'password' => "required|min:8",
            'passwordconfirm' => "required",
            'position' => 'required',
        ];
    }
    public function messages()
    {
        return [
            "email.required" => __('msg.admin email required'),
            "position.required" => __('msg.admin position required'),
            "password.required" => __('msg.admin password required'),
            "passwordconfirm.required" => __('msg.admin password required'),
            "email.max" => __('msg.max number of charcters allawed is 100'),
            "password.min" => __('msg.min number of charcters allawed is 8'),
            "email.unique" => __('msg.email must be unique'),
            "email.email" => __('msg.email must be written correctly'),
        ];
    }
}
