@extends('layouts.app')

@section('header')
    <link href="{{ asset('css/star-rating.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('themes/krajee-fa/theme.min.css') }}" rel="stylesheet" >
    <script src="{{ asset('js/star-rating.min.js') }}"></script>
    <script src="{{ asset('js/locales/pt-BR.js') }}"></script>
    <script src="{{ asset('themes/krajee-fa/theme.min.js') }}"></script>
@endsection

@section('content')

    <!-- main -->
    <section class="bg-image" style="background-image: url('https://img.youtube.com/vi/zSd9McRXHZ8/maxresdefault.jpg');">
        <div class="overlay-light"></div>
        <div class="container">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ 'https://www.youtube.com/embed/' . $tutorial->link . '?rel=0&amp;amp;autoplay=1&amp;amp;showinfo=0' }}" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="post post-single">
                        <div class="post-header">
                            <div>
                                <a href="profile.html"><img src="{{ $tutorial->user->avatar }}" alt=""></a>
                            </div>
                            <div>
                                <h2 class="post-title">{{ $tutorial->title }}</h2>
                                <div class="post-meta">
                                    <span><i class="fa fa-clock-o"></i> August 22, 2017 by <a href="profile.html">{{ $tutorial->user->name }}</a></span>
                                    <span><a href="#comments"><i class="fa fa-comment-o"></i> 33 comments</a></span>
                                </div>
                            </div>
                            @if(Auth::user())
                                @if($tutorial->user->id != Auth::user()->id)
                                    <div id="sub-btn"  data-id="" data-url="" data-action="" class="text-center">
                                        <a id="sub-label" class="btn btn-danger" style="color:white;">Inscrever-se</a>
                                    </div>
                                @endif
                            @else
                                <div id="sub-btn"  data-id="" data-url="" data-action="" class="text-center">
                                    <a id="sub-label" class="btn btn-danger" style="color:white;">Inscrever-se</a>
                                </div>
                            @endif
                        </div>
                        {{ $tutorial->description }}
                        <input id="star-rating" name="star-rating" class="kv-ltr-theme-fa-star rating-loading" value="{{ $tutorial->userSumRating }}" dir="ltr" data-size="xs">
                    </div>
                    <div class="post-actions">
                        <div class="post-tags">
                            <a href="#">#star wars</a>
                            <a href="#">#battlefront 2</a>
                            <a href="#">#gameplay</a>
                            <a href="#">#trailer</a>
                            <a href="#">#galaxy</a>
                        </div>
                        <div class="social-share">
                            <a class="btn btn-social btn-facebook btn-circle" href="#" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on facebook"><i class="fa fa-facebook"></i></a>
                            <span>5.345k</span>
                            <a class="btn btn-social btn-twitter btn-circle" href="#" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on twitter"><i class="fa fa-twitter"></i></a>
                            <a class="btn btn-social btn-google-plus btn-circle" href="#" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on google-plus"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    <div id="comments" class="comments anchor">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <!-- widget post  -->
                        <div class="widget widget-videos">
                            <h5 class="widget-title">Recommends</h5>
                            <ul class="widget-list">
                                <li>
                                    <div class="widget-img">
                                        <a href="blog-post.html"><img src="https://i1.ytimg.com/vi/4BLkEJu9szM/mqdefault.jpg" alt=""></a>
                                        <span>2:13</span>
                                    </div>
                                    <h4><a href="blog-post.html">Titanfall 2's Trophies Only Have 3 Earned Through Multiplayer</a></h4>
                                    <span><i class="fa fa-clock-o"></i> July 30, 2017</span>
                                    <span><i class="fa fa-eye"></i> 345x</span>
                                </li>
                            </ul>
                        </div>
                        <!-- /widget post -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /main -->


@endsection

@section('scripts')

  <script>
        function setSubscribeButton() {
            $('#sub-label').text('Inscrever-se');
            $('#sub-btn').data('id', '{{$tutorial->user->channel_id }}');
            $('#sub-btn').data('url', '/channel/subscribe');
            $('#sub-btn').data('action', 'subscribe');
        }

        function setUnsubscribeButton() {
            $('#sub-label').text('Inscrito');
            $('#sub-label').prepend('<i class="fa fa-check-circle' + '"></i> ')
            $('#sub-btn').data('id', '{{ $checkSubscriber }}');
            $('#sub-btn').data('url', '/channel/unsubscribe');
            $('#sub-btn').data('action', 'unsubscribe');
        }


        $(document).ready(function(){
            $(document).on('click','#sub-btn',function(){
                var id = $(this).data('id');
                var url = $(this).data('url');
                var setButton = $(this).data('action');

                $("#sub-label").text("...");
                $.ajax({
                    url : url,
                    method : "POST",
                    data : {id:id, _token:"{{csrf_token()}}"},
                    dataType : "json",
                    success : function (data)
                    {
                        if(data != '')
                        {
                            if (setButton == 'subscribe'){
                                setUnsubscribeButton();
                            }else{
                                setSubscribeButton();
                            }
                        }
                        else
                        {
                            alert('Não recebemos o retorno do Youtube para sua inscrição.');
                        }
                    }
                });
            });

            $('#star-rating').rating({
                hoverOnClear: false,
                theme: 'krajee-fa',
                filledStar: '<i class="fa fa-gamepad"></i>',
                emptyStar: '<i class="fa fa-gamepad"></i>',
                showCaption: false,
                showClear: false

            });

            $('#star-rating').on('rating:change', function(event, value, caption) {
                console.log(value);

                var id_tutorial = '{{ $tutorial->id }}';
                var rating = value;

                $.ajax({
                    url : '/user/rating',
                    method : "POST",
                    data : {id:id_tutorial, value:rating, _token:"{{csrf_token()}}"},
                    dataType : "json",
                    success : function (data)
                    {
                        if(data != '')
                        {

                        }
                        else
                        {
                            alert('Erro');
                        }
                    }
                });

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

@endsection