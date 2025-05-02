@extends('CRUD3.layout');

@section('main')
<div class="container-fluid py-4">
    {{-- <h1 class="card-title text-center mb-4">{{$stagiaires->Group->group_nom}}</h1> --}}
    <div class="d-flex justify-content-around mb-4 px-5">
        <a href="{{ route('stagiaires.create') }}" class="btn btn-success">Ajouter un nouveau stagiaire</a>
    </div>
    <div class="container d-flex justify-content-center mt-4">
        <table class="table table-striped" style="width: 80%;">
            <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>age</th>
                    <th>nom du group</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($stagiaires as $stg)
                <tr>
                    <td>{{$stg->id}}</td>
                    <td>{{$stg->nom}}</td>
                    <td>{{$stg->prenom}}</td>
                    <td>{{$stg->age}}</td>
                    <td>{{$stg->group->group_name}}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('stagiaires.edit', $stg->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                            <form action="{{ route('stagiaires.destroy', $stg->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-danger" value="Supprimer">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection