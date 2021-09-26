<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sub_categoryrequest extends FormRequest
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
        $sub_categoryid = request('id');
        return [
            //
            'sub_category_ar' => "required|max:100|unique:sub_category,sub_category_ar,$sub_categoryid",
            'sub_category_en' => "required|max:100|unique:sub_category,sub_category_en,$sub_categoryid",
        ];
    }
    public function messages()
    {
        return [
            "sub_category_ar.required" => __('msg.sub category name in arabic is required'),
            "sub_category_en.required" => __('msg.sub category name in english is required'),
            "sub_category_ar.max" => __('msg.max number of charcters allawed is 100'),
            "sub_category_en.max" => __('msg.max number of charcters allawed is 100'),
            "sub_category_ar.unique" => __('msg.sub category name in arabic must be unique'),
            "sub_category_en.unique" => __('msg.sub category name in english must be unique'),
        ];
    }
}
