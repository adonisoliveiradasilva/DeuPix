@extends('layouts.app')
@section('content')

<style>

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .preto{
        background-color: #000!important;
    }

    body{
        background-image: linear-gradient(180deg, rgb(255, 255, 255), rgb(255, 255, 255), rgb(0, 255, 162));
        font-family: poppins;
    }



    .card-login{
        height: 600px;
        width: 400px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 100px; 
        margin-bottom: 100px; 
        position: relative!important;
        border-radius: 20px;
        background-image: linear-gradient(180deg, rgb(78, 150, 143), rgb(137, 238, 228),rgb(78, 150, 143));
        /* background-color: rgb(78, 150, 143); */
        border: none;
    }

    .card-login-top{
        position: relative;
        margin-top: 30px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 30px;
        font-family: Poppins;
        color: #fff;
        font-size: 40px;
    }

    .div-label-email{
        position: relative;
        width: 120px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
        margin-bottom: 10px;
        text-align: center;
    }

    .div-campo-email{
        position: relative;
        width: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .campo-redondo{
        border: none;
        border-radius: 20px;
    }

    .div-remember{
        position: relative;
        margin-left: auto;
        margin-right:auto;
        margin-top: 20px;
        width: 170px;
        text-align: left;
    }

    .card-login-bottom{
        height: 200px;
        width: 250px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
        position: relative;
        justify-content: center;
        align-items: center;
    }

    .div-botao{
        height: 30px;
        width: 250px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
    }

    .botao{
        color: #fff;
        background-color: rgb(2, 76, 79);
        position: relative;
        width: 100%;
        height: 100%;
        border: 0;
        border-radius: 20px;
    }


    .botao:hover{
        color:  rgb(2, 76, 79);
        background-color: #fff;
    }

    .div-a{
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
        position: relative;
        width: 100%;
        height: 30px;
        text-align: center;
    }

    .link{
        margin: 0 auto;
        text-decoration: none;
    }

    .link:hover{
        color: #fff;
    }

    .notice {
        padding: 15px;
        background-color: #fafafa;
        border-left: 6px solid #7f7f84;
        margin-bottom: 10px;
        margin-left:auto;
        margin-right:auto;
        width: 400px;
        -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
        -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
        box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
        position: relative;
        border-color: #d73814;
    }

    #notice{
        display: none;
    }

</style>

<script type="text/javascript">
    function desocultarDiv(msg){
        document.getElementById('notice').style.display = 'block';
        var element = document.querySelector(".notice");
        var text = document.createTextNode(msg);
        element.appendChild(text);
    }
</script>

<div class="container linear">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="notice" id="notice">
                <strong>Erro:</strong>
            </div>


            <div class="card card-login">
                <div class="card-login-top">{{ __('Entrar') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="div-label-email">
                            <label for="email">{{ __('Email') }}</label>
                        </div>

                        <div class="div-campo-email">
                            <input id="email" type="email" class="form-control campo-redondo @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <script type="text/javascript">
                                    desocultarDiv("Email ou senha incorretos!");
                                </script>
                                {{-- <button onclick="desocultarDiv();" style="display: none;"> </button> --}}
                                {{-- <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span> --}}
                            @enderror
                        </div>



                        <div class="div-label-email">
                            <label for="password">{{ __('Senha') }}</label>
                        </div>
                        <div class="div-campo-email">
                            <input id="password" type="password" class="form-control campo-redondo @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                {{-- mandar mensagem personalizada para email e senha --}}
                                {{-- <script type="text/javascript">
                                    desocultarDiv("Senha incorreta!");
                                </script> --}}
                                {{-- <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> --}}
                            @enderror
                        </div>

                        <div class="div-remember">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Lembrar Usuário') }}
                                </label>
                            </div>
                        </div>


                        <div class="card-login-bottom">
                            <div class="div-botao">
                                <button  type="submit" class="botao">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="div-a">
                                    <a class="link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu a Senha?') }}
                                    </a>
                                </div>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
