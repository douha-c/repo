@extends('CRUD3.layout');

@section('main')
    <h2 class="card-title text-center mb-4">Modifier un module</h2>
    <form action="{{route('modules.update',$module)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">titre du module</label>
            <input type="text" class="form-control" name="titre" value="{{$module->titre}}" required>
        </div>
        <div class="mb-3">
            <label  class="form-label">masse horair</label>
            <input type="number" class="form-control" name="MH" value="{{$module->mass_h}}" required>
        </div>
        <div class="mb-3">
            <label  class="form-label">image</label>
            <input type="file" class="form-control" name="image" value="{{$module->image}}" required>
        </div>
        <div class="mb-3">
            <fieldset class="border p-4">
                <legend class="w-auto">Representant Information</legend>
                <div class="row">
                    <div class="col">
                        <label  class="form-label">Matricule</label>
                        <input type="text" class="form-control" name="matricule" value="{{$module->Representant->matricule}}" required>
                    </div>
                    <div class="col">
                        <label  class="form-label">Nom du presentant</label>
                        <input type="text" class="form-control" name="nom" value="{{$module->Representant->nom}}" required>
                    </div>
                    <div class="col">
                        <label  class="form-label">Prenom du presentant</label>
                        <input type="text" class="form-control" name="prenom" value="{{$module->Representant->prenom}}" required>
                    </div>
                    <div class="col">
                        <label  class="form-label">Grade</label>
                        <input type="text" class="form-control" name='grade' value="{{$module->Representant->grade}}" required>
                    </div>
                </div>
            </fieldset>
        </div>
        <button type="submit" class="btn btn-primary w-100">Modifier un module</button>
    </form>
    </div>
@endsection