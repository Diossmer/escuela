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
            <h1>Nuevo Docente</h1>
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
                <h3 class="card-title">Nuevo Docente</h3>
                <div class="card-tools">
                    <!--Espacio -->
                </div>
              </div>
              <div class="card-body">
                    {!! Form::open(['route'=>['admin.store'],'method'=>'post', 'autocomplete' =>'off']) !!}
                    {!! Form::token() !!}
                    <div class="row">
                    <div class="col-md-3">
                    {!! Form::label('nombre', 'Nombre', ['class'=>'badge-primary']) !!}
                    {!! Form::text('nombre', old('nombre'), ['class'=>'form-control',"placeholder"=>"Nombre"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('seg_nombre', 'Segundo Nombre', ['class'=>'badge-primary']) !!}
                    {!! Form::text('seg_nombre', old('seg_nombre'), ['class'=>'form-control',"placeholder"=>"Segundo Nombre"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('apellido', 'Apellido', ['class'=>'badge-primary']) !!}
                    {!! Form::text('apellido', old('apellido'), ['class'=>'form-control',"placeholder"=>"Apellido"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('seg_apellido', 'Segundo Apellido', ['class'=>'badge-primary']) !!}
                    {!! Form::text('seg_apellido', old('seg_apellido'), ['class'=>'form-control',"placeholder"=>"Segundo Apellido"]) !!}
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    {!! Form::label('email', 'Dirección de Correo', ['class'=>'badge-primary']) !!}
                    {!! Form::email('email', old('email'), ['class'=>'form-control',"placeholder"=>"Ejemplo@email.com"]) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Form::label('direccion', 'Dirección', ['class'=>'badge-primary']) !!}
                    {!! Form::textarea('direccion', old('direccion'), ['class'=>'form-control',"rows"=>"0", "cols"=>"0",'placeholder'=>'Av,ejemplo,calle,ejemplo']) !!}
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                    {!! Form::label('nacionalidad', 'Nacionalidad', ['class'=>'badge-primary']) !!}
                    {!! Form::text('nacionalidad', old('nacionalidad'), ['class'=>'form-control',"placeholder"=>"Nacionalidad"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('fecha', 'Fecha de Nacimiento', ['class'=>'badge-primary']) !!}
                    {!! Form::date('fecha', old('fecha'), ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('localidad', 'Localidad', ['class'=>'badge-primary']) !!}
                    {!! Form::text('localidad', old('localidad'), ['class'=>'form-control',"placeholder"=>"Localidad"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('role', 'Roles', ['class'=>'badge-primary']) !!}
                    {!! Form::select('role', $role, old('role'), ['class'=>'form-control','placeholder'=>'selecciona una opción']) !!}
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                    {!! Form::label('telefono', 'Teléfono', ['class'=>'badge-primary']) !!}
                    {!! Form::tel('telefono', old('telefono'), ['class'=>'form-control',"placeholder"=>"+58426XXXxxXX"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('password', 'Contraseña', ['class'=>'badge-primary']) !!}
                    {!! Form::password('password',['class'=>'form-control',"placeholder"=>"Contraseña"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('passwords', 'Verificar Contraseña', ['class'=>'badge-primary']) !!}
                    {!! Form::password('passwords', ['class'=>'form-control',"placeholder"=>"Verificar Contraseña"]) !!}
                    </div>
                    <div class="col-md-4">
                        <br>
                    {!! Form::submit('Registrar', ['class'=>'btn btn-success']) !!}
                    {!!Form::reset('Borrar',['class'=>'btn btn-success']) !!}
                    {!!link_to('home','Regresar',['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                    </div>
                    </div>
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
