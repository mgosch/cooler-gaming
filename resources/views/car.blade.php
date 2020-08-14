@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Carrito</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
          @if(\App\Car::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first())
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
              <th>Nombre</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Total</th>
            </tr>
            </thead>
            <tbody>
              @php $car = \App\Car::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first() @endphp
              @foreach($car->getProducts() as $item)
                <tr class="odd gradeX">
                <td>{{$item->game->name}}</td>
                  <td>{{$item->quantity}}</td>
                  <td>{{$item->game->amount}}</td>
                  <td>{{$item->game->amount * $item->quantity}}</td>
                </tr>
              @endforeach

            <tr>
              <td></td>
              <td></td>
              <td>Total:</td>
              <td>$ {{$car->getTotal()}}</td>
            </tr>
            </tbody>
          </table>
            <a href="{{url('shop')}}" class="btn btn-success">Alquilar</a>
          @else
            <i>Ningun producto agregado</i>
          @endif
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form role="form" action="{{url('add-to-car')}}" method="POST">
      @csrf
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Agregar juego</h4>
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
              <label>Cantidad</label>
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
@endsection