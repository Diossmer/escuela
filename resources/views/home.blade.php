@extends('layouts.app')
@section('title','Panel de control')
@section('script-top')
@parent
@endsection
@section('script-bottom')
<script type="text/javascript" src="{{asset("assets/js/charts/loader.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/charts/charts.js")}}"></script>
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
            <h1>Panel de control</h1>
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
                You are logged in!
                <!--Div that will hold the pie chart-->
                <div id="chart_div"></div>
                <div class="frame"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1747.7021520518665!2d-66.
                    9456522778854!3d10.464463619215918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                    1!3m3!1m2!1s0x8c2a5f7be286f405%3A0xf8c93765e3157d53!2sE.B.
                    N%20Parroquia%20La%20Vega!5e0!3m2!1ses!2sve!4v1581537014893!5m2!1ses!2sve"
                     width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
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
