@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css">
<link rel="stylesheet" href="<?php echo asset('css/car.css')?>" type="text/css">

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
            </tr>
            </thead>
            <tbody>
              @php $car = \App\Car::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first() @endphp
              @foreach($car->getProducts() as $item)
                <tr class="odd gradeX">
                  <td>{{$item->game->name}}</td>
                  <td>{{$item->quantity}}</td>
                  <td>{{((int)($item->game->amount * $item->game->percentaje_rent) / 100)}}</td>
                  <td>{{((int)($item->game->amount * $item->game->percentaje_rent) / 100) * $item->quantity}}</td>
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
              <td>$ {{$car->getTotal()}}</td>
            </tr>
            </tbody>
          </table>
            <a href="{{url('shop')}}" class="btn btn-success">Alquilar</a>
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

@include('layouts.footer')
@endsection