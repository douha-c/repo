<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>modifier le module {{$module->id}}</h1>
    <form action="{{route('modules.update',['module'=>$module->id])}}" method="POST">
    @method('put')
    @csrf
        <label for="code">code du module:</label>
        <input type="numbur" id="code" name="code" value="{{$module->code}}" required>
        <label for="titre">titre:</label>
        <input type="text" id="titre" name="titre" value="{{$module->titre}}" required>
        <label for="horaire">masse horaire:</label>
        <input type="numbur" id="horaire" name="horaire" value="{{$module->masse}}"  required>
        <label for="imag">image :</label>
        <input type="text" id="imag" name="imag" value="{{$module->imag}}" required>
        <label for="nom_re">nom :</label>
        <input type="text" id="nom_re" name="nom_re" value="{{$module->representant->nom}}" required>
        <label for="prenom_re">prenom :</label>
        <input type="text" id="prenom_re" name="prenom_re" value="{{$module->representant->prenom}}" required>
        <label for="grade">grade :</label>
        <input type="text" id="grade" name="grade" value="{{$module->representant->grade}}" required>
        <label for="module_id">modulr id :</label>
        <input type="text" id="module_id" name="module_id" value="{{$module->representant->module_id}}" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html