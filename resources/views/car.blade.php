@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="<?php echo asset('css/car.css')?>" type="text/css">
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
<div class="wrapper">
  <div class="container">
      <div class="col-lg-12">
        <h1 class="page-header">Carrito</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="container">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!-- /.panel-heading -->
          <div class="panel-body">
            @if((\App\Car::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first()->getProducts())->first())
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                <th>Nombre</th>
                <th>Horas</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Cooler Coins</th>
              </tr>
              </thead>
              <tbody>
                @php $car = \App\Car::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first() @endphp
                @php $coins = \Illuminate\Support\Facades\Auth::user()->total_cooler_coins @endphp
                @foreach($car->getProducts() as $item)
                  <tr class="odd gradeX">
                    <td>{{$item->game->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>$ {{number_format(($item->game->amount * $item->game->percentaje_rent) / 100, 2, ',' , '.')}}</td>
                    <td>$ {{number_format(($item->game->amount * $item->game->percentaje_rent) / 100 * $item->quantity, 2, ',' , '.')}}</td>
                    <td>{{number_format($item->game->reward_cooler_coins * $item->quantity, 2, ',' , '.')}}</td>
                    <td class="no-borders">
                      <a href="{{url('delete-to-car', [$item->game->id, $item->quantity])}}">
                          <img type="submit" src="/svg/delete.svg" class="icon_delete">
                        </a>
                    </td>
                  </tr>
                @endforeach

              <tr>
                <td></td>
                <td></td>
                <td>Total:</td>
                <td>$ {{number_format($car->getTotal(),2, ',' , '.')}}</td>
                <td>{{number_format($car->getTotalCoins(), 2, ',' , '.')}} cooler coins</td>
              </tr>
              </tbody>
            </table>
              <a href="" class="btn btn-success" data-toggle="modal" data-target="#modalPago" data-coins="{{number_format($coins,2, ',' , '.')}}" data-total="{{number_format($car->getTotal(),2, ',' , '.')}}" data-rewars="{{number_format($car->getNewCoins(),2, ',' , '.')}}"
              data-diferencia="{{number_format($car->getDif(),2, ',' , '.')}}">Alquilar</a>
              <a href="{{url('home')}}" class="btn btn-success">Cancelar</a>
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
    <div class="push"></div>
  </div>
</div>
@if((\App\Car::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first()->getProducts())->first())
<div class="modal fade" id="modalPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form role="form" action="{{url('shop')}}">
      @csrf
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" style="position:absolute;">Pagar</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body" style="display: flex;">
            <div class="col-sm-6">
            <input class="form-control" id="game-id" name="id" type="hidden">
              <div class="form-group">
                <label>Importe total</label>
                <input class="form-control" id="car-total" readonly>
              </div>
              <div class="form-group">
                <label>Total a pagar</label>
                <input class="form-control" id="dif" name="dif" readonly>
              </div>
              @if($car->getDif()>0)
              <div class="form-group">
                <label>Número tarjeta de credito</label>
                <input class="form-control" name="tc" type="number">
              </div>
              @endif
          </div>
          <div class="col-sm-6">
            <input class="form-control" id="game-id" name="id" type="hidden">
              <div class="form-group">
                <label>Cooler coins descontadas</label>
                <input class="form-control" id="coins-total" readonly>
              </div>
              <div class="form-group">
                <label>Cooler coins disponibles</label>
                <input class="form-control" id="new-coins" readonly>
              </div>
              @if($car->getDif()>0)
              <div class="form-group">
                <label>Nombre y Apellido</label>
                <input class="form-control" name="name">
              </div>
              @endif
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success">Pagar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
    </form>
    <!-- /.modal-dialog -->
</div>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(function () {
      $('#modalPago').on('show.bs.modal', function (e) {
        var total = $(e.relatedTarget).data('total');
        var coins = $(e.relatedTarget).data('coins');
        var newCoins = $(e.relatedTarget).data('rewars');
        var dif = $(e.relatedTarget).data('diferencia');
        if(dif < '0') {
          dif = '0,00';
          coins = total;
        }

        $(e.currentTarget).find('#car-total').val(total);
        $(e.currentTarget).find('#coins-total').val(coins);
        $(e.currentTarget).find('#dif').val(dif);
        $(e.currentTarget).find('#new-coins').val(newCoins);
      });
    })
  </script>
@include('layouts.footer')
@endsection