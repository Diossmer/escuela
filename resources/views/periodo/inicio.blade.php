@extends('layouts.app')
@section('title','Periodo Escolar')
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
            <h1>Periodo Escolar</h1>
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
                @elseif(session('docente'))
                <div class="alert alert-info" role="alert">
                    <li>{{session('docente')}}</li>
                </div>
                @endif
              <div class="card-header">
                <h3 class="card-title">Periodo Escolar</h3>
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">


                <table border="2" cellpadding="10">
                    <thead align="center" valign="middle">
                        <tr>
                            <th align="center">Desde</th>
                            <th>Fecha de inicio</th>
                            <th>Hasta</th>
                            <th>Estatus</th>
                            <th>Docentes</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($periodo as $valore)
                        <tr>
                            <td>
                            {{$valore->periodo_desde}}
                            {{-- {{dd($resultado)}} --}}
                            <progress id="progressbar" max="100" value="{{$valore->resultado + round((strtotime($carbon)/900/15000*0.5),2)}}" title="{{$valore->resultado + round((strtotime($carbon)/900/15000*0.5),2)}}%"></progress>
                            {{$valore->resultado + round((strtotime($carbon)/900/15000*0.5),2)}}%
                        </td>
                        <td>
                            {{$valore->fecha_inicio}}
                        </td>
                        <td>
                            {{$valore->periodo_hasta}}
                        </td>
                        <td>
                            {{$valore->estatus}}
                        </td>
                        <td>
                            {{$valore->users->nombre}}
                        </td>
                        <td>
                            {!! link_to_route("periodo.edit", "Editar", $valore->id, ["class"=>"btn btn-success"]) !!}
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$periodo->links()}}
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
