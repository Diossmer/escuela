@extends('layouts.app')
@section('title','Periodo Escolar')
@section('script-top')
    @parent
@endsection
@section('script-bottom')
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
            <h1>Inicio</h1>
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
                @elseif(session('seccion'))
                <div class="alert alert-info" role="alert">
                    <li>{{session('seccion')}}</li>
                </div>
                @endif
              <div class="card-header">
                <h3 class="card-title">Dashboard</h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr align="center">
                            <th>Sección</th>
                            <th>Grado</th>
                            <th>Cupo Disponible</th>
                            {{-- <th>Docente</th> --}}
                            <th>Periodo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seccion as $secciones)
                            <tr align="center">
                                <td>{{$secciones->descripcion}}</td>
                                <td>{{$secciones->grado}}</td>
                                <td>{{$secciones->cupo}}</td>
                                <td>Desde: {{$secciones->periodos->periodo_desde}} || Hasta: {{$secciones->periodos->periodo_hasta}}</td>
                                {{-- <td>{{$secciones->user->nombre}}</td> --}}
                                {{-- <td>@foreach ($secciones->periodos as $periodo)
                                    desde: {{$periodo->periodo_desde}} hasta: {{$periodo->periodo_hasta}}
                                @endforeach</td> --}}
                                <td>{!! link_to_route("seccion.edit", "Editar", $secciones->id, ["class"=>"btn btn-success"]) !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
