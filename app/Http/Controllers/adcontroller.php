<?php

namespace App\Http\Controllers;

use App\Events\adviewer;
use App\Http\Requests\adrequest;
use App\Models\brand_models;
use App\Models\car_brands;
use App\Models\category;
use App\Models\cities;
use App\Models\governorates;
use App\Models\sub_category;
use Illuminate\Http\Request;
use App\Models\ads;
use App\Models\comments;
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
        $allads= ads::select('id','title','details','price','images','user_id','governorates_id')->where('approval','Approved')->paginate(paginationcount);
        foreach($allads as $ad){
        $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_en');
        }
        $categories = category::get();
        $governorates = governorates::get();
        $brands = car_brands::get();
        return view('home',['allads'=>$allads,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
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
                if(str_contains($file_names,'error')){
                    return response()->json([
                        'status' => false,
                        'msg' => 'one or more images have wrong extension'
                        ]);
                }

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
            if(str_contains($file_names,'error')){
                return response()->json([
                    'status' => false,
                    'msg' => 'one or more images have wrong extension'
                    ]);
            }
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
            event(new adviewer($addata));

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

        if(isset(Auth::user()->id)){
            if($addata->user_id == Auth::user()->id){
                $data = ['seen_status'=>'seen'];
                comments::where('ad_id', $adid)->update($data);
            }
        }
        $comments = comments::where('ad_id',$adid)->orderBy('created_at','desc')->get();
            if($comments){
                foreach($comments as $comment){
                $comment->user_id = User::where('id',$comment->user_id)->value('user_name');
                $tt=(strtotime(now())-strtotime($comment->created_at));
                if($tt < 60){
                    $x = $tt.' seconds';
                }elseif(60 <= $tt && $tt < 3600){
                    $tt = floor($tt/60);
                    $x = $tt.' minutes';
                }elseif(3600 <= $tt && $tt < 86400){
                    $tt = floor($tt/3600);
                    $x = $tt.' hours';
                }elseif(86400 <= $tt && $tt < 1036800){
                    $tt = floor($tt/86400);
                    $x = $tt.' months';
                }
                $comment['date'] = $x;
            }
        }
        return view('ad/display',['addata'=>$addata,'comments'=>$comments]);
    }

    public function advance(Request $request)
    {
        switch ($request->order) {
            case 'date_desc':
                $by = 'created_at';
                $way = 'desc';
                break;
            case 'date_asc':
                $by = 'created_at';
                $way = 'asc';
                break;
            case 'price_asc':
                $by = 'price';
                $way = 'asc';
                break;
            case 'price_desc':
                $by = 'price';
                $way = 'desc';
                break;
        }
        if($request->category == 1){
            $request->brand = null;
            $request->model = null;
            $request->condition = null;
        }
        if($request->sub_category == 3 || $request->category == 1){
            $request->engine = null;
            $request->body_type = null;
            $request->fuel = null;
            $request->transmition = null;
        }
        if($request->category == 2 || $request->real_estate_type == 'Land'){
            $request->furnished = null;
            $request->floor = null;
        }
        if($request->category == 2){
            $request->real_estate_type = null;
            $request->space = null;
        }
        if($request->real_estate_type == 'Land'){
            $request->from_year = null;
            $request->to_year = null;
        }

        $keyword = $request->keyword;

        $category = $request->category;
        if($category == 0){
            $category = ads::pluck('category_id');
        }
        else{
            $category = explode(',',$category);
        }

        $sub_category = $request->sub_category;
        if($sub_category == 0){
            $sub_category = ads::pluck('sub_category_id');
        }else{
            $sub_category = explode(',',$sub_category);
        }
        $governorate = $request->governorate;
        if($governorate == 0){
            $governorate = ads::pluck('governorates_id');
        }else{
            $governorate = explode(',',$governorate);
        }
        $city = $request->city;
        if($city == 0){
            $city = ads::pluck('cities_id');
        }else{
            $city = explode(',',$city);
        }
        $from_year = $request->from_year;
        $to_year = $request->to_year;
        $min_price = $request->min_price;
        if($min_price == null){
            $min_price = 0;
        }
        $max_price = $request->max_price;
        if($max_price == null){
            $max_price = 10000000000000;
        }
        $brand = $request->brand;
        if($brand == 0){
            $brand = ads::pluck('brand');
        }else{
            $brand = explode(',',$brand);
        }
        $model = $request->model;
        if($model == 0){
            $model = ads::pluck('model');
        }else{
            $model = explode(',',$model);
        }
        $condition = $request->condition;
        if($condition == 0){
            $condition = ads::pluck('condition1');
        }else{
            $condition = explode(',',$condition);
        }
        $engine = $request->engine;
        if($engine == 0){
            $engine = ads::pluck('engine');
        }else{
            $engine = explode(',',$engine);
        }
        $body_type = $request->body_type;
        if($body_type == 0){
            $body_type = ads::pluck('body_type');
        }else{
            $body_type = explode(',',$body_type);
        }
        $transmition = $request->transmition;
        if($transmition == 0){
            $transmition = ads::pluck('transmition');
        }else{
            $transmition = explode(',',$transmition);
        }
        $fuel = $request->fuel;
        if($fuel == 0){
            $fuel = ads::pluck('fuel');
        }else{
            $fuel = explode(',',$fuel);
        }
        $real_estate_type = $request->real_estate_type;
        if($real_estate_type == 0){
            $real_estate_type = ads::pluck('real_estate_type');
        }else{
            $real_estate_type = explode(',',$real_estate_type);
        }
        $space = $request->space;
        if($space == null){
            $space = ads::pluck('space');
        }else{
            $space = explode(',',$space);
        }
        $floor = $request->floor;
        if($floor == 0){
            $floor = ads::pluck('floor');
        }else{
            $floor = explode(',',$floor);
        }
        $furnished = $request->furnished;
        if($furnished == 0){
            $furnished = ads::pluck('furnished');
        }else{
            $furnished = explode(',',$furnished);
        }

        $categories = category::get();
        $governorates = governorates::get();
        $brands = car_brands::get();

        switch ($request->category) {
            case 1:

                $search = ads::where('approval','Approved')
                ->whereBetween('year', [$from_year,$to_year])
                ->whereBetween('price', [$min_price,$max_price])
                ->where('title','LIKE',"%".$keyword."%")
                ->whereIn('category_id', $category)
                ->whereIn('sub_category_id', $sub_category)
                ->whereIn('governorates_id', $governorate)
                ->whereIn('cities_id', $city)
                ->whereIn('real_estate_type', $real_estate_type)
                ->whereIn('space', $space)
                //->whereIn('floor', $floor)
                //->whereIn('furnished', $furnished)
                ->orderBy($by,$way)
                ->paginate(paginationcount);

                foreach($search as $ad){
                        $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_en');
                }

                return view('search_result',['search'=>$search,'search_title'=>$keyword,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
                break;

            case 2:

                $search = ads::where('approval','Approved')
                        ->whereBetween('year', [$from_year,$to_year])
                        ->whereBetween('price', [$min_price,$max_price])
                        ->where('title','LIKE',"%".$keyword."%")
                        ->whereIn('category_id', $category)
                        ->whereIn('sub_category_id', $sub_category)
                        ->whereIn('governorates_id', $governorate)
                        ->whereIn('cities_id', $city)
                        ->whereIn('brand', $brand)
                        ->whereIn('model', $model)
                        ->whereIn('condition1', $condition)
                        ->whereIn('engine', $engine)
                        ->whereIn('body_type', $body_type)
                        ->whereIn('transmition', $transmition)
                        ->whereIn('fuel', $fuel)
                        ->orderBy($by,$way)
                        ->paginate(paginationcount);

                    foreach($search as $ad){
                        $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_en');
                    }

                        return view('search_result',['search'=>$search,'search_title'=>$keyword,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
                        break;

            default:

            $search = ads::where('approval','Approved')
                ->whereBetween('year', [$from_year,$to_year])
                ->whereBetween('price', [$min_price,$max_price])
                ->where('title','LIKE',"%".$keyword."%")
                ->whereIn('category_id', $category)
                ->whereIn('sub_category_id', $sub_category)
                ->whereIn('governorates_id', $governorate)
                ->whereIn('cities_id', $city)
                ->orderBy($by,$way)
                ->paginate(paginationcount);

            foreach($search as $ad){
                $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_en');
            }

                return view('search_result',['search'=>$search,'search_title'=>$keyword,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
            break;
        }

    }

    public function searchcat($int){
            $search = ads::where('category_id',$int)->where('approval','Approved')->orderBy('created_at','desc')->paginate(paginationcount);
            $search_title = category::where('id',$int)->value('category_en');
            foreach($search as $ad){
                $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_en');
            }
            $categories = category::get();
            $governorates = governorates::get();
            $brands = car_brands::get();
            if(count($search) > 0){
                return view('search_result',['search'=>$search,'search_title'=>$search_title,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
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

    public function approve($adid)
    {
        $find = ads::find($adid);
        if(!$find){
            return redirect()->back()->with(['message1' => __('msg.AD doesn\'t exist')]);
        }
        $data=[
            'approval'=>'Approved'
        ];
        $op = ads::where('id',$adid)->update($data);
        return redirect()->back()->with(['message'=>_('msg.AD Approved')]);
    }
}
