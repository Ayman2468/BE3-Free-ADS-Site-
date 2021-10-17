@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-10">

        <div class="col-12">
            <a href="">{{$addata->category_id}}</a>
            <span class="link-arrow">&#8250;</span>
            <a href="">{{$addata->sub_category_id}}</a>
            <span class="link-arrow">&#8250;</span>
        </div>
        <div class="col-12">
            <hr class="mt-0">
        </div>
        <div>
            <section class="ad-main-body">
                <p class="col-12 text-muted">
                    <span class="font-weight-bold">
                        <a href="">
                            {{$addata->cities_id}}
                        </a>
                    </span>
                     | {{$addata->created_at}} | {{$addata->id}}
                </p>

                <div class="col-12 mb-2">
                    <i class=" text-dark fa-2x fas fa-user"></i>
                    <h3>{{$addata->user_name}}</h3>
                    <p>on site sience {{substr($addata->user_created_at,0,4)}}</p>
                    <a class="text-dark" href="#">Seller Ads</a>
                </div>

                <div id='phone' class="col-10 pt-2 pb-2 ml-auto mr-auto mb-2 text-center bg-primary cursor">
                    <i class="text-white mr-1 fas fa-phone-alt"></i>
                    <span id='encrypted'>01XXXXXXXXXXX</span>
                    <span id='reveal'>@if (isset(Auth::user()->id)){{$addata->mobile}}@endif</span>
                </div>
                <h3 class="col-12 mb-2 text-dark">
                    {{$addata->title}}
                </h3>
                <h4 class="col-12 mb-2 text-dark">
                    {{$addata->price}}
                </h4>

                <img class="col-12" src="{{asset('images/ads/'.$addata->user_id.'/'.explode('-',$addata->images)[0])}}">
                <div class="col-12">
                    <a  class="text-center d-block mt-1 mb-1" href="{{url('report')}}">
                        <i class="fas fa-2x fa-exclamation-triangle mt-1"></i>
                        <br>
                        Report Ad
                    </a>
                </div>
                @if ($addata->category_id == 'Cars and Spare Parts')
                <div class="col-12  d-flex justify-content-between">
                    <span>Brand</span><span>{{$addata->brand}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Model</span><span>{{$addata->model}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Transmition</span><span>{{$addata->transmition}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Engine (cc)</span><span>{{$addata->engine}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Kilometers</span><span>{{$addata->kilometers}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Body Type</span><span>{{$addata->body_type}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Fuel</span><span>{{$addata->fuel}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Condition</span><span>{{$addata->condition1}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                @endif
                @if ($addata->category_id == 'Real Estate')
                <div class="col-12  d-flex justify-content-between">
                    <span>Space</span><span>{{$addata->space}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                @if ($addata->real_estate_type != 'Land')
                <div class="col-12  d-flex justify-content-between">
                    <span>Real Estate Type</span><span>{{$addata->real_estate_type}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Bed Rooms</span><span>{{$addata->bed_rooms}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Bathrooms</span><span>{{$addata->bathrooms}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Furnished</span><span>{{$addata->furnished}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Floor</span><span>{{$addata->floor}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                @endif
                @endif

                @if ($addata->real_estate_type != 'Land')
                <div class="col-12  d-flex justify-content-between">
                    <span>Year</span><span>{{$addata->year}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12 flex-wrap d-flex justify-content-between">
                    <span>Additions</span><span>{{$addata->additions}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                @endif
                <div class="col-12  d-flex justify-content-between">
                    <span>Payment Method</span><span>{{$addata->payment_method}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12  d-flex justify-content-between">
                    <span>Ad Type</span><span>{{$addata->sub_category_id}}</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div class="col-12 mt-4 mb-4">
                    <p>{{$addata->details}}</p>
                </div>
                <div class="col-12 text-center bg-light ">
                    @foreach (explode('-',$addata->images) as $image)
                    @if (explode('-',$addata->images)[0] != $image)
                    <img class="col-10 mt-4 mb-4" src="{{asset('images/ads/'.$addata->user_id.'/'.$image)}}">
                    @endif
                    @endforeach
                </div>
                <div class="col-12">
                    <span class="font-weight-bold text-dark">seen: {{$addata->viewers}}</span>
                </div>

                @if (isset(Auth::user()->email))
                <div class="col-12 mt-4">
                    <h5 class="text-dark">Send Comment / Offer To The Owner</h5>
                    <div class="msg col-12 mb-4 d-flex">
                        <form action="{{route('comment.store',$addata->id)}}" method="POST">
                            @csrf
                            <input type="text" value="{{$addata->user_id}}" name="owner_id" hidden>
                            <textarea class="mt-2 rounded col-12" name="comment" cols="30" rows="10" placeholder="what do you want to say">{{old('email-content')}}</textarea>
                            <p class="note">* note that you can't edit you comment / offer after being added</p>
                            <button type="submit" class="btn btn-primary mt-2 mb-2 text-end">
                                <i class="fas fa-envelope"></i>
                                Add
                            </button>
                        </form>
                    </div>
                    <div class="col-12">
                        <h5 id="comments" class="text-dark">Comments</h5>
                        @foreach ($comments as $comment)
                            <div>
                                <h6 class="rounded-pill text-white bg-secondary p-2 d-inline-block">
                                    {{$comment->user_id}}
                                </h6>
                                <p>
                                    {{$comment->comment}}
                                </p>
                                <p class="text-right">
                                    {{$comment->date}}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </section>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#reveal').hide();

    $(function(){
        $("#phone").on("click",function(){

            $('#encrypted').hide();
            if($('#reveal').text().length > 1){
                $('#reveal').show();
            }else{
                window.location = '../../login'
            }
        });
    });
</script>
@endsection
