@extends('layouts.app')
@section('content')


<style>

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        background-image: linear-gradient(180deg, rgb(255, 255, 255), rgb(255, 255, 255), rgb(0, 255, 162));
        font-family: poppins;
    }

    .card-login{
        height: 800px;
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

    /* Máscaras ER */
    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mcpf(v){  //MASCARA PARA CPF
        if(v.length > 14){
            v = v.slice(0, -1); //remover o ultimo caractere porque ja foi atingido o limite de 14.
        }
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v;
    }

    function mtel(v){
        if(v.length > 15){
            v = v.slice(0, -1); //remover o ultimo caractere porque ja foi atingido o limite do telefone.
        }
        v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }
    function id( el ){
        return document.getElementById( el );
    }
    window.onload = function(){
        id('telefone').onkeyup = function(){
            mascara( this, mtel );
        }

        id('cpf').onkeyup = function(){
            mascara( this, mcpf );
        }
    }

    function removerCaracteresAntesDeEnviarFormulario(){
        var cpf = document.getElementById("cpf").value;
        if(validarCPF(cpf) == false){
            return alert("CPF invalido! por favor insira o cpf valido.");
        }
        cpf = cpf.replaceAll(".", "");
        cpf = cpf.replaceAll("-", "");
        document.getElementById("cpf").value = cpf;

        var telefone = document.getElementById("telefone").value;
        telefone = telefone.replaceAll("(", "");
        telefone = telefone.replaceAll(")", "");
        telefone = telefone.replaceAll(" ", "");
        telefone = telefone.replaceAll("-", "");
        document.getElementById("telefone").value = telefone;
        document.querySelector("form").submit();

    }
    function validarCPF(cpf) {
        cpf = cpf.replace(/[^\d]+/g,'');
        if(cpf == '') return false;
        // Elimina CPFs invalidos conhecidos
        if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
                return false;
        // Valida 1o digito
        add = 0;
        for (i=0; i < 9; i ++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
                rev = 0;
            if (rev != parseInt(cpf.charAt(9)))
                return false;
        // Valida 2o digito
        add = 0;
        for (i = 0; i < 10; i ++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(10)))
            return false;
        return true;
    }

</script>

    <div class="container linear">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="notice" id="notice">
                    <strong>Erro:</strong>
                </div>

                <div class="card card-login">
                    <div class="card-login-top">{{ __('Cadastro') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="div-label-email">
                                <label for="name">{{ __('Nome') }}</label>
                            </div>

                            <div class="div-campo-email">
                                <input id="name" type="text" class="form-control campo-redondo @error('name') is-invalid @enderror" name="name" value="{{ old('nome') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <script type="text/javascript">
                                    desocultarDiv("Preencha corretamente o campo nome!");
                                </script>
                                @enderror
                            </div>
                        </div>

                        <div class="div-label-email">
                            <label for="email">{{ __('Email') }}</label>
                        </div>

                        <div class="div-campo-email">
                            <input id="email" type="email" class="form-control campo-redondo @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <script type="text/javascript">
                                    desocultarDiv("Preencha corretamente o campo email!");
                                </script>
                            @enderror
                        </div>

                        <div class="div-label-email">
                            <label for="telefone">{{ __('Telefone') }}</label>
                        </div>

                        <div class="div-campo-email">
                            <input id="telefone" type="text" name="telefone" class="form-control campo-redondo" value="" required>
                            @error('telefone')
                                <script type="text/javascript">
                                    desocultarDiv("Preencha corretamente o campo telefone!");
                                </script>
                            @enderror
                        </div>

                        <div class="div-label-email">
                            <label for="cpf">{{ __('cpf') }}</label>
                        </div>

                        <div class="div-campo-email">
                            <input id="cpf" type="text" name="cpf" class="form-control campo-redondo" value="" required>
                            {{-- @error('cpf')
                                <script type="text/javascript">
                                    desocultarDiv("Preencha corretamente o campo cpf!");
                                </script>
                            @enderror --}}
                        </div>


                        <div class="div-label-email">
                            <label for="password">{{ __('Senha') }}</label>
                        </div>

                        <div class="div-campo-email">
                            <input id="password" type="password" class=" campo-redondo form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <script type="text/javascript">
                                    desocultarDiv("Preencha corretamente o campo Senha!");
                                </script>
                            @enderror
                        </div>

                        <div class="div-label-email">
                            <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
                        </div>

                        <div class="div-campo-email">
                            <input id="password-confirm" type="password" class=" campo-redondo form-control" name="password_confirmation" required autocomplete="new-password">
                            @error('password-confirm')
                                <script type="text/javascript">
                                    desocultarDiv("Senhas Diferentes!");
                                </script>
                            @enderror
                        </div>

                        <div class="card-login-bottom">
                            <div class="div-botao">
                                <button type="button" onclick="removerCaracteresAntesDeEnviarFormulario()" class="botao">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                            <div class="div-a">
                                <a class="link" href="{{ route('login') }}">
                                    {{ __('Já tem codastro? clique aqui para entrar.') }}
                                </a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
