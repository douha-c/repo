@extends('CRUD3.layout');

@section('main')
<h2 class="card-title text-center mb-4">Modifier un group</h2>
<form action="{{route('stagiaires.update',$stagiaire->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Select Group</label>
        <select class="form-control form-control-sm" name="group_id">
            @foreach ($groupes as $grp)
                <option value="{{$grp->id}}" {{ $stagiaire->group_id == $grp->id ? 'selected' : '' }}>{{$grp->group_name}}</option>
            @endforeach
        </Select>
    </div>
    <div class="mb-3">
        <label class="form-label">nom du Stagiaire</label>
        <input type="text" class="form-control" name="nom" value="{{$stagiaire->nom}}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">prenom du Stagiaire</label>
        <input type="text" class="form-control" name="prenom" value="{{$stagiaire->prenom}}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="text" class="form-control" name="age" value="{{$stagiaire->age}}" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Modifier un Stagiaire</button>
</form>
@endsection