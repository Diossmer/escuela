<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }} - @yield('title','welcome')</title>
<!-- Fonts -->
{{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}
{{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
<!-- Google Font: Source Sans Pro -->
{{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
<link rel="stylesheet" href="{{asset("assets/css/fontawesome-free/css/all.min.css")}}">

<!-- Ionicons -->
{{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}

@section('style')
<!-- Styles -->
<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset("assets/css/adminlte.min.css")}}">
@show

@section('script-top')

@show
