@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="heading">
                <i class="fa fa-comment"></i>
                <h2>Sugestões da Comunidade</h2>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <ul class="sugestions">

                    </ul>

                    @foreach($sugestions as $sugestion)
                        <li class="Sugestions__sugestion">

                            {{ $sugestion->title }}

                            <small>
                                Sugestão de: <a href="{{ url('profile/'.$sugestion->user->id)}}">{{ $sugestion->user->name }}</a> {{ $sugestion->updated_at->diffforhumans() }}
                            </small>

                        </li>
                    @endforeach
                </div>

                <div class="col-lg-4">
                    <div class="widget widget-post">
                        <h3 class="widget-title">Enviar sugestão</h3>

                        <div class="sidebar">
                            <form action="{{ url('/community') }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="title">Título:</label>
                                    <input type="text" class="form-control" id="title" placeholder="Qual é o título da sua sugestão de tutorial?">
                                </div>

                                <div class="form-group">
                                    <label for="description">Descrição:</label>
                                    <textarea class="form-control" name="description" id="description" cols="50" rows="3" placeholder="Descreva sua sugestão em até 144 caracteres"></textarea>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">Enviar Sugestão</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </section>
@endsection