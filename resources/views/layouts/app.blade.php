<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('include.head')
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
    <div id="wrapper">
        <div class="header">
            @yield('navbar')
        </div>
        <div class="aside">
            @yield('sidebar')
        </div>
        <div class="container">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <div class="footer">
            @yield('footer')
        </div>
    </div>
    @include('include.foot')
</body>
</html>
