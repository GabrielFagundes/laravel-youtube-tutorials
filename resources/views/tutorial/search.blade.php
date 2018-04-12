@extends('layouts.app')

@section('content')
    <section class="toolbar">
        <div class="container">
            <h5><i class="fa fa-film"></i> Sua busca retornou <span>{{ $tutorials->count() }}</span> vídeo(s)</h5>
            <form method="post" action="{{ url('/search/video') }}">
                {{ csrf_field() }}
                <div class="form-group input-icon-right">
                    <i class="fa fa-search"></i>
                    <input id="busca" name="busca" type="text" class="form-control search-video form-control-secondary" id="search" placeholder="Buscar vídeos">
                </div>
            </form>
            @if(Auth::user())
                <a class="btn btn-primary btn-shadow float-right hidden-sm-down" href="{{ url('/tutorial/upload/video') }}" role="button">Upload<i class="fa fa-cloud-upload"></i></a>
            @endif
        </div>
    </section>

    <section>
        <div class="container">
            @if($videos['items'])
                <div id="search-block">
                    <div id="load-data" class="row row-5">
                        @foreach($videos['items'] as $video)
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="card card-video">
                                    <div class="card-img">
                                        <a href="{{ url('/tutorial/'. $video->getId()) }}">
                                            <img src="{{ $video->getSnippet()->getThumbnails()->getMedium()->getUrl() }}" alt="Top 5 Brutal Gameplay Moments in For Honor">
                                        </a>
                                        <div class="card-meta">
                                            <span>{{ convtime($video->getContentDetails()->getDuration()) }}</span>
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
                    @if ($video['tutorial_id'] > 1 && $tutorials->count() > 12 )
                        <div id="remove-row">
                            <div id="btn-more"  data-id="{{ $video['tutorial_id'] }}"  class="text-center"><a class="btn btn-primary btn-shadow btn-rounded btn-effect btn-lg m-t-20" style="color:white;">Mostrar mais</a></div>
                        </div>
                    @endif
                    @else
                        <div>
                            Não foram encontrados tutoriais para esta busca
                        </div>
                    @endif
                </div>
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