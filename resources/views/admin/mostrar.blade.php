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
              <div class="card-body text-red">
                AQUI VOY A MOSTRAR LOS DATO DEL ADMINISTRADOR...
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
