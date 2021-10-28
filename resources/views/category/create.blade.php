@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header @if(LaravelLocalization::getcurrentlocale() == 'ar') text-right @endif">{{ __('msg.Create Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="category_ar" class="col-md-4 col-form-label text-md-right">{{ __('msg.Category in arabic') }}</label>

                            <div class="col-md-6">
                                <input id="category_ar" type="text" class="form-control @error('category_ar') is-invalid @enderror" name="category_ar" value="{{ old('category_ar') }}" autocomplete="category_ar">

                                @error('category_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_en" class="col-md-4 col-form-label text-md-right">{{ __('msg.Category in english') }}</label>

                            <div class="col-md-6">
                                <input id="category_en" type="text" class="form-control @error('category_en') is-invalid @enderror" name="category_en" value="{{ old('category_en') }}" autocomplete="category_en">

                                @error('category_en')
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
