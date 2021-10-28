<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userrequest extends FormRequest
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
        $userid = request('id');
        return [
            //
            'user_name' => "required|max:50|unique:users,user_name,$userid",
            'email' => "required|max:100|unique:users,email,$userid|email",
            'mobile' => 'required|min:01000000000|max:01999999999999|numeric|starts_with:0',
            'age' => 'required|min:18|max:150|numeric',
        ];
    }
    public function messages()
    {
        return [
            "user_name.required" => __('msg.user name required'),
            "email.required" => __('msg.user email required'),
            "age.required" => __('msg.user age required'),
            "mobile.required" => __('msg.user mobile required'),
            "user_name.max" => __('msg.max number of charcters allawed is 50'),
            "email.max" => __('msg.max number of charcters allawed is 100'),
            "age.max" => __('msg.max age is 150'),
            "age.min" => __('msg.min age is 18'),
            "mobile.max" => __('msg.Mobile Number Must be Less Than 14 Digits'),
            "mobile.min" => __('msg.Mobile Number Must be at Least Be 11 Digits'),
            "user_name.unique" => __('msg.user name must be unique'),
            "email.unique" => __('msg.email must be unique'),
            "age.numeric" => __('msg.age must be numeric'),
            "mobile.numeric" => __('msg.mobile must be numeric'),
            "mobile.starts_with" => __('msg.mobile must start with 0'),
            "email.email" => __('msg.email must be written correctly'),
        ];
    }
}
