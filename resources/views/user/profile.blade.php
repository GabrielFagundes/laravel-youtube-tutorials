@extends('layouts.app')

@section('content')

    <!-- section-hero -->
    <section class="hero hero-profile" style="background-image: url('https://img.youtube.com/vi/D3pYbbA1kfk/maxresdefault.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-block">
                <h5>{{ $user->name }}</h5>
                <a class="btn btn-primary btn-sm btn-shadow btn-rounded btn-icon btn-add" href="#" data-toggle="tooltip" title="Add friend" role="button"><i class="fa fa-user-plus"></i></a>
            </div>
        </div>
    </section>

    <!-- section-toolbar -->
    <section class="toolbar toolbar-profile" data-fixed="true">
        <div class="container">
            <div class="profile-avatar">
                <a href="#"><img src="{{session('google_user_avatar_original')}}" alt=""></a>
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
                        <h5 class="widget-title">About Me</h5>
                        <p>I am a frontend developer &amp; web designer. I love to work on creative and standalone projects like gameforest.</p>
                        <ul>
                            <li><i class="fa fa-clock-o"></i> Joined December 2009</li>
                            <li><i class="fa fa-map-marker"></i> United Kingdom</li>
                            <li><a href="https://themeforest.net/item/gameforest-responsive-gaming-html-theme/5007730" target="_blank"><i class="fa fa-chain-broken"></i> Gameforest</a></li>
                            <li><a href="https://www.facebook.com/yakuthemes" target="_blank"><i class="fa fa-facebook"></i> yakuthemes</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
