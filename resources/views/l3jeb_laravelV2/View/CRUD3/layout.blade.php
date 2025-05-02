<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">gestion des stagiaires</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{Route('modules.index')}}">Module Lsit</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{Route('groupes.index')}}">Groupes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{Route('stagiaires.index')}}">Stagiaires</a>
                </li>
              </ul>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div>
                <div class="card">
                    <div class="card-body">
                        @yield('main')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>