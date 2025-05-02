<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Liste des tâches à faire</h1>
 Boucler sur la liste des taches <br>
 <ul>
    @foreach($tasks as $task)
    <li>{{$task}}</li>
    @endforeach
 </ul>

</body>
</html>