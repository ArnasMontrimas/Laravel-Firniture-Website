<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Furniture')}}</title>

        <script defer src="{{asset('js/app.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        @if(Auth::check())
            <header class="header">
                @include('includes.nav')
            </header> 
        @endif
        @yield('content')
    </body>
</html>