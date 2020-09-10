@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

<div class="wrapper">
  <div class="container">
      <div class="col-lg-12">
        <h1 class="page-header">ABM de juegos</h1>
        <p><a href="" class="btn btn-success" data-toggle="modal" data-target="#newGame" style="right: 0;position: absolute;">Agregar juego</a></p>
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
<div class="modal fade" id="newGame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form role="form" action="{{url('add-game')}}" method="POST">
      @csrf
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" style="position:absolute;">Alta de juego</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label>Descripción</label>
            <input class="form-control" name="description" id="description" required>
          </div>
          <div class="form-group">
            <label>Porcentaje de alquiler</label>
            <input class="form-control" value="1" type="float" min="1" step="1" name="percentaje" id="percentaje" required>
          </div>
          <div class="form-group">
            <label>Precio</label>
            <input class="form-control" value="1" type="float" min="1" step="1" name="amount" id="amount" required>
          </div>
          <div class="form-group">
            <label>Premio</label>
            <input class="form-control" value="1" type="float" min="1" step="1" name="rewards" id="rewards" required>
          </div>
          <div class="form-group">
            <label>Categoria</label>
            <select name="genres" id="genres" required>
                    <option value="Carrera">Carrera</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Acción">Acción</option>
                    <option value="Simulación">Simulación</option>
                    <option value="Estrategia">Estrategia</option>
            </select>
          </div>
          <div class="form-group">
            <label>Imagen</label>
            <input name="image" id="image" type="file" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success">Alta</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
    </form>
    <!-- /.modal-dialog -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(function () {
      $('#newGame').on('show.bs.modal', function (e) {
      });
    })
  </script>

@include('layouts.footer')


@endsection
