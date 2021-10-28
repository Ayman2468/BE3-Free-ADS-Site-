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
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use function PHPUnit\Framework\isEmpty;

class adcontroller extends Controller
{
    use imageinsertiontrait;
    //
    public function all()
    {
        $allads= ads::select('id','title','details','price','images','user_id','governorates_id')->where('approval','Approved')->paginate(paginationcount);
        foreach($allads as $ad){
        $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_'.LaravelLocalization::getcurrentlocale());
        }
        $categories = category::get();
        $governorates = governorates::get();
        $brands = car_brands::get();
        return view('home',['allads'=>$allads,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
    }
    public function index(){
        if(isset($_GET['specad'])){
            $adsdata = ads::where('id',$_GET['specad'])->paginate(paginationcount);
            if($_GET['specad'] == null){
                $adsdata = DB::table('ads')->paginate(paginationcount);
            }
        }else{
            $adsdata = DB::table('ads')->paginate(paginationcount);
        }
        foreach($adsdata as $ad){
            $user_name = User::where('id',$ad->user_id)->value('user_name');
            $city = cities::where('id',$ad->cities_id)->value('city_name_'.LaravelLocalization::getcurrentlocale());
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
                        'msg' => __('msg.one or more images have wrong extension')
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
                'msg' => __('msg.Your Ad is Saved and Waiting for to be Reviewed By Admin')
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
                'msg' => __('msg.10 images is the max number for every ad')
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
                    'msg' => __('msg.one or more images have wrong extension')
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
                'msg' => __('msg.At least 1 image must be uploaded')
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
                'msg' => __('msg.Your Ad is Updated and Waiting for to be Reviewed By Admin')
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
        if($addata == null){
            return redirect('/');
        }
            event(new adviewer($addata));

            $addata->user_created_at = User::where('id',$addata->user_id)->value('created_at');
            $addata->user_name = User::where('id',$addata->user_id)->value('user_name');
            $addata->governorates_id = governorates::where('id',$addata->governorates_id)->value('governorate_name_'.LaravelLocalization::getcurrentlocale());
            $addata->cities_id = cities::where('id',$addata->cities_id)->value('city_name_'.LaravelLocalization::getcurrentlocale());
            $addata->category_id = category::where('id',$addata->category_id)->value('category_'.LaravelLocalization::getcurrentlocale());
            $addata->sub_category_id = sub_category::where('id',$addata->sub_category_id)->value('sub_category_'.LaravelLocalization::getcurrentlocale());
            if($addata->brand){
            $addata->brand = car_brands::where('id',$addata->brand)->value('brand_'.LaravelLocalization::getcurrentlocale());
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
                }elseif(86400 <= $tt && $tt < 2635200){
                    $tt = floor($tt/86400);
                    $x = $tt.' days';
                }else{
                    $tt = floor($tt/2635200);
                    $x = $tt.' months';
                }
                $comment['date'] = $x;
            }
        }
        return view('ad/display',['addata'=>$addata,'comments'=>$comments]);
    }

    public function advance()
    {
        switch ($_GET['order']) {
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
        if($_GET['category'] == 1){
            $_GET['brand'] = null;
            $_GET['model'] = null;
            $_GET['condition'] = null;
        }
        if($_GET['sub_category'] == 3 || $_GET['category'] == 1){
            $_GET['engine'] = null;
            $_GET['body_type'] = null;
            $_GET['fuel'] = null;
            $_GET['transmition'] = null;
        }
        if($_GET['category'] == 2 || $_GET['real_estate_type'] == 'Land'){
            $_GET['furnished'] = null;
            $_GET['floor'] = null;
        }
        if($_GET['category'] == 2){
            $_GET['real_estate_type'] = null;
            $_GET['space'] = null;
        }
        if($_GET['real_estate_type'] == 'Land'){
            $_GET['from_year'] = null;
            $_GET['to_year'] = null;
        }

        $keyword = $_GET['keyword'];

        $category = $_GET['category'];
        if($category === '0'){
            $category = ads::pluck('category_id');
        }
        else{
            $category = explode(',',$category);
        }

        $sub_category = $_GET['sub_category'];
        if($sub_category === '0'){
            $sub_category = ads::pluck('sub_category_id');
        }else{
            $sub_category = explode(',',$sub_category);
        }
        $governorate = $_GET['governorate'];
        if($governorate === '0'){
            $governorate = ads::pluck('governorates_id');
        }else{
            $governorate = explode(',',$governorate);
        }
        $city = $_GET['city'];
        if($city === '0'){
            $city = ads::pluck('cities_id');
        }else{
            $city = explode(',',$city);
        }
        $from_year = $_GET['from_year'];
        $to_year = $_GET['to_year'];
        $min_price = $_GET['min_price'];
        if($min_price == null){
            $min_price = 0;
        }
        $max_price = $_GET['max_price'];
        if($max_price == null){
            $max_price = 10000000000000;
        }
        $brand = $_GET['brand'];
        if($brand === '0'){
            $brand = ads::pluck('brand');
        }else{
            $brand = explode(',',$brand);
        }
        $model = $_GET['model'];
        if($model === '0'){
            $model = ads::pluck('model');
        }else{
            $model = explode(',',$model);
        }
        $condition = $_GET['condition'];
        if($condition === '0'){
            $condition = ads::pluck('condition1');
        }else{
            $condition = explode(',',$condition);
        }
        $engine = $_GET['engine'];
        if($engine === '0'){
            $engine = ads::pluck('engine');
        }else{
            $engine = explode(',',$engine);
        }
        $body_type = $_GET['body_type'];
        if($body_type === '0'){
            $body_type = ads::pluck('body_type');
        }else{
            $body_type = explode(',',$body_type);
        }
        $transmition = $_GET['transmition'];
        if($transmition === '0'){
            $transmition = ads::pluck('transmition');
        }else{
            $transmition = explode(',',$transmition);
        }
        $fuel = $_GET['fuel'];
        if($fuel === '0'){
            $fuel = ads::pluck('fuel');
        }else{
            $fuel = explode(',',$fuel);
        }
        $real_estate_type = $_GET['real_estate_type'];
        if($real_estate_type === '0'){
            $real_estate_type = ads::pluck('real_estate_type');
        }else{
            $real_estate_type = explode(',',$real_estate_type);
        }

        $space = $_GET['space'];
        if($space == null){
            $space = ads::pluck('space');
        }else{
            $space = explode(',',$space);
        }
        $floor = $_GET['floor'];
        if($floor === '0'){
            $floor = ads::pluck('floor');
        }else{
            $floor = explode(',',$floor);
        }
        $furnished = $_GET['furnished'];
        if($furnished === '0'){
            $furnished = ads::pluck('furnished');
        }else{
            $furnished = explode(',',$furnished);
        }

        $categories = category::get();
        $governorates = governorates::get();
        $brands = car_brands::get();

        switch ($_GET['category']) {
            case 1:
                if($real_estate_type === ['Apartment'] || $real_estate_type === ['Villa'] || $real_estate_type === ['Whole Building']){
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
                    ->whereIn('floor', $floor)
                    ->whereIn('furnished', $furnished)
                    ->orderBy($by,$way)
                    ->paginate(paginationcount);
                }else{
                    $search = ads::where('approval','Approved')
                    ->whereBetween('price', [$min_price,$max_price])
                    ->where('title','LIKE',"%".$keyword."%")
                    ->whereIn('category_id', $category)
                    ->whereIn('sub_category_id', $sub_category)
                    ->whereIn('governorates_id', $governorate)
                    ->whereIn('cities_id', $city)
                    ->whereIn('real_estate_type', $real_estate_type)
                    ->whereIn('space', $space)
                    ->orderBy($by,$way)
                    ->paginate(paginationcount);
                }

                foreach($search as $ad){
                        $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_'.LaravelLocalization::getcurrentlocale());
                }

                return view('search_result',['search'=>$search,'search_title'=>$keyword,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
                break;

            case 2:
                if($sub_category === ['3']){
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
                        ->orderBy($by,$way)
                        ->paginate(paginationcount);
                }else{
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
                }

                    foreach($search as $ad){
                        $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_'.LaravelLocalization::getcurrentlocale());
                    }

                        return view('search_result',['search'=>$search,'search_title'=>$keyword,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
                        break;

            default:

            $search = ads::where('approval','Approved')
                ->whereBetween('price', [$min_price,$max_price])
                ->where('title','LIKE',"%".$keyword."%")
                ->whereIn('category_id', $category)
                ->whereIn('sub_category_id', $sub_category)
                ->whereIn('governorates_id', $governorate)
                ->whereIn('cities_id', $city)
                ->orderBy($by,$way)
                ->paginate(paginationcount);

            foreach($search as $ad){
                $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_'.LaravelLocalization::getcurrentlocale());
            }

                return view('search_result',['search'=>$search,'search_title'=>$keyword,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
            break;
        }

    }

    public function searchcat($int){
            $search = ads::where('category_id',$int)->where('approval','Approved')->orderBy('created_at','desc')->paginate(paginationcount);
            $search_title = category::where('id',$int)->value('category_'.LaravelLocalization::getcurrentlocale());
            foreach($search as $ad){
                $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_'.LaravelLocalization::getcurrentlocale());
            }
            $categories = category::get();
            $governorates = governorates::get();
            $brands = car_brands::get();
            if(count($search) > 0){
                return view('search_result',['search'=>$search,'search_title'=>$search_title,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
                }else{
                return view('search_result',['search_title'=> __('msg.Can\'t Find Any Ad Match Your Search')]);
                }
    }
    public function searchsubcat($int){
            $search = ads::where('sub_category_id',$int)->where('approval','Approved')->orderBy('created_at','desc')->paginate(paginationcount);
            $search_title = sub_category::where('id',$int)->value('sub_category_'.LaravelLocalization::getcurrentlocale());
            foreach($search as $ad){
                $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_'.LaravelLocalization::getcurrentlocale());
            }
            $categories = category::get();
            $governorates = governorates::get();
            $brands = car_brands::get();
            if(count($search) > 0){
                return view('search_result',['search'=>$search,'search_title'=>$search_title,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
                }else{
                return view('search_result',['search_title'=> __('msg.Can\'t Find Any Ad Match Your Search')]);
                }
    }

    public function searchcity($int){
            $search = ads::where('cities_id',$int)->where('approval','Approved')->orderBy('created_at','desc')->paginate(paginationcount);
            $search_title = cities::where('id',$int)->value('city_name_'.LaravelLocalization::getcurrentlocale());
            foreach($search as $ad){
                $ad->governorates_id = governorates::where('id',$ad->governorates_id)->value('governorate_name_'.LaravelLocalization::getcurrentlocale());
            }
            $categories = category::get();
            $governorates = governorates::get();
            $brands = car_brands::get();
            if(count($search) > 0){
                return view('search_result',['search'=>$search,'search_title'=>$search_title,'categories'=>$categories,'governorates'=>$governorates,'brands'=>$brands]);
                }else{
                return view('search_result',['search_title'=> __('msg.Can\'t Find Any Ad Match Your Search')]);
                }
    }

    public function load(Request $request){
        $brandid = 0;
        if(isset($request->id)){
            $brandid=$request->id;
        }
        $model = brand_models::select('id','brand_id','model')->where('brand_id',$brandid)->get();
        $models['data']=$model;
        $models['trans'] = __('msg.All Models');

        return response($models);
        exit;
    }

    public function gov(Request $request){
        $govid = 0;
        if(isset($request->id)){
            $govid=$request->id;
        }
        $city = cities::select('id','governorate_id','city_name_'.LaravelLocalization::getcurrentlocale().' as city')->where('governorate_id',$govid)->get();
        $cities['data']=$city;
        return response($cities);
        exit;
    }

    public function cat(Request $request){
        $catid = 0;
        if(isset($request->id)){
            $catid=$request->id;
        }
        $subcategory = sub_category::select('id','category_id','sub_category_'.LaravelLocalization::getcurrentlocale().' as sub_category')->where('category_id',$catid)->get();
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
