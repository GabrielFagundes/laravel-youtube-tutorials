<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- theme css -->
    <link href="{{ asset('css/theme.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" >
    @yield('header')
</head>
<body>

<header id="header">
    <div class="container">
        <div class="navbar-backdrop">
            <div class="navbar">
                <div class="navbar-left">
                    <a class="navbar-toggle"><i class="fa fa-bars"></i></a>
                    <a href="{{ url('/home') }}" class="logo"><img src="../img/logo.png" alt="Tutoriube - eSports Tutorials Center"></a>
                    <nav class="nav">

                    </nav>
                </div>
                <div class="nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="hidden-xs-down">
                            <a class="btn btn-primary" href="{{ route('google.auth') }}">
                                Login com Google
                            </a>
                        </li>
                    @else
                        <li class="dropdown dropdown-profile">
                            <a href="login.html" data-toggle="dropdown"><img src="{{session('google_user_avatar')}}" alt="">
                                <span>{{ Auth::user()->name }}</span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{  url('/profile/'. Auth::user()->id) }}"><i class="fa fa-user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-envelope-open"></i> Inbox</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Games</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </div>
            </div>
            <div class="navbar-search">
                <div class="container">
                    <form method="post">
                        <input type="text" class="form-control" placeholder="Search...">
                        <i class="fa fa-times close"></i>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- /header -->

<!-- main -->
<!-- section-hero -->
<section class="hero hero-profile" style="background-image: url('https://img.youtube.com/vi/D3pYbbA1kfk/maxresdefault.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="hero-block">
            <h5>{{ $user->name }}</h5>
            <a class="btn btn-primary btn-sm btn-shadow btn-rounded btn-icon btn-add" href="{{ route('profile.update') }}" data-toggle="tooltip" title="Completar dados" role="button"><i class="fa fa-user-plus"></i>&nbsp; Complete seus dados</a>
        </div>
    </div>
</section>

<!-- section-toolbar -->
<section class="toolbar toolbar-profile" data-fixed="true">
    <div class="container">
        <div class="profile-avatar">
            <a href="#"><img src="{{ $user->avatar }}" alt=""></a>
            <div class="sticky">
                <a href="#"><img src="img/user/avatar-sm.jpg" alt=""></a>
                <div class="profile-info">
                    <h5>{{ $user->name }}</h5>
                    <span>@nathan</span>
                </div>
            </div>
        </div>
        <div class="dropdown float-right hidden-md-down">
            <a class="btn btn-secondary btn-icon btn-sm m-l-25 float-right" href="#" data-toggle="dropdown" role="button"><i class="fa fa-cog"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item active" href="#">Setting</a>
                <a class="dropdown-item" href="#">Mail</a>
                <a class="dropdown-item" href="#">Report</a>
                <a class="dropdown-item" href="#">Block</a>
            </div>
        </div>
        <ul class="toolbar-nav hidden-md-down">
            <li class="active"><a href="#">Timeline</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Games (38)</a></li>
            <li><a href="#">Friends (628)</a></li>
            <li><a href="#">Images (23)</a></li>
            <li><a href="#">Videos</a></li>
            <li><a href="#">Groups</a></li>
            <li><a href="#">Forums</a></li>
        </ul>
    </div>
</section>

<section class="p-y-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 hidden-md-down">
                <!-- widget about -->
                <div class="widget widget-about">
                    <h5 class="widget-title">Bio</h5>
                    <p>{{ $user->description }}</p>
                    <ul>
                        @if($user->city)
                            <li><i class="fa fa-map-marker"></i> {{ $user->city }} </li>
                        @endif
                        @if($user->facebook)
                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i> {{ $user->facebook }} </a></li>
                        @endif
                        @if($user->twitch)
                            <li><a href="#" target="_blank"><i class="fa fa-twitch"></i> {{ $user->twitch }} </a></li>
                        @endif
                        @if($user->youtube)
                            <li><a href="#" target="_blank"><i class="fa fa-youtube-play"></i> {{ $user->youtube }} </a></li>
                        @endif
                        @if($user->twitter)
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i> {{ $user->twitter }} </a></li>
                        @endif
                    </ul>
                </div>

            </div>

            @yield('content')

        </div>
    </div>
</section>
<!-- /main -->

<!-- footer -->

<!-- /footer -->

<!-- Scripts -->
@yield('footer')
<script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- theme js -->
<script src="{{ asset('js/theme.min.js') }}"></script>
</body>
</html>
