<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('myblog.title') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

</head>
<body>
{{-- Navigation Bar --}}


        

@include('navbar')


<main class="py-4">
    @yield('content')
</main>
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')
</body>
</html>