@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        <a href=""></a>
        <span class="link-arrow">&#8250;</span>
        <a href=""></a>
        <span class="link-arrow">&#8250;</span>
        <a href=""></a>
    </div>
    <hr class="mt-0">
    <div>
        <section class="ad-main-body">
            <p class="text-muted">
                <span class="font-weight-bold">
                    <a href="">
                        {{--city of the ad--}}city
                    </a>
                </span>
                 | ad added time at | ad id
            </p>

            <div class="col-12 mb-2">
                <i class=" text-dark fa-2x fas fa-user"></i>
                <h3>Seller Name</h3>
                <p>on site sience {{--user created at--}}</p>
                <a class="text-dark" href="#">Seller Ads</a>
            </div>

            <div class="number col-10 pt-2 pb-2 ml-auto mr-auto mb-2 text-center bg-primary">
                <i class="text-white mr-1 fas fa-phone-alt"></i>
                <span>01XXXXXXXXXXX</span>
                <span class="d-none">{{--phone number--}}</span>
            </div>
            <h3 class="col-12 text-dark">
                ad title
            </h3>

            <img class="col-12" src="{{asset('images/_1_.jpg')}}">
            <div class="col-12">
                <a  class="text-center d-block mt-1 mb-1" href="{{url('report')}}">
                    <i class="fas fa-2x fa-exclamation-triangle mt-1"></i>
                    <br>
                    Report Ad
                </a>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Brand</span><span>scokda</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Model</span><span>A4</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Transmition</span><span>Automatic</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Engine (cc)</span><span>1600</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Kilometers</span><span>10600</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Year</span><span>2007</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Body Type</span><span>Sedan</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Fuel</span><span>Petrol</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Condition</span><span>Used</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Payment Method</span><span>Cash</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Warranty</span><span>No</span>
            </div>
            <div class="col-12 border-bottom d-flex justify-content-between">
                <span>Ad Type</span><span>Sell</span>
            </div>
            <div class="col-12 mt-4 mb-4">
                <p>details kldvksdpfjmewpcmdwpmew</p>
            </div>
            <div class="col-12 border-bottom">
                {{-- @foreach ( as ) --}}
                <img class="mb-2" src="" alt="klk">{{--other images--}}
                {{-- @endforeach --}}
            </div>
            <div class="col-12">
                <span class="font-weight-bold text-dark">seen:</span>{{--seen counter--}}
            </div>
            <div class="col-12 mt-4">
                <h5 class="text-dark">Send Message To The Seller</h5>
                <div class="msg col-12 mb-4 d-flex">
                    <form action="" method="POST">
                        <input class="mt-2 rounded col-10" type="email" name="email" placeholder="your e-mail" value="{{old('email')}}">
                        <textarea class="mt-2 rounded col-12" name="email-content" cols="30" rows="10" placeholder="what do you want to say">{{old('email-content')}}</textarea>
                        <button type="submit" class="btn btn-primary mt-2 mb-2 text-end">
                            <i class="fas fa-envelope"></i>
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <section class="d-none d-lg-block"></section>
    </div>
</div>
@endsection
