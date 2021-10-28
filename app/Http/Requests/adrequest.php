<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adrequest extends FormRequest
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
    /*

    */
    public function rules()
    {
        $editcond = request('user_id');
        if(isset($editcond)){
        return [
            //
            'title' => "required|max:40",
            'category' => "required",
            'sub_category' => "required",
            'details' => "required|min:20|max:500",
            'images' => "array|max:10",
            'governorate' => "required",
            'city' => "required",
            'year' => "required_unless:real_estate_type,Land",
            'payment_method' => "required",
            'receiving_date' => "required",
            'price' => "required|max:40",
            'mobile' => "required|starts_with:0|min:01000000000|max:01999999999999|numeric",
            //----------------------------------
            'real_estate_type' => "required_if:category,1",
            'space' => "required_if:category,1|max:20",
            'bed_rooms' => "required_if:real_estate_type,Apartment|required_if:real_estate_type,Villa",
            'bathrooms' => "required_if:real_estate_type,Apartment|required_if:real_estate_type,Villa",
            'furnished' => "required_if:real_estate_type,Apartment|required_if:real_estate_type,Villa|required_if:real_estate_type,Whole Building",
            'floor' => "required_if:real_estate_type,Apartment|required_if:real_estate_type,Villa|required_if:real_estate_type,Whole Building",
            //----------------------------
            'brand' => "required_if:category,2",
            'model' => "required_if:category,2",
            'condition1' => "required_if:category,2",
            'engine' => "required_if:sub_category,1|required_if:sub_category,2",
            'body_type' => "required_if:sub_category,1|required_if:sub_category,2",
            'fuel' => "required_if:sub_category,1|required_if:sub_category,2",
            'transmition' => "required_if:sub_category,1|required_if:sub_category,2",
            'color' => "required_if:sub_category,1|required_if:sub_category,2",
        ];
        }else{
            return [
                //
                'title' => "required|max:40",
                'category' => "required",
                'sub_category' => "required",
                'details' => "required|min:20|max:500",
                'images' => "required|array|max:10",
                'governorate' => "required",
                'city' => "required",
                'year' => "required_unless:real_estate_type,Land",
                'payment_method' => "required",
                'receiving_date' => "required",
                'price' => "required|max:40",
                'mobile' => "required|starts_with:0|min:01000000000|max:01999999999999|numeric",
                //----------------------------------
                'real_estate_type' => "required_if:category,1",
                'space' => "required_if:category,1|max:20",
                'bed_rooms' => "required_if:real_estate_type,Apartment|required_if:real_estate_type,Villa",
                'bathrooms' => "required_if:real_estate_type,Apartment|required_if:real_estate_type,Villa",
                'furnished' => "required_if:real_estate_type,Apartment|required_if:real_estate_type,Villa|required_if:real_estate_type,Whole Building",
                'floor' => "required_if:real_estate_type,Apartment|required_if:real_estate_type,Villa|required_if:real_estate_type,Whole Building",
                //----------------------------
                'brand' => "required_if:category,2",
                'model' => "required_if:category,2",
                'condition1' => "required_if:category,2",
                'engine' => "required_if:sub_category,1|required_if:sub_category,2",
                'body_type' => "required_if:sub_category,1|required_if:sub_category,2",
                'fuel' => "required_if:sub_category,1|required_if:sub_category,2",
                'transmition' => "required_if:sub_category,1|required_if:sub_category,2",
                'color' => "required_if:sub_category,1|required_if:sub_category,2",
            ];
        }
    }
    public function messages()
    {
        return [
            "title.required" => __('msg.The Title of The Ad Required'),
            "title.max" => __('msg.The Title Must be Less Than 40 characters'),
            "category.required" => __('msg.The Category of The Ad Required'),
            "sub_category.required" => __('msg.The Sub Category of The Ad Required'),
            "details.required" => __('msg.Details About The Ad Required'),
            "details.min" => __('msg.Details Must be at Least 20 Characters'),
            "details.max" => __('msg.Details Must be Less Than 500 characters'),
            "images.required" => __('msg.Images For The Ad Required'),
            "images.max" => __('msg.Max Number of Images Allowed is 10'),
            "governorate.required" => __('msg.Governorate Where The Ad Exts  Required'),
            "city.required" => __('msg.City Where The Ad Exists Required'),
            "year.required_unless" => __('msg.The Year of The Manufacturing or Construction Required'),
            "payment_method.required" => __('msg.Payment Method Required'),
            "receiving_date.required" => __('msg.Buyer Delivery Date Required'),
            "price.required" => __('msg.Price Required'),
            "price.max" => __('msg.Price Must be Less Than 60 characters'),
            "mobile.required" => __('msg.The Mobile Number of The Owner Required'),
            "mobile.min" => __('msg.Mobile Number Must be at Least Be 11 Digits'),
            "mobile.max" => __('msg.Mobile Number Must be Less Than 14 Digits'),
            "mobile.numeric" => __('msg.Mobile Number Must be Numbers Only'),
            "mobile.starts_with" => __('msg.Mobile Number Must Start With 0'),
            "real_estate_type.required_if" => __('msg.The Type of The Real Estate Required'),
            "space.required_if" => __('msg.The Space of The Real Estate Required'),
            "space.max" => __('msg.The Space of The Real Estate Must be Less Than 20 Characters or Digits'),
            "bed_rooms.required_if" => __('msg.The Number of Bed Rooms in The Real Estate Required'),
            "bathrooms.required_if" => __('msg.The Number of Bathrooms in The Real Estate Required'),
            "furnished.required_if" => __('msg.is The Real Estate Furnished or Not'),
            "floor.required_if" => __('msg.in which Floor is The Real Estate or How Many Floors it Consists of'),
            "brand.required_if" => __('msg.The Brand of The Car Required'),
            "model.required_if" => __('msg.The Model of The Car Required'),
            "condition1.required_if" => __('msg.The Condition of The Car Required'),
            "Engine.required_if" => __('msg.The Engine Capacity of The Car Required'),
            "body_type.required_if" => __('msg.The Body Type of The Car Required'),
            "fuel.required_if" => __('msg.The Fuel Type of The Car Required'),
            "transmition.required_if" => __('msg.The Transmition Type of The Car Required'),
            "color.required_if" => __('msg.The Color of The Car Required'),
        ];
    }
}
