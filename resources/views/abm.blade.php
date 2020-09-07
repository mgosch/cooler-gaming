@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

<div class="wrapper">
  <div class="container">
      <div class="col-lg-12">
        <h1 class="page-header">ABM de juegos</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="container">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!-- /.panel-heading -->
          <div class="panel-body">
            @if($games->count()>0)
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                <th>Nombre</th>
                <th>Descripción</th>
              </tr>
              </thead>
              <tbody>
                @foreach($games as $game)
                  <tr class="odd gradeX">
                    <td>{{$game->name}}</td>
                    <td>{{$game->description}}</td>
                    <td class="no-borders">
                      <a href="">
                          <img type="submit" src="/svg/delete.svg" class="icon_delete">
                        </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            @else
              <i>No hay juegos cargados</i>
            @endif
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
