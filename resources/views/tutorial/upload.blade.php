@extends('layouts.app')

@section('content')
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
