@extends('layouts.app')

@section('content')
<div class="wrapper">
  <div class="container">
      <div class="col-lg-12">
        <h1 class="page-header">Top 10 de juegos</h1>
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
                <th>Nombre</th>
              </tr>
              </thead>
              <tbody>
                @foreach($rents as $rent)
                  <tr class="odd gradeX">
                    <td>$rent</td>
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
