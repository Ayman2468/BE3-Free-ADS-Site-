@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <a class="H-ad" href="{{url('contact')}}">
            Place your ad here
        </a>
    </div>
    <div class="d-flex flex-column flex-wrap justify-content-around">
        <form method="post" action="">
            @csrf
                <div class="search d-flex flex-column justify-content-center">
                    <input type="text" class="form-control" name="keyword" placeholder="what are you looking for ?" required autocomplete="keyword">
                    <input type="text" class="form-control" name="area" placeholder="what area you want to search in ?" required autocomplete="area">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Search') }}
                    </button>
                </div>
        </form>
    </div>
    <div class="divisions d-flex flex-column justify-content-around">
        <div class="m-2">
            <a href="real-estate">
                <div class="realestate bg-primary rounded-circle">
                    <i class="p-2 fas fa-2x fa-home"></i>
                </div>
                Real Estate
            </a>
        </div>
        <div class="m-2">
            <a href="{{url('cars')}}">
                <div class="cars bg-success rounded-circle">
                <i class="p-2 fas fa-2x fa-car"></i>
                </div>
                Cars and Spare Parts
            </a>
        </div>
    </div>
    {{-- @foreach ($row as $offer) --}}
    <a class="min-ad mb-4" href="{{url('ad/display')}}">
        <div class="card">
            <img src="{{asset('images/_1_.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
            </ul>
        </div>
    </a>
    <a class="min-ad mb-4" href="{{url('ad/display')}}">
        <div class="card">
            <img src="{{asset('images/_1_.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
            </ul>
        </div>
    </a>
    {{-- @endforeach --}}
    <div>
        <a class="H-ad" href="{{url('contact')}}">
            Place your ad here
        </a>
    </div>
</div>
@endsection
