@extends('layouts.app')
@section('title','Docentes')
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
            <h1>Docente</h1>
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
                <h3 class="card-title">Docente</h3>
                <div class="card-tools">
                    <!-- Search -->
                    {!! Form::open(['route'=>['admin.user'],'method'=>'get','class'=>'form-inline ml-3']) !!}
                        <div class="input-group input-group-sm">
                        {!! Form::text("nombre", old('nombre'), ['class'=>'form-control form-control-navbar',"placeholder"=>"Buscar"]) !!}
                        <div class="input-group-append">
                                {!! Form::button(null,["class"=>"fas fa-search btn-warning",'type'=>'submit']) !!}
                        </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- Search end -->
                </div>
              </div>
              <div class="card-body">




                <div class="row">
                    <div class="col-12">
                      <div class="card">

                        <div class="card-body table-responsive p-0">
                          <table class="table table-hover text-nowrap">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th>Roles</th>
                                <th>Acción</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($docente as $docentes)
                                <tr>
                                <td>{{$docentes->nombre}}</td>
                                <td>{{$docentes->email}}</td>
                                <td>{{$docentes->created_at}}</td>
                                <td>{{$docentes->updated_at}}</td>
                                <td>@foreach ($docentes->roles as $role)
                                    {{$role->nombre}}
                                @endforeach</td>
                                <td>
                                    {!! Form::open(["route"=>["admin.destroy",$docentes->id],"method"=>"delete"]) !!}
                                    {!! Form::token() !!}
                                    {!! link_to_route("admin.edit", "Editar",$docentes->id,["class"=>"btn btn-primary"]) !!}
                                    {!! Form::submit("Eliminar", ["class"=>"btn btn-danger","onclick"=>"return confirm('¿Seguró que quieres eliminar?')"]) !!}
                                    {!! Form::close() !!}
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$docente->links()}}
                        </div>
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
