@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">
                <div class="card-header">{{ __('msg.admin data editing') }}</div>

                <div class="card-body text-center">
                    @if(session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        <strong>{{session()->get('success')}}</strong>
                                    </div>
                    @endif
                    @if(session()->has('ident'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{session()->get('ident')}}</strong>
                    </div>
                    @endif
                    <form method="POST" action="{{route('admins.masterupdate',$admindata->id)}}" enctype="multipart/form-data">
                        @csrf

                                <input type="text" name="id" value="{{ $admindata->id }}" hidden>


                        <div class="form-group row" >
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('msg.Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$admindata->email}}" autocomplete readonly>

                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('msg.Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$admindata->password}}" autocomplete>

                                @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwordconfirm" class="col-md-4 col-form-label text-md-right">{{ __('msg.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="passwordconfirm" type="password" class="form-control @error('passwordconfirm') is-invalid @enderror" name="passwordconfirm" value="{{$admindata->password}}" required autocomplete="new-password">
                                @error('passwordconfirm')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('msg.Position') }}</label>

                            <div class="col-md-6">
                                <select id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position">
                                <option value="master"
                                @if ($admindata->position == 'master')
                                    selected
                                @endif>Master</option>
                                <option value="normal"
                                @if ($admindata->position == 'normal')
                                    selected
                                @endif>Normal</option>
                                </select>

                                @error('position')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('msg.Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
