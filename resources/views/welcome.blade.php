@extends('layouts.app')
@section('content')

<link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap"
      rel="stylesheet"
    />

<style>

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .div_top_2{
        width: 100%;
        height: auto;
        background-color: rgb(205, 250, 249); 
        padding-top: 30px!important;
    }

    .fundo_verde{
        background-color: rgb(4, 141, 4)!important;
    }

    .fundo_cinza{
        background-color: rgb(210, 222, 210)!important;
    }

    .img_top_esquerda{
        height: auto;
        width: 100%;
    }

    .video{
        border-radius: 20px; 
        width: 100%;
    }

    .btn-primary{
        background-color: rgb(22, 194, 108)!important;
        border: 0px;
    }

    .btn-primary:hover{
        background-color: rgb(171, 249, 218)!important;
        color: rgb(22, 194, 191)!important;
        border: 0px;
    }

    .borda_redonda_20px{
        border-radius: 20px!important;
    }

    .img_sorteio{
        width: 30px;
        height: 30px;
    }

    .row {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .card {
        border-radius: 5px;
        box-shadow: 7px 7px 13px 0px rgba(50, 50, 50, 0.22);
        padding: 30px;
        margin: 20px;
        width: 400px;
        transition: all 0.3s ease-out;
    }

    .card:hover {
        transform: translateY(-5px);
        cursor: pointer;
    }
    
    .card p {
        color: #a3a5ae;
        font-size: 16px;
    }
    
    .image {
        float: right;
        max-width: 64px;
        max-height: 64px; 
        margin-right: 0px; 
    }

    .blue {
        border-left: 3px solid #4895ff;
    }
    
    .green {
        border-left: 3px solid #3bb54a;
    }
    
    .red {
        border-left: 3px solid #b3404a;
    }

    .card-interno{
        position: relative;
        display: flex;
        margin: auto;
    }

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

    .alert-box{
        width: 250px;
        height: 200px;
        background-color: #7d7d7d;
        margin: auto;
        margin-bottom: 50px; 
    }

    .alert-box p{
        text-align: justify;
        margin: 15px;
        color: #fff
    }

    .alert-box button{
        position: relative;
        margin-top: 90px;
        margin-left: 45px; 
        font-size: 13px;
        width: 170px;
        height: 30px;
        background-color: #fff; 
        border: 0;
    }

    .alert-box button:hover{
        color: #fff;
        background-color: #535050;
    }

</style>

<script type="text/javascript">
    function ocultarDiv(){ 
        document.getElementById('alert-box').style.display = 'none';
    }
</script>


<!-- Page Content-->    
<div class="div_top_2">
    <div class="container px-4 px-lg-5 ">
        <img class="img_top_esquerda"  src={{ asset('img/homem_sortudo.png') }} alt="DeuPix">
    </div>
</div>
<div class="container px-4 px-lg-5">

    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7">
            <iframe class="video" width="600" height="320" src="https://www.youtube.com/embed/FEPyetXS_w4">
            </iframe>
        </div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">DeuPix te oferece sorteios rápidos, praticos e seguros!</h1>
            <p>Somos uma plataforma automatizada de sorteios, tente a sorte com a gente, temos varios tipos de sorteios.</p>
            <a class="btn btn-primary" href="{{ route('home') }}">Quero Ganhar!</a>
        </div>
    </div>
</div>
<!-- Call to Action-->

<div class="container px-4 px-lg-5">
    <!-- cards -->
    <div class="row">
        <div class="card green">
            <div class="card-interno">   
                <img class="image" src="{{ asset('img/dinheirinho.png') }}" alt="money" />
            </div> 
            <div class="card-interno">
                <h2>R$ 1.000,00</h2>
            </div>
            <div class="card-interno">
                <p>Sorteio de 1 mil reais no pix, um bom premio porém avalia suas chances de ser o ganhador.</p>
            </div>
            <div class="card-interno">
                <a class="btn btn-primary btn-sm" href="{{ route('home') }}">Quero participar</a>
            </div>
        </div>

        <div class="card green">
            <div class="card-interno">   
                <img class="image" src="{{ asset('img/dinheirinho.png') }}" alt="money" />
            </div> 
            <div class="card-interno">
                <h2>R$ 500,00</h2>
            </div>
            <div class="card-interno">
                <p>O sorteio de quinhentos reais oferece maiores chances de vitória.</p>
            </div>
            <div class="card-interno">
                <a class="btn btn-primary btn-sm" href="{{ route('home') }}">Quero participar</a>
            </div>
        </div>

        <div class="card green">
            <div class="card-interno">   
                <img class="image" src="{{ asset('img/dinheirinho.png') }}" alt="money" />
            </div> 
            <div class="card-interno">
                <h2>R$ 100,00</h2>
            </div>
            <div class="card-interno">
                <p>Este sorteio oferece a maior chance de vitória, porém sua premiação é bem baixa.</p>
            </div>
            <div class="card-interno">
                <a class="btn btn-primary btn-sm" href="{{ route('home') }}">Quero participar</a>
            </div>
        </div>

        <div class="card green">
            <div class="card-interno">   
                <img class="image" src="{{ asset('img/dinheirinho.png') }}" alt="money" />
            </div> 
            <div class="card-interno">
                <h2>R$ 10,00</h2>
            </div>
            <div class="card-interno">
                <p>Sorteio de 10 reais no pix, premio baixo mas com grandes chances.</p>
            </div>
            <div class="card-interno">
                <a class="btn btn-primary btn-sm" href="{{ route('home') }}">Quero participar</a>
            </div>
        </div>
    </div>
</div>

</div>
<!-- Footer-->

<div class="alert-box" id="alert-box">
    <p>
        Sistema permitido apenas para maiores de 18 anos!
    </p>
    <div>
        <button onclick="ocultarDiv()">
            Tenho mais de 18 anos
        </button>
    </div>
</div>

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
