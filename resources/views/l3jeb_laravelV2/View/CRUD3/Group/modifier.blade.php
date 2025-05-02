@extends('CRUD3.layout');

@section('main')
<h2 class="card-title text-center mb-4">Modifier un group</h2>
<form action="{{route('groupes.update',$group->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">nom du group</label>
        <input type="text" class="form-control" name="group_name" value="{{$group->group_name}}" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Modifier un Group</button>
</form>
@endsection