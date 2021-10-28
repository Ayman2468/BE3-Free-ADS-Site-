@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12 mt-4 @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">
        <h5 class="text-dark">{{__('msg.Payment')}}</h5>
        <div class="msg col-12 mb-4 d-flex">
            <form action="" method="POST">
                <label for="name" class="mt-2">{{__('msg.Ad Title')}}</label>
                <input id="name" class=" rounded col-12" type="text" name="name" placeholder="{{__('msg.Your Name')}}" value="{{old('name')}}" required>
                <label for="ad-id" class="mt-2">{{__('msg.Ad Number')}}</label>
                <input id="ad-id" class=" rounded col-12" type="text" name="ad-id" placeholder="{{__('msg.ad number required for complains')}}" value="{{old('ad-id')}}">

                name on visa
                card number
                expire date
                cvv
                amount
                <button type="submit" class="btn btn-primary mt-2 mb-2 text-end">
                    {{__('msg.Pay')}}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
