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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- theme css -->
    <link href="{{ asset('css/theme.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" >

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    @yield('header')
</head>
<body>

<header id="header">
    <div class="container">
        <div class="navbar-backdrop">
            <div class="navbar">
                <div class="navbar-left">
                    <a class="navbar-toggle"><i class="fa fa-bars"></i></a>
                    <a href="{{ url('/home') }}" class="logo"><img src="/../img/logo.png" alt="Tutoriube - eSports Tutorials Center"></a>
                    <nav class="nav">
                        <ul>
                            <li class="has-dropdown mega-menu mega-games">
                                <a>Jogos</a>
                                <ul>
                                    <li>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="img">
                                                        <a href="game-post.html"><img src="/img/menu/menu-1.jpg" alt="Last of Us: Part 2"></a>
                                                        <span class="badge badge-pc">LOL</span>
                                                    </div>
                                                    <h4><a href="game-post.html">League of Legends</a></h4>
                                                </div>
                                                <div class="col">
                                                    <div class="img">
                                                        <a href="game-post.html"><img src="/img/menu/menu-2.jpg" alt="Injustice 2"></a>
                                                        <span class="badge badge-steam">CS GO</span>
                                                    </div>
                                                    <h4><a href="game-post.html">Counter Strike - Global Offensive</a></h4>
                                                </div>
                                                <div class="col">
                                                    <div class="img">
                                                        <a href="game-post.html"><img src="/img/menu/menu-3.jpg" alt="Bioshock: Infinite"></a>
                                                        <span class="badge badge-ps4">PUBG</span>
                                                    </div>
                                                    <h4><a href="game-post.html">Player Unknown's Battlegrounds</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('/community') }}">Sugestões</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="nav navbar-right">
                    <ul>
                        <li><a data-toggle="search"><i class="fa fa-search"></i></a></li>
                    </ul>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="hidden-xs-down">
                            <a class="btn btn-social btn-youtube btn-icon-left" href="{{ route('google.auth') }}" role="button"><i class="fa fa-youtube"></i>
                                Login
                            </a>
                        </li>
                    @else
                        <ul>
                            <li><a href="{{ url('tutorial/upload/video') }}"> <i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;</a></li>
                        </ul>
                        <li class="dropdown dropdown-profile">
                            <a href="login.html" data-toggle="dropdown"><img src="{{session('google_user_avatar')}}" alt="">
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/profile/'. Auth::user()->id) }}"><i class="fa fa-user"></i> Perfil</a>
                                    <a class="dropdown-item" href="{{ url('/profile/user/completeprofile') }}"><i class="fa fa-cog"></i> Dados do perfil</a>
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
        </div>
        <div class="navbar-search">
            <div class="container">
                <form method="post" action="{{ url('/search/video') }}">
                    {{ csrf_field() }}
                    <input id="busca" name="busca" type="text" class="form-control" placeholder="Qual tutorial você está buscando?">
                    <i class="fa fa-times close"></i>
                </form>
            </div>
        </div>
    </div>
</header>
<!-- /header -->

<!-- main -->
@yield('content')
@include('sweet::alert')
<!-- /main -->

<!-- footer -->

<!-- /footer -->

<!-- Scripts -->
<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

@yield('scripts')

<!-- theme js -->
<script src="{{ asset('js/theme.js') }}"></script>

</body>
</html>
