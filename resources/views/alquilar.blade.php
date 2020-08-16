@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css">
<link rel="stylesheet" href="<?php echo asset('css/alquiler.css')?>" type="text/css"> 

      <div class="container">
        <div class="row">
          <div class="col-md-6">
          <img src="../images/{{$detalle->image}}" class="card-img-top" alt="image">
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{$detalle->name}}</h2>
            <p>{{$detalle->description}}</p>
            <p><strong>Premio: </strong> {{$detalle->reward_cooler_coins}} cooler coins</p>
            <p><strong class="text-primary h4">$ {{ $price_rent }}</strong></p>
            <p><a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal"
                       data-id="{{$detalle->id}}" data-name="{{$detalle->name}}" data-price="{{$price_rent}}">Agregar al carrito</a></p>
           </div>
          </div>
        </div>
      </div>
      <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
          <div class="row justify-content-left">
            <div class="col-md-7 site-section-heading text-center pt-4" style="display: inline-flex;">
              <h2>Comentarios</h2>
              <p><a href="" class="btn btn-success" data-toggle="modal" data-target="#myComment" data-id="{{$detalle->id}}" style="right: 0;
    position: absolute;">Agregar comentario</a></p>
            </div>
          </div>
          <br>
          <div class="contenedor_comentarios">
            <div class="col-md-12">
              <div class="nonloop-block-3 owl-carousel">
                @foreach($comments as $comment)
                <div class='item text-white bg-secondary mb-3'>
                  <div class="block-4" style= "width: 20rem; margin-right: 10px;">
                      <div class="comentario_box">
                          <p class="card-text">{{$comment->comment}}</p>
                      </div>
                  </div>
                </div>
                @endforeach()
              </div>
            </div>
          </div><br>
      </div>
      </div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form role="form" action="{{url('add-to-car')}}" method="POST">
      @csrf
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" style="position:absolute;">Agregar juego</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <input class="form-control" id="game-id" name="id" type="hidden">
            <div class="form-group">
              <label>Nombre</label>
              <input class="form-control" id="game-name" readonly>
            </div>
            <div class="form-group">
              <label>Precio</label>
              <input class="form-control" id="game-price" readonly>
            </div>
            <div class="form-group">
              <label>Horas</label>
              <input class="form-control" value="1" type="number" min="1" step="1" name="quantity">
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
    </form>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="myComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form role="form" action="{{url('add-comment')}}" method="POST">
      @csrf
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" style="position:absolute;">Agregar comentario</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
          <input class="form-control" id="game-id" name="id" type="hidden">
            <div class="form-group">
              <label>Comentario</label>
              <input class="form-control" name="comment">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
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
      $('#myModal').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var name = $(e.relatedTarget).data('name');
        var price = $(e.relatedTarget).data('price');

        $(e.currentTarget).find('#game-id').val(id);
        $(e.currentTarget).find('#game-name').val(name);
        $(e.currentTarget).find('#game-price').val(price);
      });
    })
  </script>
    <script>
    $(function () {
      $('#myComment').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');

        $(e.currentTarget).find('#game-id').val(id);
      });
    })
  </script>
@endsection