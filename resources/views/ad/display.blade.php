@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-12 @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">
        <div class="d-md-flex">
            <div class="col-2 d-none d-lg-block">
                <a class="V-ad col-11 mr-auto ml-auto" href="{{url('contact')}}">
                    {{__('msg.Place your ad here')}}
                </a>
            </div>
            <div class="col-12 col-lg-8">
                <div class="col-12">
                    <a href="{{route('searchcat',App\Models\category::where('category_'.LaravelLocalization::getcurrentlocale(),$addata->category_id)->value('id'))}}">{{$addata->category_id}}</a>
                    <span class="link-arrow">&#8250;</span>
                    <a href="{{route('searchsubcat',App\Models\sub_category::where('sub_category_'.LaravelLocalization::getcurrentlocale(),$addata->sub_category_id)->value('id'))}}">{{$addata->sub_category_id}}</a>
                    <span class="link-arrow">&#8250;</span>
                </div>
                <div class="col-12">
                    <hr class="mt-0">
                </div>
                <div>
                    <section class="ad-main-body">
                        <p class="col-12 text-muted">
                            <span class="font-weight-bold">
                                <a href="{{route('searchcity',App\Models\cities::where('city_name_'.LaravelLocalization::getcurrentlocale(),$addata->cities_id)->value('id'))}}">
                                    {{$addata->cities_id}}
                                </a>
                            </span>
                            | {{$addata->created_at}} | {{$addata->id}}
                        </p>

                        <div class="col-12 mb-2">
                            <i class=" text-dark fa-2x fas fa-user"></i>
                            <h3>{{$addata->user_name}}</h3>
                            <p>{{__('msg.on site sience')}} {{substr($addata->user_created_at,0,4)}}</p>
                            <a class="text-primary" href="{{ url('user/ads/'.$addata->user_id) }}">{{__('msg.Seller Ads')}}</a>
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
                            {{$addata->price}} {{__('msg.EGP')}}
                        </h4>

                        <img class="col-12" src="{{asset('images/ads/'.$addata->user_id.'/'.explode('-',$addata->images)[0])}}">
                        <div class="links col-12 d-md-flex justify-content-md-around align-items-md-center">
                                <a  class="text-center d-block mt-1 mb-1" href="{{url('contact')}}">
                                <i class="fas fa-2x fa-exclamation-triangle mt-1"></i>
                                <br>
                                {{__('msg.Report Ad')}}
                            </a>
                            @if (isset(Auth::user()->id) && Auth::user()->id == $addata->user_id)
                            <a  class="edit text-center d-block mt-1 mb-1" href="{{url('ad/edit/'.$addata->id)}}">
                                <i class="fas fa-2x fa-edit mt-1"></i>
                                <br>
                                {{__('msg.Edit Ad')}}
                            </a>


                            <a class="text-center d-block mt-1 mb-1" href="" data-toggle="modal" data-target="#modal_single_del{{$addata->id}}">
                                <i class="fas fa-2x fa-trash-alt mt-1"></i>
                                <br>
                                {{__('msg.Delete Ad')}}
                            </a>

                            <!-- Modal -->
                            <div class="modal" id="modal_single_del{{$addata->id}}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('msg.Delete Confirmation')}}</h5>
                                    <button type="button" class="close ml-1" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    {{__('msg.are you sure you want to delete this Ad')}}
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{url('ad/delete/'.$addata->id)}}" class='btn btn-danger text-white m-r-1em'>{{__('msg.Delete')}}</a>
                                    </div>
                                </div>
                                </div>
                            </div>

                            @endif
                        </div>
                        @if (App\Models\category::where('category_'.LaravelLocalization::getcurrentlocale(),$addata->category_id)->value('id') == '2')
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Brand')}}</span><span>{{$addata->brand}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Model')}}</span><span>{{$addata->model}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        @if (App\Models\sub_category::where('sub_category_'.LaravelLocalization::getcurrentlocale(),$addata->sub_category_id)->value('id') != '3')
                            <div class="col-12  d-flex justify-content-between">
                                <span>{{__('msg.Transmition')}}</span><span>{{__('msg.'.$addata->transmition)}}</span>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0">
                            </div>
                            <div class="col-12  d-flex justify-content-between">
                                <span>{{__('msg.Engine (cc)')}}</span><span>{{$addata->engine}}</span>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0">
                            </div>
                            <div class="col-12  d-flex justify-content-between">
                                <span>{{__('msg.Kilometers')}}</span><span>{{$addata->kilometers}}</span>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0">
                            </div>
                            <div class="col-12  d-flex justify-content-between">
                                <span>{{__('msg.Body Type')}}</span><span>{{__('msg.'.$addata->body_type)}}</span>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0">
                            </div>
                            <div class="col-12  d-flex justify-content-between">
                                <span>{{__('msg.Fuel')}}</span><span>{{__('msg.'.$addata->fuel)}}</span>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0">
                            </div>
                        @endif
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Condition')}}</span><span>{{__('msg.'.$addata->condition1)}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        @endif
                        @if (App\Models\category::where('category_'.LaravelLocalization::getcurrentlocale(),$addata->category_id)->value('id') == '1')
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Space')}}</span><span>{{$addata->space}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        @if ($addata->real_estate_type != 'Land')
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Real Estate Type')}}</span><span>{{__('msg.'.$addata->real_estate_type)}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Bed Rooms')}}</span><span>{{$addata->bed_rooms}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Bathrooms')}}</span><span>{{$addata->bathrooms}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Furnished')}}</span><span>{{__('msg.'.$addata->furnished)}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Floor')}}</span><span>{{$addata->floor}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        @endif
                        @endif

                        @if ($addata->real_estate_type != 'Land')
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Year')}}</span><span>{{$addata->year}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        @if (App\Models\sub_category::where('sub_category_'.LaravelLocalization::getcurrentlocale(),$addata->sub_category_id)->value('id') != '3')
                        @if ($addata->additions)
                            <div class="col-12 flex-wrap d-flex justify-content-between">
                                <span>{{__('msg.Additions')}}</span><span>@foreach(explode('-',$addata->additions) as $addi){{__('msg.'.$addi)}}&nbsp;-&nbsp;@endforeach</span>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0">
                            </div>
                        @endif
                        @endif
                        @endif
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Payment Method')}}</span><span>{{__('msg.'.$addata->payment_method)}}</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        <div class="col-12  d-flex justify-content-between">
                            <span>{{__('msg.Ad Type')}}</span><span>{{$addata->sub_category_id}}</span>
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
                            <span class="font-weight-bold text-dark">{{__('msg.seen:')}} {{$addata->viewers}}</span>
                        </div>

                        @if (isset(Auth::user()->email))
                        <div class="col-12 mt-4">
                            <h5 class="text-dark">{{__('msg.Send Comment / Offer To The Owner')}}</h5>
                            <div class="msg col-12 mb-4 d-flex">
                                <form action="{{route('comment.store',$addata->id)}}" method="POST">
                                    @csrf
                                    <input type="text" value="{{$addata->user_id}}" name="owner_id" hidden>
                                    <textarea class="mt-2 rounded col-12" name="comment" cols="30" rows="10" placeholder="{{__('msg.what do you want to say')}}">{{old('email-content')}}</textarea>
                                    <p class="note">{{__('msg.* note that you can\'t edit you comment / offer after being added')}}</p>
                                    <button type="submit" class="btn btn-primary mt-2 mb-2 text-end">
                                        <i class="fas fa-envelope"></i>
                                        {{__('msg.Add')}}
                                    </button>
                                </form>
                            </div>
                            <div class="col-12">
                                <h5 id="comments" class="text-dark">{{__('msg.Comments')}}</h5>
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
            <div class="col-2 d-none d-lg-block">
                <a class="V-ad col-11 mr-auto ml-auto" href="{{url('contact')}}">
                    {{__('msg.Place your ad here')}}
                </a>
            </div>
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
