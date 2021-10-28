@extends('layouts.app')
@section('content')

    <!-- container -->
    <div class="container">

        @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{session()->get('message')}}</strong>
        </div>
        @endif
        @if(session()->has('message1'))
        <div class="alert alert-danger" role="alert">
            <strong>{{session()->get('message1')}}</strong>
        </div>
        @endif
        <div class="page-header text-center">
            <h1>{{__('msg.Ads')}}</h1> <br>

        </div>

        <!-- PHP code to read records will be here -->
        <form method="get" action="{{url('ad/index')}}">
            <div class="search msg pt-2 pb-4 mr-auto ml-auto col-12 d-md-flex flex-sm-column flex-md-row flex-md-wrap align-items-center">

                <input type="text" class="form-control col-md-2 mb-2 mt-2 mr-md-2 ml-md-2" name="specad" placeholder="{{__('msg.Ad Number')}}" autocomplete="specad">
                <button type="submit" class="btn btn-primary col-md-2 smaller align-middle p-0">
                    {{ __('msg.Search') }}
                </button>
            </div>
        </form>

        <table class='table table-hover table-responsive table-bordered text-center'>
            <!-- creating our table heading -->
            <tr>
                <th>{{__('msg.ID')}}</th>
                <th>{{__('msg.User Name')}}</th>
                <th>{{__('msg.Title')}}</th>
                <th>{{__('msg.City')}}</th>
                <th>{{__('msg.Price')}}</th>
                <th>{{__('msg.Created')}}</th>
                <th>{{__('msg.Edited')}}</th>
                <th>{{__('msg.Action')}}</th>
            </tr>


            @foreach ($adsdata as $fetchedData )


            <tr>
                <td>{{ $fetchedData->id }}</td>
                <td>{{ $fetchedData->user_id }}</td>
                <td>{{ $fetchedData->title }}</td>
                <td>{{ $fetchedData->cities_id }}</td>
                <td>{{ $fetchedData->price }}</td>
                <td>{{ $fetchedData->created_at }}</td>
                <td>{{ $fetchedData->updated_at }}</td>

            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal{{$fetchedData->id}}">
                    {{__('msg.Delete')}}
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$fetchedData->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <a href='{{ url('ad/delete/'.$fetchedData->id) }}' class='btn btn-danger'>{{__('msg.Delete')}}</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    <a href='{{ url('ad/edit/'.$fetchedData->id) }}' class='btn btn-primary mb-1'>{{__('msg.Edit')}}</a>
                    <a href='{{ url('ad/display/'.$fetchedData->id) }}' class='btn btn-primary mb-1'>{{__('msg.Display AD')}}</a>
                    @if ($fetchedData->approval == 'Not Approved')
                        <a href='{{ url('ad/approve/'.$fetchedData->id) }}' class='btn btn-primary mb-1'>{{__('msg.Approve AD')}}</a>
                    @endif
                </td>
           </tr>
     @endforeach
        </table>
        <br>
        <br>
        <div class="d-flex justify-content-center">
            {!!$adsdata->links()!!}
        </div>
    </div>

@endsection

