<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tourist app</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <link href="{{ asset('css/app.css?v=') . time() }}" rel="stylesheet">
        <script src="{{mix('js/app.js')}}"></script>
    </head>
    <body>
    @include('common.header')

    <main>
        @yield('main')
    </main>

    @include('common.footer')

    @yield('script')

    @include('common.notification')
    </body>
</html>
