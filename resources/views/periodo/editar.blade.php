@extends('layouts.app')
@section('title','Editar')
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
            <h1>Periodo Escolar</h1>
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
                @endif
              <div class="card-header">
                <h3 class="card-title">Periodo Escolar</h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
                {!! Form::open(['route'=>['periodo.update',$periodo->id],'method'=>'put', 'autocomplete'=>'off']) !!}
                {!! Form::token() !!}
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::label("periodo_desde", "Periodo Desde", ["class"=>"label label-primary"]) !!}
                        {!! Form::date("periodo_desde","$periodo->periodo_desde", ["class"=>"form-control","min"=>"2018-01-01"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("periodo_hasta", "Periodo Hasta", ["class"=>"label label-primary"]) !!}
                        {!! Form::date("periodo_hasta", "$periodo->periodo_hasta", ["class"=>"form-control","min"=>"2018-01-01"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("fecha_inicio", "Fecha de Inicio", ["class"=>"label label-primary"]) !!}
                        {!! Form::date("fecha_inicio", "$periodo->fecha_inicio", ["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("estatus", "Estatus", ["class"=>"label label-primary"]) !!}
                        {!! Form::select("estatus", [
                            "activo"=>"Activo",
                            "regular"=>"Regular",
                            "inactivo"=>"Inactivo"
                        ], $periodo->estatus, ["class"=>"form-control","placeholder"=>"Seleccione una opción"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::label("docente_id", "Docentes", ["class"=>"label lablel-primary"]) !!}
                        {!! Form::select("docente_id", $docente, $docente, ["class"=>"form-control","placeholder"=>"Seleccione una opción"]) !!}
                    </div>
                    <div class="col-md-3">
                        <br>
                        {!! Form::submit("Actualizar", ["class"=>"btn btn-dark"]) !!}
                        {!! link_to_route("periodo.index", "Regresar",null,["class"=>"btn btn-success",]) !!}
                    </div>
                </div>
                {!! Form::close() !!}
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
