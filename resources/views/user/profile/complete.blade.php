@extends('layouts.baseprofile')

@section('content')

    <div class="col-lg-9">
        <!-- post -->
        <div class="post post-card post-profile">
            <h5 class="m-t-40 text-center">Complete Seus Dados</h5>
            <p class="text-center">Preencha os campos abaixo para que as pessoas possam te seguir nas suas principais redes sociais e/ou canais.
            <br>Após preenchidos, seus dados aparecerão abaixo da sua foto de perfil, para que as pessoas possam clicar e conhecer mais sobre você.
            </p>
            <div class="row m-t-30">
                <div class="col-lg-9 mx-auto">
                    <form method="post">
                        {{csrf_field()}}
                        <div class="alert alert-success alert-dismissible" hidden role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <b>Well done!</b> You successfully read this important alert message.
                        </div>
                        <div class="form-group">
                            <label for="email">Localização</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            <small class="form-text">Cidade e Estado onde você mora. Ex: Porto Alegre - RS.</small>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="fa fa-facebook"></i> Facebook</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            <small class="form-text">O link do seu perfil no Facebook.</small>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="fa fa-twitch"></i> Twitch</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            <small class="form-text">O link do seu canal na Twitch.</small>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="fa fa-youtube"></i> Youtube</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            <small class="form-text">O link do seu canal no Youtube.</small>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="fa fa-twitter"></i> Twitter</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            <small class="form-text">O link do seu perfil no Twitter.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Bio</label>
                            <textarea class="form-control" maxlength="100" rows="4" placeholder="Your message"></textarea>
                            <small class="form-text">Conte um pouco sobre você. Vai aparecer na sua descrição à esquerda.</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-shadow">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
