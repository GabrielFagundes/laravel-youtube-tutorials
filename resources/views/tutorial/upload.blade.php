@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="heading">
                <i class="fa fa-video-camera"></i>
                <h2>Seus vídeos do Youtube</h2>
                <p>Abaixo você poderá selecionar um de seus vídeos do youtube para criar um tutorial</p>
            </div>
            @if($uploadedVideos['items'])
                <hidden style="display: none;">{{ $noresult = true }}</hidden>
                <div class="row row-5">
                    @foreach ($uploadedVideos['items'] as $video)
                        @if(!$video->temtutorial)
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="card card-video">
                                    <div class="card-img upload">
                                        <form name="post_tutorial[{{  $video->getSnippet()->getResourceId()->getVideoId()  }}]" id="post_tutorial" action="{{url('/tutorial/upload/video')}}" method="post">
                                            {{ csrf_field() }}
                                            <a href="#" onclick="document.forms['post_tutorial[{{  $video->getSnippet()->getResourceId()->getVideoId()  }}]'].submit();">
                                                <img src="{{ $video->getSnippet()->getThumbnails()->getMedium()->getUrl() }}" alt="Thumbnail indisponível">
                                            </a>
                                            <input name="video" id="video" type="text" hidden value="{{ $video->getSnippet()->getResourceId()->getVideoId() }}">
                                            <input name="channel" id="channel" type="text" hidden value="{{ $video->getSnippet()->getChannelId()}}">
                                        </form>
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title" ><a href="">{{ $video->getSnippet()->getTitle() }}</a></h4>
                                        <p> {{ $video->getSnippet()->getDescription()  }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <center>
                    <h1>Você ainda não possui vídeos enviados para o Youtube</h1>
                </center>
            @endif
        </div>
    </section>
@endsection
