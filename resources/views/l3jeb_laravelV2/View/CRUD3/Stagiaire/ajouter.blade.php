@extends('CRUD3.layout');

@section('main')
<h2 class="card-title text-center mb-4">Ajouter un Stagiaire</h2>
<form action="{{route('stagiaires.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Select Group</label>
        <select class="form-control form-control-sm" name="group_id">
            @foreach ($groupes as $grp)
                <option value="{{$grp->id}}">{{$grp->group_name}}</option>
            @endforeach
        </Select>
    </div>
    <div class="mb-3">
        <label class="form-label">nom du Stagiaire</label>
        <input type="text" class="form-control" name="nom" required>
    </div>
    <div class="mb-3">
        <label class="form-label">prenom du Stagiaire</label>
        <input type="text" class="form-control" name="prenom" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="text" class="form-control" name="age" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Ajouter un Stagiaire</button>
</form>
</div>
@endsection