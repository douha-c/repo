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
    <h1>la page de modules</h1>
<a href="{{route('modules.create')}}">ajouter un module</a>
    @if (count($module)>0)
    <table>
        <tr>
            <th>representant</th>
        <th>code du module</th>
        <th>masse horaire</th>
        <th>titre</th>
        <th>image</th>
        <th></th>
        </tr>
        @foreach ($module as $module)
        <tr>
            <td>{{ $module->representant->nom}}</td>
            <td>{{ $module->code }}</td>
            <td>{{ $module->masse }}</td>
            <td>{{ $module->titre }}</td>
            <td><img src="{{ asset('images/'.$module->imag) }}" alt="{{ $module->imag }}" width="100"></td>
            <td>
                <form action="{{route('modules.destroy',['module' => $module->id ])}}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="submit" value="supp">
                </form>||<a href="{{route('modules.edit',['module' => $module->id])}}">mod</a></td>
        </tr>
        @endforeach
    </table>
    @else
    <p>there isn't any informations in module</p>
    @endif
    </center>
</body>
</html>