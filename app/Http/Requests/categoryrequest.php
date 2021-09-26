<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryrequest extends FormRequest
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
        $categoryid = request('id');
        return [
            //
            'category_ar' => "required|max:100|unique:category,category_ar,$categoryid",
            'category_en' => "required|max:100|unique:category,category_en,$categoryid",
        ];
    }
    public function messages()
    {
        return [
            "category_ar.required" => __('msg.category name in arabic is required'),
            "category_en.required" => __('msg.category name in english is required'),
            "category_ar.max" => __('msg.max number of charcters allawed is 100'),
            "category_en.max" => __('msg.max number of charcters allawed is 100'),
            "category_ar.unique" => __('msg.category name in arabic must be unique'),
            "category_en.unique" => __('msg.category name in english must be unique'),
        ];
    }
}
