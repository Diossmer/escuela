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
                @elseif(session('admin'))
                <div class="alert alert-info" role="alert">
                    <li>{{session('admin')}}</li>
                </div>
                @endif

              <div class="card-header">
                <h3 class="card-title text-primary font-weight-bold">Bienvenido a su perfil</h3>
                <div class="card-tools">

                    <!--Agregar cualquier complemento de widgets -->

                </div>
              </div>
              <div class="card-body">
                <h1 class="text-primary">Escuela Bolivariana Nacional La Vega</h1>
                <table border="2" cellpadding="10" width="70%">
                    <figcaption><h3>Perfil de {{$admin->nombre}}</h3></figcaption>
                    <thead valing="middle" align="center">
                        <tr>
                            <th>Nombre:</th>
                            @if($admin->hasAnyRole('administrador'))
                            <td>{{$admin->nombre}}</td>
                            @else
                            <td>{!! link_to_route("docente.show", $admin->nombre, $admin->id) !!}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Segundo Nombre:</th>
                            <td>{{$admin->seg_nombre}}</td>
                        </tr>
                        <tr>
                            <th>Apellido:</th>
                            <td>{{$admin->apellido}}</td>
                        </tr>
                        <tr>
                            <th>Segundo apellido:</th>
                            <td>{{$admin->seg_apellido}}</td>
                        </tr>
                        <tr>
                            <th>Nacionalidad:</th>
                            <td>{{$admin->nacionalidad}}</td>
                        </tr>
                        <tr>
                            <th>Localidad:</th>
                            <td>{{$admin->localidad}}</td>
                        </tr>
                        <tr>
                            <th>Telefono:</th>
                            <td>{{$admin->telefono}}</td>
                        </tr>
                        <tr>
                            <th>Rol:</th>
                            <td class="text-danger font-weight-bold">@foreach ($admin->roles as $role)
                                {{$role->nombre}}
                            @endforeach</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento:</th>
                            <td>{{$admin->fecha}}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td class="text-success font-weight-bold">{{$admin->email}}</td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td>{{$admin->direccion}}</td>
                        </tr>
                    </thead>
                    <caption class="text-info">Escuela Bolivariana Nacional La Vega</caption>
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
