@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/reporte.css" type="text/css">

<div class="wrapper">
  <div class="container">
      <div class="col-lg-12 titulo">
        <h1 class="page-header">Top de juegos</h1>
        <a href="{{route('games.excel')}}"  class="icon_down">
            <img type="submit" src="/svg/down.svg">
        </a>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="container">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!-- /.panel-heading -->
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                <th class="header-juego-usuario">Juego</th>
                <th>Cantidad de Alquileres</th>
                <th>Horas alquiladas</th>
              </tr>
              </thead>
              <tbody>
                @foreach($rentals as $rent)
                  <tr class="odd gradeX">
                    <td>{{$rent->name}}</td>
                    <td>{{$rent->rental_count}}</td>
                    <td>{{$rent->total_rent}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
      </div>
      <div class="col-lg-12 titulo">
        <h1 class="page-header">Top de usuarios</h1>
        <a href="{{route('users.excel')}}" class="icon_down">
            <img type="submit" src="/svg/down.svg">
        </a>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="container">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!-- /.panel-heading -->
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                <th class="header-juego-usuario">Usuario</th>
                <th>Cantidad de Alquileres</th>
                <th>Horas alquiladas</th>
              </tr>
              </thead>
              <tbody>
                @foreach($gamers as $user)
                  <tr class="odd gradeX">
                    <td>{{$user->name}}</td>
                    <td>{{$user->rental_count}}</td>
                    <td>{{$user->total_rent}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <div class="push"></div>
  </div>
</div>

@include('layouts.footer')


@endsection
