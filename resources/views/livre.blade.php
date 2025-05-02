<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    les details du livre:{{$id}} <br>
    <ul>
        <li>titre: {{$livre['title']}}</li>
        <li>auteur: {{$livre['author']}}</li>
        <li>date de publication: {{$livre['year']}}</li>
        <li>description: {{$livre['description']}}</li>
    </ul>
</body>
</html>