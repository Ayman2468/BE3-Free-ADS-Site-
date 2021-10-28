<div class="msg text-center">
<button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#searchBar" aria-controls="searchBar" aria-expanded="false" aria-label="{{ __('Toggle Search') }}">
    <span class="navbar-toggler-icon msg"><i class="fas fa-search"></i></span>
</button>
</div>
<div class="collapse navbar-collapse d-md-flex" id="searchBar">
    <div class="d-flex flex-column flex-wrap justify-content-around">
        <form method="get" action="{{url('ad/advance')}}">
            @csrf
                <div class="search msg pt-2 pb-4 mr-auto ml-auto col-12 d-md-flex flex-sm-column flex-md-row flex-md-wrap justify-content-around align-items-center">

                    <input type="text" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="keyword" placeholder="{{__('msg.what are you looking for?')}}" autocomplete="keyword">

                    <select id="category" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="category">
                        <option value="0" selected>{{__('msg.All Categories')}}</option>
                        {{$categories}}
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if (isset($_GET['category']) && $_GET['category'] == $category->id){{'selected'}}@endif>{{$category['category_'.LaravelLocalization::getcurrentlocale()]}}</option>
                        @endforeach
                    </select>

                    <select id="sub_category" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="sub_category">
                        <option value="0" selected>{{__('msg.All Sub Categories')}}</option>
                        @if (isset($_GET['sub_category']) && $_GET['sub_category'] != 0)
                            @foreach ( App\Models\sub_category::where('category_id',$_GET['category'])->get() as $sub )
                            <option value="{{$sub->id}}" @if ($_GET['sub_category'] == $sub->id){{'selected'}}@endif>{{$sub['sub_category_'.LaravelLocalization::getcurrentlocale()]}}</option>
                            @endforeach
                        @endif
                    </select>

                    <select id="governorate" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="governorate">
                        <option value="0" selected>{{__('msg.All Governorates')}}</option>
                        @foreach ($governorates as $governorate)
                            <option value="{{$governorate->id}}" @if (isset($_GET['governorate']) && $_GET['governorate'] == $governorate->id){{'selected'}}@endif>{{$governorate['governorate_name_'.LaravelLocalization::getcurrentlocale()]}}</option>
                        @endforeach
                    </select>

                    <select id="city" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="city">
                        <option value="0" selected>{{__('msg.All Cities')}}</option>
                        @if (isset($_GET['city']) && $_GET['city'] != 0)
                        @foreach ( App\Models\cities::where('governorate_id',$_GET['governorate'])->get() as $city )
                        <option value="{{$city->id}}" @if ($_GET['city'] == $city->id){{'selected'}}@endif>{{$city['city_name_'.LaravelLocalization::getcurrentlocale()]}}</option>
                        @endforeach
                    @endif
                    </select>

                    <select class="year form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="from_year">
                        <option value="0" selected>{{__('msg.From Year')}}</option>
                            @for ($i = date("Y")+1; $i>=date("Y")-100;$i--)
                                <option value="{{$i}}" @if (isset($_GET['from_year']) && $_GET['from_year'] == $i){{'selected'}}@endif>
                                    {{$i}}
                                </option>
                            @endfor
                    </select>
                    <select class="year form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="to_year">
                        <option value="{{date("Y")+1}}" selected>{{__('msg.To Year')}}</option>
                            @for ($i = date("Y")+1; $i>=date("Y")-100;$i--)
                                <option value="{{$i}}" @if (isset($_GET['to_year']) && $_GET['from_year'] == $i){{'selected'}}@endif>
                                    {{$i}}
                                </option>
                            @endfor
                    </select>

                    <input type="number" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="min_price" placeholder="{{__('msg.Min Price')}}" @if (isset($_GET['min_price'])) value="{{$_GET['min_price']}}" @endif autocomplete="min_price">

                    <input type="number" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="max_price" placeholder="{{__('msg.Max Price')}}" @if (isset($_GET['max_price'])) value="{{$_GET['max_price']}}" @endif autocomplete="max_price">

                        <select id="brand" class="car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="brand">
                            <option value="0" selected>{{__('msg.All Brands')}}</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" @if (isset($_GET['brand']) && $_GET['brand'] == $brand->id){{'selected'}}@endif>{{$brand['brand_'.LaravelLocalization::getcurrentlocale()]}}</option>
                            @endforeach
                        </select>

                        <select id="model" class="car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="model">
                            <option value="0" selected>{{__('msg.All Models')}}</option>
                            @if (isset($_GET['model']) && $_GET['model'] != 0)
                            @foreach ( App\Models\brand_models::where('brand_id',$_GET['brand'])->get() as $model )
                            <option value="{{$model->id}}" @if ($_GET['model'] == $model->id){{'selected'}}@endif>{{$model->model}}</option>
                            @endforeach
                        @endif
                        </select>

                        <select class="car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="condition">
                            <option value="0" selected>{{__('msg.All condition')}}</option>
                            <option value="new" @if (isset($_GET['condition']) && $_GET['condition'] == 'new'){{'selected'}}@endif>{{__('msg.New')}}</option>
                            <option value="used" @if (isset($_GET['condition']) && $_GET['condition'] == 'used'){{'selected'}}@endif>{{__('msg.Used')}}</option>
                        </select>

                        <select class="notforspare car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="engine">
                            <option value="0" selected>{{__('msg.All engine')}}</option>
                            <option value="0-800" @if (isset($_GET['engine']) && $_GET['engine'] == '0-800'){{'selected'}}@endif>0-800</option>
                            <option value="1000-1300" @if (isset($_GET['engine']) && $_GET['engine'] == '1000-1300'){{'selected'}}@endif>1000-1300</option>
                            <option value="1400-1500" @if (isset($_GET['engine']) && $_GET['engine'] == '1400-1500'){{'selected'}}@endif>1400-1500</option>
                            <option value="1600" @if (isset($_GET['engine']) && $_GET['engine'] == '1600'){{'selected'}}@endif>1600</option>
                            <option value="1800-2000" @if (isset($_GET['engine']) && $_GET['engine'] == '1800-200'){{'selected'}}@endif>1800-2000</option>
                            <option value="2200-2800" @if (isset($_GET['engine']) && $_GET['engine'] == '2200-2800'){{'selected'}}@endif>2200-2800</option>
                            <option value="more than 3000" @if (isset($_GET['engine']) && $_GET['engine'] == 'more than 3000'){{'selected'}}@endif>{{__('msg.more than 3000')}}</option>
                        </select>

                        <select class="notforspare car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="body_type">
                            <option value="0" selected>{{__('msg.All body type')}}</option>
                            <option value="4X4" @if (isset($_GET['body_type']) && $_GET['body_type'] == '4X4'){{'selected'}}@endif>4X4</option>
                            <option value="SUV" @if (isset($_GET['body_type']) && $_GET['body_type'] == 'SUV'){{'selected'}}@endif>{{__('msg.SUV')}}</option>
                            <option value="Sedan" @if (isset($_GET['body_type']) && $_GET['body_type'] == 'Sedan'){{'selected'}}@endif>{{__('msg.Sedan')}}</option>
                            <option value="Hatch Back" @if (isset($_GET['body_type']) && $_GET['body_type'] == 'Hatch Back'){{'selected'}}@endif>{{__('msg.Hatch Back')}}</option>
                            <option value="Van" @if (isset($_GET['body_type']) && $_GET['body_type'] == 'Van'){{'selected'}}@endif>{{__('msg.Van')}}</option>
                            <option value="Bus" @if (isset($_GET['body_type']) && $_GET['body_type'] == 'Bus'){{'selected'}}@endif>{{__('msg.Bus')}}</option>
                            <option value="Truck" @if (isset($_GET['body_type']) && $_GET['body_type'] == 'Truck'){{'selected'}}@endif>{{__('msg.Truck')}}</option>
                            <option value="Coupe" @if (isset($_GET['body_type']) && $_GET['body_type'] == 'Coupe'){{'selected'}}@endif>{{__('msg.Coupe')}}</option>
                            <option value="Cabriolet" @if (isset($_GET['body_type']) && $_GET['body_type'] == 'Cabriolet'){{'selected'}}@endif>{{__('msg.Cabriolet')}}</option>
                            <option value="Other" @if (isset($_GET['body_type']) && $_GET['body_type'] == 'Other'){{'selected'}}@endif>{{__('msg.Other')}}</option>
                        </select>

                        <select class="notforspare car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="transmition">
                            <option value="0" selected>{{__('msg.All transmition')}}</option>
                            <option value="Automatic" @if (isset($_GET['transmition']) && $_GET['transmition'] == 'Automatic'){{'selected'}}@endif>{{__('msg.Automatic')}}</option>
                            <option value="Manual" @if (isset($_GET['transmition']) && $_GET['transmition'] == 'Manual'){{'selected'}}@endif>{{__('msg.Manual')}}</option>
                        </select>

                        <select class="notforspare car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="fuel">
                            <option value="0" selected>{{__('msg.All fuel')}}</option>
                            <option value="Petrol" @if (isset($_GET['fuel']) && $_GET['fuel'] == 'Petrol'){{'selected'}}@endif>{{__('msg.Petrol')}}</option>
                            <option value="Diesel" @if (isset($_GET['fuel']) && $_GET['fuel'] == 'Diesel'){{'selected'}}@endif>{{__('msg.Diesel')}}</option>
                            <option value="Gas" @if (isset($_GET['fuel']) && $_GET['fuel'] == 'Gas'){{'selected'}}@endif>{{__('msg.Gas')}}</option>
                            <option value="Electricity" @if (isset($_GET['fuel']) && $_GET['fuel'] == 'Electricity'){{'selected'}}@endif>{{__('msg.Electricity')}}</option>
                            <option value="Hybrid" @if (isset($_GET['fuel']) && $_GET['fuel'] == 'Hybrid'){{'selected'}}@endif>{{__('msg.Hybrid')}}</option>
                        </select>

                    <select id="real_estate_type" class="real_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="real_estate_type">
                        <option value="0" selected>{{__('msg.All Real Estate Types')}}</option>
                        <option value="Apartment" @if (isset($_GET['real_estate_type']) && $_GET['real_estate_type'] == 'Apartment'){{'selected'}}@endif>{{__('msg.Apartment')}}</option>
                        <option value="Villa" @if (isset($_GET['real_estate_type']) && $_GET['real_estate_type'] == 'Villa'){{'selected'}}@endif>{{__('msg.Villa')}}</option>
                        <option value="Land" @if (isset($_GET['real_estate_type']) && $_GET['real_estate_type'] == 'Land'){{'selected'}}@endif>{{__('msg.Land')}}</option>
                        <option value="Whole Building" @if (isset($_GET['real_estate_type']) && $_GET['real_estate_type'] == 'Whole Building'){{'selected'}}@endif>{{__('msg.Whole Building')}}</option>
                    </select>

                    <input type="text" class="real_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="space" placeholder="{{__('msg.Space')}}" autocomplete="space">

                    <select class="notforland real_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="furnished">
                        <option value="0" selected>{{__('msg.All Furnished Status')}}</option>
                        <option value="Yes" @if (isset($_GET['furnished']) && $_GET['furnished'] == 'Yes'){{'selected'}}@endif>{{__('msg.Yes')}}</option>
                        <option value="No" @if (isset($_GET['furnished']) && $_GET['furnished'] == 'No'){{'selected'}}@endif>{{__('msg.No')}}</option>
                    </select>

                    <select class="notforland real_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="floor">
                        <option value="0" selected>{{__('msg.All floor')}}</option>
                        <option value="Ground Floor" @if (isset($_GET['floor']) && $_GET['floor'] == 'Ground Floor'){{'selected'}}@endif>{{__('msg.Ground Floor')}}</option>
                        @for ($i=1;$i<=12;$i++)
                        <option value="{{$i}}"  @if (isset($_GET['floor']) && $_GET['floor'] == $i){{'selected'}}@endif>{{$i}}</option>
                        @endfor
                        <option value="+12" @if (isset($_GET['floor']) && $_GET['floor'] == '+12'){{'selected'}}@endif>+12</option>
                    </select>

                    <select class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="order">
                        <option value="date_desc" selected>{{__('msg.Newer First')}}</option>
                        <option value="date_asc"  @if (isset($_GET['order']) && $_GET['order'] == 'date_asc'){{'selected'}}@endif>{{__('msg.Older First')}}</option>
                        <option value="price_asc"  @if (isset($_GET['order']) && $_GET['order'] == 'price_asc'){{'selected'}}@endif>{{__('msg.Cheaper First')}}</option>
                        <option value="price_desc"  @if (isset($_GET['order']) && $_GET['order'] == 'price_desc'){{'selected'}}@endif>{{__('msg.More Expensive First')}}</option>
                    </select>

                    <button type="submit" class="btn btn-primary col-md-2 smaller align-middle p-0">
                        {{ __('msg.Search') }}
                    </button>
                </div>
        </form>
    </div>
