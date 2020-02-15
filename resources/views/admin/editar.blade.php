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
                <h3 class="card-title">Dashboard</h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">

                {!! Form::open(['route'=>['admin.update',$admin->id],'method'=>'put', 'autocomplete' =>'off']) !!}
                {!! Form::token() !!}
                    <div class="row">
                    <div class="col-md-3">
                    {!! Form::label('nombre', 'Nombre', ['class'=>'badge-primary']) !!}
                    {!! Form::text('nombre', $admin->nombre, ['class'=>'form-control',"placeholder"=>"Nombre"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('seg_nombre', 'Segundo Nombre', ['class'=>'badge-primary']) !!}
                    {!! Form::text('seg_nombre', $admin->seg_nombre, ['class'=>'form-control',"placeholder"=>"Segundo Nombre"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('apellido', 'Apellido', ['class'=>'badge-primary']) !!}
                    {!! Form::text('apellido', $admin->apellido, ['class'=>'form-control',"placeholder"=>"Apellido"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('seg_apellido', 'Segundo Apellido', ['class'=>'badge-primary']) !!}
                    {!! Form::text('seg_apellido', $admin->seg_apellido, ['class'=>'form-control',"placeholder"=>"Segundo Apellido"]) !!}
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    {!! Form::label('email', 'Dirección de Correo', ['class'=>'badge-primary']) !!}
                    {!! Form::email('email', $admin->email, ['class'=>'form-control',"placeholder"=>"Ejemplo@email.com"]) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Form::label('direccion', 'Dirección', ['class'=>'badge-primary']) !!}
                    {!! Form::textarea('direccion', $admin->direccion, ['class'=>'form-control',"rows"=>"0", "cols"=>"0",'placeholder'=>'Av,ejemplo,calle,ejemplo']) !!}
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                    {!! Form::label('nacionalidad', 'Nacionalidad', ['class'=>'badge-primary']) !!}
                    {!! Form::text('nacionalidad', $admin->nacionalidad, ['class'=>'form-control',"placeholder"=>"Nacionalidad"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('fecha', 'Fecha de Nacimiento', ['class'=>'badge-primary']) !!}
                    {!! Form::date('fecha', $admin->fecha, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('localidad', 'Localidad', ['class'=>'badge-primary']) !!}
                    {!! Form::text('localidad', $admin->localidad, ['class'=>'form-control',"placeholder"=>"Localidad"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label('role', 'Role', ['class'=>'badge-primary']) !!}
                        {!! Form::select('role', $role, $admin->roles, ['class'=>'form-control','placeholder'=>'Seleccione un rol']) !!}<br>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                    {!! Form::label('telefono', 'Teléfono', ['class'=>'badge-primary']) !!}
                    {!! Form::tel('telefono', $admin->telefono, ['class'=>'form-control',"placeholder"=>"04XX-xxx-xx-xx"]) !!}
                    </div>
                    <div class="col-md-3">
                    {!! Form::label('password', 'Contraseña', ['class'=>'badge-primary']) !!}
                    {!! Form::password('password', ['class'=>'form-control',"placeholder"=>$admin->password]) !!}
                    </div>
                    <div class="col-md-4">
                        <br>
                    {!! Form::submit('Actualizar', ['class'=>'btn btn-success']) !!}
                    {!!Form::reset('Restaurar',['class'=>'btn btn-success'])!!}
                    {{-- {!! link_to_action("Admin\AdminController@user", "Docente", null, ['class'=>'btn btn-success']) !!}
                    {!! link_to_action("Admin\AdminController@index", "admin", null, ['class'=>'btn btn-success']) !!} --}}
                    {!! link_to('home', 'Volver', ['class'=>'btn btn-success']) !!}
                    </div>
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
