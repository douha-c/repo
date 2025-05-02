<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
            <li><a href="{{ route('produit.show', ['id' => 1]) }}">produit 1</a></li>
            <li><a href="{{ route('produit.show', ['id' => 2]) }}">produit 2</a></li>
            <li><a href="{{ route('produit.show', ['id' => 3]) }}">produit 3</a></li>
    </ul>
</body>
</html>