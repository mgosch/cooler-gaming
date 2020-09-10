<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cooler Gaming') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Cooler Gaming') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item" style="margin-right: 20px;">
                                <a class="nav-link" href="{{url('acerca')}}">{{ __('Nosotros') }}</a>
                        </li>
                        <li class="nav-item" style="margin-right: 20px;">
                            <a class="nav-link" href="{{ url('/home') }}">Tienda</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            @if((\Illuminate\Support\Facades\Auth::user()->type)==='admin')
                            <li class="nav-item" style="margin-right: 20px;">
                                    <a class="nav-link" href="{{url('abm')}}">{{ __('ABM') }}</a>
                            </li>
                            <li class="nav-item" style="margin-right: 20px;">
                                    <a class="nav-link" href="{{url('reporte')}}">{{ __('Reporte') }}</a>
                            </li>
                            @else
                            <li class="dropdown">
                                <img src="/svg/cart.svg" class="icon_carrito" data-toggle="dropdown">
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                @if(\App\Car::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first())
                                    @foreach(\App\Car::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first()->getProducts() as $item)
                                    <li>
                                    <div>
                                        <strong>{{$item->game->name}}</strong>
                                        <span class="pull-right text-muted">
                                         <em>{{number_format(($item->game->amount * $item->game->percentaje_rent) / 100, 2, ',' , '.')}} c/u</em>
                                        </span>
                                        </div>
                                        <div>Horas: {{$item->quantity}}</div>
                                    </li>
                                    @endforeach
                                @endif
                                <li>
                                    <a class="text-center carrito_display" href="{{url('car')}}">
                                    <strong>Ver carrito</strong>
                                    <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                                </ul>
                                <!-- /.dropdown-messages -->
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
