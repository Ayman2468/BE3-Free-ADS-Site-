@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">{{ __('msg.Create Sub Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sub_category.store') }}">
                        @csrf

                        <input name="category_id" type="text" value="{{$category_id}}" hidden readonly>

                        <div class="form-group row">
                            <label for="sub_category_ar" class="col-md-4 col-form-label text-md-right">{{ __('msg.Sub Category in arabic') }}</label>

                            <div class="col-md-6">
                                <input id="sub_category_ar" type="text" class="form-control @error('sub_category_ar') is-invalid @enderror" name="sub_category_ar" value="{{ old('sub_category_ar') }}" autocomplete="sub_category_ar">

                                @error('sub_category_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sub_category_en" class="col-md-4 col-form-label text-md-right">{{ __('msg.Sub Category in english') }}</label>

                            <div class="col-md-6">
                                <input id="sub_category_en" type="text" class="form-control @error('sub_category_en') is-invalid @enderror" name="sub_category_en" value="{{ old('sub_category_en') }}" autocomplete="sub_category_en">

                                @error('sub_category_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('msg.Add') }}
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
