@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">
                <div class="card-header">{{ __('msg.adminRegistration') }}</div>

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
                    <form method="POST" action="{{route('admin.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row" hidden>
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('msg.User_id') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{$admindata->id}}" readonly>

                                @error('user_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('msg.Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$admindata->email}}" readonly>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" name="password" autocomplete="current-password">

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
                                <input id="passwordconfirm" type="password" class="form-control @error('passwordconfirm') is-invalid @enderror" name="passwordconfirm" value="{{old('passwordconfirm')}}" required autocomplete="new-password">
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
                                <option value="normal">Normal</option>
                                <option value="master">Master</option>
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
                                    {{ __('msg.Regist') }}
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
