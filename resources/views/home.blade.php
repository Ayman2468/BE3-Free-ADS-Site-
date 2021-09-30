@extends('layouts.app')

@section('content')
<div class="container col-12">
    <div class="col-12">
        <a class="H-ad col-11 mr-auto ml-auto" href="{{url('contact')}}">
            Place your ad here
        </a>
    </div>
    <div class="d-flex flex-column flex-wrap justify-content-around">
        <form method="post" action="{{route('search')}}">
            @csrf
                <div class="search msg pt-2 pb-2 mr-auto ml-auto col-11 d-flex flex-sm-column flex-md-row justify-content-center align-items-center">
                    <input type="text" class="form-control col-md-3 mb-2 mt-2 mr-md-2 ml-md-2" name="keyword" placeholder="what are you looking for ?" required autocomplete="keyword">
                    <select class="form-control col-md-3 mb-2 mt-2 mr-md-2 ml-md-2" name="gov">
                        <option value="0" selected>All Governorates</option>
                        @foreach ($allgov as $governorate)
                            <option value="{{$governorate->id}}">{{$governorate->governorate_name_en}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary col-md-2 smaller align-middle p-0">
                        {{ __('Search') }}
                    </button>
                </div>
        </form>
    </div>
    <div class="divisions d-flex flex-sm-column flex-md-row mb-4 justify-content-around">
        <div class="m-2">
            <a href="{{route('searchcat',1)}}">
                <div class="realestate bg-primary rounded-circle">
                    <i class="p-2 fas fa-2x fa-home"></i>
                </div>
                Real Estate
            </a>
        </div>
        <div class="m-2">
            <a href="{{route('searchcat',2)}}">
                <div class="cars bg-success rounded-circle">
                <i class="p-2 fas fa-2x fa-car"></i>
                </div>
                Cars and Spare Parts
            </a>
        </div>
    </div>
    <div class="col-10 text-center d-md-flex flex-md-wrap justify-content-md-center">
    @foreach ($allads as $addata)
    <a class="min-ad d-md-inline-block text-decoration-none mr-auto ml-auto mb-sm-2 mb-md-4" href="{{url('ad/display/'.$addata->id)}}">
        <div class="card border-0 d-flex flex-row flex-md-column justify-content-center align-items-center">
            <img src="{{asset('images/ads/'.$addata->user_id.'/'.explode('-',$addata->images)[0])}}" class="card-img-top">
            <div class="card-body">
                <h4 class="card-title">{{$addata->title}}</h4>
                <p class="card-text d-none d-md-block">{{$addata->details}}</p>
            </div>
            <ul class="list-group list-group-flush d-sm-none d-md-block border-0 text-dark">
                <li class="list-group-item pt-3 pr-3 pb-4">{{$addata->governorates_id}}</li>
                <li class="list-group-item pt-3 pr-3 pb-4 text-dark font-weight-bold">Price: {{$addata->price}}</li>
            </ul>
        </div>
    </a>
    @endforeach
    </div>
    <div class="col-12 d-flex justify-content-center">
        {{$allads->links()}}
    </div>
    <div class="col-12">
        <a class="H-ad col-11 mr-auto ml-auto" href="{{url('contact')}}">
            Place your ad here
        </a>
    </div>
</div>
@endsection
