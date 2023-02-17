<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- favicon --}}


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .img_logo {
            max-width: 200px;
        }

        .borda_inferior_verde {
            border-bottom: 2px solid #ffffff;

        }

        .borda_inferior_verde:hover {
            /* border-bottom: 2px solid rgb(43, 186, 183); */
        }

        .letra_verde:hover {
            color: rgb(43, 186, 183) !important;
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 650px !important;
            }
        }
    </style>

    <!-- landing page header -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('landingpage/css/styles.css') }}" rel="stylesheet" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-234762810-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-234762810-1');
    </script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="img_logo" src={{ asset('img/logo_deu_pix.jpg') }} alt="DeuPix">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if(Route::currentRouteName() !== "home")
                            <li class="nav-item borda_inferior_verde">
                                <a class="nav-link letra_verde" href="{{ route('home') }}">{{ __('Sorteios') }}</a>
                            </li>
                        @endif
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item borda_inferior_verde">
                                    <a class="nav-link letra_verde" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item  borda_inferior_verde">
                                    <a class="nav-link letra_verde"
                                        href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle letra_verde" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <?php
                                    $notifications = DB::table('notifications')
                                    ->where('active', '=', true)
                                    ->where('user_id', '=', Auth::user()->id)
                                    ->orderByDesc('id')->paginate(5);
                                    //dd($notifications->total());
                                ?>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle letra_verde" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    @if($notifications->total() > 0)
                                    <img id="bell-icon" style="max-width: 18px;" src="{{ asset('img/bell-svgrepo-com-red.png') }}" alt="" srcset="">
                                    @else
                                    <img id="bell-icon" style="max-width: 18px;" src="{{ asset('img/bell-svgrepo-com.svg') }}" alt="" srcset="">
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <!--
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Obrigado por se registrar! aproveite os nossos sorteios.') }}
                                    </a>
                                    -->
                                    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
                                        <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                                          <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                                          <span class="fs-5 fw-semibold">Notificações</span>
                                        </a>
                                        @if($notifications->total() > 0)
                                            @foreach ($notifications as $notification)
                                                <div class="list-group list-group-flush border-bottom scrollarea">
                                                    <a href="#" class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
                                                        <div class="d-flex w-100 align-items-center justify-content-between">
                                                            <strong class="mb-1">{{ $notification->title }}</strong>
                                                            <small>{{ $notification->created_at }}</small>
                                                        </div>
                                                        <div class="col-10 mb-1 small">
                                                            {{$notification->notificationText}}
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                            {{ $notifications->links("pagination::bootstrap-5") }}
                                        @else
                                            <small>você não tem notificação.</small>

                                        @endif
                                    </div>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
@yield('scripts')

</html>
