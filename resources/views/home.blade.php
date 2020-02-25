@extends('layouts.app')
@section('title','Panel de control')
@section('script-top')
@parent
@endsection
@section('script-bottom')
{{-- <script type="text/javascript" src="{{asset("assets/js/charts/loader.js")}}"></script> --}}
{{-- <script type="text/javascript" src="{{asset("assets/js/charts/charts.js")}}"></script> --}}
@parent
@endsection
@section('style')
    @parent
@endsection
@section('navbar')
    @include('include.navbar')
@endsection
@section('sidebar')
    @include('include.sidebar')
@endsection
@section('footer')
    @include('include.footer')
@endsection
@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Panel de control</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">

                @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
                @elseif(session('admin'))
                <div class="alert alert-info" role="alert">
                    <li>{{session('admin')}}</li>
                </div>
                @elseif(session('docente'))
                <div class="alert alert-info" role="alert">
                    <li>{{session('docente')}}</li>
                </div>
                @endif

              <div class="card-header">
                <h3 class="card-title">Panel de control</h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
                <!--Div that will hold the pie chart-->
                {{-- <div class="row">
                    <div class="col-6"><div id="chart_div"></div></div>
                </div> --}}


                {{-- AQUI EL CHARTS --}}
                <html>
                    <head>
                      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                      <script type="text/javascript">
                        // var cupo = "echo $value->cupo";
                        // var descripcion = 'echo $value->descripcion';
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var valor = 2;

                          var data = google.visualization.arrayToDataTable([
                            ['Seccion', 'Cupos Disponible'],
                            // foreach para el dato php nativo
                            ['Propiedades', valor]
                            // [descripcion,cupo],
                          ]);

                          var options = {
                            title: 'Mostrar seccion y cupos'
                          };

                          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                          chart.draw(data, options);
                        }
                      </script>
                    </head>
                    <body>
                      <div id="piechart" style="width: 900px; height: 500px;"></div>
                    </body>
                  </html>
                {{-- AQUI FINALIZA CHARTS --}}


              </div>
              <!-- /.card-body -->
            <div class="card-footer">
                Laravel 5.8.*
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

</div>
@endsection
