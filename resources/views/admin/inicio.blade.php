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
                <h3 class="card-title">Director</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
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
                                @foreach ($admin as $admins)
                                    <tr>
                                    <td>{{$admins->nombre}}</td>
                                    <td>{{$admins->email}}</td>
                                    <td>{{$admins->created_at}}</td>
                                    <td>{{$admins->updated_at}}</td>
                                    <td>@foreach ($admins->roles as $role)
                                        {{$role->name}}
                                    @endforeach</td>
                                    <td>
                                        {!! Form::open(["route"=>["admin.destroy",$admins->id],"method"=>"delete"]) !!}
                                        {!! Form::token() !!}
                                        {!! link_to_route("admin.edit", "Editar",$admins->id,["class"=>"btn btn-primary"]) !!}
                                        {!! Form::submit("Eliminar", ["class"=>"btn btn-danger quest"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                          {{$admin->links()}}
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
