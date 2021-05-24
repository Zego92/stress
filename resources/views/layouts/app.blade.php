<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('css')
</head>
<body>
    @include('user.partial.header')
    @include('user.partial.banner')
    <div>
        @yield('content')
    </div>
    @include('user.partial.footer')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=Array.prototype.find,Promise,Object.assign"></script>
    <script src="https://unpkg.com/element-closest"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        console.log(toastr)
        toastr.options.closeButton = true;
        @if(session('success'))
        toastr.success( "{{session()->get('success')}}", {timeOut: 2000})
        @elseif(session('error'))
        toastr.error( "{{session()->get('error')}}", {timeOut: 2000})
        @endif
    </script>
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('js')
</body>
</html>
