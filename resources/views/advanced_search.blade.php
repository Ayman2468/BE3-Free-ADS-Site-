<div class="msg text-center">
<button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#searchBar" aria-controls="searchBar" aria-expanded="false" aria-label="{{ __('Toggle Search') }}">
    <span class="navbar-toggler-icon msg"><i class="fas fa-search"></i></span>
</button>
</div>
<div class="collapse navbar-collapse d-md-flex" id="searchBar">
    <div class="d-flex flex-column flex-wrap justify-content-around">
        <form method="post" action="{{route('ad.advance')}}">
            @csrf
                <div class="search msg pt-2 pb-4 mr-auto ml-auto col-12 d-md-flex flex-sm-column flex-md-row flex-md-wrap justify-content-around align-items-center">

                    <input type="text" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="keyword" placeholder="what are you looking for ?" autocomplete="keyword">

                    <select id="category" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="category">
                        <option value="0" selected>All Categories</option>
                        {{$categories}}
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_en}}</option>
                        @endforeach
                    </select>

                    <select id="sub_category" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="sub_category">
                        <option value="0" selected>All Sub Categories</option>
                    </select>

                    <select id="governorate" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="governorate">
                        <option value="0" selected>All Governorates</option>
                        @foreach ($governorates as $governorate)
                            <option value="{{$governorate->id}}">{{$governorate->governorate_name_en}}</option>
                        @endforeach
                    </select>

                    <select id="city" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="city">
                        <option value="0" selected>All Cities</option>
                    </select>

                    <select class="year form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="from_year">
                        <option value="0" selected>From Year</option>
                            @for ($i = date("Y")+1; $i>=date("Y")-100;$i--)
                                <option value="{{$i}}">
                                    {{$i}}
                                </option>
                            @endfor
                    </select>
                    <select class="year form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="to_year">
                        <option value="{{date("Y")+1}}" selected>To Year</option>
                            @for ($i = date("Y")+1; $i>=date("Y")-100;$i--)
                                <option value="{{$i}}">
                                    {{$i}}
                                </option>
                            @endfor
                    </select>

                    <input type="number" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="min_price" placeholder="Min Price"  autocomplete="min_price">

                    <input type="number" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="max_price" placeholder="Max Price"  autocomplete="max_price">

                        <select id="brand" class="car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="brand">
                            <option value="0" selected>All Brands</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_en}}</option>
                            @endforeach
                        </select>

                        <select id="model" class="car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="model">
                            <option value="0" selected>All Models</option>
                        </select>

                        <select class="car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="condition">
                            <option value="0" selected>All condition</option>
                            <option value="new">New</option>
                            <option value="used">Used</option>
                        </select>

                        <select class="notforspare car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="engine">
                            <option value="0" selected>All engine</option>
                            <option value="0-800">0-800</option>
                            <option value="1000-1300">1000-1300</option>
                            <option value="1400-1500">1400-1500</option>
                            <option value="1600">1600</option>
                            <option value="1800-2000">1800-2000</option>
                            <option value="2200-2800">2200-2800</option>
                            <option value="more than 3000">{{'more than 3000'}}</option>
                        </select>

                        <select class="notforspare car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="body_type">
                            <option value="0" selected>All body type</option>
                            <option value="4X4">4X4</option>
                            <option value="SUV">{{'SUV'}}</option>
                            <option value="Sedan">{{'Sedan'}}</option>
                            <option value="Hatch Back">{{'Hatch Back'}}</option>
                            <option value="Van">{{'Van'}}</option>
                            <option value="Bus">{{'Bus'}}</option>
                            <option value="Truck">{{'Truck'}}</option>
                            <option value="Coupe">{{'Coupe'}}</option>
                            <option value="Cabriolet">{{'Cabriolet'}}</option>
                            <option value="Other">{{'Other'}}</option>
                        </select>

                        <select class="notforspare car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="transmition">
                            <option value="0" selected>All transmition</option>
                            <option value="Automatic">{{'Automatic'}}</option>
                            <option value="Manual">{{'Manual'}}</option>
                        </select>

                        <select class="notforspare car_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="fuel">
                            <option value="0" selected>All fuel</option>
                            <option value="Petrol">{{'Petrol'}}</option>
                            <option value="Diesel">{{'Diesel'}}</option>
                            <option value="Gas">{{'Gas'}}</option>
                            <option value="Electricity">{{'Electricity'}}</option>
                            <option value="Hybrid">{{'Hybrid'}}</option>
                        </select>

                    <select id="real_estate_type" class="real_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="real_estate_type">
                        <option value="0" selected>All Real Estate Types</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Villa">Villa</option>
                        <option value="Land">Land</option>
                        <option value="Whole Building">Whole Building</option>
                    </select>

                    <input type="text" class="real_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="space" placeholder="space" autocomplete="space">

                    <select class="notforland real_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="furnished">
                        <option value="0" selected>All Furnished Status</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                    <select class="notforland real_slots form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="floor">
                        <option value="0" selected>All floor</option>
                        <option value="Ground Floor">Ground Floor</option>
                        @for ($i=1;$i<=12;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                        <option value="+12">+12</option>
                    </select>

                    <select class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="order">
                        <option value="date_desc" selected>Newer First</option>
                        <option value="date_asc">Older First</option>
                        <option value="price_asc">Cheaper First</option>
                        <option value="price_desc">More Expensive First</option>
                    </select>

                    <button type="submit" class="btn btn-primary col-md-2 smaller align-middle p-0">
                        {{ __('Search') }}
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
                                var sub_category_en = response['data'][i].sub_category_en;
                                var sub_category_ar = response['data'][i].sub_category_ar;

                                var option = "<option value="+id+">"+sub_category_en+"</option";

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
                                var city_name_en = response['data'][i].city_name_en;
                                var city_name_ar = response['data'][i].city_name_ar;

                                var option = "<option value="+id+">"+city_name_en+"</option";

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
                var option = "<option value='0'>All Models</option";
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
                            var first = "<option value='0'>All Models</option";
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
