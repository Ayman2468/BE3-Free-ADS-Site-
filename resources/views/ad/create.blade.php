@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">{{ __('msg.Create Ad') }}</div>

                <div class="card-body">

                    <div id="msg" class="alert alert-success text-center font-weight-bold" style="display: none;">
                    </div>
                    <div id="msg2" class="alert alert-danger text-center font-weight-bold" style="display: none;">
                    </div>
                    <form id="adform" method="POST" enctype="multipart/form-data" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('msg.Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title"  autocomplete="title" placeholder="{{__('msg.Write The Title of Your Ad')}}" autofocus>

                                <strong  id="title_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('msg.Category') }}</label>

                            <div class="col-md-6">
                                <select id="category" class="form-control text-muted" name="category">
                                    <option disabled selected>{{__('msg.Choose Category')}}</option>
                                    @foreach ( $categories as $category)
                                    <option class="{{$category->id}}" value="{{$category->id}}">{{$category['category_'.LaravelLocalization::getcurrentlocale()]}}</option>
                                    @endforeach
                                </select>

                                <strong  id="category_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sub_category" class="col-md-4 col-form-label text-md-right">{{ __('msg.Sub Category') }}</label>

                            <div class="col-md-6">
                                <select id="sub_category" class="form-control text-muted" name="sub_category"  >
                                    <option disabled selected>{{__('msg.Choose Sub Category')}}</option>
                                </select>

                                <strong  id="sub_category_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>
                        {{-- Changeable Section --}}

                        <div id="car_slots">
                            @include('ad.car_specification')
                        </div>
                        <div id="real_slots">
                            @include('ad.real_specification')
                        </div>

                        {{-- End of Changeable Section --}}

                        <div id="year" class="form-group row">
                            <label for="year1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Year') }}</label>

                            <div class="col-md-6">
                                <select id="year1" class="form-control text-muted" name="year"  >
                                    <option disabled selected>{{__('msg.Choose Year')}}</option>
                                    @for ($i = date("Y")+1; $i>=date("Y")-100;$i--)
                                        <option value="{{$i}}">
                                                {{$i}}
                                        </option>
                                    @endfor
                                </select>

                                <strong  id="year_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('msg.Payment Method') }}</label>

                            <div class="col-md-6">
                                <select id="payment_method" class="form-control text-muted" name="payment_method"  >
                                    <option disabled selected>{{__('msg.Choose Payment Method')}}</option>
                                    <option value="Cash">{{__('msg.Cash')}}</option>
                                    <option value="Installment">{{__('msg.Installment')}}</option>
                                    <option value="Cash & Installment">{{__('msg.Cash & Installment')}}</option>
                                </select>

                                <strong  id="payment_method_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="receiving_date" class="col-md-4 col-form-label text-md-right">{{ __('msg.Receiving Date') }}</label>

                            <div class="col-md-6">
                                <select id="receiving_date" class="form-control text-muted" name="receiving_date"  >
                                    <option value="Immediately" selected>{{__('msg.Immediately')}}</option>
                                    <option value="Within a week">{{__('msg.Within a week')}}</option>
                                    <option value="Within a month">{{__('msg.Within a month')}}</option>
                                    <option value="Within a year">{{__('msg.Within a year')}}</option>
                                    <option value="Within a 2 years">{{__('msg.Within a 2 years')}}</option>
                                    <option value="Within a 3 years">{{__('msg.Within a 3 years')}}</option>
                                    <option value="Within a 4 years">{{__('msg.Within a 4 years')}}</option>
                                    <option value="Within a 5 years">{{__('msg.Within a 5 years')}}</option>
                                </select>

                                <strong  id="receiving_date_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('msg.Price / Advance Payment') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" autocomplete="price" placeholder="{{__('msg.Price or ( Advance Payment If Installment )')}}" autofocus>

                                <strong  id="price_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('msg.Details') }}</label>

                            <div class="col-md-6">
                                <textarea id="details" type="text" class="form-control" name="details"  data-mintext="10" data-maxtext="4000" cols="80" rows="1">
                                </textarea>

                                <strong  id="details_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('msg.Add images of what you are selling') }}</label>

                            <div class="col-md-6 @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">
                                <label class="btn bg-light">
                                    {{__('msg.upload...')}}
                                <input id="images" type="file" name="images[]" multiple hidden>
                                </label>
                                <p class="note">{{__('msg.*note that the first image will be the cover of the ad')}}</p>
                                <p class="note">{{__('msg.*note that the allowed extensions are (.jpg .jepg .png .gif) only')}}</p>

                                <strong  id="images_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="governorate" class="col-md-4 col-form-label text-md-right">{{ __('msg.Governorate') }}</label>

                            <div class="col-md-6">
                                <select id="governorate" class="form-control text-muted" name="governorate"  >
                                    <option disabled selected>{{__('msg.Choose Governorate')}}</option>
                                    @foreach ( $governorates as $governorate)
                                    <option class="{{$governorate->id}}" value="{{$governorate->id}}">{{$governorate['governorate_name_'.LaravelLocalization::getcurrentlocale()]}}</option>
                                    @endforeach
                                </select>

                                <strong  id="governorate_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('msg.City') }}</label>

                            <div class="col-md-6">
                                <select id="city" class="form-control text-muted" name="city"  >
                                    <option disabled selected>{{__('msg.Choose City')}}</option>
                                </select>

                                <strong  id="city_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('msg.Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile"  autocomplete="mobile" placeholder="{{__('msg.Mobile of The Owner')}}">

                                <strong  id="mobile_error" class="text-danger" role="alert">
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="call1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Calling') }}</label>

                            <div class="col-md-6 @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">
                                <label><input type="radio" class="mt-3 ml-2 mr-2" name="call1" value="Allowed" checked>{{__('msg.Allow Calls')}}</label>
                                <label><input type="radio" class="mt-3 ml-2 mr-2" name="call1" value="Not Allowed" >{{__('msg.Don\'t Allow Calls')}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button id="save" type="submit" class="btn btn-primary">
                                    {{ __('msg.Add') }}
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

    $('#brand').change(function(){
        var brandid = $('#brand').val();
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
                    $('#model').empty();
                    if(len > 0){
                        for(var i=0 ; i<len ; i++){
                            var id = response['data'][i].id;
                            var brand_id = response['data'][i].brand_id;
                            var model = response['data'][i].model;
                            var series = response['data'][i].series;

                            var option = "<option value="+id+">"+model+"</option";

                                $('#model').append(option);
                        }
                    }
                }
            });
        }
    });

    $('#governorate').change(function(){
        var govid = $('#governorate').val();
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
                    $('#city').empty();
                    if(len > 0){
                        for(var i=0 ; i<len ; i++){
                            var id = response['data'][i].id;
                            var governorate_id = response['data'][i].governorate_id;
                            var city = response['data'][i].city;

                            var option = "<option value="+id+">"+city+"</option";

                                $('#city').append(option);
                        }
                    }
                }
            });
        }
    });

    $('#car_slots').hide();
    $('#real_slots').hide();

    $('#category').change(function(){
        var catid = $('#category').val();
        if(catid >0){
            load(catid);

            if(catid == 1){
                $('#real_slots').show();
            }else{
                $('#real_slots').hide();
            }

            if(catid == 2){
                $('#car_slots').show();
            }else{
                $('#car_slots').hide();
            }

            console.log(catid);
        }
        function load(catid){
            $.ajax({
                url: "{{route('cat',"+catid+")}}",
                async:true,
                type: "post",
                data:{
                    _token:CSRF_TOKEN,
                    id:catid
                },
                datatype: "json",
                success: function (response){
                    var len = 0;
                    if (response['data'] != null){
                        len = response['data'].length;
                        console.log(len);
                    }
                    $('#sub_category').empty();
                    if(len > 0){
                        for(var i=0 ; i<len ; i++){
                            var id = response['data'][i].id;
                            var category_id = response['data'][i].category_id;
                            var sub_category = response['data'][i].sub_category;

                            var option = "<option value="+id+">"+sub_category+"</option";

                                $('#sub_category').append(option);
                        }
                    }
                }
            });
        }
    });
    $('#sub_category').change(function(){
        var spare = $('#sub_category').val();

            if(spare == 3){
                $('#notforspare').hide();
            }else{
                $('#notforspare').show();
            }
    });

    $('#real_estate_type').change(function(){
        var land = $('#real_estate_type').val();

            if(land == 'Land'){
                $('#notforland').hide();
                $('#year').hide();
            }else{
                $('#notforland').show();
                $('#year').show();
            }
    });
});

