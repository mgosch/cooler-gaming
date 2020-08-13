@extends('layouts.app')

@section('content')
      <div class="container">
        <div class="row">
          <div class="col-md-6">
          <img src="images/{{$detalle->image}}" class="card-img-top" alt="image">
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{$detalle->name}}</h2>
            <p>{{$detalle->description}}</p>
            <p><strong class="text-primary h4">$ {{$detalle->amount}}</strong></p>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
               </div>
              </div>
            <p><a href="#" class="buy-now btn btn-sm btn-primary">Agregar al carrito</a></p>
           </div>
          </div>
        </div>
      </div>
@endsection