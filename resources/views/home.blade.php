@extends('layouts.app')

@section('content')
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
                                <div class="block-4 text-center">
                                    <img src="images/{{$item->image}}" class="card-img-top" alt="image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->name}}</h5>
                                        <p class="card-text">{{$item->description}}</p>
                                        <a href="{{route('alquilar', $item->id)}}" class="btn btn-primary">Alquilar</a>
                                    </div>
                                </div>
                                @endforeach()
                            </div>
                        </div>
        </div>

@endsection
