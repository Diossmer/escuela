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
              <div class="card-header">
                <h3 class="card-title">Crear Nuevo</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                {!! Form::open(['route'=>['admin.store'],'method'=>'post', 'autocomplete' =>'off']) !!}
                {!! Form::token() !!}
                <div class="row">
                    <div class="col-md-3">
                    {!! Form::label('name', 'Nombre', ['class'=>'badge-primary']) !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}<br>
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('email', 'Dirección de correo', ['class'=>'badge-primary']) !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}<br>
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('password', 'Contraseña', ['class'=>'badge-primary']) !!}
                    {!! Form::text('password', null, ['class'=>'form-control']) !!}<br>
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('passwords', 'Verificar Contraseña', ['class'=>'badge-primary']) !!}
                    {!! Form::text('passwords', null, ['class'=>'form-control']) !!}<br>
                    </div>
                </div>
                {!! Form::select('role', $role, $role->pluck('name','id'), ['class'=>'form-control','placeholder'=>'selecciona una opción']) !!}<br>
                {!! Form::submit('Registrar', ['class'=>'btn btn-success']) !!}
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
