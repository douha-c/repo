<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form method="POST" action="{{ route('student.store') }}">
    @csrf
    <div>
      <label for="name">Prénom & Nom:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div>
      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4" cols="50" required></textarea>
    </div>
    <button type="submit">Submit</button>
  </form>
</body>
</html>