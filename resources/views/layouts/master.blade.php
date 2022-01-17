<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Domov</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link href="{{ asset('css/app.css?v=') . time() }}" rel="stylesheet">
</head>
<body>
@include("inc.menu")
@yield("obsah")
@include("inc.footer")

</body>
</html>
