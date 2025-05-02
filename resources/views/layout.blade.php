<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome back {{$title}}</h1><br>
    <a href="*">home</a><br>
    <a href="*">plus d'anformation</a><br>
    <main>
        @yield('content')
    </main>
    @include('footer')
</body>
</html>