@extends('layouts.app')
@section('title','Panel de control')
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
            <h1>Inscripcion</h1>
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
                <h3 class="card-title">Inscripción</h3>
                <div class="card-tools">
                    {!! Form::open(['route'=>['admin.index'],'method'=>'get','class'=>'form-inline ml-3']) !!}
                        <div class="input-group input-group-sm">
                        {!! Form::text("nombre", old('nombre'), ['class'=>'form-control form-control-navbar',"placeholder"=>"Buscar"]) !!}
                        <div class="input-group-append">
                                {!! Form::button(null,["class"=>"fas fa-search btn-warning",'type'=>'submit']) !!}
                            </div>
                            {!! link_to_route("inscripcion.create", $title = "Nuevo", $parameters = [null], $attributes = ['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
              </div>
              <div class="card-body">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr valing="middle" align="center">
                            <th>Alumno</th>
                            <th>Seccion</th>
                            <th>Accion</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($inscripcion as $inscripciones)
                        <tr valing="middle" align="center">
                            <td>{{$inscripciones->nombre}}</td>
                            <td>{{$inscripciones->descripcion}}</td>
                            <td>
                            {!! Form::open(['route'=>['inscripcion.destroy',$inscripciones->id],'method'=>'delete']) !!}
                            {!! Form::token() !!}
                            {!! Form::submit("Eliminar", ["onclick"=>"return confirm('¿Seguró que quieres eliminar $inscripciones->nombre?')","class"=>"btn btn-danger"]) !!}
                            {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </div>
                </div>
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
