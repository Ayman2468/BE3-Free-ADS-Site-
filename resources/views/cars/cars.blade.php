@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="col-12 mt-3 text-dark">
        Cars and Spare Parts
    </h3>
    {{--@foreach()--}}
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
    {{--@endforeach--}}
</div>
@endsection
