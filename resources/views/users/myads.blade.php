@extends('layouts.app')

@section('content')

<div class="container col-12">
    <h2 class="col-12 mt-4 mb-4 text-center text-muted">
        @if (isset(Auth::user()->id) && Auth::user()->id == $myads[0]->user_id)
            {{__('msg.My Ads')}}
        @else
            {{__('msg.Seller Ads')}}
        @endif
    </h2>
    <div class="col-10 mt-4 text-center d-md-flex flex-md-wrap justify-content-md-center">
        @if (isset($myads))
            @foreach ($myads as $addata)
            <a class="min-ad d-md-inline-block text-decoration-none mr-auto ml-auto mb-sm-2 mb-md-4" href="{{url('ad/display/'.$addata->id)}}">
                <div class="card border-0 d-flex flex-row flex-md-column justify-content-center align-items-center">
                    <img src="{{asset('images/ads/'.$addata->user_id.'/'.explode('-',$addata->images)[0])}}" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">{{$addata->title}}</h4>
                        <p class="card-text d-none d-md-block">{{$addata->details}}</p>
                    </div>
                    <ul class="col-12 list-group list-group-flush d-sm-none d-md-block border-0 text-dark">
                        <li class="list-group-item pt-3 pr-3 pb-4">{{$addata->governorates_id}}</li>
                        <li class="pp list-group-item pt-3 pr-3 pb-4 text-dark font-weight-bold">{{__('msg.Price')}}: {{$addata->price}} {{__('msg.EGP')}}</li>
                    </ul>
                    <p>{{$addata->created_at}}</p>
                </div>
            </a>
            @endforeach
            <div class="d-flex justify-content-center">
                {!!$myads->links()!!}
            </div>
            @endif
        </div>
    </div>
    @endsection
