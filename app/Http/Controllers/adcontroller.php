<?php

namespace App\Http\Controllers;

use App\Http\Requests\adrequest;
use App\Models\brand_models;
use App\Models\car_brands;
use App\Models\category;
use App\Models\cities;
use App\Models\governorates;
use App\Models\sub_category;
use Illuminate\Http\Request;
use App\Models\ads;
use Illuminate\Support\Facades\Auth;

class adcontroller extends Controller
{
    //
    public function create(){
        $categories = category::select('id','category_ar','category_en')->get();
        $governorates = governorates::select('id','governorate_name_ar','governorate_name_en')->get();
        $brands = car_brands:: select('id','brand_en','brand_ar')->get();
        return view('ad/create',['categories'=>$categories,
                                 'governorates'=>$governorates,
                                 'brands'=>$brands]);
    }

    public function store(adrequest $request)
    {
         //insert
         $additions="";
         for($i = 1;$i<=26;$i++){
             $additions .= $request->add.$i;
         }

        $ad=ads::create([
            'user_id'=> Auth::user()->id,
            'title'=> $request->title,
            'category_id'=> $request->category,
            'sub_category_id'=> $request->sub_category,
            'details'=> $request->details,
            'images'=> $request->images,
            'governorates_id'=> $request->governorate,
            'cities_id'=> $request->city,
            'year'=> $request->year,
            'payment_method'=> $request->payment_method,
            'receiving_date'=> $request->receiving_date,
            'price'=> $request->price,
            'real_estate_type'=> $request->real_estate_type,
            'space'=> $request->space,
            'bed_rooms'=> $request->bed_rooms,
            'bathrooms'=> $request->bathrooms,
            'furnished'=> $request->furnished,
            'floor'=> $request->floor,
            'additions'=> $request->additions,
            'brand'=> $request->brand,
            'model'=> $request->model,
            'condition1'=> $request->condition1,
            'engine'=> $request->engine,
            'body_type'=> $request->body_type,
            'fuel'=> $request->fuel,
            'transmition'=> $request->transmition,
            'kilometers'=> $request->kilometers,
            'color'=> $request->color,
            'mobile'=> $request->mobile,
            'call1'=> $request->call1,
        ]);

        if ($ad) {
            return response()->json([
                'status' => true,
                'msg' => 'Your Add is Saved and Waiting for to be Reviewed By The Admin'
                ]);
        }
        // return redirect('/')->with(['message' => __('msg.Your Ad added successfully')]);
    }
    // public function edit($categoryid)
    // {
    //         $categorydata = category::select('id', 'category_ar', 'category_en')->find($categoryid);
    //         return view('category.edit', ['categorydata' => $categorydata]);
    // }
    // public function update(categoryrequest $request, $categoryid)
    // {
    //      //update
    //     $category = category::find($categoryid);
    //     if (!$category) {
    //         return redirect('category/index')->with(['message' => __('msg.user doesn\'t exist')]);
    //     }
    //     $data = [
    //         'category_ar'=> $request->category_ar,
    //         'category_en'=> $request->category_en,
    //     ];
    //     $op = category::where('id', $categoryid)->update($data);
    //     if ($op) {
    //         $message = __('msg.user data updated successfully');
    //     } else {
    //         $message = __("msg.no change in data happened");
    //     }

    //     session()->flash('message', $message);
    //     return redirect('category/index');
    // }
    // public function destroy($categoryid)
    // {
    //     //
    //     $op = category::find($categoryid)->delete();

    //     if ($op) {
    //         $message = __("msg.Category deleted");
    //     } else {
    //         $message = __("msg.error try again");
    //     }

    //     session()->flash('message1', $message);
    //     return redirect('category/index');
    // }

    public function display(){
        return view('ad/display');
    }

    public function load(Request $request){
        $brandid = 0;
        if(isset($request->id)){
            $brandid=$request->id;
        }
        $model = brand_models::select('id','brand_id','model')->where('brand_id',$brandid)->get();
        $models['data']=$model;
        return response($models);
        exit;
    }

    public function gov(Request $request){
        $govid = 0;
        if(isset($request->id)){
            $govid=$request->id;
        }
        $city = cities::select('id','governorate_id','city_name_ar','city_name_en')->where('governorate_id',$govid)->get();
        $cities['data']=$city;
        return response($cities);
        exit;
    }

    public function cat(Request $request){
        $catid = 0;
        if(isset($request->id)){
            $catid=$request->id;
        }
        $subcategory = sub_category::select('id','category_id','sub_category_ar','sub_category_en')->where('category_id',$catid)->get();
        $subcategories['data']=$subcategory;
        return response($subcategories);
        exit;
    }
}
