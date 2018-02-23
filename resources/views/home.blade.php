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
        </div>
    </section>

    <section>
        <div class="container">
            <div class="heading">
                <i class="fa fa-film"></i>
                <h2>Tutoriais Recentes</h2>
                <p>Abaixo você poderá visualizar os últimos tutoriais postados</p>
            </div>

            <div id="load-data" class="row row-5">

                    @foreach($videos['items'] as $video)
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card card-video">
                                <div class="card-img">
                                    <a href="{{ url('/tutorial/'. $video->getId()) }}">
                                        <img src="{{ $video->getSnippet()->getThumbnails()->getMedium()->getUrl() }}" alt="Top 5 Brutal Gameplay Moments in For Honor">
                                    </a>
                                    <div class="card-meta">
                                        <span>15:56</span>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <h4 class="card-title"><a href="{{ url('/tutorial/'. $video->getId()) }}">{{ getTitle($video->getId()) }}</a></h4>
                                    <div class="card-meta">
                                        <span><i class="fa fa-clock-o"></i> {{ formatDate($video->getSnippet()->getPublishedAt(), 'fromISO', $video->getId()) }}</span>
                                        <span>{{ $video->getStatistics()->getViewCount() }} visualizações</span>
                                    </div>
                                    <p>{{ cutString($video->getSnippet()->getDescription()) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
            @if ($video['tutorial_id'] > 1)
                <div id="remove-row">
                        <div id="btn-more"  data-id="{{ $video['tutorial_id'] }}"  class="text-center"><a class="btn btn-primary btn-shadow btn-rounded btn-effect btn-lg m-t-20" style="color:white;">Mostrar mais</a></div>
                </div>
            @endif
        </div>
    </section>

    <section class="bg-secondary p-t-30 p-b-0">
        <div class="container">
            <h6 class="subtitle">Vídeos Recomendados</h6>
            <div class="row row-5">
                @foreach($relativeVideos['items'] as $relativeVideo)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card card-video">
                            <div class="card-img">
                                <a href="{{ url('/tutorial/'. $relativeVideo->getId()) }}">
                                    <img src="{{ $relativeVideo->getSnippet()->getThumbnails()->getMedium()->getUrl() }}" alt="Top 5 Brutal Gameplay Moments in For Honor">
                                </a>
                                <div class="card-meta">
                                    <span>15:56</span>
                                </div>
                            </div>
                            <div class="card-block">
                                <h4 class="card-title"><a href="{{ url('/tutorial/'. $relativeVideo->getId()) }}">{{ getTitle($relativeVideo->getId()) }}</a></h4>
                                <div class="card-meta">
                                    <span><i class="fa fa-clock-o"></i> {{ formatDate($relativeVideo->getSnippet()->getPublishedAt(), 'fromISO', $video->getId()) }}</span>
                                    <span>{{ $video->getStatistics()->getViewCount() }} visualizações</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /main -->

@endsection

@section('scripts')

    <script>
        $(document).ready(function(){
            $(document).on('click','#btn-more',function(){
                var id = $(this).data('id');
                $("#btn-more").html("Loading....");
                $.ajax({
                    url : '{{ url("/home") }}',
                    method : "POST",
                    data : {id:id, _token:"{{csrf_token()}}"},
                    dataType : "text",
                    success : function (data)
                    {
                        if(data != '')
                        {
                            $('#remove-row').remove();
                            $('#load-data').append(data);
                        }
                        else
                        {
                            $('#btn-more').html("No Data");
                        }
                    }
                });
            });
        });
    </script>

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