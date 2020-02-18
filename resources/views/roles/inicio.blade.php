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
            <h1>Roles</h1>
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
        <h3 class="card-title">Roles</h3>

        <div class="card-tools">

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
                    <th>Roles</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($role as $roles)
                    <tr>
                        <td>{{$roles->nombre}}</td>
                        <td>
                        {!! Form::open(["route"=>["roles.destroy",$roles->id],"method"=>"delete"]) !!}
                        {!! Form::token() !!}
                        {!! link_to_route("roles.edit", "Editar",$roles->id,["class"=>"btn btn-primary"]) !!}
                        {!! Form::submit("Eliminar", ["onclick"=>"return confirm('¿Seguró que quieres eliminar $roles->nombre?')","class"=>"btn btn-danger"]) !!}
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
