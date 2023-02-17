@extends('layouts.app')
@section('content')

<style>

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

    .div-ex-4{
        background-color: #144a1b;
        height: 100%;
        width: auto;
        position: relative;
    }

    .div-ex-4 img{
        height: 100%;
        width: auto;
        margin: auto;
        position: relative;
    }


    .conteudo{
        height: auto;
        width: 100%;
        position: relative;
        margin: auto;
    }

    .t1{
        font-family: poppins;
        color: #000!important;
    }

    .t2{
        font-family: poppins;
        color: #fff!important;
    }


    /* footer */

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


    /* bilhete */

    .div-bilhete{
        padding: 20px;
        width: 100%;
        height: auto;
        position: relative;
        margin-top: 100px;
        margin-left: auto;
        margin-right: auto;
    }

    .bilhete{
        min-width: 400px;
        max-width: 900px;
        padding: 20px;
        height: auto;
        background-color: rgb(255, 211, 171);
        position: relative;
        margin: auto;
        /* border-left: 5px dashed  rgb(70, 9, 9);  */
    }

    .bilhete-topo{
        min-width: 400px;
        max-width: 900px;
        height: 20px;
        background-color: rgb(3, 71, 21);
        position: relative;
        margin: auto;
    }

    .titulo{
        height: 40px;
        width: auto;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        color: rgb(61, 29, 5);
    }

     .titulo p{
        font-size: 30px;
        font-family: poppins;
        text-align: center;
    }

    .bilhete-numero{
        margin-top: 15px;
        height: auto;
        width: 100%;
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }

    .numero-sorteio{
        width: 50px;
        height: 30px;
        background-color: rgb(3, 71, 21);
        position: relative;
        margin: auto;
        color: #fff;
        font-family: poppins;
        border: none;
    }

    .numero-sorteio:hover{
        color: rgb(3, 71, 21);
        background-color: #fff;
    }

    .numero-sorteio-premiado{
        width: 50px;
        height: 30px;
        background-color: rgb(246, 255, 0);
        position: relative;
        margin: auto;
        color: rgb(0, 0, 0);
        font-family: poppins;
        border: none;
    }

    .numero-sorteio-premiado:hover{
        cursor:unset;
    }


    .numero-sorteio-vendido{
        width: 50px;
        height: 30px;
        background-color: rgb(51, 51, 51);
        position: relative;
        margin: auto;
        color: #fff;
        font-family: poppins;
        border: none;
    }

    .numero-sorteio-vendido:hover{
        cursor: unset;
    }

    /* modal */

    .modal-body {
        background-color: rgb(239, 239, 239);
        border: none;
    }


    .close {
        color: #000;
        cursor: pointer;
    }

    .close:hover {
        color: #000;
    }


    .theme-color{

        color: #004cb9;
    }
    hr.new1 {
        border-top: 2px dashed #fff;
        margin: 0.4rem 0;
    }


    .btn-primary {
        color: #fff;
        background-color: #004cb9;
        border-color: #004cb9;
        padding: 12px;
        padding-right: 30px;
        padding-left: 30px;
        border-radius: 1px;
        font-size: 17px;
    }


    .btn-primary:hover {
        color: #fff;
        background-color: #004cb9;
        border-color: #004cb9;
        padding: 12px;
        padding-right: 30px;
        padding-left: 30px;
        border-radius: 1px;
        font-size: 17px;
    }

    .topo-modal{
        background-color: rgb(3, 71, 21);
        margin: auto;
        position: relative;
        height: 20px;
        width: 100%;
        cursor: pointer;
    }

    .botao{
        margin: auto;
        position: relative;
        width: 90px;
        height: 30px;
        background-color: rgb(174, 18, 18);
        text-align: center;
        border: none;
        color: #fff;
    }

    .botao:hover{
        background-color: #fff;
        color: rgb(174, 18, 18);
    }

    .botao-copiar{
        margin: auto;
        position: relative;
        width: 90px;
        height: 30px;
        background-color: rgb(0, 91, 11);
        text-align: center;
        border: none;
        color: #fff;
    }

    .botao-copiar:hover{
        background-color: #fff;
        color: rgb(0, 91, 11);
    }

    .notice {
        padding: 15px;
        background-color: #fafafa;
        border-left: 6px solid  #deda00;;
        margin-bottom: 10px;
        margin-left:auto;
        margin-right:auto;
        width: 400px;
        -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
        -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
        box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
        position: relative;
        font-size: 20px;
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

    <!-- Button trigger modal -->
    <button hidden type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    {{-- modal --}}

    <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style="font-family: poppins;">
            <div class="modal-content">
                <div class="topo-modal" data-bs-dismiss="modal"></div>

                <div class="modal-body">
                    <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i>
                    </div>
                    <div hidden id="alert_success" class="alert alert-success" role="alert">
                        Compra aprovada com sucesso!
                    </div>

                    <div class="px-4 py-5">
                        <h5 class="modal-title " id="exampleModalLabel">Pagamento do numero: </h5>
                        <div style="height: 40px"></div>
                        <span class="theme-color">Descrição da Compra</span>
                        <div class="mb-3">
                            <hr class="new1">
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="font-weight-bold">Valor da transferência:</span>
                            <span class="text-muted" id="total"></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="font-weight-bold">Status da transferência:</span>
                            <span class="text-muted" id="status"></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="font-weight-bold"> QRCode expira em: </span>
                            <span class="text-muted" id="expira"></span>
                        </div>
                    </div>

                    <div class="container" id="containerPix">
                        <div class="row align-items-center">
                            <div class="col">
                                <div>
                                    <img id="qr-code-img" src="" style="width: 250px; height: 250px;">
                                </div>

                            </div>
                            <div class="col">
                                <div>
                                    <label for="copiar">
                                        <h6 class=""> PIX copia e cola</h6>
                                    </label>
                                    <h6 class="">
                                        <input type="text" id="copiar" value="" />
                                        <label id="copiado"></label>
                                    </h6>
                                    <div class="">
                                        <button class="botao-copiar" onclick="copiarTexto()">
                                            Copiar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button class="botao" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    {{-- <div class="modal fade"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pagamento do numero: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div hidden id="alert_success" class="alert alert-success" role="alert">
                        Compra aprovada com sucesso!
                    </div>
                    <div>
                        <div id="valor_transferencia" class="centro espaco-vertical justify-content-center ">
                            <label for="total">
                                <h6 class="">Valor da transferência: &nbsp </h6>
                            </label>
                            <h6 class="text-secondary  d-inline-block"><span name="total" id="total"></span></h6>
                        </div>


                        <div class="centro justify-content-center espaco-vertical">
                            <label for="status">
                                <h6 class=""> Status do pagamento: </h6>
                            </label>
                            <h6 class="text-secondary  d-inline-block"><span id="status" name="status"></span></h6>
                            <div id="expirado_div"></div>
                        </div>

                        <div id="qrcode_div" class="centro justify-content-center espaco-vertical">
                            <label for="expira">
                                <h6 class=""> QRCode expira em: </h6>
                            </label>
                            <h6 class="text-secondary  d-inline-block"><span id="expira" name="expira"></span></h6>
                        </div>

                        <div style="height: 30px!important"></div>
                    </div>

                    <!-- Portfolio Section Heading-->
                    <div class="text-center" id="txtModal">
                        <h4 class="text-primary  d-inline-block">No aplicativo do seu banco, escaneie o QRCode ou copie o
                            código e pague com a funcao pix copia e cola.</h4>
                    </div>

                    <div class="container" id="containerPix">
                        <div class="row align-items-center">
                            <div class="col">
                                <div>
                                    <img id="qr-code-img" src="" style="width: 250px; height: 250px;">
                                </div>

                            </div>
                            <div class="col">
                                <div>
                                    <label for="copiar">
                                        <h6 class=""> PIX copia e cola</h6>
                                    </label>
                                    <h6 class="">
                                        <input type="text" id="copiar" value="" />
                                        <label id="copiado"></label>
                                    </h6>
                                    <div class="">
                                        <button class="btn btn-success" onclick="copiarTexto()">
                                            Copiar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- pagina --}}

    <div class="conteudo">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <div class="div-ex-1">
                    <img src="{{ asset('img/homem_sortudo4.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block t1">
                  {{-- <h1>{{ $sorteio->description_card }}</h1>
                  <h3>Veja como funciona!</h3> --}}
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <div class="div-ex-2">
                    {{-- aqui vai colocar uma imagem com os sorteios, ensinando a pessoa a escolher o sorteio --}}
                    <img src="{{ asset('img/homem_sortudo5.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block t2">
                    {{-- <h1>{{ $sorteio->description_card }}</h1>
                    <h3>Veja como funciona!</h3> --}}
                </div>
              </div>
              <div class="carousel-item">
                <div class="div-ex-3">
                    {{-- aqui vai colocar uma imagem com os sorteios, ensinando a pessoa a participar do sorteio --}}
                    <img src="{{ asset('img/homem_sortudo6.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block t2">
                    {{-- <h1>{{ $sorteio->description_card }}</h1>
                    <h3>Veja como funciona!</h3> --}}
                </div>
              </div>
              <div class="carousel-item">
                <div class="div-ex-4">
                    {{-- aqui vai colocar uma imagem com os sorteios, ensinando a pessoa a participar do sorteio --}}
                    <img src="{{ asset('img/homem_sortudo7.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block t2">
                    {{-- <h1>{{ $sorteio->description_card }}</h1>
                    <h3>Veja como funciona!</h3> --}}
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

    <div style="height: 100px">

    </div>
    <div class="notice" id="notice">
        <strong></strong>
    </div>

    <div class="div-bilhete">
        <div class="bilhete-topo">

        </div>
        <div class="bilhete">
            <div class="titulo">
                <p>{{ $sorteio->description_card }}</p>
            </div>
            <div class="bilhete-numero d-flex justify-content-center flex-wrap bd-highlight mb-3 p-2">
                @foreach ($numbers as $number)
                <div class="p-2">
                    @if ($number->user_id_purchased !== null && $sorteio->numero_sorteado !== $number->number)
                        <button class="numero-sorteio-vendido" disabled="disabled" onclick="pegarIdBotaoClicadoInserirParaPagamento(this.id)"
                            id="{{ $number->number }}" type="button"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">{{ $number->number }}
                        </button>
                    @elseif($number->user_id_purchased === null)
                        <button class="numero-sorteio"  onclick="pegarIdBotaoClicadoInserirParaPagamento(this.id)"
                            id="{{ $number->number }}" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">{{ $number->number }}
                        </button>
                    @elseif($sorteio->numero_sorteado === $number->number)
                        <script type="text/javascript">
                            desocultarDiv("Sorteio finalizado! Numero Sorteado: "+ {{ $number->number }});
                        </script>
                        <button class="numero-sorteio-premiado" disabled="disabled" onclick="pegarIdBotaoClicadoInserirParaPagamento(this.id)"
                            id="{{ $number->number }}" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">{{ $number->number }}
                        </button>
                    @endif
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <div style="height: 100px">

    </div>

{{--
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto preto">
                @if ($sorteio->numero_sorteado != null)
                    <h1 class="fw-light" style="color: red">Sorteio encerrado, número premiado: {{ $sorteio->numero_sorteado }}</h1>
                @endif
                <h1 class="fw-light">{{ $sorteio->description_card }}</h1>
                <p class="lead text-primary">
                    Basta escolher um número, finalizar a compra com pix e torcer.
                </p>
                <p class="lead text-primary" style="white-space: pre-wrap">
                    {{ $sorteio->description_page }}
                </p>
                <p>
                    <a disabled="disabled" class="btn btn-success my-2">disponiveis</a>
                    <a disabled="disabled" class="btn btn-secondary my-2">vendidos</a>
                    <a disabled="disabled" class="btn btn-danger my-2">Numero Premiado</a>
                </p>
            </div>
            <hr>

            <div>
                Números
            </div>
            <div>
                <div class="d-flex justify-content-center flex-wrap bd-highlight mb-3">
                    @foreach ($numbers as $number)
                        <div class="p-2 bd-highlight">
                            @if ($number->user_id_purchased !== null && $sorteio->numero_sorteado !== $number->number)
                                <button style="width: 50px" onclick="pegarIdBotaoClicadoInserirParaPagamento(this.id)"
                                    id="{{ $number->number }}" type="button" class="btn btn-secondary"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">{{ $number->number }}
                                </button>
                            @elseif($number->user_id_purchased === null)
                                <button style="width: 50px" onclick="pegarIdBotaoClicadoInserirParaPagamento(this.id)"
                                    id="{{ $number->number }}" type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">{{ $number->number }}
                                </button>
                            @elseif($sorteio->numero_sorteado === $number->number)
                                <button style="width: 50px" onclick="pegarIdBotaoClicadoInserirParaPagamento(this.id)"
                                    id="{{ $number->number }}" type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">{{ $number->number }}
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@section('scripts')
    <script>
        var number; //numero selecionado para compra//
        function pegarIdBotaoClicadoInserirParaPagamento(id) {
            number = id;
            document.getElementById("exampleModalLabel").textContent = 'Pagamento do numero: ' + id;
            //alert(id);
            createPaymentWithPix(number);
        }


        function copiarTexto() {
            /* Selecionamos por ID o nosso input */
            var textoCopiado = document.getElementById("copiar");

            /* Deixamos o texto selecionado (em azul) */
            textoCopiado.select();

            /* Copia o texto que está selecionado */
            document.execCommand("copy");
            document.getElementById("copiado").innerText = " Copiado! ";

        }

        function createPaymentWithPix(number) {
                var id_pix;
                //criando pagamento pix do endpoint

                fetch("process_payment", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({
                        payer: {
                            firstName: '{{ $user_name }}',
                            email: '{{ $user_email }}',
                            number: number,
                            id_sorteio: {{ $sorteio->id }}
                        },
                    }),
                })
                .then((response) => response.json())
                .then((res) => {
                    console.log(res.error_message)
                    if(res.error_message){
                        //alert(res.error_message)
                        clearInterval(interval_pix_search)
                        document.getElementById('exampleModalLabel').innerText = "Numero temporariamente indisponivel";
                        document.getElementById('status').innerText = res.error_message;
                        document.getElementById('copiar').hidden = true;
                        document.getElementById('qr-code-img').hidden = true;
                        document.getElementById('expirado_div').hidden = true;
                        document.getElementById('txtModal').hidden = true;
                        document.getElementById('containerPix').hidden = true;
                        document.getElementById('qrcode_div').hidden = true;
                        document.getElementById('valor_transferencia').hidden = true;
                    }else{
                        id_pix = res.id;
                        document.getElementById('status').innerText = res.status;
                        document.getElementById('total').innerText = "R$ "+res.transaction_amount;
                        document.getElementById('copiar').value = res.qrCode;
                        document.getElementById('qr-code-img').src = "data:image/jpeg;base64," + res.qrCodeBase64;
                    }


                });




                //capture the event hide of modal for stop the interval
                var myModalEl = document.getElementById('exampleModal')
                myModalEl.addEventListener('hidden.bs.modal', function (event) {
                    // do something...
                    clearInterval(interval_pix_search);

                    if(document.getElementById("copiar").hidden == true){
                        document.getElementById('exampleModalLabel').innerText = "";
                        document.getElementById('status').innerText = "";
                        document.getElementById('copiar').hidden = false;
                        document.getElementById('qr-code-img').hidden = false;
                        document.getElementById('expirado_div').hidden = false;
                        document.getElementById('txtModal').hidden = false;
                        document.getElementById('containerPix').hidden = false;
                        document.getElementById('qrcode_div').hidden = false;
                        document.getElementById('valor_transferencia').hidden = false;
                    }

                    document.getElementById('status').innerText = "";
                    document.getElementById('expira').innerText = "";
                    document.getElementById('total').innerText = "";
                    document.getElementById('copiar').value = "";
                    document.getElementById('qr-code-img').src = "";
                });
                //a cada 5 segundos, verificando se a transação foi aprovada.
                var interval_pix_search = setInterval(() => {
                    fetch("payment/" + id_pix, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                            },
                            body: JSON.stringify({
                                payer: {
                                    firstName: '{{ $user_name }}',
                                    email: '{{ $user_email }}',
                                    number: number,
                                    id_sorteio: {{ $sorteio->id }}
                                },
                            }),
                        })
                        .then((response) => response.json())
                        .then((res) => {
                                console.log(res)
                                document.getElementById('status').innerText = res.message_status;
                                document.getElementById('expira').innerText = res.expira_em_minutos;
                                if (res.message_status === "accredited" || res.message_status === "approved") {
                                    clearInterval(interval_pix_search);
                                    document.getElementById("alert_success").innerText = "confirmado a compra do numero:  "+ number
                                    document.getElementById("alert_success").hidden = false;
                                    //document.location.reload(true);

                                }


                        });
                }, 5000);
        }

    </script>

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
