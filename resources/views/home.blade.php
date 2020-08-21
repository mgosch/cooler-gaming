@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 
<link rel="stylesheet" href="<?php echo asset('css/footer.css')?>" type="text/css"> 

@if ( session()->has('message') )
    <div class="alert alert-success"> 
        <button type="button" 
            class="close" 
            data-dismiss="alert" 
            aria-hidden="true">&times;</button>
        {!! session()->get('message') !!} 
    </div>
@endif

    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
                <input class="form-control mr-sm-2" style="width: 700px;" type="search" name="name" placeholder="Buscar" aria-label="Search">
                <select name="genre" id="genre" style= "margin-right: 10px;">
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
            <div class="col-md-6">
                @foreach($games as $item)
                <div class="contenido-lindo">
                    <img src="images/{{$item->image}}" class="card-img-top" alt="image">
                    <div class="card-body-top">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                    <div class="card-body-bottom">
                            <a href="{{route('alquilar', $item->id)}}" class="btn btn-primary">Alquilar</a>
                    </div>
                    
                </div>
                @endforeach()
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
