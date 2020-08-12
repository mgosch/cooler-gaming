@extends('layouts.app')

@section('content')
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
        <div class="container">
        <nav class="navbar navbar-light bg-light">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" style="width: 700px;" type="search" name="name" placeholder="Buscar" aria-label="Search">
                                <select name="genre" id="genre">
                                    <option value="">Todos</option>
                                    <option value="Carrera">Carrera</option>
                                    <option value="Aventura">Aventura</option>
                                    <option value="Acción">Acción</option>
                                    <option value="Simulación">Simulación</option>
                                    <option value="Estrategia">Estrategia</option>
                                </select>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                    </nav>
                    <br>
                        <div class="row">
                            <div class="col-sm-6">
                                @foreach($games as $item)
                                <div class="card">
                                    <img src="images/{{$item->image}}" class="card-img-top" alt="image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->name}}</h5>
                                        <p class="card-text">{{$item->description}}</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                                @endforeach()
                            </div>
                        </div>
        </div>
        </body>
</html>
@endsection
