@extends('layouts.app')
@section('title','Director')
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
                @elseif(session('admin'))
                <div class="alert alert-info" role="alert">
                    <li>{{session('admin')}}</li>
                </div>
                @endif
              <div class="card-header">
        <h3 class="card-title">Alumno</h3>

        <div class="card-tools">
            {!! Form::open(['route'=>['admin.index'],'method'=>'get','class'=>'form-inline ml-3']) !!}
            <div class="input-group input-group-sm">
            {!! Form::text("nombre", old('nombre'), ['class'=>'form-control form-control-navbar',"placeholder"=>"Buscar"]) !!}
            <div class="input-group-append">
                    {!! Form::button(null,["class"=>"fas fa-search btn-warning",'type'=>'submit']) !!}
            </div>
            </div>
        {!! Form::close() !!}
        </div>
      </div>
      <div class="card-body">
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                        <tr valing="middle" align="center">
                            <th>fotos</th>
                            <th>nombre</th>
                            <th>apellido</th>
                            <th>fecha de nacimiento</th>
                            <th>representante</th>
                            <th>accion</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($alumno as $alumnos)
                        <tr valing="middle" align="center">
                            <td><img src="/images/{{$alumnos->fotos}}" alt="" height="100" width="100"></td>
                            <td>{{$alumnos->nombre}}</td>
                            <td>{{$alumnos->apellido}}</td>
                            <td>{{$alumnos->fecha}}</td>
                            <td>{{$alumnos->representante_id}}</td>
                            {{-- <td>edad</td> --}}
                            <td>{!! link_to_route("representante.edit", "Edit", $alumnos->id, ['class'=>'btn btn-success']) !!}
                            {!! link_to_route("representante.show", "Mostrar", $alumnos->id, ['class'=>'btn btn-dark']) !!}</td>
                        </tr>
                    @endforeach
                </div>
                </div>
                </tbody>
              </table>

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
