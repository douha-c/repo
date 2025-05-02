@extends('CRUD3.layout');
@section('main')
<div class="container-fluid py-4">
    <h1 class="card-title text-center mb-4">Groupes List</h1>
    <div class="d-flex justify-content-around mb-4 px-5">
        <a href="{{ route('groupes.create') }}" class="btn btn-success">Ajouter un nouveau stagiaire</a>
    </div>
    <div class="container d-flex justify-content-center mt-4">
        <table class="table table-striped" style="width: 80%;">
            <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>nom de group</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($groupes as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->group_name}}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('groupes.edit', $item->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                            <form action="{{ route('groupes.destroy', $item->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-danger" value="Supprimer">
                            </form>
                            <a href="{{ route('stagiaires.show', $item->id) }}" class="btn btn-sm btn-info">Show Stagiaires</a>
                        </div>
                    </td>                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection