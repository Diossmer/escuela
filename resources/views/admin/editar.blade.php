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
            <h1>Director</h1>
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
                <h3 class="card-title">Dashboard</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">

                {!! Form::open(['route'=>['admin.update',$admin->id],'method'=>'put', 'autocomplete' =>'off']) !!}
                {!! Form::token() !!}
                <div class="row">
                    <div class="col-md-2">
                    {!! Form::label('name', 'Nombre', ['class'=>'badge-primary']) !!}
                    {!! Form::text('name', $admin->name, ['class'=>'form-control']) !!}<br>
                    </div>
                    <div class="col-md-2">
                    {!! Form::label('email', 'Dirección de correo', ['class'=>'badge-primary']) !!}
                    {!! Form::email('email', $admin->email, ['class'=>'form-control']) !!}<br>
                    </div>
                    <div class="col-md-4">
                    {!! Form::label('password', 'Contraseña', ['class'=>'badge-primary']) !!}
                    {!! Form::text('password', $admin->password, ['class'=>'form-control']) !!}<br>
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('role', 'Role', ['class'=>'badge-primary']) !!}
                        {!! Form::select('role', $role->pluck('name','id'), $role->name, ['class'=>'form-control','placeholder'=>'Seleccione un rol']) !!}<br>
                    </div>
                </div>
                {!! Form::submit('Actualizar', ['class'=>'btn btn-success']) !!}

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
