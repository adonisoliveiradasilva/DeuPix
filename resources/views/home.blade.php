@extends('layouts.app')

@section('content')

<link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap"
      rel="stylesheet"
/>


<Style>
 .footer-1{
        position: relative;
        /* background: rgb(157, 197, 174); */
        background-color: rgb(240, 255, 243);
        height: 220px;
        width: 100%;
        padding-top: 40px;
        /* color: #fff; */
        color: rgb(3, 42, 24);
        margin: auto;
        /* border-top: 1px solid #000;  */
    }

    .footer-1-top{
        width: 100%;
        height: auto;
        margin: auto;
        position: relative;
        text-align: center;
        margin-bottom: 20px;
    }

    .footer-1-top h4 p{
        color: #000;
    }

    .footer-1 img{
        width: 30px;
        height: 30px;
        margin-right: 50px;
        margin-left: 3px;
        margin-top: 3px;
    }

    .sociais{
        width: 200px;
        height: auto;
        position: relative;
        display: flex;
        margin: auto;
    }

    .img-sociais{
        border-radius: 100%;
        /* background-color: #7d7d7d; */
        background-color: rgb(0, 79, 42);
        /*border: 2px solid #133f00; */
        width: 40px;
        height: 40px;
        margin-right: 50px;
    }

    .facebook{
        background-size: 30px;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url({{ asset('img/facebook.png') }});
    }

    .facebook:hover{
        background-color: #fff;
        border: 2px solid #133f00;;
        cursor: pointer;
        background-image: url({{ asset('img/facebook-preto.png') }});
        background-size: 30px;
        background-position: center;
        background-repeat: no-repeat;
    }

    .email{
        background-size: 30px;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url({{ asset('img/gmail.png') }});
    }

    .email:hover{
        background-color: #fff;
        border: 2px solid #133f00;;
        cursor: pointer;
        background-image: url({{ asset('img/gmail-preto.png') }});
        background-size: 30px;
        background-position: center;
        background-repeat: no-repeat;
    }

    .instagram{
        background-size: 30px;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url({{ asset('img/instagram.png') }});
    }

    .instagram:hover{
        background-color: #fff;
        border: 2px solid #133f00;;
        cursor: pointer;
        background-image: url({{ asset('img/instagram-preto.png') }});
        background-size: 30px;
        background-position: center;
        background-repeat: no-repeat;
    }

    .footer-2{
        position: absolute;
        background: rgb(0, 97, 40);
        height: auto;
        width: 100%;
        color: #fff;
        text-align: center;
    }

    /* card sorteio */

    .card-sorteio{
        /* border-top-left-radius: 20px;
        border-top-right-radius: 20px;    */
        width: 300px;
        height: 400px;
        position: relative;
        margin: auto;
        font-family: poppins;
        background-color: #fff;
        -webkit-box-shadow: 5px 5px 39px 15px rgba(0,0,0,0.35);
        box-shadow: 5px 5px 39px 15px rgba(0,0,0,0.35);
    }

    .card-sorteio:hover{
        -webkit-box-shadow: 5px 5px 39px 15px rgba(4, 60, 70, 0.35);
        box-shadow: 5px 5px 39px 15px rgba(4, 60, 70, 0.35);
    }

    .card-top{
        /* border-top-left-radius: 20px;
        border-top-right-radius: 20px;          */
        width: 100%;
        height: 20px;
        background-color: rgb(0, 80, 5);
        position: relative;
        margin: auto;
    }

    .card-top-2{
        width: 100%;
        height: 200px;
        background-color: rgb(244, 244, 244);
        /* background-image: linear-gradient(#e7f4f6,rgb(255,255,255), #e7f4f6); */
        position: relative;
        margin: auto;
    }

    .card-img{
        width: 150px;
        height: 150px;
        background-color: rgb(255, 255, 255);
        position: relative;
        margin-left: auto;
        margin-right: auto;
        border-radius: 100%;
        background-size: 90%;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url({{ asset('img/dinheirinho.png') }});
    }

    .conteudo{
        width: 100%;
        height: 130px;
        /* background-color: rgb(163, 215, 166); */
        position: relative;
        margin: auto;
    }

    .nome{
        width: 100%;
        height: auto;
        position: relative;
        margin: auto;
        text-align: center;
    }

    .valor{
        width: 100%;
        height: auto;
        position: relative;
        margin: auto;
        text-align: center;
    }

    .div-bottom{
        width: 100%;
        height: 50px;
        /* background-color: rgb(0, 80, 5); */
        position: relative;
        margin: auto;
        text-align: center;
        display: flex;
    }

    .div-botao{
        width: 40%;
        height: 30px;
        position: relative;
        margin-left: 10px; /*mudar tamando na query*/
        text-align: center;
    }

    .div-chances{
        width: 40%;
        height: 30px;
        position: relative;
        margin-left: 40px; /*mudar tamando na query*/
        text-align: center;
        font-size: 13px;

    }

    .botao{
        width: 100%;
        height: 30px;
        background-color: rgb(17, 105, 37);
        color: #fff;
        border: 1px solid rgb(17, 105, 37);
        position: relative;
        margin:auto; /*mudar tamando na query*/
        text-align: center;
        border: 1px solid #fff;
        border-radius: 5px;
        text-decoration: none;
        padding: 2px;
        font-size: 12px;
    }

    .botao:hover{
        background-color: #fff;
        color: rgb(17, 105, 37);
        border: 1px solid rgb(17, 105, 37);
    }

    @media (max-width:  991px) {
        .card-sorteio{
            width: 220px!important;
        }
    }
    @media (max-width:  575.2px) {
        .card-sorteio{
            width: 300px!important;
        }
    }

    .topo{
        width: 100%;
        height: auto ;
        margin: auto;
    }


    .div-ex-1{
        background-color: #e0ffe4;
        height: 100%;
        width: auto;
        position: relative;
    }

    .div-ex-1 img{
        height: 100%;
        width: auto;
        margin: auto;
        position: relative;
    }

    .div-ex-2{
        background-color: #73a87a;
        height: 100%;
        width: auto;
        position: relative;
    }

    .div-ex-2 img{
        height: 100%;
        width: auto;
        margin: auto;
        position: relative;
    }

    .div-ex-3{
        background-color: #3c8646;
        height: 100%;
        width: auto;
        position: relative;
    }

    .div-ex-3 img{
        height: 100%;
        width: auto;
        margin: auto;
        position: relative;
    }


