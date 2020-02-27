@extends('layouts.app')
@section('title','Mostrar')
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card bg-dark">

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
                <h3 class="card-title text-primary font-weight-bold">Representante</h3>
                <div class="card-tools">

                    <!--Agregar cualquier complemento de widgets -->

                </div>
              </div>
              <div class="card-body">
                <table border="3">
                    <thead align="center" valing="middle">
                        <tr class="text-warning">
                            <th>Datos del Representante</th>
                            <th>Información del Representante</th>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td>{{$representante->nombre}}</td>
                        </tr>
                        <tr>
                            <th>Segundo Nombre</th>
                            <td>{{$representante->segundo_nombre}}</td>
                        </tr>
                        <tr>
                            <th>Apellido</th>
                            <td>{{$representante->apellido}}</td>
                        </tr>
                        <tr>
                            <th>Segundo Apellido</th>
                            <td>{{$representante->segundo_apellido}}</td>
                        </tr>
                        <tr>
                            <th>Cedula/Documento de identidad</th>
                            <td>{{$representante->cedula}}</td>
                        </tr>
                        <tr>
                            <th>Direccion de Correo</th>
                            <td>{{$representante->email}}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento</th>
                            <td>{{$representante->fecha_nacimiento}}</td>
                        </tr>
                        <tr>
                            <th>¿Trabaja?</th>
                            <td>{{$representante->trabajo}}</td>
                        </tr>
                        <tr>
                            <th>Grado de Instrucción</th>
                            <td>{{$representante->grado_instruccion}}</td>
                        </tr>
                        <tr>
                            <th>Profesión ó Ocupación</th>
                            <td>{{$representante->profesion_ocupacion}}</td>
                        </tr>
                        <tr>
                            <th>Lugar de Trabajo</th>
                            <td>{{$representante->lugar_trabajo}}</td>
                        </tr>
                        <tr>
                            <th>Telefono Celular o Local</th>
                            <td>{{$representante->telefono}}</td>
                        </tr>
                        <tr>
                            <th>Genero/Sexo</th>
                            <td>{{$representante->sexo}}</td>
                        </tr>
                        <tr>
                            <th>Docente</th>
                            <td>{{$representante->docente->nombre}}</td>
                        </tr>
                    </thead>
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
