<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    @include('devweb')
        <h1>la page de groupes</h1>
        <a href="{{route('groupes.create')}}">ajouter un groupe</a><br>
        voici tous les groupes <br>
        <table>
        @foreach($groupe as $group)
        <tr>
        <td>{{$group->idM}}  </td>
        <td>
            @foreach($group->stagiaires as $stagiaire)
                {{$stagiaire->nom}}<br>
            @endforeach
        </td>
        <td><a href="{{route('groupes.edit',$group->idM)}}">modifier</a></td>
        <td>
            <form action="{{route('groupes.destroy',['groupe'=>$group->idM])}}" method="post">
        @csrf
        @method('delete')        
        <input type="submit" value="supprimer" name="delete">
        </td>
        <td> <a href="{{route('groupes.show',$group->idM)}}">les stagiaires</a></td>
        </tr>
        @endforeach
        </table>
    </center>
</body>
</html>