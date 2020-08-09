<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cooler Gaming</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .card {
                background-color: RGB(250, 247, 245);
                text-align: center;
                display: inline-block;
                width: 310px;
                height: 400px;
                vertical-align: top;
                border-style: outset;
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;
            }

            .card-img-top {
                width: 300px;
            }

            .content {
                height: 86%;
                text-align: left;
                margin-left: 2%;
            }

            .row {
                height: 30%;
                vertical-align: top;
            }

            .link {
                
            }

        </style>
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
        </div>
    </body>
</html>
