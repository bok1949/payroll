<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CoreUI CSS -->
        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- <script src="{{ asset('js/bootstrap.js') }}" defer></script> --}}

        {{-- Styles --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        
        @livewireStyles

        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
<body>
    
    <main class="c-main">
        @yield('content')
    </main>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('jsscripts')

    @livewireScripts

</body>
</html>
