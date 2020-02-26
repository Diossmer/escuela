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
                <h3 class="card-title">Editar Alumno</h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">


                {!! Form::open(["route"=>['alumno.update',$alumno->id],"method"=>"PUT", "autocomplete" => "off","enctype"=>"multipart/form-data"]) !!}
                {!! Form::token() !!}
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{asset('images').'/'.$alumno->fotos}}" alt="" sizes="" srcset="" height="100" width="100">
                        {!! Form::file("fotos",["class"=>"text-primary","multiple"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("nombre", "nombre", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("nombre", $alumno->nombre, ["class"=>"form-control","placeholder"=>"Nombre"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("segundo_nombre", "segundo_nombre", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("segundo_nombre", $alumno->segundo_nombre, ["class"=>"form-control","placeholder"=>"Segundo Nombre"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("apellido", "apellido", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("apellido", $alumno->apellido, ["class"=>"form-control","placeholder"=>"Apellido"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::label("segundo_apellido", "segundo_apellido", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("segundo_apellido", $alumno->segundo_apellido, ["class"=>"form-control","placeholder"=>"Segundo apellido"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("lugar_nacimiento", "lugar_nacimiento", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("lugar_nacimiento", $alumno->lugar_nacimiento, ["class"=>"form-control","placeholder"=>"Lugar nacimiento"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("direccion", "direccion", ["class"=>"label label-primary"]) !!}
                        {!! Form::textarea("direccion", $alumno->direccion, [ "rows"=>"0", "cols"=>"15","class"=>"form-control","placeholder"=>"Direccion"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("fecha", "Fecha de Nacimiento", ["class"=>"label label-primary"]) !!}
                        {!! Form::number("fecha", $alumno->fecha, ["class"=>"form-control","min"=>'1',"max"=>"30","maxlength"=>"2","placeholder"=>"1-30"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::label("cedula", "cedula", ["class"=>"label label-primary"]) !!}
                        {!! Form::number("cedula", $alumno->cedula, ["class"=>"form-control","maxlength"=>"8","min"=>"0","max"=>"40000000"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("email", "email", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("email", $alumno->email, ["class"=>"form-control","placeholder"=>"Correo@Email.com"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::label("sexo", "Sexo", ["class"=>"label label-primary"]) !!}<br>
                        {!! Form::label("sexo", "Femenino", ["class"=>"text-primary"]) !!}
                        {!! Form::radio('sexo', 'Femenino',$alumno->sexo)!!}
                        {!! Form::label("sexo", "Masculino", ["class"=>"text-primary"]) !!}
                        {!! Form::radio('sexo', 'Masculino',$alumno->sexo)!!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::label("camisa", "camisa", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("camisa", $alumno->camisa, ["class"=>"form-control","placeholder"=>"Talla","maxlength"=>"2"]) !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::label("pantalon", "pantalon", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("pantalon", $alumno->pantalon, ["class"=>"form-control","placeholder"=>"Talla","maxlength"=>"2"]) !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::label("zapato", "zapato", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("zapato", $alumno->zapato, ["class"=>"form-control","placeholder"=>"Talla","maxlength"=>"2"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label("enfermedades_padecida", "enfermedades_padecida", ["class"=>"label label-primary"]) !!}
                        {!! Form::text("enfermedades_padecida", $alumno->enfermedades_padecida, ["class"=>"form-control","placeholder"=>"Enfermedades Padecida"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    {!! Form::label("enfermedades_psicologica", "enfermedades_psicologica", ["class"=>"label label-primary"]) !!}
                    {!! Form::text("enfermedades_psicologica", $alumno->enfermedades_psicologica, ["class"=>"form-control","placeholder"=>"Enfermedades Psicologica"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label("representante_id", "representante", ["class"=>"label label-primary"]) !!}
                    {!! Form::select("representante_id", $representante, ["placeholder" => "seleccione"], ["class"=>"form-control"]) !!}
                    </div>
                </div>
                {!! Form::submit("Actializar", ["class"=>"btn btn-primary"]) !!}
                {!! link_to_route("alumno.index", "Regresar", $parameters = [], $attributes = ["class"=>"btn btn-success"]) !!}
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
