<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cooler Gaming</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo asset('css/welcome.css')?>" type="text/css"> 
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md bg-blue-500">
                    Cooler Gaming
                </div>
                <img src="images/Logo.jpg" class="img-responsive" alt="image">  
            </div>
        </div>
        <footer>
            <p class="foot-rights">
                2020 Cooler Gaming. Todos los derechos reservados. Todas las marcas registradas pertenecen a sus respectivos dueños en Argentina y otros países. Todos los precios incluyen IVA (donde sea aplicable). 
            </p>
            <p class="foot-rights">
                <a href="https://www.google.com/">Política de Privacidad </a> | <a href="https://www.google.com/"> Información legal </a> | <a href="https://www.google.com/"> Acuerdo de Suscriptor a Steam </a> | <a href="https://www.google.com/"> Reembolsos </a>
            </p>
            <hr>
            <p class="foot-rights">
                <a href="https://www.google.com/">Acerca de Cooler Gaming </a> | <a href="https://www.google.com/"> Empleo </a> | <a href="https://www.google.com/"> Cooler Coins </a> | <img src="images\facebook.png"><a href="https://www.facebook.com/TeamCoolerGaming/"> CoolerGaming </a> | <img src="images\twitter.png"><a href="https://twitter.com/CoolerEsport"> CoolerGaming </a>
            </p>
        </footer>
    </body>
</html>

@include('layouts.footer')