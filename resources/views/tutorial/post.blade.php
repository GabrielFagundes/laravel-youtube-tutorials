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
    <section class="bg-image"
            @if($tutorial->category_id == 1)
             style="background-image: url('https://tutoriube.dev/img/tutorial/background-pubg.jpg');
            @elseif($tutorial->category_id == 2)
             style="background-image: url('https://tutoriube.dev/img/tutorial/background-lol.jpg');
            @else($tutorial->category_id == 3)
             style="background-image: url('https://tutoriube.dev/img/tutorial/background-csgo.jpg');
            @endif
    ">
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
                                    <span><i class="fa fa-clock-o"></i> {{ formatDate($tutorial->created_at, 'formattedString') }} por <a href="{{ url('/profile/' . $tutorial->user->id) }}">{{ $tutorial->user->name }}</a></span>
                                </div>
                            </div>
                            @if(Auth::user())
                                @if($tutorial->user->id != Auth::user()->id)
                                    <div id="sub-btn"  data-id="" data-url="" data-action="" class="text-center">
                                        <a id="sub-label" class="btn btn-danger subscribe">Inscrever-se</a>
                                    </div>
                                @endif
                            @else
                                <div id="sub-btn"  data-id="" data-url="" data-action="" class="text-center">
                                    <a id="sub-label" href="{{ url('auth/google') }}" class="btn btn-danger subscribe">Inscrever-se</a>
                                </div>
                            @endif
                        </div>
                        {{ $tutorial->description }}
                        @if(Auth::user())
                            <input id="star-rating" name="star-rating" class="kv-ltr-theme-fa-star rating-loading" value="{{ $tutorial->userSumRating }}" dir="ltr" data-size="xs">
                        @else
                            <br><br>
                            <p>Faça <a href="{{ url('auth/google') }}" style="color: #0000F0">login</a> para avaliar este tutorial</p>
                        @endif
                    </div>
                    <div class="post-actions">
                        <div class="post-tags">
                            <a href="#">#{{ $tutorial->category->description }}</a>
                            <a href="#">#{{ $tutorial->subcategory->description }}</a>
                        </div>
                        <div class="social-share">
                            <a class="btn btn-social btn-facebook btn-circle" href="https://www.facebook.com/sharer/sharer.php?u=tutoriube.dev/tutorial/{{ $tutorial->link }}" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on facebook"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                    <div id="comments" class="comments anchor">
                        <div id="disqus_thread"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <!-- widget post  -->
                        <div class="widget widget-videos">
                            <h5 class="widget-title">Recomendados</h5>
                            <ul class="widget-list">
                                @foreach($videos['items'] as $video)
                                    <li>
                                        <div class="widget-img">
                                            <a href="{{ url('/tutorial/'. $video->getId()) }}"><img src="{{ $video->getSnippet()->getThumbnails()->getMedium()->getUrl() }}" alt=""></a>
                                            <span>2:13</span>
                                        </div>
                                        <h4><a href="{{ url('/tutorial/'. $video->getId()) }}">{{ $video->getSnippet()->getTitle() }}</a></h4>
                                        <span><i class="fa fa-clock-o"></i> {{ formatDate($video->getSnippet()->getPublishedAt(), 'fromISO', $video->getId()) }} </span>
                                        <span><i class="fa fa-eye"></i> {{ $video->getStatistics()->getViewCount() }} </span>
                                    </li>
                                @endforeach
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

    {{--Métodos para trocar o tipo de botão de inscrição de acordo com o retorno do post   --}}
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
            $('#sub-label').removeClass('subscribe');
            $('#sub-label').addClass('subscribed');
        }

//        Document.Ready
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
                @if($tutorial->userSumRating > 0)
                displayOnly: true,
                @endif
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
                            console.log('Success!')
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

  {{--Verifica se o usuário está inscrito ou não no canal do usuário que fez o tutorial--}}
    @if(!$checkSubscriber)
      <script>
          setSubscribeButton();
      </script>
    @else
      <script>
          setUnsubscribeButton()
      </script>
    @endif

    {{--Comentários disqus    --}}
    <script>
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://tutoriube.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection