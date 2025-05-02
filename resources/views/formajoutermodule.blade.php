<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('modules.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="code">code du module:</label>
        <input type="numbur" id="code" name="code" required>
        <label for="titre">titre:</label>
        <input type="text" id="titre" name="titre" required>
        <label for="horaire">masse horaire:</label>
        <input type="numbur" id="horaire" name="horaire" required>
        <input type="file" name="imag"> 
        <label for="nom_re">nom representant:</label>
        <input type="text" id="nom_re" name="nom_re" required>
        <label for="prenom_re">prenom representant:</label>
        <input type="text" id="prenom_re" name="prenom_re" required>
        <label for="grade">grade:</label>
        <input type="text" id="grade" name="grade" required>
        <label for="module_id">module id liee:</label>
        <input type="numbur" id="module_id" name="module_id" >
        <button type="submit">Submit</button>
    </form>
</body>
</html>