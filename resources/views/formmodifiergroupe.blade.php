<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>modifier le groupes {{$groupe->idM}}</h1>
    <form action="{{route('groupes.update',['groupe'=>$groupe->idM])}}" method="POST">
    @method('put')
    @csrf
        <label for="nom">nom de groupe :</label>
        <input type="text" id="nom" name="nom" value="{{$groupe->nom}}" required>
        <button type="submit">Submit</button>
    </form>

</body>
</html>