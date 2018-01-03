@extends('layouts.app')

@section('content')
    <section>
        <div class="container">

            <form method="POST" action="{{route('tutorial.save')}}">
                {{csrf_field()}}
                <input type="text" id="video" name="video" value="{{$video}}" hidden>

                <div class="form-group">
                    <label for="title"><i class="fa fa-youtube"></i> Título</label>
                    <input type="text" id="title" name="title" class="form-control">
                    </input>
                    <small class="form-text">Este seráo título do vídeo que as pessoas visualizarão na tela inicial e no seu perfil.</small>
                </div>

                <div class="form-group">
                    <label for="description"><i class="fa fa-pencil"></i> Descrição</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="digite uma descrição para seu tutorial">
                    </textarea>
                    <small class="form-text">Esta descrição aparecerá abaixo do vídeo na tela do tutorial.</small>
                </div>

                <button type="submit" class="btn btn-primary btn-shadow"><i class="fa fa-upload"></i> Upload</button>
            </form>

        </div>
    </section>
@endsection
