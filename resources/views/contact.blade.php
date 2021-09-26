@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12 mt-4">
        <h5 class="text-dark">Send Message</h5>
        <div class="msg col-12 mb-4 d-flex">
            <form action="" method="POST">
                <label for="name" class="mt-2">Your Name</label>
                <input id="name" class=" rounded col-12" type="text" name="name" placeholder="your name" value="{{old('name')}}" required>
                <label for="mobile" class="mt-2">Mobile Number</label>
                <input id="mobile" class=" rounded col-12" type="text" name="mobile" placeholder="your mobile number" value="{{old('mobile')}}" required>
                <label for="email" class="mt-2">Your E-mail</label>
                <input id="email" class=" rounded col-12" type="email" name="email" placeholder="your e-mail" value="{{old('email')}}" required>
                <label for="ad-id" class="mt-2">Ad Number</label>
                <input id="ad-id" class=" rounded col-12" type="text" name="ad-id" placeholder="ad number required for complains" value="{{old('ad-id')}}">
                <label for="email-content" class="mt-2">Details</label>
                <textarea id="email-content" class=" rounded col-12" name="email-content" cols="30" rows="10" placeholder="what do you want to say" required>{{old('email-content')}}</textarea>
                <button type="submit" class="btn btn-primary mt-2 mb-2 text-end">
                    <i class="fas fa-envelope"></i>
                    Send
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
