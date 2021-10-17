@extends('layouts.app')

@section('content')

@include('advanced_search')

<div class="container col-12">
    @if(isset($search_title))
    <h3 class="col-12 mt-4 mb-4 text-muted">
        {{$search_title}}
    </h3>
    @endif

    <div class="col-10 mt-4 text-center d-md-flex flex-md-wrap justify-content-md-center">
        @if (isset($search))
            @foreach ($search as $addata)
            <a class="min-ad d-md-inline-block text-decoration-none mr-auto ml-auto mb-sm-2 mb-md-4" href="{{url('ad/display/'.$addata->id)}}">
                <div class="card border-0 d-flex flex-row flex-md-column justify-content-center align-items-center">
                    <img src="{{asset('images/ads/'.$addata->user_id.'/'.explode('-',$addata->images)[0])}}" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">{{$addata->title}}</h4>
                        <p class="card-text d-none d-md-block">{{$addata->details}}</p>
                    </div>
                    <ul class="list-group list-group-flush d-sm-none d-md-block border-0 text-dark">
                        <li class="list-group-item pt-3 pr-3 pb-4">{{$addata->governorates_id}}</li>
                        <li class="pp list-group-item pt-3 pr-3 pb-4 text-dark font-weight-bold">Price: {{$addata->price}}</li>
                    </ul>
                    <p>{{$addata->created_at}}</p>
                </div>
            </a>
            @endforeach
            <div class="d-flex justify-content-center">
                {!!$search->links()!!}
            </div>
            @endif
        </div>
    </div>
    @endsection
