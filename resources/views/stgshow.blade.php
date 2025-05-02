<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>les stagiaires du groupe </h3>
@if (count($groupe)>0)
    @foreach($groupe as $group)
    {{$group->prenom}}  :  {{$group->nom}} <br>
    @endforeach
@else
    <p>there isn't any informations in groupe</p>
@endif
</body>
</html>