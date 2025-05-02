<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>modifier le stagiaire {{$stagiaire->id}}</h3>
    <form action="{{route('stagiaires.update', $stagiaire->id)}}" method="post">
        @csrf
        @method('put')
        <input type="text" name="nom" value="{{$stagiaire->nom}}">
        <input type="text" name="prenom" value="{{$stagiaire->prenom}}">
        <input type="text" name="email" value="{{$stagiaire->email}}">
        <input type="text" name="groupe" value="{{$stagiaire->groupe_idM}}">
        <input type="number" name="note" value="{{$stagiaire->note}}">
        <input type="submit" value="modifier">
    </form>
</body>
</html>