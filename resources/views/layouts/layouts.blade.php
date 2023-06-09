<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset ('src/js/burgemenu.js')}}" defer></script>
    <link rel="icon" href="{{asset ('src/icon/svg/logo_white.svg')}}" type="image/svg">
    <link rel="stylesheet" href="{{asset ('src/css/style.css')}}">
    <title>Сотрясатель</title>
</head>
<body>

    @include('components.header')

    @yield('content')

</body>
</html>
