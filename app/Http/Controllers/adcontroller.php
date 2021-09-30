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
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Traits\imageinsertiontrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class adcontroller extends Controller
{
    use imageinsertiontrait;
    //
    public function all()
    {
        $allads= ads::select('id','title','details','price','images','user_id','governorates_id')->paginate(paginationcount);
        foreach($allads as $ad){
        $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_en');
        }
        $allgov = governorates::get();
        return view('home',['allads'=>$allads , 'allgov'=>$allgov]);
    }
    public function index(){
        $adsdata = DB::table('ads')->paginate(paginationcount);
        foreach($adsdata as $ad){
            $user_name = User::where('id',$ad->user_id)->value('user_name');
            $city = cities::where('id',$ad->cities_id)->value('city_name_en');
            $ad->user_id = $user_name;
            $ad->cities_id = $city;
        }
        return view('ad/index',['adsdata'=>$adsdata]);
    }

    public function create(){
        $categories = category::select('id','category_ar','category_en')->get();
        $governorates = governorates::select('id','governorate_name_ar','governorate_name_en')->get();
        $brands = car_brands:: select('id','brand_en','brand_ar')->get();
        return view('ad/create',['categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
    }

    public function store(adrequest $request)
    {
        //insert
        if($request->category == 1){
            $request->brand = null;
            $request->model = null;
            $request->condition1 = null;
        }
        if($request->sub_category == 3 || $request->category == 1){
            $request->engine = null;
            $request->body_type = null;
            $request->fuel = null;
            $request->transmition = null;
            $request->kilometers = null;
            $request->color = null;
            $request->add1 = null;
        }
        if($request->category == 2 || $request->real_estate_type == 'Land'){
            $request->bed_rooms = null;
            $request->bathrooms = null;
            $request->furnished = null;
            $request->floor = null;
            $request->add = null;
        }
        if($request->category == 2){
            $request->real_estate_type = null;
            $request->space = null;
        }
        if($request->real_estate_type == 'Land'){
            $request->year = null;
        }

        $additions = "";
        $file_names = "";

        if($request->add){
            $add = $request->add;
            foreach($add as $addi){
                $additions .= $addi.'-';
            }
            $additions = substr($additions,0,-1);
        }
        if($request->add1){
        $add = $request->add1;
            foreach($add as $addi){
                $additions .= $addi.'-';
            }
            $additions = substr($additions,0,-1);
        }


                $images =$request->file('images');
                $folder = 'images/ads/'.Storage::makeDirectory(Auth::user()->id);
                foreach($images as $image){
                $file_name = $this->imageinsertion($image, $folder);
                $file_names .= $file_name.'-';
                }
                $file_names = substr($file_names,0,-1);

        $ad=ads::create([
            'user_id'=> Auth::user()->id,
            'title'=> $request->title,
            'category_id'=> $request->category,
            'sub_category_id'=> $request->sub_category,
            'details'=> $request->details,
            'images'=> $file_names,
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
            'additions'=> $additions,
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
                'msg' => 'Your Add is Saved and Waiting for to be Reviewed By Admin'
                ]);
        }
    }
    public function edit($adid)
    {
            $addata = ads::where('id',$adid)->get();
            $categories = category::select('id', 'category_ar', 'category_en')->find($addata[0]->category_id);
            $subcategories = sub_category::where('category_id',$addata[0]->category_id)->get();
            $governorates = governorates::select('id','governorate_name_ar','governorate_name_en')->get();
            $brands = car_brands:: select('id','brand_en','brand_ar')->get();
            $models = brand_models:: select('id','brand_id','model')->get();
            $cities = cities::select('id','governorate_id','city_name_ar','city_name_en')->get();
            return view('ad/edit',['addata'=>$addata,'categories'=>$categories,
            'subcategories'=>$subcategories,'cities'=>$cities,'governorates'=>$governorates,
            'brands'=>$brands,'models'=>$models]);
    }
    public function update(adrequest $request, $adid)
    {
        //return $request->file('images');
        //exit;
         //update
        if($request->category == 1){
            $request->brand = null;
            $request->model = null;
            $request->condition1 = null;
        }
        if($request->sub_category == 3 || $request->category == 1){
            $request->engine = null;
            $request->body_type = null;
            $request->fuel = null;
            $request->transmition = null;
            $request->kilometers = null;
            $request->color = null;
            $request->add1 = null;
        }
        if($request->category == 2 || $request->real_estate_type == 'Land'){
            $request->bed_rooms = null;
            $request->bathrooms = null;
            $request->furnished = null;
            $request->floor = null;
            $request->add = null;
        }
        if($request->category == 2){
            $request->real_estate_type = null;
            $request->space = null;
        }
        if($request->real_estate_type == 'Land'){
            $request->year = null;
        }
        $additions = "";
        $file_names = "";

        if($request->add){
            $add = $request->add;
            foreach($add as $addi){
                $additions .= $addi.'-';
            }
            $additions = substr($additions,0,-1);
        }
        if($request->add1){
        $add = $request->add1;
            foreach($add as $addi){
                $additions .= $addi.'-';
            }
            $additions = substr($additions,0,-1);
        }
        $oldimages = ads::where('id',$adid)->value('images');
        $ad = ads::find($adid);
        if (!$ad) {
            return redirect()->back()->with(['message1' => __('msg.AD doesn\'t exist')]);
        }
        if($request->input('dele')){
            $deletedimagescount = count($request->input('dele'));
        }else{
            $deletedimagescount = 0;
        }
        if($request->file('images')){
            $images =$request->file('images');
        }else{
            $images = [];
        }
        if(count($images)+$request->oldimagesnumber-$deletedimagescount > 10){
            return response()->json([
                'status' => false,
                'msg' => '10 images is the max number for every ad'
                ]);
        }else{
            $folder = 'images/ads/'.Storage::makeDirectory($request->user_id);
            foreach($images as $image){
            $file_name = $this->imageinsertion($image, $folder);
            $file_names .= $file_name.'-';
            }
            $file_names = substr($file_names,0,-1);
        }

        $oldimagesarray = explode('-',$oldimages);
        if($request->input('dele')){
        $result = implode('-',array_diff($oldimagesarray,$request->input('dele')));
        }else{
            $result = implode('-',$oldimagesarray);
        }
        if($result){
            $final=$result.'-'.$file_names;
            if(!$file_names){
                $final = substr($final,0,-1);
            }
        }else{
            $final = $file_names;
        }
        // return $final;
        if($final == null){
            return response()->json([
                'status' => false,
                'msg' => 'At least 1 image must be uploaded'
                ]);
        }
        $data = [
                'user_id'=> $request->user_id,
                'title'=> $request->title,
                'category_id'=> $request->category,
                'sub_category_id'=> $request->sub_category,
                'details'=> $request->details,
                'images'=> $final,
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
                'additions'=> $additions,
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
        ];
        $op = ads::where('id', $adid)->update($data);

        if ($final && $op) {
            if($request->input('dele')){
            foreach($request->input('dele') as $delete){
                $a = $_SERVER['DOCUMENT_ROOT'] . '/BE3/public/images/ads/'.$request->user_id.'/'. $delete;
                unlink($a);
            }
        }
        }
        if ($op) {
            return response()->json([
                'status' => true,
                'msg' => 'Your Add is Updated and Waiting for to be Reviewed By Admin'
                ]);
        }
    }
    public function destroy($adid)
    {
        //
        $op = ads::find($adid)->delete();

        if ($op) {
            $message = __("msg.AD deleted");
        } else {
            $message = __("msg.error try again");
        }

        session()->flash('message1', $message);
        return redirect()->back();
    }

    public function display($adid){
        $addata = ads::find($adid);
            $addata->user_created_at = User::where('id',$addata->user_id)->value('created_at');
            $addata->user_name = User::where('id',$addata->user_id)->value('user_name');
            $addata->governorates_id = governorates::where('id',$addata->governorates_id)->value('governorate_name_en');
            $addata->cities_id = cities::where('id',$addata->cities_id)->value('city_name_en');
            $addata->category_id = category::where('id',$addata->category_id)->value('category_en');
            $addata->sub_category_id = sub_category::where('id',$addata->sub_category_id)->value('sub_category_en');
            if($addata->brand){
            $addata->brand = car_brands::where('id',$addata->brand)->value('brand_en');
            $addata->model = brand_models::where('id',$addata->model)->value('model');
            }

        return view('ad/display',['addata'=>$addata]);
    }

    // public function filter(Request $request , $int){
    //     if($int == 1){
    //         $array = $request->search->orderby('price');
    //         $search = $array;
    //     }
    //     return $search;
    // }
    public function search(request $request){
        if($request->gov == 0){
        $search = ads::where('title','LIKE','%'.$request->keyword.'%')->paginate(paginationcount);
        }else{
        $search = ads::where([['title','LIKE','%'.$request->keyword.'%'],['governorates_id','=',$request->gov]])->paginate(paginationcount);
        }
        foreach($search as $ad){
            $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_en');
        }
        if(count($search) > 0){
        return view('search_result',['search'=>$search,'search_title'=>$request->keyword]);
        }else{
        return view('search_result',['search_title'=>'Can\'t Find Any Ad Match Your Search']);
        }
    }

    public function searchcat($int){
            $search = ads::where('category_id',$int)->paginate(paginationcount);
            $search_title = category::where('id',$int)->value('category_en');
            foreach($search as $ad){
                $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_en');
            }
            if(count($search) > 0){
                return view('search_result',['search'=>$search,'search_title'=>$search_title]);
                }else{
                return view('search_result',['search_title'=>'Can\'t Find Any Ad Match Your Search']);
                }
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
