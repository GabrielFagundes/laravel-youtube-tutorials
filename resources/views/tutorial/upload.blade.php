@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="heading">
                <i class="fa fa-film"></i>
                <h2>Seus vídeos do Youtube</h2>
                <p>Abaixo você poderá selecionar um de seus vídeos do youtube para criar um tutorial</p>
            </div>
            <div class="row row-5">
                @foreach ($uploadedVideos['items'] as $video)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card card-video">
                            <div class="card-img upload">
                                <form name="post_tutorial[{{  $video->getSnippet()->getResourceId()->getVideoId()  }}]" id="post_tutorial" action="{{url('/tutorial/upload/complete')}}" method="post">
                                    {{ csrf_field() }}
                                    <a href="#" onclick="document.forms['post_tutorial[{{  $video->getSnippet()->getResourceId()->getVideoId()  }}]'].submit();">
                                        <img src="{{ $video->getSnippet()->getThumbnails()->getMedium()->getUrl() }}" alt="Thumbnail indisponível">
                                    </a>
                                    <input name="video" id="video" type="text" hidden value="{{ $video->getSnippet()->getResourceId()->getVideoId() }}">
                                    <input name="channel" id="channel" type="text" hidden value="{{ $video->getSnippet()->getChannelId()}}">
                                </form>
                                {{--<div class="card-meta">--}}
                                {{--<span>{{ $videoContents['duration'] }}</span>--}}
                                {{--</div>--}}
                            </div>
                            <div class="card-block">
                                <h4 class="card-title" ><a href="">{{ $video->getSnippet()->getTitle() }}</a></h4>
                                <div class="card-meta">
                                    {{--<span><i class="fa fa-clock-o"></i> {{ date("U",strtotime($video->getSnippet()->getPublishedAt() ))}} </span>--}}
                                    {{--<span> {{ $videoContents['viewCount'] }} views</span>--}}
                                </div>
                                <p> {{ $video->getSnippet()->getDescription()  }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
