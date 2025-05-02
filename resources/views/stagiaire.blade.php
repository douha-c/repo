<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@include('devweb')
    <h1>la page des stagiaires</h1>
    <a href="{{route('stagiaires.create')}}">ajouter un stagiaire</a>
        @foreach($stagiaire as $stagiaire)
    <div>
    <strong>{{$stagiaire->nom}}</strong><br>
     le prenom :  {{$stagiaire->prenom}} <br>
    l'email :  {{$stagiaire->email}} <br>
    la date de naissance :  {{$stagiaire->date_naissance}} <br>
     la note :  {{$stagiaire->note}} <br>
     vile :  {{$stagiaire->ville}}   le groupe :   {{$stagiaire->groupe_idM}} <br>
     <a style="color:green" href="{{route('stagiaires.edit',$stagiaire->id)}}">modifier le stagiaire</a>
     <!-- <a style="color:red" href="{{route('stagiaires.destroy',$stagiaire->id)}}">supprimer le stagiaire</a> -->
     <form action="{{route('stagiaires.destroy',$stagiaire->id)}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="supprimer">
     </form>
    </div>
    @endforeach
</body>
</html>