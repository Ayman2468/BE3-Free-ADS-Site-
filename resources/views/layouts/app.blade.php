<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BE3') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js.map') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css.map') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('images\LOGO-2.png')}}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-center">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="dropdown dropdown-notification nav-item  dropdown-notifications">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="fa fa-bell"> </i>
                                <span
                                class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow   notif-count"
                                    data-count="0">{{count(App\models\comments::where([['owner_id','=',Auth::user()->id],
                                    ['seen_status','=','not seen']])->get())}}</span>
                                </a>
                        @if (null !== ($comments = App\models\comments::where('owner_id',Auth::user()->id)->take(15)->get()))
                        <ul class="dropdown-menu dropdown-menu-right width">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0 text-center">
                                    <span class="grey darken-2 text-center">Notifications</span>
                                </h6>
                            </li>
                            @foreach ($comments as $comment)
                                        <li class="scrollable-container ps-container ps-active-y media-list w-100">
                                            <a class="text-decoration-none" href="{{url('ad/display/'.$comment->ad_id.'#comments')}}">
                                                        @if ($comment->seen_status == 'not seen')
                                                        <div class="media msg">
                                                            <div class="media-body">
                                                        <p class="media-heading font-weight-bold note mb-0">
                                                            {{App\models\User::where('id',$comment->user_id)->value('user_name')}}{{ __(' msg.commented on your ad')}}
                                                        </p>
                                                        <p class="note text-muted d-block">
                                                            {{substr($comment->comment,0,15).'...'}}
                                                        </p>
                                                    </div>
                                                </div>
                                                        @else
                                                        <div class="media">
                                                            <div class="media-body">
                                                        <p class="media-heading font-weight-bold note text-dark mb-0">
                                                            {{App\models\User::where('id',$comment->user_id)->value('user_name')}}{{ __(' msg.commented on your ad')}}
                                                        </p>
                                                        <p class="note text-muted d-block">
                                                            {{substr($comment->comment,0,15).'...'}}
                                                        </p>
                                                    </div>
                                                </div>
                                                        @endif
                                            </a>
                                        </li>
                                        @endforeach
                                        <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                            href=""> All Notifications </a>
                                        </li>
                                    </ul>
                            @endif
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('ad/create')}}">Place Ad</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->user_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (session()->get('admindata'))
                                    @if (session()->get('admindata')->position == 'master')
                                    <a class="dropdown-item" href="{{ url('user/index') }}">
                                        {{ __('All Users') }}
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ url('admin/index') }}">
                                        {{ __('All Admins') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('category/index') }}">
                                        {{ __('All Categories') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('ad/index') }}">
                                        {{ __('All ADs Control') }}
                                    </a>
                                    @endif
                                    @if (null == session()->get('admindata'))
                                    <a class="dropdown-item" href="{{ url('admin/adminlogin') }}">
                                        {{ __('Admin Login') }}
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ url('user/display') }}">
                                        {{ __('My Data') }}
                                    </a>
                                    <a href='{{ url('user/ads/'.Auth::user()->id) }}' class="dropdown-item">
                                        {{__('msg.My Ads')}}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
        <main>
            @yield('content')
        </main>
    <div class="footer">
        <div class="container">
            <div>
                <hr class="mt-0">
                <p>
                    Do you want to sell your real estate or car? , BE3 is the best site to do that.
                </p>
                <hr>
                <p>
                    <span class="font-weight-bold text-dark">main categories :</span> <a href="{{url('real-estate')}}">Real Estate</a> , <a href="{{url('cars')}}">Cars and Spare Parts</a>
                </p>
                <hr>
                <footer class="d-flex flex-column justify-content-around">
                    <div class="display-4 font-weight-bold text-dark">
                        BE3
                    </div>
                    <div>
                        <ul class="list-disc">
                            <li>
                                <a href="{{url('safety')}}">Safety Rules</a>
                            </li>
                            <li>
                                <a href="{{url('terms')}}">Use Terms</a>
                            </li>
                            <li>
                                <a href="{{url('privacy')}}">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="list-disc">
                            <li>
                                <a href="{{url('contact')}}">Contact US</a>
                            </li>
                            <li>
                                <a href="{{url('payment')}}">
                                    Make Special Paid Ads For Month
                                </a>
                            </li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
        <p class="rights">&copy; All Rights Reserved To Site Creator Ayman Safwat</p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('script')

    {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var pusher = new Pusher('3dd16575fd82debf185d', {
            cluster: 'mt1',
            encrypted: false
        });
        </script>
        <script src="{{asset('js/pusherNotifications.js')}}"></script> --}}
</body>
</html>
