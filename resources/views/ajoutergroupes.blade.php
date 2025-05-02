<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{route('groupes.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nom">nom de groupe:</label>
        <input type="text" id="nom" name="nom" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>