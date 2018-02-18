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
                    <ul class="sugestions" style="padding-bottom: 3%">
                        @if(count($sugestions))
                            @foreach($sugestions as $sugestion)
                                <div class="post post-review">

                                    {{ $sugestion->title }}

                                    <small>
                                        Sugestão de: <a href="{{ url('profile/'.$sugestion->user->id)}}">{{ $sugestion->user->name }}</a> {{ $sugestion->updated_at->diffforhumans() }}
                                    </small>

                                    <a href="{{ url('/community/' . $sugestion->category->slug)}}" class="badge badge-pc" style="background: {{ $sugestion->category->color }};color: white;">{{ $sugestion->category->slug }}</a>
                                </div>
                            @endforeach
                        @else
                            <h5>Nenhuma sugestão foi aprovada até o momento.</h5>
                        @endif
                    </ul>
                    <div class="pagination-results m-t-0 m-b-40">
                        <nav aria-label="Page navigation">
                            {{ $sugestions->links() }}
                        </nav>
                    </div>

                </div>
                    @if(Auth::user())
                        <div class="col-lg-4">
                            <div class="widget widget-post">
                                <h3 class="widget-title" style="padding-left: 26px;">Nos envie sua sugestão de tutorial</h3>

                                <div class="sidebar">
                                    <form action="{{ url('/community') }}" method="post">
                                        {{ csrf_field() }}

                                        <div class="form-group {{ $errors->has('category_id') ? 'has-danger' : '' }}">
                                            <label for="Categoria">Jogo</label>

                                            <select class="form-control" name="category_id" id="category_id">

                                                <option selected disabled>Escolha o Jogo</option>

                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }} >
                                                        {{ $category->description }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}

                                        </div>

                                        <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
                                            <label for="title">Título:</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Qual é o título da sua sugestão de tutorial?" >

                                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                        </div>

                                        <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                                            <label for="description">Descrição:</label>
                                            <textarea class="form-control" name="description" id="description" cols="50" rows="3" placeholder="Descreva sua sugestão em até 144 caracteres">{{ old('description') }}</textarea>

                                            {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary">Enviar Sugestão</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    @else
                        <div>
                            <span>Faça login para enviar-nos sua sugestão de tutorial</span>
                        </div>
                    @endif
                </div>
            </div>
    </section>
@endsection