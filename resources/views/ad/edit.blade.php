@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">{{ __('msg.Edit Ad') }}</div>

                <div class="card-body">

                    <div id="msg1" class="alert alert-success text-center font-weight-bold" style="display: none;">
                    </div>
                    <div id="msg2" class="alert alert-danger text-center font-weight-bold" style="display: none;">
                    </div>
                    <form id="adform1" method="POST" enctype="multipart/form-data" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="title1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Title') }}</label>

                            <div class="col-md-6">
                                <input id="title1" type="text" class="form-control" name="title"  autocomplete="title" value="{{$addata[0]->title}}" autofocus>

                                <strong  id="title_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Category') }}</label>

                            <div class="col-md-6">
                                <select id="category1" class="form-control text-muted" name="category" readonly>
                                    <option class="{{$categories->id}}" value="{{$categories->id}}" selected>{{$categories['category_'.LaravelLocalization::getcurrentlocale()]}}</option>
                                </select>

                                <strong  id="category_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sub_category1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Sub Category') }}</label>

                            <div class="col-md-6">
                                <select id="sub_category1" class="form-control text-muted" name="sub_category">
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}"
                                            @if ($subcategory->id == $addata[0]->sub_category_id)
                                                {{'selected'}}
                                            @endif
                                            >{{$subcategory['sub_category_'.LaravelLocalization::getcurrentlocale()]}}</option>
                                    @endforeach
                                </select>

                                <strong  id="sub_category_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>
                        {{-- Changeable Section --}}
                        @if ($addata[0]->category_id == 2)
                            <div id="car_slots1">
                                @include('ad.car_specification1')
                            </div>
                        @endif
                        @if ($addata[0]->category_id == 1)
                        <div id="real_slots1">
                            @include('ad.real_specification1')
                        </div>
                        @endif

                        <div id="year1" class="form-group row">
                            <label for="year2" class="col-md-4 col-form-label text-md-right">{{ __('msg.Year') }}</label>

                            <div class="col-md-6">
                                <select id="year2" class="form-control text-muted" name="year"  >
                                    <option></option>
                                    @for ($i = date("Y")+1; $i>=date("Y")-100;$i--)
                                        <option value="{{$i}}"
                                        @if ($i == $addata[0]->year)
                                                {{'selected'}}
                                            @endif
                                        >{{$i}}
                                        </option>
                                    @endfor
                                </select>

                                <strong  id="year_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_method1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Payment Method')}}</label>

                            <div class="col-md-6">
                                <select id="payment_method1" class="form-control text-muted" name="payment_method">
                                    <option value="cash"
                                    @if ('cash' == $addata[0]->payment_method)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Cash')}}</option>
                                    <option value="installment"
                                    @if ('installment' == $addata[0]->payment_method)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Installment')}}</option>
                                    <option value="cash & installment"
                                    @if ('cash & installment' == $addata[0]->payment_method)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Cash & Installment')}}</option>
                                </select>

                                <strong  id="payment_method_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="receiving_date1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Receiving Date') }}</label>

                            <div class="col-md-6">
                                <select id="receiving_date1" class="form-control text-muted" name="receiving_date"  >
                                    <option value="immediately"
                                    @if ('immediately' == $addata[0]->receiving_date)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Immediately')}}</option>
                                    <option value="within a week"
                                    @if ('within a week' == $addata[0]->receiving_date)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Within a week')}}</option>
                                    <option value="within a month"
                                    @if ('within a month' == $addata[0]->receiving_date)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Within a month')}}</option>
                                    <option value="within a year"
                                    @if ('within a year' == $addata[0]->receiving_date)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Within a year')}}</option>
                                    <option value="within a 2 years"
                                    @if ('within a 2 years' == $addata[0]->receiving_date)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Within a 2 years')}}</option>
                                    <option value="within a 3 years"
                                    @if ('within a 3 years' == $addata[0]->receiving_date)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Within a 3 years')}}</option>
                                    <option value="within a 4 years"
                                    @if ('within a 4 years' == $addata[0]->receiving_date)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Within a 4 years')}}</option>
                                    <option value="within a 5 years"
                                    @if ('within a 5 years' == $addata[0]->receiving_date)
                                        {{'selected'}}
                                    @endif>{{ __('msg.Within a 5 years')}}</option>
                                </select>

                                <strong  id="receiving_date_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Price / Advance Payment') }}</label>

                            <div class="col-md-6">
                                <input id="price1" type="text" class="form-control" name="price" autocomplete="price" value="{{$addata[0]->price}}">

                                <strong  id="price_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Details') }}</label>

                            <div class="col-md-6">
                                <textarea id="details1" type="text" class="form-control" name="details"  data-mintext="10" data-maxtext="4000" cols="80" rows="1">
                                {{$addata[0]->details}}
                                </textarea>

                                <strong  id="details_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <input type="text" value="{{$addata[0]->user_id}}" name="user_id" hidden>
                        <div class="form-group row">
                            <label for="images1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Add images of what you are selling') }}</label>

                            <div class="col-md-6 @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">
                                <input type="text" value="{{count(explode('-',$addata[0]->images))}}" name="oldimagesnumber" hidden>
                                <label class="btn bg-light">
                                    {{__('msg.upload...')}}
                                <input id="images1" type="file" name="images[]" multiple hidden>
                                </label>
                                <div class="col-10 bg-light ">
                                    @foreach (explode('-',$addata[0]->images) as $image)
                                    <img class=" col-10 mt-1 mb-1" src="{{asset('images/ads/'.$addata[0]->user_id.'/'.$image)}}">
                                    <label ><input type="checkbox" name="dele[]" value="{{$image}}">{{ __('msg.Delete This Image')}}</label>
                                    @endforeach
                                </div>
                                <p class="note">{{ __('msg.*note that the first image will be the cover of the ad')}}</p>
                                <p class="note">{{ __('msg.*note that the allowed extensions are (.jpg .jepg .png .gif) only')}}</p>

                                <strong  id="images_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="governorate1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Governorate') }}</label>

                            <div class="col-md-6">
                                <select id="governorate1" class="form-control text-muted" name="governorate"  >
                                    @foreach ( $governorates as $governorate)
                                    <option class="{{$governorate->id}}" value="{{$governorate->id}}"
                                    @if ($governorate->id == $addata[0]->governorates_id)
                                        {{'selected'}}
                                    @endif
                                    >{{$governorate['governorate_name_'.LaravelLocalization::getcurrentlocale()]}}</option>
                                    @endforeach
                                </select>

                                <strong  id="governorate_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city1" class="col-md-4 col-form-label text-md-right">{{ __('msg.City') }}</label>

                            <div class="col-md-6">
                                <select id="city1" class="form-control text-muted" name="city"  >
                                    @foreach ( $cities as $city)
                                        @if ($city->governorate_id == $addata[0]->governorates_id)
                                            <option class="{{$city->id}}" value="{{$city->id}}"
                                            @if ($city->id == $addata[0]->cities_id)
                                                {{'selected'}}
                                            @endif
                                            >{{$city['city_name_'.LaravelLocalization::getcurrentlocale()]}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <strong  id="city_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile1" type="text" class="form-control" name="mobile"  autocomplete="mobile" value="{{$addata[0]->mobile}}">

                                <strong  id="mobile_error1" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="call1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Calling') }}</label>

                            <div class="col-md-6">
                                <label><input type="radio" class="mt-3 ml-2 mr-2" name="call1" value="Allowed"
                                    @if ('Allowed' == $addata[0]->call1)
                                        {{'checked'}}
                                    @endif>{{__('msg.Allow Calls')}}</label>
                                <label><input type="radio" class="mt-3 ml-2 mr-2" name="call1" value="Not Allowed"
                                    @if ('Not Allowed' == $addata[0]->call1)
                                        {{'checked'}}
                                    @endif>{{__('msg.Don\'t Allow Calls')}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button id="save1" type="submit" class="btn btn-primary">
                                    {{ __('msg.Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
var CSRF_TOKEN =$('meta[name="csrf-token"]').attr('content');
$(document).ready(function() {

    $('#brand1').change(function(){
        var brandid = $('#brand1').val();
        if(brandid >0){
            load(brandid);
            console.log(brandid);
        }
        function load(brandid){
            $.ajax({
                url: "{{route('load',"+brandid+")}}",
                async:true,
                type: "post",
                data:{
                    _token:CSRF_TOKEN,
                    id:brandid
                },
                datatype: "json",
                success: function (response){
                    var len = 0;
                    if (response['data'] != null){
                        len = response['data'].length;
                        console.log(len);
                    }
                    $('#model1').empty();
                    if(len > 0){
                        for(var i=0 ; i<len ; i++){
                            var id = response['data'][i].id;
                            var brand_id = response['data'][i].brand_id;
                            var model = response['data'][i].model;
                            var series = response['data'][i].series;

                            var option = "<option value="+id+">"+model+"</option";

                                $('#model1').append(option);
                        }
                    }
                }
            });
        }
    });

    $('#governorate1').change(function(){
        var govid = $('#governorate1').val();
        if(govid >0){
            load(govid);
            console.log(govid);
        }
        function load(govid){
            $.ajax({
                url: "{{route('gov',"+govid+")}}",
                async:true,
                type: "post",
                data:{
                    _token:CSRF_TOKEN,
                    id:govid
                },
                datatype: "json",
                success: function (response){
                    var len = 0;
                    if (response['data'] != null){
                        len = response['data'].length;
                        console.log(len);
                    }
                    $('#city1').empty();
                    if(len > 0){
                        for(var i=0 ; i<len ; i++){
                            var id = response['data'][i].id;
                            var governorate_id = response['data'][i].governorate_id;
                            var city = response['data'][i].city;

                            var option = "<option value="+id+">"+city+"</option";

                                $('#city1').append(option);
                        }
                    }
                }
            });
        }
    });

        if($('#sub_category1').val() == 3){
            console.log($('#sub_category1').val());
            $('#notforspare1').hide();
        }
        if($('#real_estate_type1').val() == 'Land'){
            console.log($('#real_estate_type1').val());
            $('#notforland1').hide();
            $('#year1').hide();
        }

    $('#sub_category1').change(function(){
        var spare = $('#sub_category1').val();

            if(spare == 3){
                $('#notforspare1').hide();
            }else{
                $('#notforspare1').show();
            }
    });

    $('#real_estate_type1').change(function(){
        var land = $('#real_estate_type1').val();

            if(land == 'Land'){
                $('#notforland1').hide();
                $('#year1').hide();
            }else{
                $('#notforland1').show();
                $('#year1').show();
            }
    });
});

$(document).on('click','#save1',function(e){

    e.preventDefault();
    $('#title_error1').text('');
    $('#category_error1').text('');
    $('#sub_category_error1').text('');
    $('#details_error1').text('');
    $('#images_error1').text('');
    $('#governorate_error1').text('');
    $('#city_error1').text('');
    $('#year_error1').text('');
    $('#payment_method_error1').text('');
    $('#receiving_date_error1').text('');
    $('#price_error1').text('');
    $('#real_estate_type_error1').text('');
    $('#space_error1').text('');
    $('#bed_rooms_error1').text('');
    $('#bathrooms_error1').text('');
    $('#furnished_error1').text('');
    $('#floor_error1').text('');
    $('#brand_error1').text('');
    $('#model_error1').text('');
    $('#condition1_error1').text('');
    $('#engine_error1').text('');
    $('#body_type_error1').text('');
    $('#fuel_error1').text('');
    $('#transmition_error1').text('');
    $('#kilometers_error1').text('');
    $('#color_error1').text('');
    $('#mobile_error1').text('');
    var formdata = new FormData($('#adform1')[0]);
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: "{{route('ad.update',$addata[0]->id)}}",
        data:formdata,
        processData: false,
        contentType: false,
        cache: false,
        success: function(data){
            if(data.status==true){
                $('#msg1').show();
                $('#msg1').text(data.msg);
            }
            if(data.status==false){
                $('#msg2').show();
                $('#msg2').text(data.msg);
            }
        },
        error: function(reject){
            var response = $.parseJSON(reject.responseText);
            $.each(response.errors, function(key, val){
                $("#" + key + "_error1").text(val[0]);
            });
        }
    });
});
</script>
@endsection
