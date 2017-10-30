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
@yield('content')
<!-- /main -->

<!-- footer -->
<footer id="footer">

</footer>
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
