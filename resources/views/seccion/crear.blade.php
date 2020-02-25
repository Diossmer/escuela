@extends('layouts.app')
@section('title','Crear')
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
            <h1>Crear</h1>
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
                {!! Form::open(['route'=>['seccion.store'],'method'=>'post', 'autocomplete'=>'off']) !!}
                {!! Form::token() !!}
                <div class="row">
                    <div class="col-md-2">
                        {!! Form::label("descripcion", "Seccion", ["class"=>"label label-primary"]) !!}
                        {!! Form::select("descripcion", [
                            "A"=>"A",
                            "B"=>"B",
                            "C"=>"C",
                            "D"=>"D",
                            "E"=>"E",
                            "F"=>"F"
                            ], old("descripcion"), [
                                "class"=>"form-control",
                                "placeholder"=>"Selecciona la sección"
                                ]) !!}
                    </div>
                    <div class="col-md-1">
                        {!! Form::label("grado", "Grado", ["class"=>"label label-primary"]) !!}
                        {!! Form::number("grado", old("grado"), ["class"=>"form-control",
                        "placeholder"=>"1-6"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("cupo", "Cupos Disponibles", ["class"=>"label label-primary"]) !!}
                        {!! Form::number("cupo",old("cupo"), ["class"=>"form-control",
                        "placeholder"=>"1-30"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("periodo_id", "Periodo Inicio", ["class"=>"label label-primary"]) !!}
                        {!! Form::select("periodo_id", $periodo, $periodo, ["Class"=>"form-control","placeholder"=>"Selecciona el año escolar"]) !!}
                    </div>
                </div>
                {!! Form::submit("Enviar", ["class"=>"btn btn-dark"]) !!}
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
