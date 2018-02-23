@extends('layouts.app')

@section('content')
    <section>
        <div class="container">

            <form method="POST" action="{{url('tutorial/upload/save')}}">
                {{csrf_field()}}
                <input type="text" id="video" name="video" value="{{$video}}" hidden>
                <input type="text" id="channel" name="channel" value="{{$channel}}" hidden>

                <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
                    <label for="title"><i class="fa fa-youtube"></i> Título</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" maxlength="40" required placeholder="Título do tutorial">
                    </input>
                    <small class="form-text">Este seráo título do vídeo que as pessoas visualizarão na tela inicial e no seu perfil.</small>
                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                    <label for="description"><i class="fa fa-pencil"></i> Descrição</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="3" maxlength="500" placeholder="Digite uma descrição para seu tutorial" required>{{ old('description') }}</textarea>
                    <small class="form-text">Esta descrição aparecerá abaixo do vídeo na tela do tutorial.</small>
                    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('category') ? 'has-danger' : '' }}">
                    <label for="category">Jogo a que se refere o tutorial</label>
                    <select id="category" name="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->description }}
                            </option>
                        @endforeach
                    </select>
                    {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('subcategory') ? 'has-danger' : '' }}">
                    <label for="subcategory">Nível do tutorial</label>
                    <select id="subcategory" name="subcategory" class="form-control">
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ old('subcategory') == $subcategory->id ? 'selected' : '' }}>
                                {{ $subcategory->description }}
                            </option>
                        @endforeach
                    </select>
                    {!! $errors->first('subcategory', '<span class="help-block">:message</span>') !!}
                </div><br>

            <button type="submit" class="btn btn-primary btn-shadow"><i class="fa fa-upload"></i> Enviar</button>
            </form>

        </div>
    </section>
@endsection
