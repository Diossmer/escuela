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
            <h1>Representante</h1>
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
                @elseif(session('representante'))
                <div class="alert alert-info" role="alert">
                    <li>{{session('representante')}}</li>
                </div>
                @endif
              <div class="card-header">
                <h3 class="card-title">Editar Representantes</h3>

                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
                {!! Form::open(["route"=>['representante.update',$representante->id],"method"=>"Put", "autocomplete" =>"off"]) !!}
                {!! Form::token() !!}
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::label("nombre", "Nombre", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("nombre", $representante->nombre, ["class"=>"form-control","placeholder"=>"Nombre"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("segundo_nombre", "Segundo nombre", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("segundo_nombre", $representante->segundo_nombre, ["class"=>"form-control","placeholder"=>"Segundo nombre"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("apellido", "Apellido", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("apellido", $representante->apellido, ["class"=>"form-control","placeholder"=>"Apellido"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("segundo_apellido", "Segundo apellido", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("segundo_apellido", $representante->segundo_apellido, ["class"=>"form-control","placeholder"=>"segundo apellido"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::label("cedula","Cedula", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("cedula", $representante->cedula, ["class"=>"form-control","maxlength"=>"8","placeholder"=>"xxxxxxxx","min"=>"0","max"=>"40000000"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("email", "email", ["class"=>"label label-primary"]) !!}
                        {!! Form::email("email", $representante->email, ["class"=>"form-control","placeholder"=>"Correo@correo.com"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("fecha_nacimiento", "Fecha Nacimiento", ["class"=>"label label-primary"]) !!}
                        {!! Form::date("fecha_nacimiento", $representante->fecha_nacimiento, ["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("trabajo", "Trabajo", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("trabajo", $representante->trabajo, ["class"=>"form-control","placeholder"=>"Si/No","maxlength"=>"2"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::label("grado_instruccion", "grado_instruccion", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("grado_instruccion", $representante->grado_instruccion, ["class"=>"form-control","placeholder"=>"Universitaro"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("profesion_ocupacion","Profesion Ocupacion", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("profesion_ocupacion", $representante->profesion_ocupacion, ["class"=>"form-control","placeholder"=>"Profesion Ocupacion"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("lugar_trabajo", "Lugar de trabajo", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("lugar_trabajo", $representante->lugar_trabajo, ["class"=>"form-control","placeholder"=>"Lugar de trabajo"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("telefono", "Telefono", ["class"=>"label label-primary"]) !!}
                        {!! Form::number("telefono", $representante->telefono, ["class"=>"form-control","placeholder"=>"(04xx)-xxx-xx-xx","maxlength"=>"11","max"=>"04269999999"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::label("sexo", "Sexo", ["class"=>"label label-primary"]) !!}<br>
                        {!! Form::label("sexo", "Femenino", ["class"=>"text-primary"]) !!}
                        {!! Form::radio('sexo', 'Femenino')!!}
                        {!! Form::label("sexo", "Masculino", ["class"=>"text-primary"]) !!}
                        {!! Form::radio('sexo', 'Masculino')!!}
                    </div>
                    <div class="col-md-3">
                        <br>
                        {!! Form::submit("Actualizar", ["class"=>"btn btn-primary"]) !!}
                        {!! link_to_route("representante.index", "Regresar", $parameters = [null], $attributes = ["class"=>"btn btn-success"]) !!}
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
