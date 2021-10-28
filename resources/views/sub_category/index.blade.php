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
            <h1>{{__('msg.Sub Categories')}}</h1> <br>

        </div>

        <!-- PHP code to read records will be here -->

        <a href="{{ url('sub_category/create/'.$category_id) }}" class='btn btn-primary mb-1'>{{__('msg.Add New Sub Category')}}</a>

        <table class='table table-hover table-responsive table-bordered text-center'>
            <!-- creating our table heading -->
            <tr>
                <th>{{__('msg.ID')}}</th>
                <th>{{__('msg.Sub Category in arabic')}}</th>
                <th>{{__('msg.Sub Category in english')}}</th>
                <th>{{__('msg.Action')}}</th>
            </tr>



    @foreach ($sub_categorydata as $fetchedData )


           <tr>
                <td>{{ $fetchedData->id }}</td>
                <td>{{ $fetchedData->sub_category_ar }}</td>
                <td>{{ $fetchedData->sub_category_en }}</td>
                </td>
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
                                {{__('msg.are you sure you want to delete this sub category')}}
                                </div>
                                <div class="modal-footer">
                                    <a href='{{ url('sub_category/delete/'.$fetchedData->id) }}' class='btn btn-danger'>{{__('msg.Delete')}}</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    <a href='{{ url('sub_category/edit/'.$fetchedData->id) }}' class='btn btn-primary mb-1'>{{__('msg.Edit')}}</a>
                </td>
           </tr>
     @endforeach
        </table>
        <br>
        <br>
        <div class="d-flex justify-content-center">
            {!!$sub_categorydata->links()!!}
        </div>
    </div>
    <!-- end .container -->

@endsection

