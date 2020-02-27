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
                <h3 class="card-title">Representante</h3>
                <div class="card-tools">
                    <!-- Search -->
            {!! Form::open(['route'=>['representante.index'],'method'=>'get','class'=>'form-inline ml-3']) !!}
            <div class="input-group input-group-sm">
            {!! Form::text("nombres", old('nombres'), ['class'=>'form-control form-control-navbar',"placeholder"=>"Buscar"]) !!}
            <div class="input-group-append">
                    {!! Form::button(null,["class"=>"fas fa-search btn-warning",'type'=>'submit']) !!}
            </div>
            </div>
            {!! Form::close() !!}
    </div>
</div>
<div class="card-body">


  <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                    <thead>
                        <tr valing="middle" align="center">
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cedula</th>
                            <th>Dirección de correo</th>
                            <th>Telefono</th>
                            <th>Docente</th>
                            <th>Acción</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($representante as $representantes)
                        <tr valing="middle" align="center">
                            <td>{{$representantes->nombre}}</td>
                            <td>{{$representantes->apellido}}</td>
                            <td>{{$representantes->cedula}}</td>
                            <td>{{$representantes->email}}</td>
                            <td>{{$representantes->telefono}}</td>
                            <td>{{$representantes->docente->nombre}}</td>
                            <td>{!! link_to_route("representante.edit", "Editar", $representantes->id, ['class'=>'btn btn-success']) !!}
                            {!! link_to_route("representante.show", "Mostrar", $representantes->id, ['class'=>'btn btn-dark']) !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          {{$representante->links()}}
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
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
