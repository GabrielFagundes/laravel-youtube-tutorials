@extends('layouts.app')

@section('content')

    <!-- main -->
    <section class="bg-image" style="background-image: url('https://img.youtube.com/vi/BhTkoDVgF6s/maxresdefault.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="video-play" data-src="https://www.youtube.com/embed/zFUymXnQ5z8?rel=0&amp;amp;autoplay=1&amp;amp;showinfo=0">
                <div class="embed-responsive embed-responsive-16by9">
                    <img class="embed-responsive-item" src="https://img.youtube.com/vi/BhTkoDVgF6s/maxresdefault.jpg">
                    <div class="video-caption">
                        <h5>For Honor: Walkthrough Gameplay Warlords</h5>
                        <span class="length">5:32</span>
                    </div>
                    <div class="video-play-icon">
                        <i class="fa fa-play"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="toolbar">
        <div class="container">
            <h5><i class="fa fa-film"></i> Recent Videos <span>(123)</span></h5>

            <a class="btn btn-secondary m-l-10 float-left hidden-md-down" href="#" role="button">Filter Videos <i class="fa fa-align-right"></i></a>
            <a class="btn btn-primary btn-shadow float-right hidden-sm-down" href="#" role="button">Upload Video <i class="fa fa-cloud-upload"></i></a>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="toolbar-custom">
                <a class="btn btn-default btn-icon m-r-10 float-left hidden-sm-down" href="#" data-toggle="tooltip" title="refresh" data-placement="bottom" role="button"><i class="fa fa-refresh"></i></a>
                <div class="dropdown float-left">
                    <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">All Platform <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item active" href="#">All Platform</a>
                        <a class="dropdown-item" href="#">Playstation 4</a>
                        <a class="dropdown-item" href="#">Xbox One</a>
                        <a class="dropdown-item" href="#">Origin</a>
                        <a class="dropdown-item" href="#">Steam</a>
                    </div>
                </div>

                <div class="btn-group float-right m-l-5 hidden-sm-down" role="group">
                    <a class="btn btn-default btn-icon" href="#" role="button"><i class="fa fa-th-large"></i></a>
                    <a class="btn btn-default btn-icon" href="#" role="button"><i class="fa fa-bars"></i></a>
                </div>
                <div class="dropdown float-right">
                    <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Date Added <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item active" href="#">Date Added</a>
                        <a class="dropdown-item" href="#">Popular</a>
                        <a class="dropdown-item" href="#">Newest</a>
                        <a class="dropdown-item" href="#">Oldest</a>
                    </div>
                </div>
            </div>

            <div class="row row-5">
                @foreach($videos['items'] as $video)
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card card-video">
                        <div class="card-img">
                            <a href="video-post.html">
                                <img src="{{ $video->getSnippet()->getThumbnails()->getMedium()->getUrl() }}" alt="Top 5 Brutal Gameplay Moments in For Honor">
                            </a>
                            <div class="card-meta">
                                <span>15:56</span>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title"><a href="video-post.html">Top 5 Brutal Gameplay Moments</a></h4>
                            <div class="card-meta">
                                <span><i class="fa fa-clock-o"></i> 1 month ago</span>
                                <span>6521 views</span>
                            </div>
                            <p>Check out these 5 brutal For Honor clips shared by you.</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /main -->


@endsection
