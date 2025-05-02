@extends('CRUD3.layout');

@section('main')
    <div class="container-fluid py-4">
        <h1 class="card-title text-center mb-4">Modules List</h1>
        <div class="d-flex justify-content-around mb-4 px-5">
            <a href="{{ route('modules.create') }}" class="btn btn-success">Ajouter un nouveau module</a>
        </div>
        <div class="container d-flex justify-content-center mt-4">
            <table class="table table-striped" style="width: 80%;">
                <thead class="table-dark">
                    <tr>
                        <th>code du module</th>
                        <th>Titre</th>
                        <th>Masse horaire</th>
                        <th>image</th>
                        <th>Nom du représentant</th>
                        <th>Prenom du représentant</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($modules as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->titre}}</td>
                        <td>{{$item->mass_h}}</td>
                        <td><img width="50px" height="50px" src="{{ asset('storage/'.$item->image) }}"></td>
                        <td>{{$item->Representant->nom}}</td>
                        <td>{{$item->Representant->prenom}}</td>
                        <td>{{$item->Representant->grade}}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ route('modules.edit', $item->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                <form action="{{ route('modules.destroy', $item->id) }}" method="POST" style="margin: 0;">
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
        {{ $modules->links() }}
    </div>
@endsection