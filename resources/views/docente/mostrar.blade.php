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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>{{$docente->nombre}} {{$docente->apellido}}</h1>
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
              <div class="card-header">
                <h3 class="card-title">{{$docente->roles[0]->nombre}}</h3>

                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
              <h4>Perido</h4>
                @foreach (@$docente->periodos as $periodo)
                    <p><b>Desde el</b> {{@$periodo->periodo_desde}} <b>Hasta el</b> {{@$periodo->periodo_hasta}}</p>
                @endforeach
              <h3>Secciones</h3>
              @foreach ($docente->userSeccion as $Alumnos)
               tabla-> Seccion: {{@$Alumnos->descripcion}}Grado:{{@$Alumnos->grado}}
            @endforeach

              <h3>Representante</h3>
                <div class="text-danger">
                    @foreach ($docente->representantes as $representante)
                        {{@$representante->nombre}}
                    @endforeach
                </div>
              <h3>Alumno</h3>
              @foreach ($docente->userAlumno as $Alumnos)
                    {{@$Alumnos->nombre}}
              @endforeach
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
