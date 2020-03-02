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
            <h1>Inscripción</h1>
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
                @elseif(session('inscripcion'))
                <div class="alert alert-info" role="alert">
                    <li>{{session('inscripcion')}}</li>
                </div>
                @endif
              <div class="card-header">
                <h3 class="card-title">Registro de Inscripción</h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">

                {!! Form::open(["route"=>['inscripcion.store'],"method"=>"Post", "autocomplete" =>"off","enctype"=>"multipart/form-data"]) !!}
                    {!! Form::token() !!}
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::label("alumno_id", "Alumnos", ["Class" => "label label-primary"]) !!}
                            {!! Form::select("alumno_id", $alumno, old("alumno_id"), ["class"=>"form-control"]) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label("seccion_id", "Sección", ["class"=>"label label-primary"]) !!}
                            {!! Form::select("seccion_id", $seccion, old('seccion_id'), ["class"=>"form-control"]) !!}
                        </div>
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
