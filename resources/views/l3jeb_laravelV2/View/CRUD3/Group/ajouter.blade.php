@extends('CRUD3.layout');

@section('main')
<h2 class="card-title text-center mb-4">Ajouter un Group</h2>
<form action="{{route('groupes.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">nom de group</label>
        <input type="text" class="form-control" name="group_name" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Ajouter un module</button>
</form>
</div>
@endsection