</div>
@section('script')
<script>
    var CSRF_TOKEN =$('meta[name="csrf-token"]').attr('content');
    $(document).ready(function() {
        $('.car_slots').hide();
        $('.real_slots').hide();
        if($('#category').val() == 1){
            $('.real_slots').show();
        }
        if($('#category').val() == 2){
            $('.car_slots').show();
        }

        $('#category').change(function(){
            var catid = $('#category').val();
            if(catid >0){
                load(catid);

                if(catid == 1){
                    $('.real_slots').show();
                }else{
                    $('.real_slots').hide();
                }

                if(catid == 2){
                    $('.car_slots').show();
                }else{
                    $('.car_slots').hide();
                }
            }else{
                    $('.car_slots').hide();
                    $('.real_slots').hide();
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

            if(catid == 0){
                $('#sub_category').empty();
                var option = "<option value='0'>All Sub Categories</option";
                $('#sub_category').append(option);
            }
        });

        if($('#sub_category').val() == 3){
            $('.notforspare').hide();
        }

        $('#sub_category').change(function(){
            var spare = $('#sub_category').val();

                if(spare == 3){
                    $('.notforspare').hide();
                }else{
                    $('.notforspare').show();
                }
        });

        $('#governorate').change(function(){
            var govid = $('#governorate').val();
            if(govid >0){
                load(govid);
                console.log(govid);
            }else{
                $('#city').empty();
                var option = "<option value='0'>All cities</option";
                $('#city').append(option);
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

        $('#brand').change(function(){
            var brandid = $('#brand').val();
            if(brandid >0){
                load(brandid);
                console.log(brandid);
            }else{
                $('#model').empty();
                var option = "<option value='0'>"+response['trans']+"</option";
                $('#model').append(option);
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
                            var first = "<option value='0'>"+response['trans']+"</option";
                            $('#model').append(first);
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

        if($('#real_estate_type').val() == 'Land'){
            $('.notforland').hide();
                    $('.year').hide();
        }

        $('#real_estate_type').change(function(){
            var land = $('#real_estate_type').val();

                if(land == 'Land'){
                    $('.notforland').hide();
                    $('.year').hide();
                }else{
                    $('.notforland').show();
                    $('.year').show();
                }
        });

    });
    </script>
@endsection
