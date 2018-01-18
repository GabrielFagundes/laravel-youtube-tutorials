@extends('layouts.app')

@section('header')
    <link rel="stylesheet" href="plugins/animate/animate.min.css">
    <!-- plugins css -->
    <link href="plugins/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
@endsection

@section('content')

    <!-- main -->
    <section class="bg-image" style="background-image: url('https://img.youtube.com/vi/K5tRSwd-Sc0/maxresdefault.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="video-play" data-src="https://www.youtube.com/embed/i8qzBkHjk_0?rel=0&amp;amp;autoplay=1&amp;amp;showinfo=0">
                <div class="embed-responsive embed-responsive-16by9">
                    <img class="embed-responsive-item" src="https://img.youtube.com/vi/K5tRSwd-Sc0/maxresdefault.jpg">
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

    <section class="bg-secondary p-t-15 p-b-5 p-x-15">
        <div class="owl-carousel owl-videos">
            <div class="card card-video">
                <div class="card-img">
                    <a href="video-post.html">
                        <img src="https://i1.ytimg.com/vi/GaERL8Nrl9k/mqdefault.jpg" alt="Tom Clancy's Ghost Recon: Wildlands">
                    </a>
                    <div class="card-meta">
                        <span>4:32</span>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="card-title"><a href="video-post.html">Tom Clancy's Ghost Recon: Wildlands</a></h4>
                    <div class="card-meta">
                        <span><i class="fa fa-clock-o"></i> 2 hours ago</span>
                        <span>423 views</span>
                    </div>
                </div>
            </div>

            <div class="card card-video">
                <div class="card-img">
                    <a href="video-post.html">
                        <img src="https://i1.ytimg.com/vi/mW4LMCtoIkg/mqdefault.jpg" class="card-img-top" alt="Anthem Official Gameplay Reveal">
                    </a>
                    <div class="card-meta">
                        <span>6:46</span>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="card-title"><a href="video-post.html">Anthem Official Gameplay Reveal</a></h4>
                    <div class="card-meta">
                        <span><i class="fa fa-clock-o"></i> 2 weeks ago</span>
                        <span>447 views</span>
                    </div>
                </div>
            </div>

            <div class="card card-video">
                <div class="card-img">
                    <a href="video-post.html">
                        <img src="https://i1.ytimg.com/vi/-PohBqV_i7s/mqdefault.jpg" class="card-img-top" alt="Shadow of War Gameplay Walkthrough">
                    </a>
                    <div class="card-meta">
                        <span>9:58</span>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="card-title"><a href="video-post.html">Shadow of War Gameplay Walkthrough</a></h4>
                    <div class="card-meta">
                        <span><i class="fa fa-clock-o"></i> March 10, 2017</span>
                        <span>914 views</span>
                    </div>
                </div>
            </div>

            <div class="card card-video">
                <div class="card-img">
                    <a href="video-post.html">
                        <img src="https://i1.ytimg.com/vi/feqIj5PaqCQ/mqdefault.jpg" class="card-img-top" alt="Call of Duty WW2 Multiplayer Gameplay">
                    </a>
                    <div class="card-meta">
                        <span>4:32</span>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="card-title"><a href="video-post.html">Call of Duty WW2 Multiplayer Gameplay</a></h4>
                    <div class="card-meta">
                        <span><i class="fa fa-clock-o"></i> 3 days ago</span>
                        <span>423 views</span>
                    </div>
                </div>
            </div>

            <div class="card card-video">
                <div class="card-img">
                    <a href="video-post.html">
                        <img src="https://i.ytimg.com/vi/N1NsF9c90f0/mqdefault.jpg" alt="Final Fantasy VII Remake">
                    </a>
                    <div class="card-meta">
                        <span>3:05</span>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="card-title"><a href="video-post.html">Final Fantasy VII Remake</a></h4>
                    <div class="card-meta">
                        <span><i class="fa fa-clock-o"></i> 2 days ago</span>
                        <span>589 views</span>
                    </div>
                </div>
            </div>

            <div class="card card-video">
                <div class="card-img">
                    <a href="video-post.html">
                        <img src="https://i.ytimg.com/vi/lQXpDL3SNWQ/mqdefault.jpg" class="card-img-top" alt="Spider-Man Official 4K Trailer">
                    </a>
                    <div class="card-meta">
                        <span>3:07</span>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="card-title"><a href="video-post.html">Spider-Man Official 4K Trailer</a></h4>
                    <div class="card-meta">
                        <span><i class="fa fa-clock-o"></i> 2 weeks ago</span>
                        <span>1798 views</span>
                    </div>
                </div>
            </div>

            <div class="card card-video">
                <div class="card-img">
                    <a href="video-post.html">
                        <img src="https://i1.ytimg.com/vi/9EzRBzdf--g/mqdefault.jpg" alt="METRO EXODUS Gameplay Trailer">
                    </a>
                    <div class="card-meta">
                        <span>1:24</span>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="card-title"><a href="video-post.html">Wolfenstein II Gameplay Trailer</a></h4>
                    <div class="card-meta">
                        <span><i class="fa fa-clock-o"></i> July 16, 2017</span>
                        <span>7330 views</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="heading">
                <i class="fa fa-film"></i>
                <h2>Recent Videos</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                                <h4 class="card-title"><a href="{{ url('/tutorial/'. $video->getId()) }}">{{ $video->getSnippet()->getTitle() }}</a></h4>
                                <div class="card-meta">
                                    <span><i class="fa fa-clock-o"></i> {{ time() }}</span>
                                    <span>6521 views</span>
                                </div>
                                <p>{{ $video->getSnippet()->getDescription() }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center"><a href="videos.html" class="btn btn-primary btn-shadow btn-rounded btn-effect btn-lg m-t-20">Show More</a></div>
        </div>
    </section>

    <section class="bg-secondary p-t-30 p-b-0">
        <div class="container">
            <h6 class="subtitle">Recommended Videos</h6>
            <div class="row row-5">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card card-video">
                        <div class="card-img">
                            <a href="video-post.html">
                                <img src="https://i1.ytimg.com/vi/feqIj5PaqCQ/mqdefault.jpg" class="card-img-top" alt="Call of Duty WW2 Multiplayer Gameplay">
                            </a>
                            <div class="card-meta">
                                <span>15:38</span>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title"><a href="video-post.html">Call of Duty WW2 Multiplayer Gameplay</a></h4>
                            <div class="card-meta">
                                <span><i class="fa fa-clock-o"></i> March 1, 2017</span>
                                <span>7236 views</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card card-video">
                        <div class="card-img">
                            <a href="video-post.html">
                                <img src="https://i1.ytimg.com/vi/B6qY-P4eo1Q/mqdefault.jpg" class="card-img-top" alt="Mafia 3: The Movie (All Cutscenes HD)">
                            </a>
                            <div class="card-meta">
                                <span>2:47:52</span>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title"><a href="video-post.html">Mafia 3: The Movie (All Cutscenes HD)</a></h4>
                            <div class="card-meta">
                                <span><i class="fa fa-clock-o"></i> February 14, 2017</span>
                                <span>12376 views</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card card-video">
                        <div class="card-img">
                            <a href="video-post.html">
                                <img src="https://i1.ytimg.com/vi/VHDmlMVWIwQ/mqdefault.jpg" class="card-img-top" alt="Battlefield 1: In the Name of the Tsar Trailer">
                            </a>
                            <div class="card-meta">
                                <span>9:58</span>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title"><a href="video-post.html">Battlefield 1: In the Name of the Tsar</a></h4>
                            <div class="card-meta">
                                <span><i class="fa fa-clock-o"></i> March 10, 2017</span>
                                <span>914 views</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card card-video">
                        <div class="card-img">
                            <a href="video-post.html">
                                <img src="https://i.ytimg.com/vi/lQXpDL3SNWQ/mqdefault.jpg" class="card-img-top" alt="Spider-Man Official 4K Trailer">
                            </a>
                            <div class="card-meta">
                                <span>6:46</span>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title"><a href="video-post.html">Spider-Man Official 4K Trailer</a></h4>
                            <div class="card-meta">
                                <span><i class="fa fa-clock-o"></i> April 5, 2017</span>
                                <span>447 views</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /main -->

@endsection

@section('scripts')

    <!-- plugins js -->
    <script src="plugins/owl-carousel/js/owl.carousel.min.js"></script>
    <script>
        (function($) {
            "use strict";
            // owl carousel
            $('.owl-carousel').owlCarousel({
                margin: 15,
                loop: true,
                dots: false,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    700: {
                        items: 2
                    },
                    800: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    },
                    1200: {
                        items: 6
                    }
                }
            });
        })(jQuery);
    </script>

@endsection