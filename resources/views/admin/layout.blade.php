<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('myblog.title') }}--管理后台</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body>
{{-- Navigation Bar --}}

        @include('navbar')
   
<div class="row">
<div class="col-md-2">
        @include('admin.navbar')
</div>
 

<main class="py-4 col-md-10">
    @yield('content')
</main>
</div>
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')
</body>
</html>