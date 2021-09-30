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


        <table class='table table-hover table-responsive table-bordered text-center'>
            <!-- creating our table heading -->
            <tr>
                <th>{{__('msg.ID')}}</th>
                <th>{{__('msg.User ID')}}</th>
                <th>{{__('msg.Title')}}</th>
                <th>{{__('msg.City')}}</th>
                <th>{{__('msg.Price')}}</th>
                <th>{{__('msg.Created at')}}</th>
                <th>{{__('msg.Updated at')}}</th>
                {{-- <th>{{__('msg.Category')}}</th>
                <th>{{__('msg.Sub Category')}}</th>
                <th>{{__('msg.Details')}}</th>
                <th>{{__('msg.Governorate')}}</th>
                <th>{{__('msg.Year')}}</th>
                <th>{{__('msg.Payment Method')}}</th>
                <th>{{__('msg.Receiving/Delivery Date')}}</th>
                <th>{{__('msg.Mobile')}}</th>
                <th>{{__('msg.Call')}}</th>
                ---------------------------------------
                <th>{{__('msg.Real Estate Type')}}</th>
                <th>{{__('msg.Space')}}</th>
                <th>{{__('msg.Bed Rooms')}}</th>
                <th>{{__('msg.Bathrooms')}}</th>
                <th>{{__('msg.Furnished')}}</th>
                <th>{{__('msg.Floor')}}</th>
                --------------------------------------
                <th>{{__('msg.Brand')}}</th>
                <th>{{__('msg.Model')}}</th>
                <th>{{__('msg.Condition')}}</th>
                <th>{{__('msg.Engine')}}</th>
                <th>{{__('msg.Body Type')}}</th>
                <th>{{__('msg.Fuel')}}</th>
                <th>{{__('msg.Transmition')}}</th>
                <th>{{__('msg.Kilometers')}}</th>
                <th>{{__('msg.Color')}}</th>
                ----------------------------------------
                <th>{{__('msg.Additions')}}</th> --}}
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
                {{-- <td>{{ $fetchedData->category_id }}</td>
                <td>{{ $fetchedData->sub_category_id }}</td>
                <td>{{ $fetchedData->governorates_id }}</td>
                <td>{{ $fetchedData->year }}</td>
                <td>{{ $fetchedData->payment_method }}</td>
                <td>{{ $fetchedData->receiving_date }}</td>
                <td>{{ $fetchedData->mobile }}</td>
                <td>{{ $fetchedData->call1 }}</td>
                ---------------------------------------------
                <td>{{ $fetchedData->real_estate_type }}</td>
                <td>{{ $fetchedData->bed_rooms }}</td>
                <td>{{ $fetchedData->bathrooms }}</td>
                <td>{{ $fetchedData->space }}</td>
                <td>{{ $fetchedData->furnished }}</td>
                <td>{{ $fetchedData->floor }}</td>
                ----------------------------------------------
                <td>{{ $fetchedData->brand }}</td>
                <td>{{ $fetchedData->model }}</td>
                <td>{{ $fetchedData->condition1 }}</td>
                <td>{{ $fetchedData->engine }}</td>
                <td>{{ $fetchedData->body_type }}</td>
                <td>{{ $fetchedData->fuel }}</td>
                <td>{{ $fetchedData->transmition }}</td>
                <td>{{ $fetchedData->kilometers }}</td>
                <td>{{ $fetchedData->color }}</td>
                ----------------------------------------------
                <td>{{ $fetchedData->additions }}</td> --}}
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
                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                {{__('msg.are you sure you want to delete this ad')}}
                                </div>
                                <div class="modal-footer">
                                    <a href='{{ url('ad/delete/'.$fetchedData->id) }}' class='btn btn-danger'>{{__('msg.Delete')}}</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    <a href='{{ url('ad/edit/'.$fetchedData->id) }}' class='btn btn-primary mb-1'>{{__('msg.Edit')}}</a>
                    <a href='{{ url('ad/display/'.$fetchedData->id) }}' class='btn btn-primary mb-1'>{{__('msg.Show AD')}}</a>
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
    <!-- end .container -->

@endsection

