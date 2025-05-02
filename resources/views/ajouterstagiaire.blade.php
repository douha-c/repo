<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('stagiaires.store')}}" method="POST">
        @csrf
        <label for="nom">nom de stagiaire:</label>
        <input type="text" id="nom" name="nom" required>
        <label for="prenom">prenom de stagiaire:</label>
        <input type="text" id="prenom" name="prenom" required>
        <label for="email">email de stagiaire:</label>
        <input type="text" id="email" name="email" required>
        <label for="date">date de naissance de stagiaire:</label>
        <input type="text" id="date" name="date" required>
        <label for="note">note de stagiaire:</label>
        <input type="text" id="note" name="note" required>
        <label for="ville">ville de stagiaire:</label>
        <input type="text" id="ville" name="ville" required>
        <label for="groupe">groupe de stagiaire:</label>
        <input type="text" id="groupe" name="groupe" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>