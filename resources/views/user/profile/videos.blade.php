@extends('layouts.baseprofile')

@section('content')

    <input type="text" hidden value="{{ $menu = 'videos' }}">

    <div class="col-lg-9">

        <section style="padding-top: 0px">
                <div id="load-data" class="row row-5">
                    @foreach($videos['items'] as $video)
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card card-video">
                                <div class="card-img" style="position: relative">
                                    <a id="delete" href="{{ url('/tutorial/delete/'. $video->getId()) }}" class="btn btn-danger" style="display: none; float: right; position: absolute;"><i class="fa fa-trash"></i></a>
                                    <a  href="{{ url('/tutorial/'. $video->getId()) }}">
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
                {{--@if ($video['tutorial_id'] > 1)--}}
                    {{--<div id="remove-row">--}}
                        {{--<div id="btn-more"  data-id="{{ $video['tutorial_id'] }}"  class="text-center"><a class="btn btn-primary btn-shadow btn-rounded btn-effect btn-lg m-t-20" style="color:white;">Mostrar mais</a></div>--}}
                    {{--</div>--}}
                {{--@endif--}}
        </section>

    </div>

@endsection

@section('footer')

    <script>

        $(document).ready(function(){
            $(document).on('click','#btn-more',function(){
                var id = $(this).data('id');
                var user_id = {{ $user->id }}
                $("#btn-more").html("Loading....");
                $.ajax({
                    url : '{{ url("/home") }}',
                    method : "POST",
                    data : {id:id, user_id:user_id, _token:"{{csrf_token()}}"},
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

            @if($user->id == Auth::user()->id)
                $(document).ready(function () {
                    $(document).on('mouseenter', '.card-img', function () {
                        $(this).find("#delete").show();
                    }).on('mouseleave', '.card-img', function () {
                        $(this).find("#delete").hide();
                    });
                });
            @endif;

        });
    </script>

@endsection
