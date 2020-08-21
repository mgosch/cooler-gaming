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
        <div class="wrapper">
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
        <div class="push"></div>
        </div>
        @include('layouts.footer')
    </body>
</html>