</Style>
    <div class="div-geral">


        <div class="topo">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <div class="div-ex-1">
                        <img src="{{ asset('img/homem_sortudo1.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                      {{-- <h5>Sorteios</h5>
                      <p>Veja como é simples participar!</p> --}}
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <div class="div-ex-2">
                        {{-- aqui vai colocar uma imagem com os sorteios, ensinando a pessoa a escolher o sorteio --}}
                        <img src="{{ asset('img/homem_sortudo2.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                      {{-- <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p> --}}
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="div-ex-3">
                        {{-- aqui vai colocar uma imagem com os sorteios, ensinando a pessoa a participar do sorteio --}}
                        <img src="{{ asset('img/homem_sortudo3.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                      {{-- <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p> --}}
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

        </div>
        <div class="album py-5">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    @foreach ($sorteios as $sorteio)
                    <div class="col">
                        <a style="text-decoration: none; color: black;" href="{{ route('sorteio', ['nome' => $sorteio->nome]) }}">
                            <div class="card-sorteio">
                                <div class="card-top">

                                </div>
                                <div class="card-top-2">
                                    <div style="height: 25px">

                                    </div>
                                    <div class="card-img">

                                    </div>
                                </div>
                                <div class="conteudo">
                                    <div class="nome">
                                        <p> {{ mb_strimwidth($sorteio->nome, 0, 100, '...') }} </p>
                                    </div>
                                    <div class="valor">
                                        <p>{{ mb_strimwidth($sorteio->description_card, 0, 100, '...') }}</p>
                                    </div>
                                </div>
                                <div class="div-bottom">
                                    <div class="div-botao">
                                        @if($sorteio->ativo == true)
                                        <a href="{{ route('sorteio', ['nome' => $sorteio->nome]) }}" class="botao">  Participar </a>
                                        @else
                                        <a href="{{ route('sorteio', ['nome' => $sorteio->nome]) }}" class="botao"> Ver Ganhador </a>
                                        @endif
                                    </div>
                                    <div class="div-chances">
                                        <p> {{(1/($sorteio->numbers))*100}}% de chance.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        {{-- <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                                    dy=".3em">Imagem</text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text">
                                    {{ mb_strimwidth($sorteio->nome, 0, 100, '...') }}
                                </p>
                                <p class="card-text">
                                    {{ mb_strimwidth($sorteio->description_card, 0, 100, '...') }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        @if($sorteio->ativo == true)
                                        <a href="{{ route('sorteio', ['nome' => $sorteio->nome]) }}" class="btn btn-sm btn-outline-secondary">Participar</a>
                                        @else
                                        <a href="{{ route('sorteio', ['nome' => $sorteio->nome]) }}" class="btn btn-sm btn-outline-secondary">Ver Ganhador</a>
                                        @endif
                                    </div>
                                    <small class="text-muted">{{(1/($sorteio->numbers))*100}}% de chance.</small>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
{{-- footer --}}

<footer>
    <div class="footer-1">
        <div class="footer-1-top">
            <h3><p>Sigam nossas redes sociais!<h3></p>
        </div>

        <div class="sociais">
            <a><div class="email img-sociais"></div></a>
            <a><div class="facebook img-sociais"></div></a>
            <a><div class="instagram img-sociais   "></div></a>
        </div>
    </div>
    <div class="footer-2">
        <p>Copyright &copy DeuPix - 2022</p>
    </div>
</footer>

@endsection
