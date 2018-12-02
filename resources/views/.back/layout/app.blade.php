<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <script src="{{asset('js/app.js')}}"></script>
        <title>Pakar Penyakit Cocoa</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><img src="{{asset('img/favicon.ico')}}" width="32px" height="32px" alt="" />
                Pakar Penyakit Kakao</a>
        </nav>
        @yield('content')
    </body>

</html>