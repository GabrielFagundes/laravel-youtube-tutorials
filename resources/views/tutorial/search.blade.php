@extends('layouts.app')

@section('content')
    <section class="toolbar">
        <div class="container">
            <h5><i class="fa fa-film"></i> Sua busca retornou <span>{{ $tutorials->count() }}</span> vídeo(s)</h5>
            <form method="post">
                <div class="form-group input-icon-right">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control search-video form-control-secondary" id="search" placeholder="Search Video...">
                </div>
            </form>
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
                                <h4 class="card-title"><a href="{{ url('/tutorial/'. $video->getId()) }}">{{ $video->getSnippet()->getTitle() }}</a></h4>
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
            @if ($video['tutorial_id'] > 1 && $tutorials->count() > 12)
                <div id="remove-row">
                    <div id="btn-more"  data-id="{{ $video['tutorial_id'] }}"  class="text-center"><a class="btn btn-primary btn-shadow btn-rounded btn-effect btn-lg m-t-20" style="color:white;">Mostrar mais</a></div>
                </div>
            @endif
        </div>
    </section>

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

@endsection