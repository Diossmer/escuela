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
            <h1>Alumno</h1>
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
                @elseif(session('alumno'))
                <div class="alert alert-info" role="alert">
                    <li>{{session('alumno')}}</li>
                </div>
                @endif
              <div class="card-header">
                <h3 class="card-title">Registro de Alumno</h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">

                {!! Form::open(["route"=>['alumno.store'],"method"=>"Post", "autocomplete" =>"off","enctype"=>"multipart/form-data"]) !!}
                    {!! Form::token() !!}
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::label("fotos", "fotos", ["class"=>"label label-primary"]) !!}
                            {!! Form::file("fotos", old('fotos'), ["class"=>"text-primary","multiple"]) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label("nombre", "nombre", ["class"=>"label label-primary"]) !!}
                            {!! Form::text("nombre", old('nombre'), ["class"=>"form-control","placeholder"=>"Nombre"]) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label("segundo_nombre", "segundo_nombre", ["class"=>"label label-primary"]) !!}
                            {!! Form::text("segundo_nombre", old('segundo_nombre'), ["class"=>"form-control","placeholder"=>"Segundo Nombre"]) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label("apellido", "apellido", ["class"=>"label label-primary"]) !!}
                            {!! Form::text("apellido", old('apellido'), ["class"=>"form-control","placeholder"=>"Apellido"]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::label("segundo_apellido", "segundo_apellido", ["class"=>"label label-primary"]) !!}
                            {!! Form::text("segundo_apellido", old('segundo_apellido'), ["class"=>"form-control","placeholder"=>"Segundo apellido"]) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label("lugar_nacimiento", "lugar_nacimiento", ["class"=>"label label-primary"]) !!}
                            {!! Form::text("lugar_nacimiento", old('lugar_nacimiento'), ["class"=>"form-control","placeholder"=>"Lugar nacimiento"]) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label("direccion", "direccion", ["class"=>"label label-primary"]) !!}
                            {!! Form::textarea("direccion", old('direccion'), [ "rows"=>"0", "cols"=>"15","class"=>"form-control","placeholder"=>"Direccion"]) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label("fecha", "Fecha de nacimiento", ["class"=>"label label-primary"]) !!}
                            {!! Form::date("fecha", old('fecha'), ["class"=>"form-control"]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::label("cedula", "cedula", ["class"=>"label label-primary"]) !!}
                            {!! Form::number("cedula", old(''), ["class"=>"form-control","maxlength"=>"8","min"=>"0","max"=>"40000000"]) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label("email", "email", ["class"=>"label label-primary"]) !!}
                            {!! Form::text("email", old(''), ["class"=>"form-control","placeholder"=>"Correo@Email.com"]) !!}
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
                        <div class="col-md-2">
                            {!! Form::label("camisa", "camisa", ["class"=>"label label-primary"]) !!}
                            {!! Form::text("camisa", old(''), ["class"=>"form-control","placeholder"=>"Talla","maxlength"=>"2"]) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::label("pantalon", "pantalon", ["class"=>"label label-primary"]) !!}
                            {!! Form::text("pantalon", old(''), ["class"=>"form-control","placeholder"=>"Talla","maxlength"=>"2"]) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::label("zapato", "zapato", ["class"=>"label label-primary"]) !!}
                            {!! Form::number("zapato", old(''), ["class"=>"form-control","placeholder"=>"Talla","maxlength"=>"2","min"=>"0", "max"=>"39"]) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label("enfermedades_padecida", "enfermedades_padecida", ["class"=>"label label-primary"]) !!}
                            {!! Form::text("enfermedades_padecida", old(''), ["class"=>"form-control","placeholder"=>"Enfermedades Padecida"]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        {!! Form::label("enfermedades_psicologica", "enfermedades_psicologica", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("enfermedades_psicologica", old(''), ["class"=>"form-control","placeholder"=>"Enfermedades Psicologica"]) !!}
                        </div>
                        <div class="col-md-2">
                        {!! Form::label("representante_id", "representante", ["class"=>"label label-primary"]) !!}
                        {!! Form::select("representante_id", $representante, old('representante_id'), ["class"=>"form-control","placeholder" => "seleccione"]) !!}
                        </div>
                        {{-- <div class="col-md-2">
                        {!! Form::label("seccion_id", "Seccion", ["class"=>"label label-primary"]) !!}
                        {!! Form::select("seccion_id", $seccion, old("seccion_id"), ["class"=>"form-control","placeholder" => "seleccione"]) !!}
                        </div> --}}
                        <div class="col-md-3">
                            <br>
                            {!! Form::submit("Registrar", ["class"=>"btn btn-primary"]) !!}
                            {!! link_to_route("alumno.index", "Regresar", $parameters = [null], $attributes = ["class"=>"btn btn-success"]) !!}
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