$(document).on('click','#save',function(e){

    e.preventDefault();
    $('#title_error').text('');
    $('#category_error').text('');
    $('#sub_category_error').text('');
    $('#details_error').text('');
    $('#images_error').text('');
    $('#governorate_error').text('');
    $('#city_error').text('');
    $('#year_error').text('');
    $('#payment_method_error').text('');
    $('#receiving_date_error').text('');
    $('#price_error').text('');
    $('#real_estate_type_error').text('');
    $('#space_error').text('');
    $('#bed_rooms_error').text('');
    $('#bathrooms_error').text('');
    $('#furnished_error').text('');
    $('#floor_error').text('');
    $('#brand_error').text('');
    $('#model_error').text('');
    $('#condition1_error').text('');
    $('#engine_error').text('');
    $('#body_type_error').text('');
    $('#fuel_error').text('');
    $('#transmition_error').text('');
    $('#kilometers_error').text('');
    $('#color_error').text('');
    $('#mobile_error').text('');
    var formdata = new FormData($('#adform')[0]);
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: "{{route('ad.store')}}",
        data:formdata,
        processData: false,
        contentType: false,
        cache: false,
        success: function(data){
            if(data.status==true){
                $('#msg').show();
                $('#msg').text(data.msg);
            }
            if(data.status==false){
                $('#msg2').show();
                $('#msg2').text(data.msg);
            }
        },
        error: function(reject){
            var response = $.parseJSON(reject.responseText);
            $.each(response.errors, function(key, val){
                $("#" + key + "_error").text(val[0]);
            });
        }
    });
});
</script>
@endsection
