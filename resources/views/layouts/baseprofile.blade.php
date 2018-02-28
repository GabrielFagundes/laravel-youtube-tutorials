<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" xmlns="http://www.w3.org/1999/html">
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

    {{--CSS e JS para exibir o rating do usuário--}}
    <link href="{{ asset('css/star-rating.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('themes/krajee-fa/theme.min.css') }}" rel="stylesheet" >
    <script src="{{ asset('js/star-rating.min.js') }}"></script>
    <script src="{{ asset('js/locales/pt-BR.js') }}"></script>
    <script src="{{ asset('themes/krajee-fa/theme.min.js') }}"></script>
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
<!-- section-hero -->
<section class="hero hero-profile" style="background-image: url('https://img.youtube.com/vi/D3pYbbA1kfk/maxresdefault.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="hero-block">
            <h5>{{ $user->name }}</h5>
            <br><br>
            <input id="star-rating" name="star-rating" class="kv-ltr-theme-fa-star rating-loading"
                   value="{{ $user->avgUserRating }}" dir="ltr" data-size="xs">
            @if(Auth::user())
                @if($user->id != Auth::user()->id && $user->channel_id)
                    <div id="sub-btn"  data-id="" data-url="" data-action="">
                        <a id="sub-label" class="btn btn-youtube btn-sm btn-shadow btn-rounded btn-add" style="color: white;">
                            <i class="fa fa-youtube-play"></i> Inscrever-se</a>
                    </div>
                @endif
            @else
                <div id="sub-btn"  data-id="" data-url="" data-action="">
                    <a id="sub-label" href="{{ url('auth/google') }}"
                       class="btn btn-youtube btn-sm btn-shadow btn-rounded btn-icon btn-add" style="color: white;>Inscrever-se</a>
                            </div>
                    @endif

                            </div>
                            </div>
                            </section>

                            <!-- section-toolbar -->
                            <section class="toolbar toolbar-profile" data-fixed="true">
                    <div class="container">
                        <div class="profile-avatar">
                            <a href="#"><img src="{{ $user->avatar }}" alt=""></a>
                            <div class="sticky">
                                <div class="profile-info">
                                    <h5>{{ $user->name }}</h5>
                                </div>
                            </div>
                        </div>
                        <ul class="toolbar-nav hidden-md-down">
                            <li class="{{ ($menu == 'videos') ? 'active' : '' }}"><a href="{{ url('profile/' . $user->id) }}">Vídeos</a></li>
                            @if(Auth::user()->id == $user->id)
                                <li class="{{ ($menu == 'settings') ? 'active' : '' }}"><a href="user/completeprofile/">Configurações</a></li>
                            @endif
                        </ul>
                    </div>
</section>

<section class="p-y-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 hidden-md-down">
                <!-- widget about -->
                <div class="widget widget-about">
                    @if($user->description)
                        <h5 class="widget-title">Sobre mim</h5>
                    @endif
                    <p>{{ $user->description }}</p>
                    <ul>
                        @if($user->city)
                            <li><i class="fa fa-map-marker"></i> {{ $user->city }} </li>
                        @endif
                        @if($user->facebook)
                            <li><a href="https://facebook.com/{{ $user->facebook }}" target="_blank"><i class="fa fa-facebook"></i> {{ $user->facebook }} </a></li>
                        @endif
                        @if($user->twitch)
                            <li><a href="https://twitch.com/{{ $user->twitch }}" target="_blank"><i class="fa fa-twitch"></i> {{ $user->twitch }} </a></li>
                        @endif
                        @if($user->youtube)
                            <li><a href="https://youtube.com/{{ $user->youtube }}" target="_blank"><i class="fa fa-youtube-play"></i> {{ $user->youtube }} </a></li>
                        @endif
                        @if($user->twitter)
                            <li><a href="https://twitter.com/{{ $user->twitter }}" target="_blank"><i class="fa fa-twitter"></i> {{ $user->twitter }} </a></li>
                        @endif
                    </ul>
                </div>

            </div>

            @yield('content')
            @include('sweet::alert')

        </div>
    </div>
</section>
<!-- /main -->

<!-- footer -->

<!-- /footer -->

<!-- Scripts -->
@yield('footer')
<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<script>

    function setSubscribeButton() {
        $('#sub-label').text('Inscrever-se');
        $('#sub-btn').data('id', '{{ $user->channel_id }}');
        $('#sub-btn').data('url', '/channel/subscribe');
        $('#sub-btn').data('action', 'subscribe');
    }

    function setUnsubscribeButton() {
        $('#sub-label').text('Inscrito');
        $('#sub-label').prepend('<i class="fa fa-check-circle' + '"></i> ')
        $('#sub-btn').data('id', '{{ $checkSubscriber }}');
        $('#sub-btn').data('url', '/channel/unsubscribe');
        $('#sub-btn').data('action', 'unsubscribe');
        $('#sub-label').removeClass('subscribe');
        $('#sub-label').addClass('subscribed');
    }

    $(document).ready(function(){

        $(document).on('click','#sub-btn',function(){
            var id = $(this).data('id');
            var url = $(this).data('url');
            var setButton = $(this).data('action');

            if (setButton == 'subscribe'){
                setUnsubscribeButton();
            }else{
                setSubscribeButton();
            }

            $.ajax({
                url : url,
                method : "POST",
                data : {id:id, _token:"{{csrf_token()}}"},
                dataType : "json",
                success : function (data)
                {
                    if(data != '')
                    {
                        console.log('Ação realizada com sucesso!');
                    }
                    else
                    {
                        alert('Não recebemos o retorno do Youtube para sua inscrição.');
                    }
                }
            });
        });

        //            Eventos relacionados ao rating do vídeo
        $('#star-rating').rating({
            hoverOnClear: false,
            theme: 'krajee-fa',
            filledStar: '<i class="fa fa-gamepad"></i>',
            emptyStar: '<i class="fa fa-gamepad"></i>',
            showCaption: false,
            showClear: false,
            displayOnly: true,
        });
    });


</script>

@if(!$checkSubscriber)
    <script>
        setSubscribeButton();
    </script>
@else
    <script>
        setUnsubscribeButton()
    </script>
@endif

</body>
</html>
